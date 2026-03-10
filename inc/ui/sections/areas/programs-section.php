<?php
$term = get_queried_object();
$programas_titulo = get_field('areas_programas_titulo', $term);
$programas_descripcion = get_field('areas_programas_descripcion', $term); ?>

<!-- Programs Section -->
<section class="programs-section">
  <div class="container">
    <header class="section-header">
      <?php if (!empty($programas_titulo)): ?>
        <h2 class="section-title">
          <?= $programas_titulo ?>
        </h2>
      <?php endif; ?>
      <?php if (!empty($programas_descripcion)): ?>
        <div class="section-description">
          <?= $programas_descripcion ?>
        </div>
      <?php endif; ?>
    </header>

    <div class="programs-grid">
      <?php
      // Obtener programas del taxonomy actual (9 por página)
      $paged = 1;
      if (get_query_var('paged')) $paged = (int) get_query_var('paged');
      if (get_query_var('page')) $paged = (int) get_query_var('page');
      $args = array(
        'post_type' => 'programa',
        'posts_per_page' => 9,
        'paged' => $paged,
        'tax_query' => array(
          array(
            'taxonomy' => 'areas',
            'field' => 'term_id',
            'terms' => $term->term_id,
          ),
        ),
      );

      $programas_query = new WP_Query($args);
      if ($programas_query->have_posts()):
        while ($programas_query->have_posts()):
          $programas_query->the_post();

          // Obtener campos personalizados
          // $horas = get_field('programa_card_horas');
          // $modalidad = get_field('programa_card_modalidad');
          $inicio = get_field('programas_inscripcion_inicio');
          $precio = get_field('programas_card_inversion_precio');
          $texto_cuotas = get_field('programas_card_inversion_texto_cuotas');
          $nota = get_field('programas_card_inversion_nota');
          $texto_boton = get_field('programa_card_texto_boton');
          $caracteristicas = get_field('programas_caracteristicas');
          $caract_duracion = '';
          $caract_modalidad = '';
          foreach ($caracteristicas as $i => $caracteristica) {
            if ($i == 0) {
              $caract_duracion = $caracteristica['descripcion'];
            }
            if ($i == 1) {
              $caract_modalidad = $caracteristica['descripcion'];
            }
          }

          $etiqueta_nuevo = get_field('programa_card_nuevo');
          $etiqueta_especializado = get_field('programa_card_especializado');

          $programas_card_inversion = get_field('programas_card_inversion', get_the_ID());
          $ocultar_precio = false;
          if (!empty($programas_card_inversion)) {
            $ocultar_precio = $programas_card_inversion['ocultar'];
          }

          $proximamente = get_field('programas_proximamente');


          // Verificar si es nuevo (menos de 30 días desde publicación)
          $post_date = get_the_date('U');
          $current_date = current_time('timestamp');
          $days_diff = ($current_date - $post_date) / (60 * 60 * 24);
          $is_new = $days_diff <= 30;

          // Imagen destacada
          $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'large');
          // if (!$thumbnail_url) {
          //   $thumbnail_url = 'https://images.unsplash.com/photo-1554224155-8d04cb21cd6c?w=800&h=400&fit=crop';
          // }

          // Si el programa está marcado como "Próximamente"
          if ($proximamente):
            ?>
            <div class="program-card fade-in" style="opacity: 0.5; pointer-events: none;">
              <div class="program-image">
                <!-- <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=800&h=400&fit=crop"
                  alt="Próximo programa"> -->
                <?php if (!empty($thumbnail_url)): ?>
                  <img src="<?= esc_url($thumbnail_url); ?>" alt="<?= the_title_attribute(); ?>">
                <?php endif; ?>
                <div class="program-badges">
                  <span class="program-badge badge-type">
                    Próximamente
                  </span>
                </div>
              </div>
              <div class="program-content">
                <h3 class="program-title"><?= get_the_title(); ?></h3>
                <!-- Estamos preparando más programas especializados en finanzas y negocios.
                ¡Mantente atento a nuestras novedades! -->
                <div class="program-description">
                  <?= get_the_excerpt(); ?>
                </div>
                <div class="program-meta">
                  <div class="meta-item">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                      <circle cx="12" cy="12" r="10" />
                      <path d="M12 6v6l4 2" />
                    </svg>
                    Por definir
                  </div>
                </div>
              </div>
              <div class="program-footer">
                <div class="program-price" style="color: var(--silver);">
                  Próximamente
                </div>
                <span class="program-cta" style="opacity: 0.5;">
                  Más info
                </span>
              </div>
            </div>
          <?php else: ?>
            <a href="<?= the_permalink(); ?>" class="program-card fade-in">
              <div class="program-image">
                <?php if (!empty($thumbnail_url)): ?>
                  <img src="<?= esc_url($thumbnail_url); ?>" alt="<?= the_title_attribute(); ?>">
                <?php endif; ?>

                <div class="program-badges">
                  <?php if (!empty($etiqueta_nuevo)): ?>
                    <span class="program-badge badge-new"><?= esc_html($etiqueta_nuevo); ?></span>
                  <?php endif; ?>
                  <?php if (!empty($etiqueta_especializado)): ?>
                    <span class="program-badge badge-type"><?= esc_html($etiqueta_especializado); ?></span>
                  <?php endif; ?>
                </div>
              </div>
              <div class="program-content">
                <h3 class="program-title"><?= get_the_title(); ?></h3>
                <div class="program-description">
                  <?= get_the_excerpt(); ?>
                </div>
                <div class="program-meta">

                  <!-- $caract_duracion = '';
                  $caract_modalidad = ''; -->
                  <!-- HERE -->
                  <?php if (!empty($caract_duracion)): ?>
                    <div class="meta-item">
                      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="10" />
                        <path d="M12 6v6l4 2" />
                      </svg>
                      <?= esc_html($caract_duracion); ?>
                    </div>
                  <?php endif; ?>

                  <?php if (!empty($inicio)): ?>
                    <div class="meta-item">
                      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <rect x="3" y="4" width="18" height="18" rx="2" ry="2" />
                        <line x1="16" y1="2" x2="16" y2="6" />
                        <line x1="8" y1="2" x2="8" y2="6" />
                        <line x1="3" y1="10" x2="21" y2="10" />
                      </svg>
                      <?= esc_html($inicio); ?>
                    </div>
                  <?php endif; ?>

                  <!-- HERE -->
                  <?php if (!empty($caract_modalidad)): ?>
                    <div class="meta-item">
                      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z" />
                        <circle cx="12" cy="10" r="3" />
                      </svg>
                      <?= esc_html($caract_modalidad); ?>
                    </div>
                  <?php endif; ?>
                </div>
              </div>
              <div class="program-footer">
                <?php if (empty($ocultar_precio)): ?>
                  <div class="program-price">
                    <?php if (!empty($precio)): ?>
                      <?= esc_html($precio); ?>
                    <?php endif; ?>
                    <?php if (!empty($texto_cuotas)): ?>
                      <span><?= esc_html($texto_cuotas); ?></span>
                    <?php endif; ?>
                    <?php if (!empty($nota)): ?>
                      <span style="display: block; font-size: 0.7rem; color: var(--primary); margin-top: 0.25rem;">
                        <?= esc_html($nota); ?>
                      </span>
                    <?php endif; ?>
                  </div>
                <?php endif; ?>

                <span class="program-cta">
                  <?= !empty($texto_boton) ? esc_html($texto_boton) : 'Ver programa'; ?>
                  <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M5 12h14M12 5l7 7-7 7" />
                  </svg>
                </span>
              </div>
            </a>
          <?php endif; ?>

          <?php
        endwhile;
        wp_reset_postdata();
      endif;
      ?>
    </div>

    <?php if (isset($programas_query) && $programas_query->max_num_pages > 1): ?>
      <div class="programs-pagination-wrapper">
        <nav class="programs-pagination" aria-label="Paginación de programas">
          <?php
          echo paginate_links(array(
            'total' => $programas_query->max_num_pages,
            'current' => $paged,
            'prev_text' => '&laquo; Anterior',
            'next_text' => 'Siguiente &raquo;',
            'type' => 'list',
          ));
          ?>
        </nav>
      </div>
    <?php endif; ?>
  </div>
</section>
