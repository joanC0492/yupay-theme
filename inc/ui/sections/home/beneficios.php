<?php

$home_valor_texto_superior = get_field('home_valor_texto_superior');
$home_valor_titulo = get_field('home_valor_titulo');
$home_valor_card = get_field('home_valor_card'); // Repetidor


$icon_svg = [
  '<svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
  </svg>',
  '<svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
      d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
  </svg>',
  '<svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
      d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
  </svg>'
];

?>

<!-- Benefits Section -->
<section class="section benefits" id="beneficios">
  <div class="container">
    <div class="section-header">
      <?php if (!empty($home_valor_texto_superior)): ?>
        <span class="section-label"><?= esc_html($home_valor_texto_superior) ?></span>
      <?php endif; ?>
      <?php if (!empty($home_valor_titulo)): ?>
        <h2 class="section-title"><?= esc_html($home_valor_titulo) ?></h2>
      <?php endif; ?>
    </div>
    <div class="benefits-grid">
      <?php foreach ($home_valor_card as $index => $beneficio): ?>
        <?php
        $icono_card = $beneficio['icono_card'];
        $icono_card_titulo = $beneficio['icono_card_titulo'];
        $icono_card_descripcion = $beneficio['icono_card_descripcion']; ?>
        <div class="benefit-card">
          <div class="benefit-icon">
            <?php
            if (!empty($icono_card)): ?>
              <img src="<?= esc_url(is_array($icono_card) ? $icono_card['url'] : $icono_card) ?>"
                alt="<?= esc_attr($icono_card_titulo) ?>" class="svg">
            <?php endif; ?>
          </div>
          <h3><?= esc_html($icono_card_titulo) ?></h3>
          <div>
            <?= wp_kses_post($icono_card_descripcion) ?>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
