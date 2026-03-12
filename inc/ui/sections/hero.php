<?php
/**
 * Seccion Hero - REUTILIZABLE
 *
 * @package yupay-theme
 */
defined('ABSPATH') || exit;

$defaults = [
  'section_class' => '',
  'section_id' => 'foro-hero-' . wp_rand(),
  'breadcrumb_url' => home_url('/'),
  'breadcrumb_home_text' => __('Inicio', 'yupay-theme'),
  'breadcrumb_text' => '',
  'badge_text' => '',
  'title' => '',
  'description' => '',
  'cta_link' => [],
  'side_content_type' => 'html',
  'side_image' => [],
  'side_html' => '',
  'fallback_quote' => __('"El exito no se estudia en libros, se aprende de quienes lo construyeron"', 'yupay-theme'),
  'fallback_author' => __('Filosofia EDEX', 'yupay-theme'),
  'caracteristicas' => [],
];
$args = wp_parse_args($args ?? [], $defaults);

$section_class = $args['section_class'];
$section_id = $args['section_id'];
$breadcrumb_url = $args['breadcrumb_url'];
$breadcrumb_home_text = $args['breadcrumb_home_text'];
$breadcrumb_text = $args['breadcrumb_text'];
$badge_text = $args['badge_text'];
$title = $args['title'];
$description = $args['description'];
$cta_link = is_array($args['cta_link']) ? $args['cta_link'] : [];
$side_content_type = $args['side_content_type'];
$side_image = is_array($args['side_image']) ? $args['side_image'] : [];
$side_html = $args['side_html'];
$fallback_quote = $args['fallback_quote'];
$fallback_author = $args['fallback_author'];

$cta_url = !empty($cta_link['url']) ? $cta_link['url'] : '';
$cta_text = !empty($cta_link['title']) ? $cta_link['title'] : __('Quiero participar', 'yupay-theme');
$cta_target = !empty($cta_link['target']) ? $cta_link['target'] : '_self';

$caracteristicas = $args['caracteristicas'];

$has_right_image = ($side_content_type === 'imagen') && (!empty($side_image['ID']) || !empty($side_image['url']));
$has_right_html = ($side_content_type === 'html') && !empty($side_html);
$has_content = !empty($title) || !empty($description) || !empty($badge_text) || !empty($breadcrumb_text) || !empty($cta_url) || $has_right_image || $has_right_html;

if ($has_content): ?>
  <section class="hero <?= esc_attr($section_class); ?>" data-section="<?= esc_attr($section_id); ?>">
    <div class="container">
      <div class="hero-layout">
        <div class="hero-content">
          <?php if (!empty($breadcrumb_text)): ?>
            <nav class="breadcrumb" aria-label="<?= esc_attr__('Ruta de navegacion', 'yupay-theme'); ?>">
              <a href="<?= esc_url($breadcrumb_url); ?>"><?= esc_html($breadcrumb_home_text); ?></a>
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                aria-hidden="true">
                <path d="M9 18l6-6-6-6" />
              </svg>
              <span><?= esc_html($breadcrumb_text); ?></span>
            </nav>
          <?php endif; ?>

          <?php if (!empty($badge_text)): ?>
            <div class="hero-badge">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                <path
                  d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" />
              </svg>
              <?= esc_html($badge_text); ?>
            </div>
          <?php endif; ?>

          <?php if (!empty($title)): ?>
            <h1 class="hero-title"><?= wp_kses_post($title); ?></h1>
          <?php endif; ?>

          <?php if (!empty($description)): ?>
            <p class="hero-description"><?= nl2br(esc_html($description)); ?></p>
          <?php endif; ?>

          <!-- $caracteristicas = get_field('programas_caracteristicas'); -->
          <div class="info-cards">
            <?php if ($caracteristicas): ?>
              <?php foreach ($caracteristicas as $caracteristica): ?>
                <div class="info-card">
                  <?php if ($caracteristica['icono']): ?>
                    <div class="info-card-icon">
                      <img src="<?= esc_url($caracteristica['icono']['url']); ?>"
                        alt="<?= esc_attr($caracteristica['icono']['alt']); ?>">
                    </div>
                  <?php endif; ?>
                  <?php if ($caracteristica['titulo']): ?>
                    <div class="info-card-label">
                      <?= esc_html($caracteristica['titulo']); ?>
                    </div>
                  <?php endif; ?>
                  <?php if ($caracteristica['descripcion']): ?>
                    <div class="info-card-value">
                      <?= esc_html($caracteristica['descripcion']); ?>
                    </div>
                  <?php endif; ?>
                </div>
              <?php endforeach; ?>
            <?php endif; ?>
          </div>
          <!--  -->

          <?php if (!empty($cta_url)): ?>
            <a href="<?= esc_url($cta_url); ?>" target="<?= esc_attr($cta_target); ?>" class="btn btn-primary">
              <?= esc_html($cta_text); ?>
              <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
              </svg>
            </a>
          <?php endif; ?>
        </div>

        <div>
          <?php if ($has_right_image): ?>
            <div class="hero-visual-card hero-visual-card--right-image">
              <?php
              if (!empty($side_image['ID'])) {
                echo wp_get_attachment_image($side_image['ID'], 'large', false, [
                  'class' => 'hero-side-image',
                  'loading' => 'lazy',
                ]);
              } else {
                ?>
                <img class="hero-side-image" src="<?= esc_url($side_image['url']); ?>"
                  alt="<?= esc_attr($side_image['alt'] ?? ''); ?>" loading="lazy">
              <?php } ?>
            </div>
          <?php elseif ($has_right_html): ?>
            <div class="">
              <?= wp_kses_post($side_html); ?>
            </div>
          <?php else: ?>
            <div class="hero-visual-card">
              <div class="hero-visual-icon">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                </svg>
              </div>
              <p class="hero-visual-quote"><?= esc_html($fallback_quote); ?></p>
              <span class="hero-visual-author"><?= esc_html($fallback_author); ?></span>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </section>
<?php endif; ?>

<style>
  /* Hero */
  .hero {
    position: relative;
    min-height: 70vh;
    display: flex;
    align-items: center;
    padding: 140px 0 80px;
    overflow: hidden;
  }

  .hero::before {
    content: '';
    position: absolute;
    inset: 0;
    background: radial-gradient(ellipse at 20% 30%, var(--primary-glow) 0%, transparent 50%), radial-gradient(ellipse at 80% 70%, rgba(201, 169, 98, 0.15) 0%, transparent 50%);
  }

  .hero .container {
    display: block;
  }

  .hero .container {
    max-width: 1400px;
    margin: 0 auto;
    padding: 0 2rem;
    position: relative;
    z-index: 2;
  }

  .hero-layout {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 4rem;
    align-items: center;
  }

  .breadcrumb {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    margin-bottom: 1.5rem;
    font-size: 0.875rem;
  }

  .breadcrumb a {
    color: var(--silver);
    text-decoration: none;
  }

  .breadcrumb a:hover {
    color: var(--primary);
  }

  .breadcrumb span {
    color: var(--primary);
  }

  .hero-badge {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    background: linear-gradient(135deg, rgba(7, 200, 204, 0.15), rgba(201, 169, 98, 0.1));
    border: 1px solid rgba(7, 200, 204, 0.3);
    padding: 0.5rem 1rem;
    border-radius: 50px;
    font-size: 0.75rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.1em;
    color: var(--primary);
    margin-bottom: 1.5rem;
  }

  .hero-badge svg {
    width: 16px;
    height: 16px;
  }

  .hero-title {
    font-family: var(--font-display);
    font-size: clamp(2.25rem, 4vw, 3.5rem);
    font-weight: 700;
    color: var(--white);
    line-height: 1.1;
    margin-bottom: 1.5rem;
  }

  .hero-title strong {
    background: linear-gradient(135deg, var(--primary), var(--gold));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
  }

  .hero-description {
    font-size: 1.1rem;
    color: var(--silver);
    max-width: 600px;
    margin-bottom: 2rem;
  }

  .hero-visual {
    position: relative;
  }

  .hero-visual-card {
    background: linear-gradient(135deg, var(--charcoal), var(--slate));
    border: 1px solid rgba(255, 255, 255, 0.08);
    border-radius: var(--radius-lg);
    padding: 2.5rem;
    position: relative;
    overflow: hidden;
  }

  .hero-visual-card::before {
    content: '';
    position: absolute;
    top: -50%;
    right: -50%;
    width: 200%;
    height: 200%;
    background: radial-gradient(circle, var(--primary-glow) 0%, transparent 60%);
    opacity: 0.3;
  }

  .hero-visual-card--right-image {
    padding: 0 !important;
  }

  .hero-visual-icon {
    width: 80px;
    height: 80px;
    background: linear-gradient(135deg, var(--primary), var(--primary-dark));
    border-radius: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 1.5rem;
    position: relative;
    z-index: 1;
  }

  .hero-visual-icon svg {
    width: 40px;
    height: 40px;
    color: var(--white);
  }

  .hero-visual-quote {
    font-family: var(--font-display);
    font-size: 1.5rem;
    color: var(--white);
    font-weight: 600;
    line-height: 1.3;
    position: relative;
    z-index: 1;
    margin-bottom: 1rem;
  }

  .hero-visual-author {
    color: var(--gold);
    font-size: 0.875rem;
    font-weight: 600;
    position: relative;
    z-index: 1;
  }

  .hero .btn {
    gap: 0.5rem;
    padding: 1rem 2rem;
    border-radius: 50px;
    font-size: 0.95rem;
  }

  .hero .btn svg {
    width: 20px;
    height: 20px;
  }

  .hero-side-image {
    width: 100%;
    height: auto;
    display: block;
    border-radius: var(--radius-md);
  }

  .hero-visual {}

  .hero-content {}

  @media (max-width: 1200px) {
    .hero-content {
      order: unset;
    }

    .hero-visual {
      order: unset;
    }

    .hero .container {
      text-align: left;
    }
  }

  @media (max-width: 1023px) {
    .hero-layout {
      grid-template-columns: 1fr;
    }

    .hero-description {
      margin-inline: 0;
    }
  }

  @media (max-width: 767px) {
    .hero-layout {
      gap: 2rem;
    }
  }

  /*  */
  /*  */
  /*  */
  /* ── Terminal Card (Hero Right) ── */
  .terminal-card {
    background: linear-gradient(160deg, rgba(20, 27, 45, 0.95), rgba(30, 42, 61, 0.9));
    border: 1px solid rgba(0, 240, 255, 0.15);
    border-radius: var(--radius-lg);
    overflow: hidden;
    box-shadow:
      0 0 60px rgba(0, 240, 255, 0.06),
      0 25px 60px rgba(0, 0, 0, 0.4),
      inset 0 1px 0 rgba(255, 255, 255, 0.05);
    animation: slideUp 0.8s ease 0.4s both;
  }

  .terminal-header {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.875rem 1.25rem;
    background: rgba(0, 0, 0, 0.3);
    border-bottom: 1px solid rgba(255, 255, 255, 0.05);
  }

  .terminal-dot {
    width: 10px;
    height: 10px;
    border-radius: 50%;
  }

  .terminal-dot:nth-child(1) {
    background: #FF5F57;
  }

  .terminal-dot:nth-child(2) {
    background: #FFBD2E;
  }

  .terminal-dot:nth-child(3) {
    background: #28CA41;
  }

  .terminal-title {
    margin-left: 0.75rem;
    font-family: var(--font-mono);
    font-size: 0.7rem;
    color: var(--silver);
    letter-spacing: 0.05em;
  }

  .terminal-body {
    padding: 1.5rem;
    font-family: var(--font-mono);
    font-size: 0.8rem;
    line-height: 2;
  }

  .terminal-line {
    display: flex;
    align-items: flex-start;
    gap: 0.75rem;
    opacity: 0;
    animation: slideUp 0.5s ease forwards;
  }

  .terminal-line:nth-child(1) {
    animation-delay: 0.8s;
  }

  .terminal-line:nth-child(2) {
    animation-delay: 1.2s;
  }

  .terminal-line:nth-child(3) {
    animation-delay: 1.6s;
  }

  .terminal-line:nth-child(4) {
    animation-delay: 2.0s;
  }

  .terminal-line:nth-child(5) {
    animation-delay: 2.4s;
  }

  .terminal-prompt {
    color: var(--neon-cyan);
    font-weight: 600;
    flex-shrink: 0;
  }

  .terminal-text {
    color: var(--pearl);
  }

  .terminal-text .highlight {
    color: var(--neon-cyan);
  }

  .terminal-text .string {
    color: var(--neon-green);
  }

  .terminal-text .comment {
    color: var(--silver);
    font-style: italic;
  }

  .terminal-text .output {
    color: var(--gold);
  }

  .terminal-cursor {
    display: inline-block;
    width: 8px;
    height: 16px;
    background: var(--neon-cyan);
    animation: blink 1s infinite;
    margin-left: 4px;
    vertical-align: middle;
  }

  .terminal-output {
    margin-top: 1rem;
    padding: 1rem 1.25rem;
    background: rgba(0, 240, 255, 0.04);
    border-left: 3px solid var(--neon-cyan);
    border-radius: 0 8px 8px 0;
    opacity: 0;
    animation: slideUp 0.5s ease 2.8s forwards;
  }

  .terminal-output p {
    font-family: var(--font-mono);
    font-size: 0.78rem;
    color: var(--gold);
    line-height: 1.6;
  }

  .terminal-output .success-icon {
    color: #28CA41;
    margin-right: 0.5rem;
  }

  /*  */
  /*  */
  /*  */
  .info-cards {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 1rem;
    margin-top: 2.5rem;
    margin-bottom: 2.5rem;
  }

  .info-card {
    padding: 1.25rem;
    background: var(--glass-bg);
    backdrop-filter: var(--glass-blur);
    border: 1px solid var(--glass-border);
    border-radius: 16px;
    text-align: center;
  }

  .info-card-icon {
    width: 44px;
    height: 44px;
    margin: 0 auto 1rem;
    background: rgba(7, 200, 204, 0.15);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .info-card-label {
    font-size: 0.7rem;
    color: var(--silver);
    text-transform: uppercase;
    letter-spacing: 0.1em;
    margin-bottom: 0.25rem;
  }

  .info-card-value {
    font-size: 0.85rem;
    color: var(--white);
    font-weight: 600;
  }


  /*  */
  /*  */
  /*  */
  /* ── Animated background mesh ── */
  @keyframes meshFloat {

    0%,
    100% {
      transform: translate(0, 0) scale(1);
    }

    33% {
      transform: translate(30px, -20px) scale(1.05);
    }

    66% {
      transform: translate(-20px, 15px) scale(0.97);
    }
  }

  @keyframes pulseGlow {

    0%,
    100% {
      opacity: 0.4;
    }

    50% {
      opacity: 0.8;
    }
  }

  @keyframes typewriter {
    from {
      width: 0;
    }

    to {
      width: 100%;
    }
  }

  @keyframes blink {

    0%,
    100% {
      opacity: 1;
    }

    50% {
      opacity: 0;
    }
  }

  @keyframes slideUp {
    from {
      opacity: 0;
      transform: translateY(40px);
    }

    to {
      opacity: 1;
      transform: translateY(0);
    }
  }

  @keyframes floatOrb {

    0%,
    100% {
      transform: translateY(0px) rotate(0deg);
    }

    50% {
      transform: translateY(-20px) rotate(180deg);
    }
  }

  @keyframes scanline {
    0% {
      transform: translateY(-100%);
    }

    100% {
      transform: translateY(100vh);
    }
  }

  @media (max-width: 968px) {
    .info-cards {
      grid-template-columns: repeat(2, 1fr);
    }
  }

  @media (max-width: 768px) {
    .info-cards {
      grid-template-columns: repeat(3, 1fr);
      gap: 0.75rem;
    }

    .info-card {
      padding: 1rem 0.5rem;
    }

    .info-card-icon img {
      width: 22px;
      object-fit: contain;
    }

    .info-card-icon {
      width: 42px;
      height: 42px;
      margin-bottom: .75rem;
    }

    .info-card-label {
      font-size: 10px;
    }

    .info-card-value {
      font-size: 13px;
      line-height: 1.5;
    }
  }
</style>
