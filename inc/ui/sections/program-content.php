<?php
/**
 * Seccion Program Content - REUTILIZABLE
 *
 * @package yupay-theme
 */
defined('ABSPATH') || exit;

$defaults = [
  'section_class' => '',
  'section_id' => 'foro-hero-' . wp_rand(),

];
$args = wp_parse_args($args ?? [], $defaults);
?>

<section class="program-content">
  <div class="container">
    <div class="content-grid">
      <div class="main-content">

        <!-- Cursos -->
        <div class="content-section">
          <h2 class="section-title">Ruta de Aprendizaje</h2>
          <div class="courses-accordion">
            <div class="course-item">
              <div class="course-header">
                <span class="course-number">01</span>
                <div class="course-title-wrap">
                  <h4 class="course-title">Estrategia y Modelo de Negocio para crecer</h4>
                </div>
                <div class="course-toggle">
                  <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                  </svg>
                </div>
              </div>
              <div class="course-content">
                <div class="course-body">
                  <p class="course-description">Este curso permite al participante analizar su modelo de negocio desde
                    una mirada estratégica, identificando brechas, oportunidades y ventajas competitivas. A través de
                    herramientas prácticas, se construye una propuesta de valor clara y diferenciada, alineada a los
                    objetivos del negocio. El participante define una hoja de ruta estratégica realista, orientada al
                    crecimiento y sostenibilidad de la MYPE.</p>
                  <div class="course-topics">
                    <h5></h5>
                    <h5>Temario</h5>
                    <ul>
                      <li>Diagnóstico estratégico de la MYPE</li>
                      <li>Análisis del modelo de negocio</li>
                      <li>Propuesta de valor y segmentación de clientes</li>
                      <li>Estrategias competitivas y de crecimiento</li>
                      <li>Definición de objetivos estratégicos</li>
                      <li>Palancas de Crecimiento</li>
                    </ul>
                  </div>
                  <p> </p>
                  <p><strong>Actividad práctica:</strong> Canvas de negocio, objetivos estratégicos SMART, arquetipo
                    usuario y mapa de empatía.</p>
                </div>
              </div>
            </div>
            <div class="course-item">
              <div class="course-header">
                <span class="course-number">02</span>
                <div class="course-title-wrap">
                  <h4 class="course-title">Gestión Operativa y Comercial</h4>
                </div>
                <div class="course-toggle">
                  <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                  </svg>
                </div>
              </div>
              <div class="course-content">
                <div class="course-body">
                  <p class="course-description">El curso aborda la gestión operativa y comercial como pilares clave para
                    mejorar la productividad y los resultados del negocio. El participante aprende a optimizar procesos,
                    diseñar indicadores de desempeño y fortalecer la experiencia del cliente. Asimismo, desarrolla
                    estrategias comerciales prácticas orientadas a incrementar ventas, fidelización y control de
                    resultados.</p>
                  <div class="course-topics">
                    <h5></h5>
                    <h5>Temario</h5>
                    <ul>
                      <li>Gestión de procesos operativos</li>
                      <li>Indicadores de desempeño operativo</li>
                      <li>Experiencia del cliente y fidelización</li>
                      <li>Estrategias comerciales para MYPES</li>
                      <li>Seguimiento y control de resultados</li>
                    </ul>
                    <p> </p>
                    <p><strong>Actividad práctica:</strong> Tablero de indicadores operativos, estrategias de
                      fidelización y plan de ventas.</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="course-item">
              <div class="course-header">
                <span class="course-number">03</span>
                <div class="course-title-wrap">
                  <h4 class="course-title">Sostenibilidad e Impacto en MYPES</h4>
                </div>
                <div class="course-toggle">
                  <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                  </svg>
                </div>
              </div>
              <div class="course-content">
                <div class="course-body">
                  <p class="course-description">Este curso introduce la sostenibilidad como un enfoque estratégico
                    aplicado a la realidad de la MYPE. El participante aprende a integrar criterios sociales,
                    ambientales y económicos en la gestión del negocio, generando valor y competitividad. Se desarrollan
                    herramientas para identificar stakeholders, medir impacto y diseñar acciones sostenibles alineadas
                    al crecimiento empresarial.</p>
                  <div class="course-topics">
                    <h5></h5>
                    <h5>Temario</h5>
                    <ul>
                      <li>Sostenibilidad y competitividad empresarial</li>
                      <li>Identificación de stakeholders</li>
                      <li>Integración de impacto social en el negocio</li>
                      <li>Indicadores de sostenibilidad</li>
                      <li>Casos de emprendimientos con impacto</li>
                      <li>Contribución a los Objetivos de Desarrollo Sostenible (ODS)</li>
                    </ul>
                    <p><strong>Actividad práctica:</strong> Plan de sostenibilidad con indicadores básicos.</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="course-item">
              <div class="course-header">
                <span class="course-number">04</span>
                <div class="course-title-wrap">
                  <h4 class="course-title">Gestión Financiera para crecer</h4>
                </div>
                <div class="course-toggle">
                  <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                  </svg>
                </div>
              </div>
              <div class="course-content">
                <div class="course-body">
                  <p class="course-description">El curso brinda herramientas financieras clave para una adecuada toma de
                    decisiones en la MYPE. El participante aprende a analizar costos, elaborar presupuestos y proyectar
                    flujos de caja para asegurar la liquidez del negocio. Se fortalece la capacidad de evaluar
                    escenarios financieros y sostener el crecimiento de manera ordenada y rentable.</p>
                  <div class="course-topics">
                    <h5></h5>
                    <h5>Temario</h5>
                    <ul>
                      <li>Estructura de costos y márgenes</li>
                      <li>Elaboración de presupuestos</li>
                      <li>Estrategias de liquidez (factoring, descuentos, etc.)</li>
                      <li>Flujo de caja y capital de trabajo</li>
                      <li>Evaluación financiera de decisiones</li>
                      <li>Riesgos financieros en MYPES</li>
                      <li>Fortalecimiento de la relación de la MYPES con entidades financieras: Bancos, cajas
                        municipales, otros</li>
                      <li>Aspectos tributarios de la gestión financiera</li>
                    </ul>
                    <p> </p>
                    <p><strong>Actividad práctica:</strong> Presupuesto y flujo de caja proyectado.</p>
                  </div>
                </div>
              </div>
            </div>

            <!-- Proyecto -->
            <div class="project-card">
              <div class="project-label">Proyecto Aplicable</div>
              <h4>Plan de Gestión y Crecimiento para MYPES</h4>
              <div style="margin-top: 1rem;">
                <p>El proyecto integrador consolida los aprendizajes del programa en un plan aplicable al negocio del
                  participante. Integra diagnóstico y línea base, objetivos, estrategia de crecimiento, operaciones,
                  comercial, sostenibilidad y finanzas en un documento ejecutivo y accionable. El participante culmina
                  el programa con una hoja de ruta clara para implementar mejoras y sostener el crecimiento de su MYPE.
                </p>
              </div>
            </div>
            <!-- Disclaimer Plan de Estudios -->
            <div
              style="margin-top: 1.5rem; padding: 1.25rem; background: rgba(139, 151, 168, 0.1); border-radius: 12px; border-left: 3px solid var(--silver);">
              <div style="font-size: 1rem; color: var(--silver); line-height: 1.7;">
                <h6>UNW se reserva el derecho de cancelar o modificar el inicio de sus Programas por motivos de mejora
                  continua. El dictado de clases del programa se iniciará siempre que se alcance el número mínimo de
                  alumnos matriculados establecido por UNW.</h6>
              </div>
            </div>
          </div>
        </div>

        <!-- Por qué elegir -->
        <div class="content-section">
          <h2 class="section-title">¿Por qué elegir el Programa?</h2>
          <div class="benefits-list">
            <div class="benefit-item">
              <div class="benefit-icon">
                <img
                  src="https://uwiener.btechcloud.pe/educacionejecutiva-01/wp-content/uploads/2026/02/icon-elegir-programa-01.png"
                  alt="">
              </div>
              <div>
                <p>Enfoque 100 % aplicado y orientado a resultados.</p>
              </div>
            </div>
            <div class="benefit-item">
              <div class="benefit-icon">
                <img
                  src="https://uwiener.btechcloud.pe/educacionejecutiva-01/wp-content/uploads/2026/02/icon-elegir-programa-02.png"
                  alt="">
              </div>
              <div>
                <p>Uso de herramientas prácticas de gestión empresarial.</p>
              </div>
            </div>
            <div class="benefit-item">
              <div class="benefit-icon">
                <img
                  src="https://uwiener.btechcloud.pe/educacionejecutiva-01/wp-content/uploads/2026/02/icon-elegir-programa-03.png"
                  alt="">
              </div>
              <div>
                <p>Acompañamiento y retroalimentación permanente, que garantiza el correcto desarrollo y mejora continua
                  del proyecto.</p>
              </div>
            </div>
            <div class="benefit-item">
              <div class="benefit-icon">
                <img
                  src="https://uwiener.btechcloud.pe/educacionejecutiva-01/wp-content/uploads/2026/02/icon-elegir-programa-04.png"
                  alt="">
              </div>
              <div>
                <p>Proyecto integrador final, que consolida todos los aprendizajes en un documento ejecutivo, accionable
                  y listo para ser implementado en la empresa.</p>
              </div>
            </div>
          </div>
        </div>

        <!-- A quién está dirigido -->
        <div class="content-section">
          <h2 class="section-title">
            ¿A quién está dirigido? </h2>
          <div class="audience-card">
            <p>El programa está dirigido a dueños, administradores y gestores de micro y pequeñas empresas, así como a
              profesionales en administración, contabilidad, finanzas o áreas afines que asesoran o lideran MYPES y
              requieren fortalecer sus capacidades de gestión, planificación y toma de decisiones para lograr un
              crecimiento ordenado, rentable y sostenible.</p>
          </div>
        </div>

        <!-- Serás capaz de -->
        <div class="content-section">
          <h2 class="section-title">Serás capaz de:</h2>
          <div class="skills-grid">
            <div class="skill-item">
              <p>Analizar el modelo de negocio de una MYPE para identificar oportunidades de mejora y crecimiento.</p>
            </div>
            <div class="skill-item">
              <p>Aplicar herramientas de planificación estratégica adaptadas a la realidad de la micro y pequeña
                empresa.</p>
            </div>
            <div class="skill-item">
              <p>Diseñar procesos operativos y comerciales orientados a la eficiencia y la experiencia del cliente.</p>
            </div>
            <div class="skill-item">
              <p>Evaluar la viabilidad financiera del negocio mediante presupuestos y proyecciones de flujo de caja.</p>
            </div>
            <div class="skill-item">
              <p>Integrar criterios de sostenibilidad e impacto en la gestión empresarial para fortalecer la
                competitividad.</p>
            </div>
          </div>
        </div>

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
</style>
