<?php
/**
 * Seccion Seminarios - REUTILIZABLE
 *
 * @package yupay-theme
 */
defined('ABSPATH') || exit;

$defaults = [
  'section_class' => '',
  'section_id' => 'seminars-' . wp_rand(),
  'badge_text' => '',
  'title' => '',
  'description' => '',
  'items' => [],
];
$args = wp_parse_args($args ?? [], $defaults);

$section_class = $args['section_class'];
$section_id = $args['section_id'];
$badge_text = $args['badge_text'];
$title = $args['title'];
$description = $args['description'];
$items = is_array($args['items']) ? $args['items'] : [];

$has_content = !empty($badge_text) || !empty($title) || !empty($description) || !empty($items);

if (!$has_content)
  return;
?>
<section class="section section-seminars <?= esc_attr($section_class); ?>" data-section="<?= esc_attr($section_id); ?>"
  id="seminarios-list">
  <div class="container">
    <div class="section-header">
      <?php if (!empty($badge_text)): ?>
        <div class="section-badge section-badge--green"><?= esc_html($badge_text); ?></div>
      <?php endif; ?>
      <?php if (!empty($title)): ?>
        <h2 class="section-title"><?= wp_kses_post($title); ?></h2>
      <?php endif; ?>
      <?php if (!empty($description)): ?>
        <p class="section-description"><?= nl2br(esc_html($description)); ?></p>
      <?php endif; ?>
    </div>

    <?php if (!empty($items)): ?>
      <div class="seminarios-list">
        <?php foreach ($items as $item):
          $band_text = $item['seminar_band_text'] ?? '';
          $seminar_title = $item['seminar_title'] ?? '';
          $speaker_image = !empty($item['speaker_image']) && is_array($item['speaker_image']) ? $item['speaker_image'] : [];
          $speaker_name = $item['speaker_name'] ?? '';
          $speaker_bio = $item['speaker_bio'] ?? '';
          $date_text = $item['seminar_date_text'] ?? '';
          $duration_text = $item['seminar_duration_text'] ?? '';
          $modality_text = $item['seminar_modality_text'] ?? '';
          $cert_text = $item['seminar_certificate_text'] ?? '';
          $about_content = $item['seminar_about_content'] ?? '';
          $learnings = !empty($item['seminar_learnings_items']) && is_array($item['seminar_learnings_items'])
            ? $item['seminar_learnings_items']
            : [];

          // Iniciales del ponente como fallback del avatar
          $initials = '';
          if (!empty($speaker_name)) {
            $words = array_filter(explode(' ', trim($speaker_name)));
            $parts = array_slice(array_values($words), 0, 2);
            $initials = implode('', array_map(fn($w) => mb_strtoupper(mb_substr($w, 0, 1)), $parts));
          }
          ?>
          <div class="seminario-card fade-in">
            <?php if (!empty($band_text)): ?>
              <div class="seminario-number-band">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                  aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round"
                    d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span><?= esc_html($band_text); ?></span>
              </div>
            <?php endif; ?>

            <div class="seminario-header">
              <div>
                <?php if (!empty($seminar_title)): ?>
                  <h3 class="seminario-title"><?= esc_html($seminar_title); ?></h3>
                <?php endif; ?>

                <?php if (!empty($speaker_name) || !empty($speaker_bio)): ?>
                  <div class="ponente">
                    <div class="ponente-avatar">
                      <?php if (!empty($speaker_image['ID'])): ?>
                        <?= wp_get_attachment_image($speaker_image['ID'], 'thumbnail', false, ['loading' => 'lazy']); ?>
                      <?php elseif (!empty($speaker_image['url'])): ?>
                        <img src="<?= esc_url($speaker_image['url']); ?>" alt="<?= esc_attr($speaker_name); ?>" loading="lazy">
                      <?php else: ?>
                        <?= esc_html($initials); ?>
                      <?php endif; ?>
                    </div>
                    <div class="ponente-info">
                      <?php if (!empty($speaker_name)): ?>
                        <div class="ponente-name"><?= esc_html($speaker_name); ?></div>
                      <?php endif; ?>
                      <?php if (!empty($speaker_bio)): ?>
                        <p class="ponente-bio"><?= nl2br(esc_html($speaker_bio)); ?></p>
                      <?php endif; ?>
                    </div>
                  </div>
                <?php endif; ?>
              </div>
            </div>

            <?php if (!empty($date_text) || !empty($duration_text) || !empty($modality_text) || !empty($cert_text)): ?>
              <div class="seminario-meta">
                <?php if (!empty($date_text)): ?>
                  <span class="meta-tag">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                      <rect x="3" y="4" width="18" height="18" rx="2" ry="2" />
                      <line x1="16" y1="2" x2="16" y2="6" />
                      <line x1="8" y1="2" x2="8" y2="6" />
                      <line x1="3" y1="10" x2="21" y2="10" />
                    </svg>
                    <?= esc_html($date_text); ?>
                  </span>
                <?php endif; ?>
                <?php if (!empty($duration_text)): ?>
                  <span class="meta-tag">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                      <circle cx="12" cy="12" r="10" />
                      <path d="M12 6v6l4 2" />
                    </svg>
                    <?= esc_html($duration_text); ?>
                  </span>
                <?php endif; ?>
                <?php if (!empty($modality_text)): ?>
                  <span class="meta-tag">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                      <path
                        d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                    </svg>
                    <?= esc_html($modality_text); ?>
                  </span>
                <?php endif; ?>
                <?php if (!empty($cert_text)): ?>
                  <span class="meta-tag">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                      <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <?= esc_html($cert_text); ?>
                  </span>
                <?php endif; ?>
              </div>
            <?php endif; ?>

            <?php if (!empty($about_content)): ?>
              <div class="collapsible-section">
                <button class="collapsible-toggle" onclick="toggleCollapsible(this)" type="button">
                  <h4>
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                      <path d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <?= esc_html__('Acerca del seminario', 'yupay-theme'); ?>
                  </h4>
                  <svg class="collapsible-arrow" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    aria-hidden="true">
                    <path d="M6 9l6 6 6-6" />
                  </svg>
                </button>
                <div class="collapsible-content">
                  <div class="collapsible-inner">
                    <?= wp_kses_post($about_content); ?>
                  </div>
                </div>
              </div>
            <?php endif; ?>

            <?php if (!empty($learnings)): ?>
              <div class="collapsible-section">
                <button class="collapsible-toggle" onclick="toggleCollapsible(this)" type="button">
                  <h4>
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                      <path
                        d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                    </svg>
                    <?= esc_html__('Lo que aprenderás', 'yupay-theme'); ?>
                  </h4>
                  <svg class="collapsible-arrow" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    aria-hidden="true">
                    <path d="M6 9l6 6 6-6" />
                  </svg>
                </button>
                <div class="collapsible-content">
                  <div class="collapsible-inner">
                    <ul>
                      <?php foreach ($learnings as $learning):
                        $text = $learning['learning_text'] ?? '';
                        if (!empty($text)): ?>
                          <li><?= esc_html($text); ?></li>
                        <?php endif;
                      endforeach; ?>
                    </ul>
                  </div>
                </div>
              </div>
            <?php endif; ?>

          </div>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>
  </div>
</section>

<style>
  .section-seminars {
    font-family: var(--font-body);
    background: var(--obsidian);
    color: var(--pearl);
  }

  .section {
    padding: 80px 0;
  }

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
    background: linear-gradient(135deg, rgba(201, 169, 98, 0.1), rgba(7, 200, 204, 0.05));
    border: 1px solid rgba(201, 169, 98, 0.2);
    padding: 0.5rem 1.25rem;
    border-radius: 50px;
    font-size: 0.7rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.1em;
    color: var(--gold);
    margin-bottom: 1rem;
  }

  .section-badge--green {
    background: linear-gradient(135deg, rgba(7, 200, 204, 0.1), rgba(201, 169, 98, 0.05));
    border: 1px solid rgba(7, 200, 204, 0.2);
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
    background: linear-gradient(135deg, var(--gold), var(--primary));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
  }

  .section-description {
    color: var(--silver);
    font-size: 1.05rem;
    max-width: 700px;
    margin: 0 auto;
  }

  /* Seminario Cards */
  .seminarios-list {
    display: flex;
    flex-direction: column;
    gap: 3rem;
    max-width: 1100px;
    margin: 0 auto;
  }

  .seminario-card {
    background: linear-gradient(145deg, var(--charcoal), var(--slate));
    border: 1px solid rgba(255, 255, 255, 0.06);
    border-radius: var(--radius-lg);
    overflow: hidden;
    transition: var(--transition);
  }

  .seminario-card:hover {
    border-color: rgba(201, 169, 98, 0.25);
    box-shadow: 0 8px 40px rgba(0, 0, 0, 0.3);
  }

  .seminario-number-band {
    background: linear-gradient(135deg, var(--gold), rgba(201, 169, 98, 0.7));
    padding: 0.5rem 2rem;
    display: flex;
    align-items: center;
    gap: 0.75rem;
  }

  .seminario-number-band span {
    font-family: var(--font-display);
    font-size: 0.75rem;
    font-weight: 700;
    color: var(--obsidian);
    text-transform: uppercase;
    letter-spacing: 0.1em;
  }

  .seminario-header {
    padding: 2rem 2.5rem;
    display: grid;
    grid-template-columns: 1fr auto;
    gap: 2rem;
    align-items: start;
  }

  .seminario-title {
    font-family: var(--font-display);
    font-size: 1.5rem;
    font-weight: 700;
    color: var(--white);
    line-height: 1.25;
    margin-bottom: 1.25rem;
  }

  /* Ponente */
  .ponente {
    display: flex;
    align-items: flex-start;
    gap: 1rem;
    margin-bottom: 0.5rem;
  }

  .ponente-avatar {
    width: 56px;
    height: 56px;
    border-radius: 50%;
    background: linear-gradient(135deg, var(--gold), var(--primary-dark));
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    font-family: var(--font-display);
    font-size: 1.25rem;
    font-weight: 700;
    color: var(--white);
    overflow: hidden;
  }

  .ponente-avatar img {
    width: 100%;
    height: 100%;
    object-fit: cover;
  }

  .ponente-info {
    flex: 1;
  }

  .ponente-name {
    font-family: var(--font-display);
    font-size: 1rem;
    font-weight: 600;
    color: var(--white);
    margin-bottom: 0.25rem;
  }

  .ponente-bio {
    font-size: 0.8rem;
    color: var(--silver);
    line-height: 1.6;
  }

  /* Meta info */
  .seminario-meta {
    display: flex;
    flex-wrap: wrap;
    gap: 1.25rem;
    padding: 0 2.5rem 1.5rem;
  }

  .meta-tag {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.5rem 1rem;
    background: rgba(255, 255, 255, 0.04);
    border: 1px solid rgba(255, 255, 255, 0.08);
    border-radius: 50px;
    font-size: 0.78rem;
    color: var(--pearl);
  }

  .meta-tag svg {
    width: 16px;
    height: 16px;
    color: var(--gold);
    flex-shrink: 0;
  }

  /* Collapsible / Accordion */
  .collapsible-section {
    border-top: 1px solid rgba(255, 255, 255, 0.05);
  }

  .collapsible-toggle {
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 1.25rem 2.5rem;
    background: transparent;
    border: none;
    cursor: pointer;
    transition: var(--transition);
  }

  .collapsible-toggle:hover {
    background: rgba(255, 255, 255, 0.02);
  }

  .collapsible-toggle h4 {
    font-family: var(--font-body);
    font-size: 0.9rem;
    font-weight: 600;
    color: var(--gold);
    display: flex;
    align-items: center;
    gap: 0.5rem;
    margin: 0;
  }

  .collapsible-toggle h4 svg {
    width: 18px;
    height: 18px;
  }

  .collapsible-arrow {
    width: 24px;
    height: 24px;
    color: var(--silver);
    transition: transform 0.3s ease;
    flex-shrink: 0;
  }

  .collapsible-toggle.active .collapsible-arrow {
    transform: rotate(180deg);
  }

  .collapsible-content {
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.4s ease, padding 0.3s ease;
  }

  .collapsible-content.open {
    max-height: 600px;
  }

  .collapsible-inner {
    padding: 0 2.5rem 1.5rem 3.5rem;
  }

  .collapsible-inner p {
    font-size: 0.9rem;
    color: var(--silver);
    line-height: 1.8;
  }

  .collapsible-inner ul {
    list-style: none;
    padding: 0;
    margin: 0;
  }

  .collapsible-inner ul li {
    position: relative;
    padding-left: 1.5rem;
    margin-bottom: 0.75rem;
    font-size: 0.875rem;
    color: var(--silver);
    line-height: 1.6;
  }

  .collapsible-inner ul li::before {
    content: '';
    position: absolute;
    left: 0;
    top: 0.55rem;
    width: 8px;
    height: 8px;
    border-radius: 50%;
    background: linear-gradient(135deg, var(--gold), var(--primary));
  }

  /* Animations */
  .fade-in {
    opacity: 0;
    transform: translateY(30px);
    transition: opacity 0.6s ease, transform 0.6s ease;
  }

  .fade-in.visible {
    opacity: 1;
    transform: translateY(0);
  }

  /* Responsive */
  @media (max-width: 968px) {
    .seminario-header {
      grid-template-columns: 1fr;
    }
  }

  @media (max-width: 768px) {
    .seminario-header {
      padding: 1.5rem;
    }

    .seminario-meta {
      padding: 0 1.5rem 1.25rem;
    }

    .collapsible-toggle {
      padding: 1rem 1.5rem;
    }

    .collapsible-inner {
      padding: 0 1.5rem 1.25rem 2rem;
    }

    .seminario-title {
      font-size: 1.2rem;
    }

    .meta-tag {
      font-size: 0.7rem;
      padding: 0.375rem 0.75rem;
    }
  }

  @media (min-width: 1200px) {
    .ponente-avatar {
      width: 76px;
      height: 76px;
    }
  }
</style>

<script>
  function toggleCollapsible(btn) {
    const content = btn.nextElementSibling;
    const isOpen = content.classList.contains('open');

    const card = btn.closest('.seminario-card');
    card.querySelectorAll('.collapsible-content.open').forEach(el => {
      el.classList.remove('open');
      el.previousElementSibling.classList.remove('active');
    });

    if (!isOpen) {
      content.classList.add('open');
      btn.classList.add('active');
    }
  }
</script>
