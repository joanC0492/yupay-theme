<?php
$term = get_queried_object();
$hero_titulo = get_field('areas_hero_titulo', $term);
$hero_descripcion_1 = get_field('areas_hero_descripcion_1', $term);
$hero_descripcion_2 = get_field('areas_hero_descripcion_2', $term);
$hero_beneficios = get_field('areas_hero_beneficios', $term) ?? []; ?>
<section class="hero-areas">
  <div class="container">
    <div class="hero-areas-content">
      <nav class="breadcrumb">
        <a href="<?= home_url(); ?>">Inicio</a>
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <path d="M9 18l6-6-6-6" />
        </svg>
        <span>
          <?= single_term_title(); ?>
        </span>
      </nav>

      <div class="hero-areas-badge">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <path d="M12 2L2 7l10 5 10-5-10-5z" />
          <path d="M2 17l10 5 10-5" />
          <path d="M2 12l10 5 10-5" />
        </svg>
        Área Temática
      </div>

      <?php if (!empty($hero_titulo)): ?>
        <h1 class="hero-areas-title">
          <?= $hero_titulo ?>
        </h1>
      <?php endif; ?>
      <?php if (!empty($hero_descripcion_1)): ?>
        <div class="hero-areas-description" style="font-size: 1.25rem; color: var(--white); margin-bottom: 0.5rem;">
          <?= wp_kses_post($hero_descripcion_1) ?>
        </div>
      <?php endif; ?>

      <?php if (!empty($hero_descripcion_2)): ?>
        <div class="hero-areas-description" style="margin-bottom: 2rem;">
          <?= wp_kses_post($hero_descripcion_2) ?>
        </div>
      <?php endif; ?>

      <!-- Experiencias Educativas -->
      <div class="hero-areas-beneficios"
        style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 1rem; margin-top: 1.5rem;">
        <?php foreach ($hero_beneficios as $beneficio):
          $titulo = $beneficio['titulo'];
          $descripcion = $beneficio['descripcion']; ?>
          <?php if (!empty($titulo) || !empty($descripcion)): ?>
            <div
              style="background: rgba(255,255,255,0.05); backdrop-filter: blur(10px); border: 1px solid rgba(255,255,255,0.1); border-radius: 12px; padding: 1.25rem;">
              <?php if (!empty($titulo)): ?>
                <h4
                  style="font-family: var(--font-body); font-size: 0.85rem; font-weight: 600; color: var(--primary); margin-bottom: 0.5rem; text-transform: uppercase; letter-spacing: 0.05em;">
                  <?= $titulo ?>
                </h4>
              <?php endif; ?>
              <?php if (!empty($descripcion)): ?>
                <p style="font-size: 0.85rem; color: var(--silver);">
                  <?= $descripcion ?>
                </p>
              <?php endif; ?>
            </div>
          <?php endif; ?>

        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>
