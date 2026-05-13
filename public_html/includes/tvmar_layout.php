<?php
declare(strict_types=1);

require_once __DIR__ . '/usuarios_config.php';

function tvmar_page_header(string $title, string $active = 'usuarios'): void
{
    $titleEsc = tvmar_h($title);
    ?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <title><?php echo $titleEsc; ?> | TVMAR Internet</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="format-detection" content="telephone=no">
    <meta name="description" content="Información para usuarios de TVMAR Internet, obligaciones MinTIC, PQRS, medidor de velocidad, contratos y seguridad.">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <link rel="stylesheet" href="css/grid.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/planes.css">
    <link rel="stylesheet" href="css/tvmar-usuarios.css">
    <script src="js/jquery.js"></script>
    <script src="js/jquery-migrate-1.2.1.js"></script>
    <script src="js/device.min.js"></script>
  </head>
  <body>
    <div class="container-btn-mode">
      <div id="id-sun-responsive" class="btn-mode sun active"><i class="fas fa-sun"></i></div>
      <div id="id-moon-responsive" class="btn-mode moon"><i class="fas fa-moon"></i></div>
    </div>
    <div id="page" class="page tvmar-modern">
      <header>
        <div class="container tvmar-topbar">
          <div class="brand">
            <h1 class="brand_name"><a href="./">TVMAR INTERNET</a></h1>
            <p class="brand_slogan">Fibra óptica y radio enlace</p>
          </div>
          <a href="tel:+573208345595" class="fa-phone">3208345595</a>
          <p class="respondiendo">Atención para usuarios, soporte y solicitudes del servicio.</p>
        </div>
        <div id="stuck_container" class="stuck_container">
          <div class="container">
            <nav class="nav">
              <ul data-type="navbar" class="sf-menu">
                <li<?php echo $active === 'inicio' ? ' class="active"' : ''; ?>><a href="./">Inicio</a></li>
                <li><a href="planes">Planes</a></li>
                <li><a href="nosotros">Acerca de Nosotros</a></li>
                <li><a href="clientes">Clientes</a></li>
                <li><a href="preguntas">Preguntas Frecuentes</a></li>
                <li<?php echo $active === 'usuarios' ? ' class="active"' : ''; ?>><a href="informacion-usuarios">Información para usuarios</a></li>
                <li><a href="contacto">Contáctenos</a></li>
                <li class="esconderse"><div title="Modo Dia" id="id-sun" class="btn-mode sun activebtn"><i class="fas fa-sun"></i></div></li>
                <li class="esconderse"><div title="Modo Nocturno" id="id-moon" class="btn-mode moon"><i class="fas fa-moon"></i></div></li>
              </ul>
            </nav>
          </div>
        </div>
      </header>
      <main>
    <?php
}

function tvmar_page_footer(): void
{
    ?>
      </main>
      <footer>
        <section class="well3">
          <ul class="row contact-list">
            <li>
              <div class="box">
                <div class="box_aside" onclick="location.href='contacto';" style="cursor: pointer;"><div class="icon2 fa-map-marker"></div></div>
                <div class="box_cnt__no-flow"><address>Carrera 4 N° 8-56 Barrio el Carmen Mariquita - Tolima</address></div>
                <div class="box_aside" onclick="location.href='mailto:atencionalcliente@tvmarinternet.com';" style="cursor: pointer;"><div class="icon2 fa-envelope"></div></div>
                <div class="box_cnt__no-flow"><address>atencionalcliente@tvmarinternet.com</address></div>
                <div class="box_aside" onclick="window.open('https://m.facebook.com/intertvmar','facebook');" style="cursor: pointer;"><div class="icon2 fa-facebook"></div></div>
                <div class="box_aside" onclick="window.open('https://m.twitter.com/tvmarinternet','twitter');" style="cursor: pointer;"><div class="icon2 fa-twitter"></div></div>
                <div class="box_aside" onclick="window.open('https://m.instagram.com/tvmarinternet','instagram');" style="cursor: pointer;"><div class="icon2 fa-instagram"></div></div>
              </div>
            </li>
          </ul>
        </section>
      </footer>
    </div>
    <script src="js/script.js"></script>
    <script src="js/botones.js"></script>
  </body>
</html>
    <?php
}

function tvmar_render_user_hero(string $title, string $summary, string $label = 'Información para usuarios'): void
{
    ?>
    <section class="tvmar-user-hero">
      <div class="container tvmar-user-hero__inner">
        <span><?php echo tvmar_h($label); ?></span>
        <h2><?php echo tvmar_h($title); ?></h2>
        <p><?php echo tvmar_h($summary); ?></p>
      </div>
    </section>
    <?php
}

function tvmar_document_exists(string $file): bool
{
    $absolute = dirname(__DIR__) . '/' . ltrim($file, '/');
    return is_file($absolute);
}

function tvmar_render_document_viewer(array $section): void
{
    $file = (string) ($section['file'] ?? '');
    if ($file === '' || !tvmar_document_exists($file)) {
        ?>
        <div class="tvmar-empty">
          <i class="fa-folder-open"></i>
          <p><?php echo tvmar_h($section['empty_message'] ?? 'Documento pendiente de publicación.'); ?></p>
        </div>
        <?php
        return;
    }

    $fileEsc = tvmar_h($file);
    $isPdf = strtolower(pathinfo($file, PATHINFO_EXTENSION)) === 'pdf';
    ?>
    <div class="tvmar-doc-actions">
      <a class="btn tvmar-btn-wide" href="<?php echo $fileEsc; ?>" target="_blank" rel="noopener">Abrir documento</a>
      <a class="btn2 tvmar-btn-wide" href="<?php echo $fileEsc; ?>" download>Descargar</a>
    </div>
    <?php if ($isPdf): ?>
      <iframe class="tvmar-pdf-viewer" src="<?php echo $fileEsc; ?>#view=FitH" title="<?php echo tvmar_h($section['title']); ?>"></iframe>
    <?php else: ?>
      <div class="tvmar-empty">
        <i class="fa-download"></i>
        <p>El archivo publicado no es PDF. Usa los botones para abrirlo o descargarlo.</p>
      </div>
    <?php endif; ?>
    <?php
}

function tvmar_render_user_detail(string $slug): void
{
    $section = tvmar_section($slug);
    if (!$section) {
        http_response_code(404);
        tvmar_page_header('Sección no encontrada');
        tvmar_render_user_hero('Sección no encontrada', 'No pudimos encontrar la información solicitada.');
        echo '<section class="well1"><div class="container"><a class="btn tvmar-btn-wide" href="informacion-usuarios">Volver</a></div></section>';
        tvmar_page_footer();
        return;
    }

    tvmar_page_header((string) $section['title']);
    tvmar_render_user_hero((string) $section['title'], (string) $section['summary'], (string) ($section['requirement'] ?? 'Información para usuarios'));
    ?>
    <section class="well1 tvmar-section-body">
      <div class="container">
        <div class="tvmar-backline"><a href="informacion-usuarios"><i class="fa-arrow-left"></i> Volver a información para usuarios</a></div>
        <?php if (($section['mode'] ?? '') === 'iframe'): ?>
          <div class="tvmar-prose">
            <h3>Antes de iniciar la medición</h3>
            <?php if (!empty($section['bullets']) && is_array($section['bullets'])): ?>
              <ul class="tvmar-checklist">
                <?php foreach ($section['bullets'] as $item): ?>
                  <li><?php echo tvmar_h((string) $item); ?></li>
                <?php endforeach; ?>
              </ul>
            <?php endif; ?>
          </div>
          <iframe class="tvmar-tool-frame" src="<?php echo tvmar_h((string) $section['iframe_url']); ?>" title="<?php echo tvmar_h((string) $section['title']); ?>"></iframe>
          <p class="tvmar-frame-note">Si el medidor no carga dentro de esta página, ábrelo en una pestaña nueva.</p>
          <a class="btn tvmar-btn-wide" href="<?php echo tvmar_h((string) $section['iframe_url']); ?>" target="_blank" rel="noopener"><?php echo tvmar_h((string) ($section['action_label'] ?? 'Abrir herramienta')); ?></a>
        <?php elseif (($section['mode'] ?? '') === 'article'): ?>
          <article class="tvmar-prose">
            <?php echo (string) ($section['content_html'] ?? ''); ?>
          </article>
          <?php tvmar_render_document_viewer($section); ?>
        <?php else: ?>
          <div class="tvmar-prose"><p><?php echo tvmar_h((string) $section['summary']); ?></p></div>
          <?php tvmar_render_document_viewer($section); ?>
        <?php endif; ?>
      </div>
    </section>
    <?php
    tvmar_page_footer();
}
