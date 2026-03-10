<?php
$acerca = get_field('programa_acerca');
$programa_titulo = get_field('programa_titulo');
$razones = get_field('programa_razones');
$publico_objetivo = get_field('programa_publico_objetivo');
$programa_resultados_titulo = get_field('programa_resultados_titulo');
$resultados_aprendizaje = get_field('programa_resultados_aprendizaje');
$competencias = get_field('programa_competencias');
$competencia_titulo = get_field('programa_competencia_titulo');
$ruta_titulo = get_field('programa_ruta_titulo');
$ruta_aprendizaje = get_field('programa_ruta_aprendizaje');
$proyecto_aplicable = get_field('programa_proyecto_aplicable');
$docentes = get_field('programa_docentes');
$docentes_titulo = get_field('programa_docentes_titulo');
$docentes_nota = get_field('programa_docentes_nota');

$modal_ocultar = get_field('programa_modal_ocultar');
$modal_btn_texto = get_field('programa_modal_btnrequisitos_texto');
?>

<!-- Main Content -->
<section class="program-content">
  <div class="container">
    <div class="content-grid">
      <div class="main-content">

        <?php if (!empty($acerca) && !empty($acerca['contenido'])): ?>
          <!-- Acerca del Programa -->
          <div class="content-section">
            <?php if ($acerca['titulo']): ?>
              <h2 class="section-title"><?= esc_html($acerca['titulo']); ?></h2>
            <?php endif; ?>
            <div class="section-text expandable-content" id="aboutContent">
              <?= wp_kses_post($acerca['contenido']); ?>
            </div>
            <?php if ($acerca['texto_boton']): ?>
              <button class="read-more-btn">
                <?= esc_html($acerca['texto_boton']); ?>
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
              </button>
            <?php endif; ?>
          </div>
        <?php endif; ?>

        <?php if (!empty($razones)): ?>
          <!-- Por qué elegir -->
          <div class="content-section">
            <?php if ($programa_titulo): ?>
              <h2 class="section-title"><?= esc_html($programa_titulo); ?></h2>
            <?php endif; ?>
            <div class="benefits-list">
              <?php foreach ($razones as $razon): ?>
                <div class="benefit-item">
                  <?php if ($razon['icono']): ?>
                    <div class="benefit-icon">
                      <img src="<?= esc_url($razon['icono']['url']); ?>" alt="<?= esc_attr($razon['icono']['alt']); ?>">
                    </div>
                  <?php endif; ?>
                  <?php if ($razon['descripcion']): ?>
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
            <?php if ($publico_objetivo['titulo']): ?>
              <h2 class="section-title">
                <?= esc_html($publico_objetivo['titulo']); ?>
              </h2>
            <?php endif; ?>
            <div class="audience-card">
              <?= wp_kses_post($publico_objetivo['contenido']); ?>
            </div>
          </div>
        <?php endif; ?>

        <!--  -->
        <?php if (empty($modal_ocultar)): ?>
          <div class="content-section">
            <button class="btn-outline btn-outline--requisito" onclick="openPopup('requisitosPopup')">
              <?= esc_html($modal_btn_texto) ?>
            </button>
          </div>
        <?php endif; ?>

        <?php if (!empty($resultados_aprendizaje)): ?>
          <!-- Serás capaz de -->
          <div class="content-section">
            <?php if ($programa_resultados_titulo): ?>
              <h2 class="section-title"><?= esc_html($programa_resultados_titulo); ?></h2>
            <?php endif; ?>

            <div class="skills-grid">
              <?php foreach ($resultados_aprendizaje as $resultado): ?>
                <?php if ($resultado['texto']): ?>
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
            <?php if ($competencia_titulo): ?>
              <h2 class="section-title"><?= esc_html($competencia_titulo); ?></h2>
            <?php endif; ?>
            <div class="competencies-list">
              <?php foreach ($competencias as $competencia): ?>
                <?php if ($competencia['texto']): ?>
                  <span class="competency-tag"><?= esc_html($competencia['texto']); ?></span>
                <?php endif; ?>
              <?php endforeach; ?>
            </div>
          </div>
        <?php endif; ?>

        <?php if (!empty($ruta_aprendizaje)): ?>
          <!-- Cursos -->
          <div class="content-section">
            <?php if ($ruta_titulo): ?>
              <h2 class="section-title"><?= esc_html($ruta_titulo); ?></h2>
            <?php endif; ?>
            <div class="courses-accordion">
              <?php foreach ($ruta_aprendizaje as $modulo): ?>
                <div class="course-item">
                  <div class="course-header">
                    <?php if ($modulo['numero']): ?>
                      <span class="course-number"><?= esc_html($modulo['numero']); ?></span>
                    <?php endif; ?>
                    <div class="course-title-wrap">
                      <?php if ($modulo['titulo']): ?>
                        <h4 class="course-title"><?= esc_html($modulo['titulo']); ?></h4>
                      <?php endif; ?>
                    </div>
                    <div class="course-toggle">
                      <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                      </svg>
                    </div>
                  </div>
                  <?php if ($modulo['descripcion']): ?>
                    <div class="course-content">
                      <div class="course-body">
                        <?php
                        $content = $modulo['descripcion'];
                        $content = str_replace('&nbsp;', ' ', $content);
                        $content = preg_replace('/\x{00A0}/u', ' ', $content); ?>
                        <?= wp_kses_post($content); ?>
                      </div>
                    </div>
                  <?php endif; ?>
                </div>
              <?php endforeach; ?>

              <?php if ($proyecto_aplicable): ?>
                <!-- Proyecto -->
                <?php if (!empty($proyecto_aplicable['descripcion'])): ?>
                  <div class="project-card">
                    <?php if ($proyecto_aplicable['etiqueta']): ?>
                      <div class="project-label"><?= esc_html($proyecto_aplicable['etiqueta']); ?></div>
                    <?php endif; ?>
                    <?php if ($proyecto_aplicable['titulo']): ?>
                      <h4><?= esc_html($proyecto_aplicable['titulo']); ?></h4>
                    <?php endif; ?>
                    <div style="margin-top: 1rem;">
                      <?= wp_kses_post($proyecto_aplicable['descripcion']); ?>
                    </div>
                  </div>
                <?php endif; ?>
                <!-- Disclaimer Plan de Estudios -->
                <?php if (!empty($proyecto_aplicable['nota'])): ?>
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

        <?php if (!empty($docentes)): ?>
          <!-- Docentes -->
          <div class="content-section">
            <?php if (!empty($docentes_titulo)): ?>
              <h2 class="section-title"><?= esc_html($docentes_titulo); ?></h2>
            <?php endif; ?>

            <?php foreach ($docentes as $docente_post):
              // Obtener datos del post docente
              $docente_cargo = get_field('docente_cargo', $docente_post->ID);
              $docente_biografia = get_field('docente_resumen_profesional', $docente_post->ID);
              $docente_linkedin = get_field('docente_linkedin', $docente_post->ID);
              ?>
              <div class="docente-card-programa" style="margin-bottom: 2rem;">
                <div class="docente-header">
                  <?php if (has_post_thumbnail($docente_post->ID)): ?>
                    <?= get_the_post_thumbnail($docente_post->ID, 'full', ['class' => 'docente-image', 'alt' => get_the_title($docente_post->ID)]) ?>
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
