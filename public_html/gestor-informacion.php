<?php
declare(strict_types=1);
session_start();

require_once __DIR__ . '/includes/usuarios_config.php';

$GESTOR_CLAVE = getenv('TVMAR_GESTOR_CLAVE') ?: '';
$message = '';
$error = '';

if (isset($_POST['logout'])) {
    $_SESSION = [];
    session_destroy();
    header('Location: gestor-informacion.php');
    exit;
}

if (isset($_POST['password'])) {
    if ($GESTOR_CLAVE !== '' && hash_equals($GESTOR_CLAVE, (string) $_POST['password'])) {
        $_SESSION['tvmar_gestor'] = true;
        header('Location: gestor-informacion.php');
        exit;
    }
    $error = 'Clave incorrecta.';
}

$isLogged = !empty($_SESSION['tvmar_gestor']);
$sections = tvmar_sections();

if ($isLogged && $_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['section'])) {
    $slug = (string) $_POST['section'];
    if (!isset($sections[$slug])) {
        $error = 'La sección seleccionada no existe.';
    } elseif (!isset($_FILES['archivo']) || !is_uploaded_file($_FILES['archivo']['tmp_name'])) {
        $error = 'Selecciona un archivo para subir.';
    } else {
        $file = $_FILES['archivo'];
        $maxBytes = 25 * 1024 * 1024;
        $allowed = ['pdf', 'doc', 'docx', 'xls', 'xlsx', 'png', 'jpg', 'jpeg', 'webp'];
        $extension = strtolower(pathinfo((string) $file['name'], PATHINFO_EXTENSION));

        if (($file['size'] ?? 0) > $maxBytes) {
            $error = 'El archivo supera 25 MB.';
        } elseif (!in_array($extension, $allowed, true)) {
            $error = 'Tipo de archivo no permitido.';
        } else {
            $baseDir = tvmar_document_root() . '/' . $slug;
            if (!is_dir($baseDir)) {
                mkdir($baseDir, 0755, true);
            }

            $safeName = preg_replace('/[^a-zA-Z0-9._-]+/', '-', pathinfo((string) $file['name'], PATHINFO_FILENAME));
            $safeName = trim((string) $safeName, '-');
            if ($safeName === '') {
                $safeName = $slug;
            }
            $finalName = date('Ymd-His') . '-' . $safeName . '.' . $extension;
            $destination = $baseDir . '/' . $finalName;

            if (move_uploaded_file($file['tmp_name'], $destination)) {
                $relative = 'documentos/usuarios/' . $slug . '/' . $finalName;
                tvmar_save_section_updates([
                    $slug => [
                        'file' => $relative,
                        'updated_at' => date('Y-m-d H:i:s'),
                    ],
                ]);
                $sections = tvmar_sections();
                $message = 'Archivo publicado en ' . $sections[$slug]['title'] . '.';
            } else {
                $error = 'No se pudo guardar el archivo.';
            }
        }
    }
}

?><!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Gestor temporal | TVMAR</title>
  <link rel="stylesheet" href="css/tvmar-usuarios.css">
</head>
<body class="tvmar-admin">
<main>
  <h1>Gestor temporal de información para usuarios</h1>
  <p class="notice">Este archivo es temporal. Define la variable de entorno <strong>TVMAR_GESTOR_CLAVE</strong> antes de usarlo o elimínalo al terminar la carga de documentos.</p>

  <?php if ($error !== ''): ?><p class="notice"><?php echo tvmar_h($error); ?></p><?php endif; ?>
  <?php if ($message !== ''): ?><p class="notice"><?php echo tvmar_h($message); ?></p><?php endif; ?>

  <?php if (!$isLogged): ?>
    <?php if ($GESTOR_CLAVE === ''): ?>
      <p class="notice">El gestor está deshabilitado porque no se ha definido <strong>TVMAR_GESTOR_CLAVE</strong> en el servidor.</p>
    <?php endif; ?>
    <form method="post">
      <label>Clave de acceso
        <input type="password" name="password" required>
      </label>
      <button type="submit">Entrar</button>
    </form>
  <?php else: ?>
    <form method="post" enctype="multipart/form-data">
      <label>Sección
        <select name="section" required>
          <?php foreach ($sections as $slug => $section): ?>
            <option value="<?php echo tvmar_h((string) $slug); ?>"><?php echo tvmar_h((string) $section['title']); ?></option>
          <?php endforeach; ?>
        </select>
      </label>
      <label>Archivo para publicar
        <input type="file" name="archivo" required accept=".pdf,.doc,.docx,.xls,.xlsx,.png,.jpg,.jpeg,.webp">
      </label>
      <button type="submit">Subir y publicar</button>
    </form>

    <form method="post">
      <button type="submit" name="logout" value="1">Cerrar sesión</button>
    </form>

    <h2>Estado actual</h2>
    <table>
      <thead>
        <tr>
          <th>Sección</th>
          <th>Archivo publicado</th>
          <th>Última actualización</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($sections as $section): ?>
          <tr>
            <td><?php echo tvmar_h((string) $section['title']); ?></td>
            <td>
              <?php if (!empty($section['file'])): ?>
                <a href="<?php echo tvmar_h((string) $section['file']); ?>" target="_blank" rel="noopener"><?php echo tvmar_h((string) $section['file']); ?></a>
              <?php else: ?>
                Pendiente
              <?php endif; ?>
            </td>
            <td><?php echo tvmar_h((string) ($section['updated_at'] ?? '')); ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  <?php endif; ?>
</main>
</body>
</html>
