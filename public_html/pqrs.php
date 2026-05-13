<?php
declare(strict_types=1);
require_once __DIR__ . '/includes/tvmar_layout.php';

tvmar_page_header('Radicar PQRS');
tvmar_render_user_hero('Radicar PQRS', 'Presenta peticiones, quejas, reclamos, recursos o sugerencias y conserva el número de radicado generado.');
?>
<section class="well1 tvmar-section-body">
  <div class="container">
    <div class="tvmar-backline"><a href="informacion-usuarios"><i class="fa-arrow-left"></i> Volver a información para usuarios</a></div>
    <form class="tvmar-pqrs-form" action="radicar-pqrs.php" method="post">
      <div class="tvmar-form-grid">
        <label>Nombre completo *
          <input type="text" name="nombre" required maxlength="140">
        </label>
        <label>Documento de identidad
          <input type="text" name="documento" maxlength="40">
        </label>
        <label>Correo electrónico *
          <input type="email" name="correo" required maxlength="160">
        </label>
        <label>Teléfono *
          <input type="tel" name="telefono" required maxlength="30">
        </label>
        <label>Tipo de solicitud *
          <select name="tipo" required>
            <option value="">Selecciona una opción</option>
            <option>Petición</option>
            <option>Queja</option>
            <option>Reclamo</option>
            <option>Recurso</option>
            <option>Sugerencia</option>
          </select>
        </label>
        <label>Asunto *
          <input type="text" name="asunto" required maxlength="180">
        </label>
      </div>
      <label>Describe tu solicitud *
        <textarea name="mensaje" required maxlength="5000"></textarea>
      </label>
      <label>
        <input type="checkbox" name="acepta" value="1" required style="width:auto;margin-right:8px;">
        Acepto el tratamiento de mis datos para la atención de esta solicitud.
      </label>
      <label class="tvmar-hidden">No diligenciar
        <input type="text" name="sitio_web" tabindex="-1" autocomplete="off">
      </label>
      <button type="submit" class="btn tvmar-btn-wide">Radicar PQRS</button>
    </form>
  </div>
</section>
<?php tvmar_page_footer(); ?>
