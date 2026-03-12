<?php
/**
 * Seccion Speakers - REUTILIZABLE
 *
 * @package yupay-theme
 */
defined('ABSPATH') || exit;

$defaults = [
  'section_class' => '',
  'section_id' => 'foro-speakers-' . wp_rand(),
  'eyebrow' => '',
  'title' => '',
  'description' => '',
  'cards' => [],
];
$args = wp_parse_args($args ?? [], $defaults);

$section_class = $args['section_class'];
$section_id = $args['section_id'];
$eyebrow = $args['eyebrow'];
$title = $args['title'];
$description = $args['description'];
$cards = is_array($args['cards']) ? $args['cards'] : [];

$has_cards = !empty($cards);
$has_content = !empty($eyebrow) || !empty($title) || !empty($description) || $has_cards;

if ($has_content): ?>
  <section class="section section-dark <?= esc_attr($section_class); ?>" data-section="<?= esc_attr($section_id); ?>"
    id="foro-speakers-list">
    <div class="container">
      <div class="section-header">
        <?php if (!empty($eyebrow)): ?>
          <div class="section-badge"><?= esc_html($eyebrow); ?></div>
        <?php endif; ?>
        <?php if (!empty($title)): ?>
          <h2 class="section-title"><?= wp_kses_post($title); ?></h2>
        <?php endif; ?>
        <?php if (!empty($description)): ?>
          <div class="section-description"><?= wp_kses_post($description); ?></div>
        <?php endif; ?>
      </div>

      <?php if ($has_cards): ?>
        <div class="speakers-grid">
          <?php foreach ($cards as $card): ?>
            <?php
            $card_image = !empty($card['card_image']) && is_array($card['card_image']) ? $card['card_image'] : [];
            $card_tag = $card['card_tag'] ?? '';
            $card_title = $card['card_title'] ?? '';
            $card_label = $card['card_label'] ?? '';
            $card_description = $card['card_description'] ?? ''; ?>
            <div class="speaker-card fade-in">
              <?php if (!empty($card_image['ID']) || !empty($card_image['url'])): ?>
                <div class="speaker-image">
                  <?php
                  if (!empty($card_image['ID'])) {
                    echo wp_get_attachment_image($card_image['ID'], 'medium_large', false, [
                      'loading' => 'lazy',
                    ]);
                  } else {
                    ?>
                    <img src="<?= esc_url($card_image['url']); ?>" alt="<?= esc_attr($card_image['alt'] ?? $card_title); ?>"
                      loading="lazy">
                  <?php } ?>
                  <?php if (!empty($card_tag)): ?>
                    <div class="program-badges">
                      <span class="program-badge badge-type"><?= esc_html($card_tag); ?></span>
                    </div>
                  <?php endif; ?>
                </div>
              <?php endif; ?>
              <div class="speaker-info">
                <?php if (!empty($card_title)): ?>
                  <h3 class="speaker-name"><?= esc_html($card_title); ?></h3>
                <?php endif; ?>
                <?php if (!empty($card_label)): ?>
                  <span class="speaker-role"><?= esc_html($card_label); ?></span>
                <?php endif; ?>
                <?php if (!empty($card_description)): ?>
                  <p class="speaker-bio"><?= nl2br(esc_html($card_description)); ?></p>
                <?php endif; ?>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>
    </div>
  </section>
<?php endif; ?>

<style>
  /* Section base */
  /* .container {
    max-width: 1400px;
    margin: 0 auto;
    padding: 0 2rem;
  }
  .section {
    padding: 80px 0;
  } */

  .section-dark {
    background: var(--charcoal);
  }

  .section-header {
    text-align: center;
    margin-bottom: 4rem;
  }

  .section-badge {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    background: linear-gradient(135deg, rgba(7, 200, 204, 0.1), rgba(201, 169, 98, 0.05));
    border: 1px solid rgba(7, 200, 204, 0.2);
    padding: 0.5rem 1.25rem;
    border-radius: 50px;
    font-size: 0.7rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.1em;
    color: var(--primary);
    margin-bottom: 1rem;
  }

  .section-badge--green {
    background: linear-gradient(135deg, rgba(7, 200, 204, 0.15), rgba(201, 169, 98, 0.1));
    border: 1px solid rgba(7, 200, 204, 0.3);
    color: var(--primary);
  }

  .section-title {
    font-family: var(--font-display);
    font-size: clamp(1.75rem, 3vw, 2.5rem);
    font-weight: 700;
    color: var(--white);
    margin-bottom: 1rem;
  }

  .section-title strong {
    background: linear-gradient(135deg, var(--primary), var(--gold));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
  }

  .section-description {
    color: var(--silver);
    font-size: 1.1rem;
    max-width: 700px;
    margin: 0 auto;
  }

  /* Speakers */
  /* .speakers-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
    gap: 2rem;
  } */
  .speakers-grid {
    display: flex;
    flex-wrap: wrap;
    gap: 2rem;
    justify-content: center;
  }

  /* .speakers-grid .speaker-card {
    flex: 1 1 280px;
  } */
  .speakers-grid .speaker-card {
    flex: 1 1 280px;
    /* max-width: calc(33.333% - 2rem); */
    max-width: calc(25% - 2rem);
  }


  .speaker-card {
    background: var(--charcoal);
    border: 1px solid rgba(255, 255, 255, 0.05);
    border-radius: var(--radius-lg);
    overflow: hidden;
    transition: var(--transition);
    text-align: center;
  }

  .speaker-card:hover {
    transform: translateY(-8px);
    border-color: rgba(7, 200, 204, 0.3);
    box-shadow: var(--shadow-glow);
  }

  .speaker-image {
    width: 100%;
    height: 220px;
    overflow: hidden;
    position: relative;
  }

  .speaker-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: var(--transition);
  }

  .speaker-card:hover .speaker-image img {
    transform: scale(1.05);
  }

  .speaker-info {
    padding: 1.5rem;
  }

  .speaker-name {
    font-family: var(--font-display);
    font-size: 1.1rem;
    font-weight: 600;
    color: var(--white);
    margin-bottom: 0.25rem;
  }

  .speaker-tag {
    color: var(--gold);
    font-size: 0.75rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.08em;
    display: inline-block;
    margin-bottom: 0.5rem;
  }

  .speaker-role {
    color: var(--primary);
    font-size: 0.8rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    margin-bottom: 0.75rem;
  }

  .speaker-bio {
    color: var(--silver);
    font-size: 0.85rem;
  }

  .program-badges {
    position: absolute;
    top: 1rem;
    left: 1rem;
    display: flex;
    gap: 0.5rem;
    flex-wrap: wrap;
  }

  .program-badge {
    background: rgba(10, 14, 23, 0.9);
    backdrop-filter: blur(10px);
    padding: 0.375rem 0.75rem;
    border-radius: 50px;
    font-size: 0.7rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.05em;
  }

  .badge-type {
    background: rgba(201, 169, 98, 0.9);
    color: var(--obsidian);
  }

  /*  */
  @media (max-width: 1535px) {
    .speakers-grid .speaker-card {
      flex: 1 1 33.3333%;
      max-width: calc(33.3333% - 2rem);
    }
  }

  @media (max-width: 1199px) {
    .speakers-grid .speaker-card {}

  }

  @media (max-width: 1023px) {
    .speakers-grid .speaker-card {
      flex: 1 1 50%;
      max-width: calc(50% - 2rem);
    }

  }

  @media (max-width: 767px) {
    .speakers-grid .speaker-card {
      flex: 1 1 100%;
      max-width: calc(100% - 2rem);
    }

  }
</style>
