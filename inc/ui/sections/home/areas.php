<?php
$home_areas_texto_superior = get_field('home_areas_texto_superior');
$home_areas_titulo = get_field('home_areas_titulo');
$home_areas_descripcion = get_field('home_areas_descripcion'); // textarea
?>
<!-- Áreas Temáticas -->
<section class="section areas" id="areas">
  <div class="container">
    <div class="section-header">
      <?php if (!empty($home_areas_texto_superior)): ?>
        <span class="section-label"><?= esc_html($home_areas_texto_superior) ?></span>
      <?php endif; ?>
      <?php if (!empty($home_areas_titulo)): ?>
        <h2 class="section-title"><?= esc_html($home_areas_titulo) ?></h2>
      <?php endif; ?>
      <?php if (!empty($home_areas_descripcion)): ?>
        <p class="section-subtitle">
          <?= esc_html($home_areas_descripcion) ?>
        </p>
      <?php endif; ?>
    </div>
    <div class="areas-grid">
      <?php
      // Obtener todos los términos de la taxonomía 'areas'
      $areas_terms = get_terms([
        'taxonomy' => 'areas',
        'hide_empty' => false,
        'orderby' => 'term_id',
        'order' => 'ASC',
      ]);

      if (!empty($areas_terms) && !is_wp_error($areas_terms)):
        foreach ($areas_terms as $term):
          // Obtener campos ACF del término
          $areas_icono = get_field('areas_icono', $term);
          $areas_card_texto_inferior = get_field('areas_card_texto_inferior', $term);
          $areas_card_imagen_principal = get_field('areas_card_imagen_principal', $term);
          $term_link = get_term_link($term);
          ?>
          <a href="<?= esc_url($term_link) ?>" class="area-card">
            <?php if (!empty($areas_card_imagen_principal)): ?>
              <img
                src="<?= esc_url(is_array($areas_card_imagen_principal) ? $areas_card_imagen_principal['url'] : $areas_card_imagen_principal) ?>"
                alt="<?= esc_attr($term->name) ?>">
            <?php endif; ?>

            <div class="area-overlay">
              <?php if (!empty($areas_icono)): ?>
                <div class="area-icon">
                  <img src="<?= esc_url(is_array($areas_icono) ? $areas_icono['url'] : $areas_icono) ?>"
                    alt="<?= esc_attr($term->name) ?>" class="svg">
                </div>
              <?php endif; ?>

              <h3 class="area-name"><?= esc_html($term->name) ?></h3>

              <span class="area-arrow">
                <?= !empty($areas_card_texto_inferior) ? esc_html($areas_card_texto_inferior) : 'Ver programas' ?>
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                </svg>
              </span>
            </div>
          </a>
          <?php
        endforeach;
      endif;
      ?>
    </div>
  </div>

  <div class="container container-mobile">
    <?php if (!empty($areas_terms) && !is_wp_error($areas_terms)): ?>
      <div class="areas-slider-wrapper">
        <!-- Botones de navegación -->
        <button class="areas-nav areas-nav-prev" aria-label="Anterior">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M15 18L9 12L15 6" stroke="currentColor" stroke-width="2" stroke-linecap="round"
              stroke-linejoin="round" />
          </svg>
        </button>
        <button class="areas-nav areas-nav-next" aria-label="Siguiente">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M9 18L15 12L9 6" stroke="currentColor" stroke-width="2" stroke-linecap="round"
              stroke-linejoin="round" />
          </svg>
        </button>

        <div class="areas-slider-container">
          <div class="areas-slider">
            <?php foreach ($areas_terms as $term):
              $areas_icono = get_field('areas_icono', $term);
              $areas_card_texto_inferior = get_field('areas_card_texto_inferior', $term);
              $areas_card_imagen_principal = get_field('areas_card_imagen_principal', $term);
              $term_link = get_term_link($term);
              ?>
              <a href="<?= esc_url($term_link) ?>" class="area-card area-card-slider">
                <?php if (!empty($areas_card_imagen_principal)): ?>
                  <img
                    src="<?= esc_url(is_array($areas_card_imagen_principal) ? $areas_card_imagen_principal['url'] : $areas_card_imagen_principal) ?>"
                    alt="<?= esc_attr($term->name) ?>">
                <?php endif; ?>

                <div class="area-overlay">
                  <?php if (!empty($areas_icono)): ?>
                    <div class="area-icon">
                      <img src="<?= esc_url(is_array($areas_icono) ? $areas_icono['url'] : $areas_icono) ?>"
                        alt="<?= esc_attr($term->name) ?>" class="svg">
                    </div>
                  <?php endif; ?>

                  <h3 class="area-name"><?= esc_html($term->name) ?></h3>

                  <span class="area-arrow">
                    <?= !empty($areas_card_texto_inferior) ? esc_html($areas_card_texto_inferior) : 'Ver programas' ?>
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                    </svg>
                  </span>
                </div>
              </a>
            <?php endforeach; ?>

            <!-- Duplicado para loop infinito -->
            <?php foreach ($areas_terms as $term):
              $areas_icono = get_field('areas_icono', $term);
              $areas_card_texto_inferior = get_field('areas_card_texto_inferior', $term);
              $areas_card_imagen_principal = get_field('areas_card_imagen_principal', $term);
              $term_link = get_term_link($term);
              ?>
              <a href="<?= esc_url($term_link) ?>" class="area-card area-card-slider">
                <?php if (!empty($areas_card_imagen_principal)): ?>
                  <img
                    src="<?= esc_url(is_array($areas_card_imagen_principal) ? $areas_card_imagen_principal['url'] : $areas_card_imagen_principal) ?>"
                    alt="<?= esc_attr($term->name) ?>">
                <?php endif; ?>

                <div class="area-overlay">
                  <?php if (!empty($areas_icono)): ?>
                    <div class="area-icon">
                      <img src="<?= esc_url(is_array($areas_icono) ? $areas_icono['url'] : $areas_icono) ?>"
                        alt="<?= esc_attr($term->name) ?>" class="svg">
                    </div>
                  <?php endif; ?>

                  <h3 class="area-name"><?= esc_html($term->name) ?></h3>

                  <span class="area-arrow">
                    <?= !empty($areas_card_texto_inferior) ? esc_html($areas_card_texto_inferior) : 'Ver programas' ?>
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                    </svg>
                  </span>
                </div>
              </a>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    <?php endif; ?>
  </div>
</section>

<style>
  .areas-slider-container {
    position: relative;
    width: 100%;
    overflow: hidden;
  }

  .container-mobile {
    display: none;
  }

  /* Wrapper con posición relativa para los botones */
  .areas-slider-wrapper {
    position: relative;
  }

  /* Botones de navegación - visibles en todas las pantallas */
  .areas-nav {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background: rgba(255, 255, 255, 0.95);
    border: 2px solid rgba(51, 51, 51, 0.3);
    border-radius: 50%;
    width: 50px;
    height: 50px;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    z-index: 10;
    transition: all 0.3s ease;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
  }

  .areas-nav:hover {
    background: #333;
    color: white;
    transform: translateY(-50%) scale(1.1);
  }

  .areas-nav:active {
    transform: translateY(-50%) scale(0.95);
  }

  .areas-nav-prev {
    left: -25px;
  }

  .areas-nav-next {
    right: -25px;
  }

  .areas-nav svg {
    width: 24px;
    height: 24px;
  }

  .areas-slider {
    display: flex;
    gap: 1.5rem;
    animation: slideDocentes 40s linear infinite;
  }

  /* Desactivar animación automática y configurar navegación manual */
  .areas-slider {
    animation: none !important;
    transition: transform 0.4s ease-in-out;
  }

  .area-card-slider {
    width: 280px;
    flex-shrink: 0;
  }

  @media (max-width: 768px) {
    .areas-nav {
      width: 40px;
      height: 40px;
    }

    .areas-nav svg {
      width: 20px;
      height: 20px;
    }

    .areas-nav-prev {
      left: 0;
    }

    .areas-nav-next {
      right: 0;
    }

    .areas-slider {
      gap: 16px;
    }

    .areas-grid {
      display: none !important;
    }

    .container-mobile {
      display: block !important;
    }
  }

  @media (max-width: 767px) {
    .area-card {
      height: 260px;
    }
    .area-card-slider {
      width: 100%;
    }
    .areas-slider {
      padding-inline: 10px;
    }
  }
</style>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    // Navegación en todas las pantallas
    function initAreasNavigation() {

      const slider = document.querySelector('.areas-slider');
      const prevBtn = document.querySelector('.areas-nav-prev');
      const nextBtn = document.querySelector('.areas-nav-next');

      if (!slider || !prevBtn || !nextBtn) return;

      const cards = slider.querySelectorAll('.area-card-slider');
      const totalCards = cards.length / 2; // Dividido por 2 porque están duplicados
      let currentIndex = 0;
      let isTransitioning = false;

      // Calcular el ancho de una card + gap
      function getCardWidth() {
        const card = cards[0];
        // Obtener el gap dinámicamente del CSS
        const computedStyle = window.getComputedStyle(slider);
        const gap = parseFloat(computedStyle.gap) || 0;
        return card.offsetWidth + gap;
      }

      function updateSliderPosition(withTransition = true) {
        const cardWidth = getCardWidth();
        const offset = -currentIndex * cardWidth;

        if (withTransition) {
          slider.style.transition = 'transform 0.4s ease-in-out';
        } else {
          slider.style.transition = 'none';
        }

        slider.style.transform = `translateX(${offset}px)`;
      }

      // Botón siguiente
      nextBtn.addEventListener('click', function () {
        if (isTransitioning) return;

        isTransitioning = true;
        currentIndex++;
        updateSliderPosition(true);

        // Si llegamos al duplicado, resetear sin transición después de la animación
        if (currentIndex >= totalCards) {
          setTimeout(function () {
            currentIndex = 0;
            updateSliderPosition(false);
            isTransitioning = false;
          }, 400); // Esperar a que termine la transición
        } else {
          setTimeout(function () {
            isTransitioning = false;
          }, 400);
        }
      });

      // Botón anterior
      prevBtn.addEventListener('click', function () {
        if (isTransitioning) return;

        isTransitioning = true;

        // Si estamos en el inicio, saltar al duplicado sin transición
        if (currentIndex === 0) {
          currentIndex = totalCards;
          updateSliderPosition(false);

          // Pequeño delay para que el browser registre el cambio
          setTimeout(function () {
            currentIndex--;
            updateSliderPosition(true);

            setTimeout(function () {
              isTransitioning = false;
            }, 400);
          }, 20);
        } else {
          currentIndex--;
          updateSliderPosition(true);

          setTimeout(function () {
            isTransitioning = false;
          }, 400);
        }
      });

      // Soporte para navegación táctil (swipe)
      let touchStartX = 0;
      let touchEndX = 0;

      slider.addEventListener('touchstart', function (e) {
        touchStartX = e.changedTouches[0].screenX;
      });

      slider.addEventListener('touchend', function (e) {
        touchEndX = e.changedTouches[0].screenX;
        handleSwipe();
      });

      function handleSwipe() {
        const swipeThreshold = 50;
        if (touchEndX < touchStartX - swipeThreshold) {
          // Swipe izquierda - siguiente
          nextBtn.click();
        }
        if (touchEndX > touchStartX + swipeThreshold) {
          // Swipe derecha - anterior
          prevBtn.click();
        }
      }

      // Actualizar posición al cambiar tamaño de ventana
      let resizeTimer;
      window.addEventListener('resize', function () {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(function () {
          updateSliderPosition(false);
        }, 250);
      });
    }

    // Inicializar
    initAreasNavigation();

    // Reinicializar al cambiar tamaño de ventana
    let resizeTimeout;
    window.addEventListener('resize', function () {
      clearTimeout(resizeTimeout);
      resizeTimeout = setTimeout(function () {
        initAreasNavigation();
      }, 250);
    });
  });
</script>
