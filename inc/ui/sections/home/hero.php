<?php
$home_hero_etiqueta = get_field('home_hero_etiqueta');
$home_hero_titulo = get_field('home_hero_titulo');
$home_hero_descripcion = get_field('home_hero_descripcion');
$home_hero_beneficios = get_field('home_hero_beneficios'); // repeater
$home_hero_cta = get_field('home_hero_cta');  // link
$home_hero_imagen = get_field('home_hero_imagen'); // Imagen
$home_hero_cantidad_programas = get_field('home_hero_cantidad_programas');
$home_hero_cantidad_programas_texto = get_field('home_hero_cantidad_programas_texto');

?>

<!-- Hero Section -->
<section class="hero" id="inicio">
  <div class="hero-grid"></div>
  <div class="container">
    <div class="hero-content">
      <?php if (!empty($home_hero_etiqueta)): ?>
        <h1 class="hero-badge"><?= $home_hero_etiqueta ?> </h1>
      <?php endif; ?>
      <h2 class="hero-title">
        <?= wp_kses($home_hero_titulo, ['strong' => [], 'em' => [], 'b' => [], 'i' => [], 'span' => ['class' => []]]) ?>
      </h2>
      <div class="hero-description">
        <?= wp_kses_post($home_hero_descripcion) ?>
      </div>

      <!--  -->
      <div class="hero-visual hero-visual--mobile">
        <div class="hero-image-container">
          <div class="hero-float-card card-1">
            <?php if (!empty($home_hero_cantidad_programas)): ?>
              <span class="float-card-number">
                <?= esc_html($home_hero_cantidad_programas) ?>
              </span>
            <?php endif; ?>
            <?php if (!empty($home_hero_cantidad_programas_texto)): ?>
              <span class="float-card-label">
                <?= esc_html($home_hero_cantidad_programas_texto) ?>
              </span>
            <?php endif; ?>
          </div>
          <div class="hero-image-wrapper">
            <?php if (!empty($home_hero_imagen)): ?>
              <img src="<?= esc_url(is_array($home_hero_imagen) ? $home_hero_imagen['url'] : $home_hero_imagen) ?>"
                alt="<?= esc_attr(is_array($home_hero_imagen) ? ($home_hero_imagen['alt'] ?? '') : '') ?>">
            <?php endif; ?>
          </div>
        </div>
      </div>

      <!-- Programas Destacados -->
      <div class="hero-programs">
        <?php if (!empty($home_hero_beneficios)): ?>
          <?php foreach ($home_hero_beneficios as $index => $beneficio):
            $html = $beneficio['html'] ?? '';
            $page_link = $beneficio['link'] ?? '';
            $url = is_array($page_link) ? ($page_link['url'] ?? '') : $page_link;
            $target = is_array($page_link) ? ($page_link['target'] ?? '_self') : '_self'; ?>
            <?php if (!empty($url)): ?>
              <a href="<?= esc_url($url) ?>" target="<?= esc_attr($target) ?>">
                <?= wp_kses_post($html) ?>
              </a>
            <?php endif; ?>
          <?php endforeach; ?>
        <?php endif; ?>
      </div>
      <!-- Botón Explorar Programas -->
      <div class="hero-cta" style="margin-top: 2rem;">
        <?php if (!empty($home_hero_cta) && !empty($home_hero_cta['url'] && !empty($home_hero_cta['title']))): ?>
          <a href="<?= esc_url($home_hero_cta['url']) ?>" class="btn btn-primary btn-lg"
            target="<?= esc_attr($home_hero_cta['target'] ?? '_self') ?>">
            <?= esc_html($home_hero_cta['title']) ?>
            <svg class="btn-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
            </svg>
          </a>
        <?php endif; ?>
      </div>
    </div>

    <div class="hero-visual hero-visual--desktop">
      <div class="hero-image-container">
        <div class="hero-float-card card-1">
          <?php if (!empty($home_hero_cantidad_programas)): ?>
            <span class="float-card-number">
              <?= esc_html($home_hero_cantidad_programas) ?>
            </span>
          <?php endif; ?>
          <?php if (!empty($home_hero_cantidad_programas_texto)): ?>
            <span class="float-card-label">
              <?= esc_html($home_hero_cantidad_programas_texto) ?>
            </span>
          <?php endif; ?>
        </div>
        <div class="hero-image-wrapper">
          <?php if (!empty($home_hero_imagen)): ?>
            <img src="<?= esc_url(is_array($home_hero_imagen) ? $home_hero_imagen['url'] : $home_hero_imagen) ?>"
              alt="<?= esc_attr(is_array($home_hero_imagen) ? ($home_hero_imagen['alt'] ?? '') : '') ?>">
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</section>
