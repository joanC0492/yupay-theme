<?php
$certificaciones_titulo = get_field('programa_certificaciones_titulo') ?: 'Certificación';
$certificaciones = get_field('programa_certificaciones');
$certificaciones_descripcion = get_field('programa_certificaciones_descripcion');
?>

<!-- Certification -->
<section class="certification-section" id="certification-section">
  <div class="container">
    <h2 class="section-title" style="color: var(--white); justify-content: center; margin-bottom: 3rem;">
      <?php echo esc_html($certificaciones_titulo); ?>
    </h2>
    <?php if ($certificaciones): ?>
      <div class="certification-grid">
        <?php foreach ($certificaciones as $cert): ?>
          <div class="cert-card">
            <?php if ($cert['icono']): ?>
              <div class="cert-icon">
                <img src="<?php echo esc_url($cert['icono']['url']); ?>" alt="<?php echo esc_attr($cert['icono']['alt']); ?>">
              </div>
            <?php endif; ?>
            <?php if ($cert['icono_copiar']): ?>
              <h4><?php echo esc_html($cert['icono_copiar']); ?></h4>
            <?php endif; ?>
            <?php if ($cert['descripcion']): ?>
              <div><?php echo wp_kses_post($cert['descripcion']); ?></div>
            <?php endif; ?>
          </div>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>
    <?php if ($certificaciones_descripcion): ?>
      <div style="text-align: center; color: var(--silver); font-size: 0.85rem; margin-top: 2rem; max-width: 700px; margin-left: auto; margin-right: auto;">
        <?php echo wp_kses_post($certificaciones_descripcion); ?>
      </div>
    <?php endif; ?>
  </div>
</section>
