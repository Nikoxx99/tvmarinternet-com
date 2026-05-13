<?php
declare(strict_types=1);
require_once __DIR__ . '/includes/tvmar_layout.php';

$sections = tvmar_sections();
tvmar_page_header('Información para usuarios');
tvmar_render_user_hero('Información para usuarios', 'Encuentra en un solo lugar las herramientas, documentos y avisos que debes conocer como usuario de TVMAR Internet.');
?>
<section class="tvmar-info-band">
  <div class="container">
    <div class="tvmar-info-panel">
      <h3>Obligaciones publicadas para consulta</h3>
      <p>Este módulo reúne la información solicitada por la regulación aplicable: medidor de velocidad, gestión de tráfico, PQRS, mantenimientos, contratos, derechos de usuarios, tecnologías, seguridad e Internet sano.</p>
    </div>
  </div>
</section>
<section class="well1">
  <div class="container">
    <div class="tvmar-card-grid">
      <?php foreach ($sections as $section): ?>
        <a class="tvmar-user-card" href="<?php echo tvmar_h((string) $section['href']); ?>">
          <span class="tvmar-user-card__icon"><i class="<?php echo tvmar_h((string) $section['icon']); ?>"></i></span>
          <span>
            <h3><?php echo tvmar_h((string) $section['title']); ?></h3>
            <p><?php echo tvmar_h((string) $section['summary']); ?></p>
          </span>
          <strong>Consultar <i class="fa-arrow-right"></i></strong>
        </a>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php tvmar_page_footer(); ?>
