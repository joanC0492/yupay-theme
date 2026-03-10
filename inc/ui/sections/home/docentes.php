<?php
$home_equipo_texto_superior = get_field('home_equipo_texto_superior');
$home_equipo_titulo = get_field('home_equipo_titulo');
$home_equipo_descripcion = get_field('home_equipo_descripcion');

// Obtener docentes desde el campo personalizado de relación
$docentes = get_field('home_equipo_docente');
?>
<!-- Docentes Section (Carrusel) -->
<section class="section docentes" id="docentes">
  <div class="container">
    <div class="section-header">
      <?php if (!empty($home_equipo_texto_superior)): ?>
        <span class="section-label"><?= esc_html($home_equipo_texto_superior) ?></span>
      <?php endif; ?>

      <?php if (!empty($home_equipo_titulo)): ?>
        <h2 class="section-title"><?= esc_html($home_equipo_titulo) ?></h2>
      <?php endif; ?>

      <?php if (!empty($home_equipo_descripcion)): ?>
        <div class="section-subtitle"><?= wp_kses_post($home_equipo_descripcion) ?></div>
      <?php endif; ?>
    </div>
  </div>

  <?php if ($docentes && is_array($docentes)): ?>
    <div class="container">
      <div class="docentes-slider-wrapper">
        <!-- Botones de navegación -->
        <button class="docentes-nav docentes-nav-prev" aria-label="Anterior">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M15 18L9 12L15 6" stroke="currentColor" stroke-width="2" stroke-linecap="round"
              stroke-linejoin="round" />
          </svg>
        </button>
        <button class="docentes-nav docentes-nav-next" aria-label="Siguiente">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M9 18L15 12L9 6" stroke="currentColor" stroke-width="2" stroke-linecap="round"
              stroke-linejoin="round" />
          </svg>
        </button>

        <div class="docentes-slider-container">
          <div class="docentes-slider">
            <?php foreach ($docentes as $docente):
              setup_postdata($docente);
              $docente_cargo = get_field('docente_cargo', $docente->ID);
              ?>
              <div class="docente-card">
                <?php if (has_post_thumbnail($docente->ID)): ?>
                  <?= get_the_post_thumbnail($docente->ID, 'full', ['class' => 'docente-image', 'alt' => get_the_title($docente->ID)]) ?>
                <?php endif; ?>

                <div class="docente-info">
                  <h3 class="docente-name"><?= esc_html(get_the_title($docente->ID)) ?></h3>

                  <?php if (!empty($docente_cargo)): ?>
                    <p class="docente-bio"><?= esc_html($docente_cargo) ?></p>
                  <?php endif; ?>
                </div>
              </div>
            <?php endforeach; ?>

            <!-- Duplicado para loop infinito -->
            <?php foreach ($docentes as $docente):
              setup_postdata($docente);
              $docente_cargo = get_field('docente_cargo', $docente->ID);
              ?>
              <div class="docente-card">
                <?php if (has_post_thumbnail($docente->ID)): ?>
                  <?= get_the_post_thumbnail($docente->ID, 'full', ['class' => 'docente-image', 'alt' => get_the_title($docente->ID)]) ?>
                <?php endif; ?>

                <div class="docente-info">
                  <h3 class="docente-name"><?= esc_html(get_the_title($docente->ID)) ?></h3>

                  <?php if (!empty($docente_cargo)): ?>
                    <p class="docente-bio"><?= esc_html($docente_cargo) ?></p>
                  <?php endif; ?>
                </div>
              </div>
            <?php endforeach; ?>
            <?php wp_reset_postdata(); ?>
          </div>
        </div>
      </div>
    </div>
  <?php endif; ?>
</section>

<style>
  /* Wrapper con posición relativa para los botones */
  .docentes-slider-wrapper {
    position: relative;
    /* padding-inline: 50px; */
  }

  /* Botones de navegación - visibles en todas las pantallas */
  .docentes-nav {
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

  .docentes-nav:hover {
    background: #333;
    color: white;
    transform: translateY(-50%) scale(1.1);
  }

  .docentes-nav:active {
    transform: translateY(-50%) scale(0.95);
  }

  .docentes-nav-prev {
    left: -25px;
  }

  .docentes-nav-next {
    right: -25px;
  }

  .docentes-nav svg {
    width: 24px;
    height: 24px;
  }

  /* Desactivar animación automática y configurar navegación manual */
  .docentes-slider {
    animation: none !important;
    transition: transform 0.4s ease-in-out;
  }

  @media (max-width: 768px) {
    .docentes-nav {
      width: 40px;
      height: 40px;
    }

    .docentes-nav svg {
      width: 20px;
      height: 20px;
    }

    .docentes-nav-prev {
      /* left: -20px; */
      left: 0;
    }

    .docentes-nav-next {
      /* right: -20px; */
      right: 0;
    }

    .docentes-slider {
      gap: 16px;
    }

    .docentes-slider-wrapper {
      /* padding-inline: 25px; */
    }
  }
</style>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    // Navegación en todas las pantallas
    function initDocentesNavigation() {

      const slider = document.querySelector('.docentes-slider');
      const prevBtn = document.querySelector('.docentes-nav-prev');
      const nextBtn = document.querySelector('.docentes-nav-next');

      if (!slider || !prevBtn || !nextBtn) return;

      const cards = slider.querySelectorAll('.docente-card');
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
    initDocentesNavigation();

    // Reinicializar al cambiar tamaño de ventana
    let resizeTimeout;
    window.addEventListener('resize', function () {
      clearTimeout(resizeTimeout);
      resizeTimeout = setTimeout(function () {
        initDocentesNavigation();
      }, 250);
    });
  });
</script>
