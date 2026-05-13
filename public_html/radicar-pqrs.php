<?php
declare(strict_types=1);
require_once __DIR__ . '/includes/tvmar_layout.php';

function tvmar_clean_post(string $key, int $max = 5000): string
{
    $value = trim((string) ($_POST[$key] ?? ''));
    $value = preg_replace('/[\x00-\x08\x0B\x0C\x0E-\x1F\x7F]/u', '', $value) ?? '';
    if (function_exists('mb_substr')) {
        return mb_substr($value, 0, $max);
    }
    return substr($value, 0, $max);
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: pqrs.php');
    exit;
}

$errors = [];
if (tvmar_clean_post('sitio_web', 200) !== '') {
    $errors[] = 'No fue posible procesar la solicitud.';
}

$nombre = tvmar_clean_post('nombre', 140);
$documento = tvmar_clean_post('documento', 40);
$correo = tvmar_clean_post('correo', 160);
$telefono = tvmar_clean_post('telefono', 30);
$tipo = tvmar_clean_post('tipo', 40);
$asunto = tvmar_clean_post('asunto', 180);
$mensaje = tvmar_clean_post('mensaje', 5000);
$acepta = isset($_POST['acepta']);

foreach (['nombre' => $nombre, 'correo' => $correo, 'telefono' => $telefono, 'tipo' => $tipo, 'asunto' => $asunto, 'mensaje' => $mensaje] as $field => $value) {
    if ($value === '') {
        $errors[] = 'El campo ' . $field . ' es obligatorio.';
    }
}

if ($correo !== '' && !filter_var($correo, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'El correo electrónico no es válido.';
}

if (!$acepta) {
    $errors[] = 'Debes aceptar el tratamiento de datos para radicar la solicitud.';
}

tvmar_page_header('Resultado PQRS');

if ($errors) {
    tvmar_render_user_hero('No se pudo radicar la PQRS', 'Revisa los campos obligatorios e intenta nuevamente.');
    echo '<section class="well1 tvmar-section-body"><div class="container"><div class="tvmar-prose"><ul class="tvmar-checklist">';
    foreach ($errors as $error) {
        echo '<li>' . tvmar_h($error) . '</li>';
    }
    echo '</ul><a class="btn tvmar-btn-wide" href="pqrs">Volver al formulario</a></div></div></section>';
    tvmar_page_footer();
    exit;
}

$radicado = 'PQR-' . date('Ymd-His') . '-' . random_int(1000, 9999);
$createdAt = date('Y-m-d H:i:s');
$storageDir = tvmar_document_root() . '/pqrs';
if (!is_dir($storageDir)) {
    mkdir($storageDir, 0755, true);
}

$csv = $storageDir . '/radicados.csv';
$isNew = !is_file($csv);
$handle = fopen($csv, 'ab');
if ($handle) {
    if ($isNew) {
        fputcsv($handle, ['radicado', 'fecha', 'nombre', 'documento', 'correo', 'telefono', 'tipo', 'asunto', 'mensaje']);
    }
    fputcsv($handle, [$radicado, $createdAt, $nombre, $documento, $correo, $telefono, $tipo, $asunto, $mensaje]);
    fclose($handle);
}

$body = "Radicado: {$radicado}\nFecha: {$createdAt}\nNombre: {$nombre}\nDocumento: {$documento}\nCorreo: {$correo}\nTeléfono: {$telefono}\nTipo: {$tipo}\nAsunto: {$asunto}\n\nMensaje:\n{$mensaje}\n";
$headers = 'From: atencionalcliente@tvmarinternet.com' . "\r\n" . 'Reply-To: ' . $correo . "\r\n";
@mail('administrativo@tvmarinternet.com', 'Nueva PQRS ' . $radicado, $body, $headers);

tvmar_render_user_hero('PQRS radicada', 'Tu solicitud fue registrada. Conserva este número para seguimiento.');
?>
<section class="well1 tvmar-section-body">
  <div class="container">
    <div class="tvmar-prose">
      <h3>Número de radicado</h3>
      <p><strong><?php echo tvmar_h($radicado); ?></strong></p>
      <p>Fecha de radicación: <?php echo tvmar_h($createdAt); ?></p>
      <p>También se intentó enviar una notificación al correo administrativo configurado del sitio.</p>
      <a class="btn tvmar-btn-wide" href="informacion-usuarios">Volver</a>
    </div>
  </div>
</section>
<?php tvmar_page_footer(); ?>
