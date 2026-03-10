<?php
/*
  Template name: gracias
*/
get_header(); ?>
<style>
  .gracias-hero {
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 120px 2rem 60px;
    background: linear-gradient(135deg, var(--obsidian) 0%, var(--charcoal) 50%, var(--slate) 100%);
    position: relative;
    overflow: hidden;
  }

  .gracias-hero::before {
    content: '';
    position: absolute;
    top: -50%;
    right: -20%;
    width: 80%;
    height: 150%;
    background: radial-gradient(circle, var(--primary-glow) 0%, transparent 60%);
    opacity: 0.4;
    pointer-events: none;
  }

  @media (max-width: 767px) {
    .gracias-hero::before {
      display: none !important;
    }
  }

  .gracias-container {
    max-width: 700px;
    width: 100%;
    text-align: center;
    position: relative;
    z-index: 1;
  }

  /* Animaciones de entrada */
  @keyframes fadeInUp {
    from {
      opacity: 0;
      transform: translateY(30px);
    }

    to {
      opacity: 1;
      transform: translateY(0);
    }
  }

  @keyframes pulse-success {

    0%,
    100% {
      transform: scale(1);
      box-shadow: 0 20px 60px rgba(16, 185, 129, 0.3);
    }

    50% {
      transform: scale(1.02);
      box-shadow: 0 22px 65px rgba(16, 185, 129, 0.35);
    }
  }

  @keyframes pulse-dot {

    0%,
    100% {
      opacity: 1;
      transform: scale(1);
    }

    50% {
      opacity: 0.5;
      transform: scale(1.3);
    }
  }

  .gracias-icon {
    width: 100px;
    height: 100px;
    margin: 0 auto 2rem;
    background: linear-gradient(135deg, var(--success), #059669);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 20px 60px rgba(16, 185, 129, 0.3);
    animation: pulse-success 2s ease-in-out infinite, fadeInUp 0.6s var(--ease-premium);
  }

  .gracias-icon svg {
    width: 50px;
    height: 50px;
    color: white;
  }

  .gracias-title {
    font-family: var(--font-display);
    font-size: clamp(2rem, 5vw, 3rem);
    font-weight: 700;
    color: var(--white);
    margin: 0 0 1rem;
    line-height: 1.2;
    animation: fadeInUp 0.6s var(--ease-premium) 0.1s both;
  }

  .gracias-subtitle {
    font-size: 1.125rem;
    color: var(--silver);
    margin: 0 0 2.5rem;
    line-height: 1.6;
    animation: fadeInUp 0.6s var(--ease-premium) 0.2s both;
  }

  .gracias-card {
    background: var(--white);
    border-radius: 24px;
    padding: 2.5rem;
    box-shadow: var(--shadow-elevated);
    text-align: left;
    margin-bottom: 2rem;
    animation: fadeInUp 0.6s var(--ease-premium) 0.3s both;
  }

  .gracias-card h3 {
    font-family: var(--font-display);
    font-size: 1.25rem;
    color: var(--charcoal);
    margin: 0 0 1.5rem;
    display: flex;
    align-items: center;
    gap: 0.75rem;
  }

  .gracias-card h3 svg {
    color: var(--primary);
    flex-shrink: 0;
  }

  .datos-usuario {
    background: var(--ivory);
    border-radius: 12px;
    padding: 1.25rem 1.5rem;
    margin-bottom: 1.5rem;
  }

  .datos-usuario p {
    margin: 0;
    font-size: 0.9rem;
    color: var(--gunmetal);
    line-height: 1.8;
  }

  .datos-usuario strong {
    color: var(--charcoal);
  }

  .pasos-list {
    list-style: none;
    margin: 0;
    padding: 0;
    display: grid;
    gap: 1rem;
  }

  .pasos-list li {
    display: flex;
    align-items: flex-start;
    gap: 1rem;
    padding: 1rem;
    background: var(--ivory);
    border-radius: 12px;
    transition: all 0.3s var(--ease-premium);
  }

  .pasos-list li:hover {
    background: rgba(7, 200, 204, 0.08);
    transform: translateX(4px);
  }

  .paso-numero {
    width: 32px;
    height: 32px;
    min-width: 32px;
    background: linear-gradient(135deg, var(--primary), var(--primary-dark));
    color: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.875rem;
    font-weight: 700;
  }

  .paso-content h4 {
    font-size: 0.95rem;
    font-weight: 600;
    color: var(--charcoal);
    margin: 0 0 0.25rem;
  }

  .paso-content p {
    font-size: 0.85rem;
    color: var(--gunmetal);
    margin: 0;
    line-height: 1.5;
  }

  /* Badge de disponibilidad */
  .disponibilidad-badge {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.5rem 1rem;
    background: rgba(16, 185, 129, 0.15);
    border-radius: 100px;
    font-size: 0.8rem;
    font-weight: 500;
    color: var(--success);
    margin-bottom: 1rem;
    animation: fadeInUp 0.6s var(--ease-premium) 0.4s both;
  }

  .pulse-dot {
    width: 8px;
    height: 8px;
    background: var(--success);
    border-radius: 50%;
    animation: pulse-dot 1.5s ease-in-out infinite;
  }

  .btn-whatsapp-grande {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 0.75rem;
    width: 100%;
    padding: 1.25rem 2rem;
    background: linear-gradient(135deg, #25D366, #128C7E);
    color: white;
    text-decoration: none;
    border-radius: 14px;
    font-size: 1rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.03em;
    box-shadow: 0 10px 40px rgba(37, 211, 102, 0.3);
    transition: all 0.3s var(--ease-premium);
    margin-bottom: 1rem;
    animation: fadeInUp 0.6s var(--ease-premium) 0.5s both;
  }

  .btn-whatsapp-grande:hover {
    transform: translateY(-3px);
    box-shadow: 0 15px 50px rgba(37, 211, 102, 0.4);
  }

  .btn-whatsapp-grande svg {
    width: 24px;
    height: 24px;
  }

  .btn-volver {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
    padding: 0.875rem 1.5rem;
    background: transparent;
    color: var(--pearl);
    text-decoration: none;
    border: 2px solid var(--slate);
    border-radius: 10px;
    font-size: 0.875rem;
    font-weight: 500;
    transition: all 0.3s var(--ease-premium);
    animation: fadeInUp 0.6s var(--ease-premium) 0.6s both;
  }

  .btn-volver:hover {
    color: var(--white);
    border-color: var(--primary);
    background: rgba(7, 200, 204, 0.1);
  }

  .contacto-alternativo {
    margin-top: 2rem;
    padding-top: 2rem;
    border-top: 1px solid var(--slate);
    text-align: center;
    animation: fadeInUp 0.6s var(--ease-premium) 0.7s both;
  }

  .contacto-alternativo p {
    color: var(--silver);
    font-size: 0.875rem;
    margin: 0 0 1rem;
  }

  .contacto-links {
    display: flex;
    justify-content: center;
    gap: 2rem;
    flex-wrap: wrap;
  }

  .contacto-links a {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    color: var(--pearl);
    text-decoration: none;
    font-size: 0.9rem;
    transition: color 0.2s;
  }

  .contacto-links a:hover {
    color: var(--primary);
  }

  .contacto-links svg {
    width: 18px;
    height: 18px;
  }

  /* Botón de descarga de brochure */
  .btn-brochure {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 0.75rem;
    padding: 1rem 2rem;
    background: linear-gradient(135deg, var(--primary), var(--primary-dark));
    color: white;
    text-decoration: none;
    border-radius: 14px;
    font-size: 1rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.03em;
    box-shadow: 0 10px 40px rgba(7, 200, 204, 0.3);
    transition: all 0.3s var(--ease-premium);
    margin-bottom: 2rem;
    animation: fadeInUp 0.6s var(--ease-premium) 0.35s both;
  }

  .btn-brochure:hover {
    transform: translateY(-3px);
    box-shadow: 0 15px 50px rgba(7, 200, 204, 0.4);
  }

  .btn-brochure svg {
    width: 24px;
    height: 24px;
  }

  @media (max-width: 1024px) {
    .gracias-container {
      max-width: 600px;
    }
  }

  @media (max-width: 768px) {
    .gracias-hero {
      padding: 100px 1.25rem 60px;
    }

    .gracias-card {
      padding: 1.75rem;
    }

    .contacto-links {
      flex-direction: column;
      gap: 1rem;
    }
  }

  @media (max-width: 640px) {
    .gracias-icon {
      width: 80px;
      height: 80px;
    }

    .gracias-icon svg {
      width: 40px;
      height: 40px;
    }
  }
</style>

<?php
$gracias_titulo = get_field('gracias_titulo'); // Texto
$gracias_subtitulo = get_field('gracias_subtitulo'); // Texto
$gracias_texto = get_field('gracias_texto'); // Texto
$gracias_telefono = get_field('gracias_telefono'); // Enlace
$gracias_correo = get_field('gracias_correo'); // Enlace

// Obtener el parámetro prog de la URL
$id_zoho = isset($_GET['prog']) ? sanitize_text_field($_GET['prog']) : '';
$brochure_url = '';
$programa_encontrado = null;

// Buscar el programa por id_zoho si existe el parámetro
if (!empty($id_zoho)) {
  $args = [
    'post_type' => 'programa',
    'posts_per_page' => 1,
    'meta_query' => [
      [
        'key' => 'id_zoho',
        'value' => $id_zoho,
        'compare' => '='
      ]
    ]
  ];

  $query = new WP_Query($args);

  if ($query->have_posts()) {
    $query->the_post();
    $programa_encontrado = get_the_ID();

    // Obtener el campo de brochure (tipo archivo)
    $brochure = get_field('programas_brochure', $programa_encontrado); // group
    $archivo = null;
    $permitir_descarga = false;
    if (!empty($brochure)) {
      $archivo = $brochure['adjuntar_brochure'] ?? null; // archivo
      $permitir_descarga = $brochure['permitir_descarga'] ?? false; // verdadero/falso
    }


    // $brochure = get_field('programas_adjuntar_brochure', $programa_encontrado);
    // if (!empty($brochure) && isset($brochure['url'])) {
    //   $brochure_url = $brochure['url'];
    // }

    wp_reset_postdata();
  }
}
?>
<section class="gracias-hero">
  <div class="gracias-container">
    <div class="gracias-icon">
      <svg aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
      </svg>
    </div>
    <?php if (!empty($gracias_titulo)): ?>
      <h1 class="gracias-title"><?= esc_html($gracias_titulo) ?></h1>
    <?php endif; ?>
    <?php if (!empty($gracias_subtitulo)): ?>
      <p class="gracias-subtitle">
        <?= esc_html($gracias_subtitulo) ?>
      </p>
    <?php endif; ?>

    <?php
    // print_r($archivo);
    // print_r($permitir_descarga);
    ?>
    <?php if (!empty($archivo) && $permitir_descarga): ?>
      <a href="<?= esc_url($archivo['url']) ?>" class="btn-brochure" download target="_blank">
        <svg aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
        </svg>
        Descargar Brochure
      </a>
    <?php endif; ?>

    <div class="contacto-alternativo">
      <?php if (!empty($gracias_texto)): ?>
        <p><?= esc_html($gracias_texto) ?></p>
      <?php endif; ?>
      <div class="contacto-links">

        <?php if (!empty($gracias_telefono) && !empty($gracias_telefono['url']) && !empty($gracias_telefono['title'])): ?>
          <a href="<?= $gracias_telefono['url'] ?>" target="<?= esc_attr($gracias_telefono['target'] ?: '_self') ?>">
            <svg aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
            </svg>
            <?= esc_html($gracias_telefono['title']) ?>
          </a>
        <?php endif; ?>

        <?php if (!empty($gracias_correo) && !empty($gracias_correo['url']) && !empty($gracias_correo['title'])): ?>
          <a href="<?= $gracias_correo['url'] ?>" target="<?= esc_attr($gracias_correo['target'] ?: '_self') ?>">
            <svg aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
            </svg>
            <?= esc_html($gracias_correo['title']) ?>
          </a>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>

<script>
  // Marcar en localStorage que el formulario fue enviado exitosamente
  (function() {
    localStorage.setItem('formSubmitted', 'true');
    console.log('Flag de formulario enviado establecido en localStorage');
  })();
</script>

<?php get_footer(); ?>
