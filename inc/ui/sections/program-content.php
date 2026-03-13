<?php
/**
 * Seccion Program Content - REUTILIZABLE
 *
 * @package yupay-theme
 */
defined('ABSPATH') || exit;

$defaults = [
  'section_class' => '',
  'section_id' => 'program-content-' . wp_rand(),
  // 'acerca' => [],
  'programa_titulo' => '',
  'razones' => [],
  'publico_objetivo' => [],
  // 'modal_ocultar' => false,
  // 'modal_btn_texto' => '',
  'programa_resultados_titulo' => '',
  'resultados_aprendizaje' => [],
  'competencia_titulo' => '',
  'competencias' => [],
  'ruta_titulo' => '',
  'ruta_aprendizaje' => [],
  'proyecto_aplicable' => [],
  'docentes_titulo' => '',
  'docentes' => [],
  'docentes_nota' => '',
];
$args = wp_parse_args($args ?? [], $defaults);

$section_class = $args['section_class'];
$section_id = $args['section_id'];
// $acerca = is_array($args['acerca']) ? $args['acerca'] : [];
$programa_titulo = $args['programa_titulo'];
$razones = is_array($args['razones']) ? $args['razones'] : [];
$publico_objetivo = is_array($args['publico_objetivo']) ? $args['publico_objetivo'] : [];
// $modal_ocultar = $args['modal_ocultar'];
// $modal_btn_texto = $args['modal_btn_texto'];
$programa_resultados_titulo = $args['programa_resultados_titulo'];
$resultados_aprendizaje = is_array($args['resultados_aprendizaje']) ? $args['resultados_aprendizaje'] : [];
$competencia_titulo = $args['competencia_titulo'];
$competencias = is_array($args['competencias']) ? $args['competencias'] : [];
$ruta_titulo = $args['ruta_titulo'];
$ruta_aprendizaje = is_array($args['ruta_aprendizaje']) ? $args['ruta_aprendizaje'] : [];
$proyecto_aplicable = is_array($args['proyecto_aplicable']) ? $args['proyecto_aplicable'] : [];
$docentes_titulo = $args['docentes_titulo'];
$docentes = is_array($args['docentes']) ? $args['docentes'] : [];
$docentes_nota = $args['docentes_nota'];
?>

<section class="program-content <?= esc_attr($section_class); ?>" data-section="<?= esc_attr($section_id); ?>">
  <div class="container">
    <div class="content-grid">
      <div class="main-content">

        <?php if (!empty($ruta_aprendizaje)): ?>
          <!-- Cursos / Ruta de Aprendizaje -->
          <div class="content-section">
            <?php if (!empty($ruta_titulo)): ?>
              <h2 class="section-title"><?= esc_html($ruta_titulo); ?></h2>
            <?php endif; ?>
            <div class="courses-accordion">
              <?php foreach ($ruta_aprendizaje as $modulo): ?>
                <div class="course-item">
                  <div class="course-header">
                    <?php if (!empty($modulo['numero'])): ?>
                      <span class="course-number"><?= esc_html($modulo['numero']); ?></span>
                    <?php endif; ?>
                    <div class="course-title-wrap">
                      <?php if (!empty($modulo['titulo'])): ?>
                        <h4 class="course-title"><?= esc_html($modulo['titulo']); ?></h4>
                      <?php endif; ?>
                    </div>
                    <div class="course-toggle">
                      <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                      </svg>
                    </div>
                  </div>
                  <?php if (!empty($modulo['descripcion'])): ?>
                    <div class="course-content">
                      <div class="course-body">
                        <?php
                        $content = $modulo['descripcion'];
                        $content = str_replace('&nbsp;', ' ', $content);
                        $content = preg_replace('/\x{00A0}/u', ' ', $content);
                        ?>
                        <?= wp_kses_post($content); ?>
                      </div>
                    </div>
                  <?php endif; ?>
                </div>
              <?php endforeach; ?>

              <?php if (!empty($proyecto_aplicable)): ?>
                <?php if (!empty($proyecto_aplicable['descripcion'])): ?>
                  <!-- Proyecto -->
                  <div class="project-card">
                    <?php if (!empty($proyecto_aplicable['etiqueta'])): ?>
                      <div class="project-label"><?= esc_html($proyecto_aplicable['etiqueta']); ?></div>
                    <?php endif; ?>
                    <?php if (!empty($proyecto_aplicable['titulo'])): ?>
                      <h4><?= esc_html($proyecto_aplicable['titulo']); ?></h4>
                    <?php endif; ?>
                    <div style="margin-top: 1rem;">
                      <?= wp_kses_post($proyecto_aplicable['descripcion']); ?>
                    </div>
                  </div>
                <?php endif; ?>
                <?php if (!empty($proyecto_aplicable['nota'])): ?>
                  <!-- Disclaimer Plan de Estudios -->
                  <div
                    style="margin-top: 1.5rem; padding: 1.25rem; background: rgba(139, 151, 168, 0.1); border-radius: 12px; border-left: 3px solid var(--silver);">
                    <div style="font-size: 1rem; color: var(--silver); line-height: 1.7;">
                      <?= wp_kses_post($proyecto_aplicable['nota']); ?>
                    </div>
                  </div>
                <?php endif; ?>
              <?php endif; ?>
            </div>
          </div>
        <?php endif; ?>

        <?php if (!empty($razones)): ?>
          <!-- Por qué elegir -->
          <div class="content-section">
            <?php if (!empty($programa_titulo)): ?>
              <h2 class="section-title"><?= esc_html($programa_titulo); ?></h2>
            <?php endif; ?>
            <div class="benefits-list">
              <?php foreach ($razones as $razon): ?>
                <div class="benefit-item">
                  <?php if (!empty($razon['icono'])): ?>
                    <div class="benefit-icon">
                      <img src="<?= esc_url($razon['icono']['url']); ?>" alt="<?= esc_attr($razon['icono']['alt'] ?? ''); ?>"
                        loading="lazy">
                    </div>
                  <?php endif; ?>
                  <?php if (!empty($razon['descripcion'])): ?>
                    <div><?= wp_kses_post($razon['descripcion']); ?></div>
                  <?php endif; ?>
                </div>
              <?php endforeach; ?>
            </div>
          </div>
        <?php endif; ?>

        <?php if (!empty($publico_objetivo) && !empty($publico_objetivo['contenido'])): ?>
          <!-- A quién está dirigido -->
          <div class="content-section">
            <?php if (!empty($publico_objetivo['titulo'])): ?>
              <h2 class="section-title"><?= esc_html($publico_objetivo['titulo']); ?></h2>
            <?php endif; ?>
            <div class="audience-card">
              <?= wp_kses_post($publico_objetivo['contenido']); ?>
            </div>
          </div>
        <?php endif; ?>

        <?php if (!empty($resultados_aprendizaje)): ?>
          <!-- Serás capaz de -->
          <div class="content-section">
            <?php if (!empty($programa_resultados_titulo)): ?>
              <h2 class="section-title"><?= esc_html($programa_resultados_titulo); ?></h2>
            <?php endif; ?>
            <div class="skills-grid">
              <?php foreach ($resultados_aprendizaje as $resultado): ?>
                <?php if (!empty($resultado['texto'])): ?>
                  <div class="skill-item">
                    <?= wp_kses_post($resultado['texto']); ?>
                  </div>
                <?php endif; ?>
              <?php endforeach; ?>
            </div>
          </div>
        <?php endif; ?>

        <?php if (!empty($competencias)): ?>
          <!-- Competencias -->
          <div class="content-section">
            <?php if (!empty($competencia_titulo)): ?>
              <h2 class="section-title"><?= esc_html($competencia_titulo); ?></h2>
            <?php endif; ?>
            <div class="competencies-list">
              <?php foreach ($competencias as $competencia): ?>
                <?php if (!empty($competencia['texto'])): ?>
                  <span class="competency-tag"><?= esc_html($competencia['texto']); ?></span>
                <?php endif; ?>
              <?php endforeach; ?>
            </div>
          </div>
        <?php endif; ?>



        <?php if (!empty($docentes)): ?>
          <!-- Docentes -->
          <div class="content-section">
            <?php if (!empty($docentes_titulo)): ?>
              <h2 class="section-title"><?= esc_html($docentes_titulo); ?></h2>
            <?php endif; ?>
            <?php foreach ($docentes as $docente_post):
              $docente_cargo = get_field('docente_cargo', $docente_post->ID);
              $docente_biografia = get_field('docente_resumen_profesional', $docente_post->ID);
              $docente_linkedin = get_field('docente_linkedin', $docente_post->ID);
              ?>
              <div class="docente-card-programa" style="margin-bottom: 2rem;">
                <div class="docente-header">
                  <?php if (has_post_thumbnail($docente_post->ID)): ?>
                    <?= get_the_post_thumbnail($docente_post->ID, 'full', ['class' => 'docente-image', 'alt' => get_the_title($docente_post->ID)]); ?>
                  <?php endif; ?>
                  <div class="docente-info">
                    <h4><?= esc_html(get_the_title($docente_post->ID)); ?></h4>
                    <?php if (!empty($docente_cargo)): ?>
                      <p><?= esc_html($docente_cargo); ?></p>
                    <?php endif; ?>
                  </div>
                </div>
                <div class="docente-body">
                  <?php if (!empty($docente_biografia)): ?>
                    <?= wp_kses_post($docente_biografia); ?>
                  <?php endif; ?>
                  <?php if (!empty($docente_linkedin) && !empty($docente_linkedin['url'])): ?>
                    <a href="<?= esc_url($docente_linkedin['url']); ?>" target="_blank" class="docente-linkedin">
                      <svg fill="currentColor" viewBox="0 0 24 24">
                        <path
                          d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z" />
                      </svg>
                      <?= esc_html($docente_linkedin['title'] ?? 'Ver LinkedIn'); ?>
                    </a>
                  <?php endif; ?>
                </div>
              </div>
            <?php endforeach; ?>
            <?php if (!empty($docentes_nota)): ?>
              <!-- Disclaimer Docentes -->
              <div
                style="margin-top: 1.5rem; padding: 1.25rem; background: rgba(139, 151, 168, 0.1); border-radius: 12px; border-left: 3px solid var(--silver);">
                <div style="font-size: 1rem; color: var(--silver); line-height: 1.7;">
                  <?= wp_kses_post($docentes_nota); ?>
                </div>
              </div>
            <?php endif; ?>
          </div>
        <?php endif; ?>

      </div>
    </div>
  </div>
</section>

<style>
  /* Main Content */
  .program-content {
    padding: 5rem 0;
  }

  .content-grid {
    display: grid;
    grid-template-columns: 2fr 1fr;
    gap: 4rem;
  }

  /* Sections */
  .content-section {
    margin-bottom: 4rem;
  }

  .section-title {
    font-size: 1.75rem;
    color: var(--charcoal);
    margin-bottom: 1.5rem;
    display: flex;
    align-items: center;
    gap: 0.75rem;
  }

  .section-title::before {
    content: '';
    width: 4px;
    height: 28px;
    background: var(--primary);
    border-radius: 2px;
  }

  .section-text {
    color: var(--gunmetal);
    font-size: 1rem;
    line-height: 1.8;
  }

  .section-text p {
    margin-bottom: 1rem;
  }

  .read-more-btn {
    color: var(--primary);
    font-weight: 600;
    font-size: 0.875rem;
    cursor: pointer;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    margin-top: 0.5rem;
  }

  .read-more-btn svg {
    width: 16px;
    height: 16px;
    transition: transform 0.3s;
  }

  .read-more-btn.expanded svg {
    transform: rotate(180deg);
  }

  .expandable-content {
    max-height: 200px;
    overflow: hidden;
    transition: max-height 0.5s ease;
  }

  .expandable-content.expanded {
    max-height: 2000px;
  }

  /* Benefits List */
  .benefits-list {
    display: grid;
    gap: 1rem;
    max-width: 848px;
  }


  .benefit-item {
    display: flex;
    gap: 1rem;
    padding: 1.25rem;
    background: var(--white);
    border-radius: 12px;
    box-shadow: var(--shadow-soft);
    transition: all 0.3s;
  }

  .benefit-item:hover {
    transform: translateX(5px);
    box-shadow: var(--shadow-elevated);
  }

  .benefit-icon {
    width: 44px;
    height: 44px;
    min-width: 44px;
    background: linear-gradient(135deg, var(--primary), var(--primary-dark));
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-inline: 0 !important;
  }

  .benefit-icon svg {
    width: 20px;
    height: 20px;
    color: var(--white);
  }

  .benefit-item p {
    color: var(--gunmetal);
    font-size: 0.9rem;
    line-height: 1.6;
  }

  /* Target Audience */
  .audience-card {
    padding: 2rem;
    background: linear-gradient(135deg, var(--charcoal), var(--obsidian));
    border-radius: 20px;
    color: var(--white);
  }

  .audience-card h3 {
    font-size: 1.25rem;
    margin-bottom: 1rem;
    color: var(--white);
  }

  .audience-card p {
    color: var(--silver);
    font-size: 0.95rem;
    line-height: 1.7;
  }

  /* Skills */
  .skills-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 1rem;
  }

  .skill-item {
    padding: 1.25rem;
    background: var(--white);
    border-radius: 12px;
    box-shadow: var(--shadow-soft);
    border-left: 3px solid var(--primary);
  }

  .skill-item p {
    color: var(--gunmetal);
    font-size: 0.9rem;
    line-height: 1.6;
  }

  /* Competencies */
  .competencies-list {
    display: flex;
    flex-wrap: wrap;
    gap: 0.75rem;
  }

  .competency-tag {
    padding: 0.75rem 1.25rem;
    background: var(--primary);
    color: var(--white);
    font-size: 0.8rem;
    font-weight: 600;
    border-radius: 100px;
  }

  /* Courses Accordion */
  .courses-accordion {
    display: flex;
    flex-direction: column;
    gap: 1rem;
  }

  .course-item {
    background: var(--white);
    border-radius: 16px;
    box-shadow: var(--shadow-soft);
    overflow: hidden;
  }

  .course-header {
    padding: 1.5rem;
    display: flex;
    align-items: center;
    justify-content: space-between;
    cursor: pointer;
    transition: background 0.3s;
  }

  .course-header:hover {
    background: var(--ivory);
  }

  .course-number {
    width: 40px;
    height: 40px;
    background: var(--primary);
    color: var(--white);
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 700;
    font-size: 0.9rem;
    margin-right: 1rem;
  }

  .course-title-wrap {
    flex: 1;
  }

  .course-title {
    font-family: var(--font-body);
    font-size: 1rem;
    font-weight: 600;
    color: var(--charcoal);
    margin-bottom: 0.25rem;
  }

  .course-meta {
    display: flex;
    gap: 1rem;
    font-size: 0.8rem;
    color: var(--silver);
  }

  .course-toggle {
    width: 32px;
    height: 32px;
    background: var(--pearl);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s;
  }

  .course-toggle svg {
    width: 16px;
    height: 16px;
    color: var(--gunmetal);
    transition: transform 0.3s;
  }

  .course-item.active .course-toggle {
    background: var(--primary);
  }

  .course-item.active .course-toggle svg {
    color: var(--white);
    transform: rotate(180deg);
  }

  .course-content {
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.4s ease;
  }

  .course-item.active .course-content {
    max-height: 1000px;
  }

  .course-body {
    padding: 0 1.5rem 1.5rem;
    border-top: 1px solid var(--pearl);
  }

  .course-description {
    color: var(--gunmetal);
    font-size: 0.9rem;
    margin: 1rem 0;
    line-height: 1.7;
  }

  .course-body h5,
  .course-topics h5 {
    font-family: var(--font-body);
    font-size: 0.8rem;
    color: var(--charcoal);
    text-transform: uppercase;
    letter-spacing: 0.1em;
    margin-bottom: 0.75rem;
  }

  .course-body ul,
  .course-topics ul {
    display: grid;
    gap: 0.5rem;
  }

  .course-body li,
  .course-topics li {
    display: flex;
    align-items: flex-start;
    gap: 0.5rem;
    color: var(--gunmetal);
    font-size: 0.875rem;
  }

  .course-body li::before,
  .course-topics li::before {
    content: '';
    width: 6px;
    height: 6px;
    min-width: 6px;
    background: var(--primary);
    border-radius: 50%;
    margin-top: 0.5rem;
  }

  .course-docente {
    margin-top: 1rem;
    padding-top: 1rem;
    border-top: 1px solid var(--pearl);
    display: flex;
    align-items: center;
    gap: 0.75rem;
  }

  .course-docente img {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    object-fit: cover;
  }

  .course-docente span {
    font-size: 0.85rem;
    color: var(--silver);
  }

  .course-docente strong {
    color: var(--charcoal);
  }

  /* Project Card */
  .project-card {
    background: linear-gradient(135deg, var(--gold), #B8963F);
    padding: 2rem;
    border-radius: 20px;
    color: var(--obsidian);
  }

  .project-card h4 {
    font-size: 1.125rem;
    margin-bottom: 0.5rem;
  }

  .project-card .project-label {
    font-size: 0.7rem;
    text-transform: uppercase;
    letter-spacing: 0.15em;
    opacity: 0.7;
    margin-bottom: 0.5rem;
  }

  .project-card p {
    font-size: 0.9rem;
    line-height: 1.7;
    opacity: 0.9;
  }

  /* Sidebar */
  .sidebar {
    position: sticky;
    top: 100px;
  }

  .sidebar-card {
    background: var(--white);
    border-radius: 20px;
    box-shadow: var(--shadow-elevated);
    overflow: hidden;
    margin-bottom: 1.5rem;
  }

  .sidebar-header {
    padding: 1.5rem;
    background: linear-gradient(135deg, var(--primary), var(--primary-dark));
    color: var(--white);
    text-align: center;
  }

  .sidebar-header h3 {
    font-size: 1.125rem;
    margin-bottom: 0.25rem;
  }

  .sidebar-header p {
    font-size: 0.85rem;
    opacity: 0.9;
  }

  .sidebar-body {
    padding: 1.5rem;
  }

  .sidebar-price {
    text-align: center;
    margin-bottom: 1.5rem;
  }

  .sidebar-price .amount {
    font-size: 2.5rem;
    font-weight: 700;
    color: var(--charcoal);
  }

  .sidebar-price .amount small {
    font-size: 1rem;
    font-weight: 400;
    color: var(--silver);
  }

  .sidebar-price .installments {
    font-size: 0.85rem;
    color: var(--silver);
    margin-top: 0.25rem;
  }

  .sidebar-benefit {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    padding: 0.75rem;
    background: rgba(7, 200, 204, 0.08);
    border-radius: 8px;
    margin-bottom: 1rem;
  }

  .sidebar-benefit svg {
    width: 20px;
    height: 20px;
    color: var(--primary);
  }

  .sidebar-benefit span {
    font-size: 0.85rem;
    color: var(--charcoal);
  }

  /* Docente Card */
  .docente-card-programa {
    background: var(--white);
    border-radius: 20px;
    box-shadow: var(--shadow-soft);
    overflow: hidden;
  }

  .docente-header {
    padding: 1.5rem;
    background: var(--charcoal);
    display: flex;
    align-items: center;
    gap: 1rem;
  }

  .docente-image {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    object-fit: cover;
    border: 3px solid var(--primary);
    /*  */
    min-width: 80px;
    min-height: 80px;
  }

  .docente-info h4 {
    color: var(--white);
    font-family: var(--font-body);
    font-size: 1rem;
    font-weight: 600;
  }

  .docente-info p {
    color: var(--silver);
    font-size: 0.8rem;
  }

  .docente-body {
    padding: 1.5rem;
  }

  .docente-body p {
    color: var(--gunmetal);
    font-size: 0.875rem;
    line-height: 1.7;
  }

  .docente-linkedin {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    margin-top: 1rem;
    color: var(--primary);
    font-size: 0.85rem;
    font-weight: 600;
  }

  .docente-linkedin svg {
    width: 18px;
    height: 18px;
  }

  /* Certification */
  .certification-section {
    position: relative;
    z-index: 10;
    padding: 5rem 0;
    background: var(--charcoal);
  }

  .certification-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 2rem;
  }

  .cert-card {
    padding: 2rem;
    background: var(--glass-bg);
    backdrop-filter: var(--glass-blur);
    border: 1px solid var(--glass-border);
    border-radius: 20px;
    text-align: center;
  }

  .cert-icon {
    width: 64px;
    height: 64px;
    margin: 0 auto 1.25rem;
    background: linear-gradient(135deg, var(--gold), #B8963F);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .cert-icon svg {
    width: 28px;
    height: 28px;
    color: var(--obsidian);
  }

  .cert-card h4 {
    color: var(--white);
    font-size: 1rem;
    margin-bottom: 0.5rem;
  }

  .cert-card p {
    color: var(--silver);
    font-size: 0.875rem;
    line-height: 1.6;
  }

  /* Responsive */
  @media (max-width: 1200px) {
    .content-grid {
      grid-template-columns: 1fr;
    }

    .sidebar {
      position: relative;
      top: 0;
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      gap: 1.5rem;
    }

    .price-card {
      grid-column: span 2;
    }
  }

  @media (max-width: 968px) {
    .nav-menu {
      display: none;
      position: absolute;
      top: 100%;
      left: 0;
      right: 0;
      background: var(--white);
      flex-direction: column;
      padding: 1.5rem;
      gap: 1rem;
      box-shadow: var(--shadow-elevated);
    }

    .nav-menu.active {
      display: flex;
    }

    .nav-dropdown {
      position: static;
      transform: none;
      min-width: 100%;
      box-shadow: none;
      background: var(--ivory);
      border-radius: 8px;
      margin-top: 0.5rem;
      max-height: 0;
      overflow: hidden;
      opacity: 1;
      visibility: visible;
      padding: 0;
    }

    .nav-menu>li.dropdown-open .nav-dropdown {
      max-height: 500px;
      padding: 0.5rem;
    }

    .nav-menu>li.dropdown-open .nav-dropdown-toggle svg {
      transform: rotate(180deg);
    }

    .nav-menu>li:hover .nav-dropdown {
      opacity: 1;
      visibility: visible;
      transform: none;
    }

    .dropdown-icon {
      width: 32px;
      height: 32px;
    }

    .dropdown-icon svg {
      width: 14px;
      height: 14px;
    }

    .nav-toggle {
      display: flex;
    }

    .info-cards {
      grid-template-columns: repeat(2, 1fr);
    }

    .price-card {
      grid-column: span 2;
      flex-direction: column;
      text-align: center;
      gap: 1rem;
    }

    .skills-grid {
      grid-template-columns: 1fr;
    }

    .certification-grid {
      grid-template-columns: 1fr;
    }

    .sidebar {
      grid-template-columns: 1fr;
    }

    .footer-main {
      grid-template-columns: 1fr 1fr;
    }
  }

  @media (max-width: 768px) {
    .container {
      padding: 0 1.25rem;
    }

    .program-hero {
      padding: 120px 0 60px;
    }

    .hero-title {
      font-size: 1.75rem;
    }

    .info-cards {
      /* grid-template-columns: 1fr; */
      grid-template-columns: repeat(3, 1fr);
      gap: 0.75rem;
    }

    .info-card {
      /* padding: 0.5rem; */
      padding: 1rem 0.5rem;
    }

    .info-card-value {
      font-size: 13px;
      line-height: 1.5;
    }

    .info-card-label {
      font-size: 10px;
    }

    .info-card-icon {
      width: 42px;
      height: 42px;
      margin-bottom: .75rem;
    }

    .info-card-icon img {
      width: 22px;
      object-fit: contain;
    }

    .price-card {
      grid-column: span 1;
    }

    .program-content {
      padding: 3rem 0;
    }

    .content-section {
      margin-bottom: 3rem;
    }

    .section-title {
      font-size: 1.375rem;
    }

    .footer-main {
      grid-template-columns: 1fr;
      text-align: center;
    }

    .footer-logo {
      margin: 0 auto;
    }

    .whatsapp-btn span {
      display: none;
    }

    .whatsapp-btn {
      padding: 0.875rem;
      border-radius: 50%;
    }
  }

  @media (min-width: 768px) {
    .price-card--mobile {
      display: none !important;
    }
  }

  @media (max-width: 767px) {
    .price-card--desktop {
      display: none !important;
    }
  }

  .program-hero .program-hero-grid+.container {
    display: grid;
    grid-template-columns: 2fr 1fr;
    gap: 4rem;
  }

  @media (max-width: 1200px) {
    .program-hero .program-hero-grid+.container {
      gap: 1.5rem;
    }
  }

  @media (max-width: 768px) {
    .program-hero .program-hero-grid+.container {
      grid-template-columns: 1fr;
    }
  }

  @media (min-width: 1280px) {
    .program-content .content-grid {
      display: flex;
      justify-content: center;
      max-width: 1024px;
      margin-inline: auto;
    }

    .program-content .benefits-list {
      max-width: 100%;
    }
  }
</style>
