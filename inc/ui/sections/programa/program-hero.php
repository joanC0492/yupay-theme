<?php
$texto_superior = get_field('programas_texto_superior') ?: 'Programa Especializado';
$titulo = get_field('programas_titulo');
$inscripcion = get_field('programas_inscripcion');
$caracteristicas = get_field('programas_caracteristicas');
$card_inversion = get_field('programas_card_inversion');

// Obtener el área del programa
$areas = get_the_terms(get_the_ID(), 'areas');
$area_nombre = $areas && !is_wp_error($areas) ? $areas[0]->name : '';
$area_id_zoho = $areas && !is_wp_error($areas) ? get_field('id_zoho', $areas[0]) : '';
$area_name_zoho = $areas && !is_wp_error($areas) ? get_field('name_zoho', $areas[0]) : '';

// Valores por defecto para UTMs desde opciones globales
$default_utm_source = get_field('global_utm_source', 'option');
$default_utm_medium = get_field('global_utm_medium', 'option');
$default_utm_campaign = get_field('global_utm_campaign', 'option');
$default_utm_term = get_field('global_utm_term', 'option');
$default_utm_content = get_field('global_utm_content', 'option');
$default_zc_gard = get_field('global_utm_zc_gard', 'option');

// Formulario
$titulo_formulario = get_field('global_programa_form_titulo', 'option');
$subtitulo_formulario = get_field('global_programa_form_subtitulo', 'option');
$politicas_formulario = get_field('global_programa_form_politicas', 'option');

// Capturar UTMs de la URL (si existen) o usar valores por defecto
$utm_source = isset($_GET['utm_source']) && !empty($_GET['utm_source'])
  ? sanitize_text_field($_GET['utm_source'])
  : $default_utm_source;

$utm_medium = isset($_GET['utm_medium']) && !empty($_GET['utm_medium'])
  ? sanitize_text_field($_GET['utm_medium'])
  : $default_utm_medium;

$utm_campaign = isset($_GET['utm_campaign']) && !empty($_GET['utm_campaign'])
  ? sanitize_text_field($_GET['utm_campaign'])
  : $default_utm_campaign;

$utm_term = isset($_GET['utm_term']) && !empty($_GET['utm_term'])
  ? sanitize_text_field($_GET['utm_term'])
  : $default_utm_term;

$utm_content = isset($_GET['utm_content']) && !empty($_GET['utm_content'])
  ? sanitize_text_field($_GET['utm_content'])
  : $default_utm_content;

$zc_gard = isset($_GET['zc_gad']) && !empty($_GET['zc_gad'])
  ? sanitize_text_field($_GET['zc_gad'])
  : $default_zc_gard;

$programa_id_zoho = get_field('id_zoho') ?: '';
$programa_name_zoho = get_field('name_zoho') ?: ''; ?>

<!-- Hero -->
<section class="program-hero">
  <div class="program-hero-grid"></div>
  <div class="container">
    <div>
      <div class="hero-content">
        <span class="hero-badge">
          <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="14" height="14">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
          </svg>
          <?= esc_html($texto_superior); ?>
        </span>
        <?php if ($area_nombre): ?>
          <div class="hero-area">Área: <?= esc_html($area_nombre); ?></div>
        <?php endif; ?>
        <?php if (!empty($titulo)): ?>
          <h1 class="hero-title">
            <?= $titulo; ?>
          </h1>
        <?php endif; ?>
        <?php if (!empty($inscripcion) && !empty($inscripcion['inicio'])): ?>
          <div class="hero-start">
            <div class="hero-start-icon">
              <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
              </svg>
            </div>
            <div>
              <span><?= esc_html($inscripcion['inicio']); ?></span>
              <?php if ($inscripcion['texto']): ?>
                <small><?= esc_html($inscripcion['texto']); ?></small>
              <?php endif; ?>
            </div>
          </div>
        <?php endif; ?>
      </div>
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
                <div class="info-card-label"><?= esc_html($caracteristica['titulo']); ?></div>
              <?php endif; ?>
              <?php if ($caracteristica['descripcion']): ?>
                <div class="info-card-value"><?= esc_html($caracteristica['descripcion']); ?></div>
              <?php endif; ?>
            </div>
          <?php endforeach; ?>
        <?php endif; ?>

        <!-- Tienes algo !empty -->
        <?php if (!empty($card_inversion) && empty($card_inversion['ocultar'])): ?>
          <div class="price-card price-card--desktop">
            <div class="price-info">
              <?php if ($card_inversion['etiqueta']): ?>
                <h4><?= esc_html($card_inversion['etiqueta']); ?></h4>
              <?php endif; ?>
              <?php if ($card_inversion['precio']): ?>
                <div class="price-amount">
                  <?= esc_html($card_inversion['precio']); ?>
                  <?php if ($card_inversion['moneda']): ?>
                    <small><?= esc_html($card_inversion['moneda']); ?></small>
                  <?php endif; ?>
                </div>
              <?php endif; ?>
              <?php if ($card_inversion['texto_cuotas']): ?>
                <div class="price-installments"><?= esc_html($card_inversion['texto_cuotas']); ?></div>
              <?php endif; ?>
              <?php if ($card_inversion['nota']): ?>
                <div style="font-size: 0.8rem; color: rgba(255,255,255,0.85); margin-top: 0.5rem;">
                  <?= esc_html($card_inversion['nota']); ?>
                </div>
              <?php endif; ?>
            </div>
          </div>
        <?php endif; ?>
      </div>
    </div>
    <!--  -->
    <div class="program-form-col" id="formCol">
      <div class="contact-form-card" id="formulario-inscripcion">
        <div class="form-header">
          <?php if (!empty($titulo_formulario)): ?>
            <h3><?= esc_html($titulo_formulario); ?></h3>
          <?php endif; ?>
          <?php if (!empty($subtitulo_formulario)): ?>
            <p><?= esc_html($subtitulo_formulario); ?></p>
          <?php endif; ?>
        </div>
        <!-- onsubmit="handleFormSubmit(event)" -->
        <form class="contact-form" id="contactForm" method="POST"
          action="https://forms.zohopublic.com/adminzoho11/form/WebProgramasEDEX/formperma/6oWPCcNMYYPWugxyozmQhFdTgPTp1TAWpfu4yLjAcO4/htmlRecords/submit">
          <!-- Campos internos (hidden) -->
          <input type="hidden" id="area_interes" name="area_interes" value="">
          <input type="hidden" id="programa_interes" name="programa_interes"
            value="Análisis Financiero y Contable en Decisiones Estratégicas">
          <!-- Tipo de documento (oculto, DNI por defecto) -->
          <input type="hidden" name="Dropdown" value="DNI">
          <!-- Prefijo celular (oculto, Perú +51) -->
          <input type="hidden" name="Dropdown3" value="Perú (+51)">
          <!-- Programa - Valor (ID Zoho) -->
          <input type="hidden" name="SingleLine3" value="<?= esc_attr($programa_id_zoho); ?>">
          <!-- Eje Temático - Valor (ID Zoho) -->
          <input type="hidden" name="SingleLine4" value="<?= esc_attr($area_id_zoho); ?>">
          <!-- Programa - Texto -->
          <input type="hidden" name="SingleLine7" value="<?= esc_attr($programa_name_zoho); ?>">
          <!-- Eje Temático - Texto -->
          <input type="hidden" name="SingleLine8" value="<?= esc_attr($area_name_zoho); ?>">
          <!-- URL de Trackeo -->
          <input type="hidden" name="Website" value="<?= esc_url(home_url($_SERVER['REQUEST_URI'])); ?>">
          <!-- UTMs -->
          <input type="hidden" name="utm_source" value="<?= esc_attr($utm_source); ?>">
          <input type="hidden" name="utm_medium" value="<?= esc_attr($utm_medium); ?>">
          <input type="hidden" name="utm_campaign" value="<?= esc_attr($utm_campaign); ?>">
          <input type="hidden" name="utm_term" value="<?= esc_attr($utm_term); ?>">
          <input type="hidden" name="utm_content" value="<?= esc_attr($utm_content); ?>">
          <input type="hidden" name="zc_gard" value="<?= esc_attr($zc_gard); ?>">
          <input type="hidden" name="SingleLine1" value="UNW_Postgrado_EdEx">
          <div class="form-group">
            <label for="Name_First">Nombres <span class="required">*</span></label>
            <input type="text" id="Name_First" name="Name_First" required="" placeholder="Tus nombres" maxlength="60">
            <span class="error-message" id="Name_First_error"></span>
          </div>
          <div class="form-group">
            <label for="Name_Last">Apellidos <span class="required">*</span></label>
            <input type="text" id="Name_Last" name="Name_Last" required="" placeholder="Tus apellidos" maxlength="60">
            <span class="error-message" id="Name_Last_error"></span>
          </div>
          <div class="form-group">
            <label for="Email">Correo <span class="required">*</span></label>
            <input type="text" id="Email" name="Email" required="" placeholder="tu@email.com" maxlength="60">
            <span class="error-message" id="Email_error"></span>
          </div>
          <div class="form-group">
            <label for="SingleLine">DNI <span class="required">*</span></label>
            <input type="text" id="SingleLine" name="SingleLine" required="" placeholder="12345678" pattern="[0-9]{8}"
              maxlength="8">
            <span class="error-message" id="SingleLine_error"></span>
          </div>
          <div class="form-group">
            <label for="PhoneNumber_countrycode">Celular <span class="required">*</span></label>
            <input type="tel" id="PhoneNumber_countrycode" name="PhoneNumber_countrycode" required=""
              placeholder="999 999 999" pattern="[0-9]{9}" maxlength="9">
            <span class="error-message" id="PhoneNumber_countrycode_error"></span>
          </div>
          <div class="form-group form-checkbox">
            <input type="checkbox" id="DecisionBox1" name="DecisionBox1" required="">
            <label for="DecisionBox1">
              Acepto las
              <?php if (!empty($politicas_formulario) && !empty($politicas_formulario['url']) && !empty($politicas_formulario['title'])): ?>
                <a href="<?= $politicas_formulario['url'] ?>" target="_blank"
                  rel="noopener noreferrer"><?= $politicas_formulario['title'] ?></a>
              <?php endif; ?>
              <span class="required">*</span>
            </label>
            <span class="error-message" id="DecisionBox1_error"></span>
          </div>
          <button type="submit" class="btn-submit" disabled>
            <span>ENVIAR</span>
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="18" height="18">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
            </svg>
          </button>
        </form>
        <div class="form-success" id="formSuccess" style="display: none;">
          <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="48" height="48">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
          </svg>
          <h4>¡Solicitud Enviada!</h4>
          <p>Gracias por tu interés. Te contactaremos por WhatsApp en breve.</p>
        </div>
      </div>
    </div>
    <!--  -->
    <?php if (!empty($card_inversion) && empty($card_inversion['ocultar'])): ?>
      <div class="price-card price-card--mobile">
        <div class="price-info">
          <?php if ($card_inversion['etiqueta']): ?>
            <h4>
              <?= esc_html($card_inversion['etiqueta']); ?>
            </h4>
          <?php endif; ?>
          <?php if ($card_inversion['precio']): ?>
            <div class="price-amount">
              <?= esc_html($card_inversion['precio']); ?>
              <?php if ($card_inversion['moneda']): ?>
                <small>
                  <?= esc_html($card_inversion['moneda']); ?>
                </small>
              <?php endif; ?>
            </div>
          <?php endif; ?>
          <?php if ($card_inversion['texto_cuotas']): ?>
            <div class="price-installments">
              <?= esc_html($card_inversion['texto_cuotas']); ?>
            </div>
          <?php endif; ?>
          <?php if ($card_inversion['nota']): ?>
            <div style="font-size: 0.8rem; color: rgba(255,255,255,0.85); margin-top: 0.5rem;">
              <?= esc_html($card_inversion['nota']); ?>
            </div>
          <?php endif; ?>
        </div>
      </div>
    <?php endif; ?>
  </div>
</section>
