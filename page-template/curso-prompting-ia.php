<?php
/*
    Template name: Curso Prompting IA
*/
get_header();

$page_id = get_queried_object_id();

$hero_cta_link = get_field('hero_cta_link', $page_id);
$hero_side_image = get_field('hero_side_image', $page_id);
$hero_side_html = get_field('hero_side_html', $page_id);
$hero_content_type = get_field('hero_seleccion_img_html', $page_id);
$caracteristicas = get_field('programas_caracteristicas', $page_id);

$data = [
  'hero' => [
    'section_class' => 'curso-prompting-ia-hero',
    'breadcrumb_text' => get_field('hero_breadcrumb_text', $page_id),
    'badge_text' => get_field('hero_badge_text', $page_id),
    'title' => get_field('hero_title', $page_id),
    'description' => get_field('hero_description', $page_id),
    'cta_link' => is_array($hero_cta_link) ? $hero_cta_link : [],
    'side_content_type' => in_array($hero_content_type, ['imagen', 'html'], true) ? $hero_content_type : 'html',
    'side_image' => is_array($hero_side_image) ? $hero_side_image : [],
    'side_html' => $hero_side_html ?: '',
    'caracteristicas' => is_array($caracteristicas) ? $caracteristicas : [],
  ],
  'program_content' => [
    'section_class' => 'curso-prompting-ia-content',
    // 'acerca' => get_field('programa_acerca', $page_id) ?: [],
    'programa_titulo' => get_field('programa_titulo', $page_id), // ok
    'razones' => get_field('programa_razones', $page_id) ?: [], // ok
    'publico_objetivo' => get_field('programa_publico_objetivo', $page_id) ?: [], // ok
    // 'modal_ocultar'              => get_field('programa_modal_ocultar', $page_id),
    // 'modal_btn_texto'            => get_field('programa_modal_btnrequisitos_texto', $page_id),
    'programa_resultados_titulo' => get_field('programa_resultados_titulo', $page_id), // ok
    'resultados_aprendizaje' => get_field('programa_resultados_aprendizaje', $page_id) ?: [], // ok
    'competencia_titulo' => get_field('programa_competencia_titulo', $page_id),
    'competencias' => get_field('programa_competencias', $page_id) ?: [],
    'ruta_titulo' => get_field('programa_ruta_titulo', $page_id), // ok
    'ruta_aprendizaje' => get_field('programa_ruta_aprendizaje', $page_id) ?: [], // ok
    'proyecto_aplicable' => get_field('programa_proyecto_aplicable', $page_id) ?: [],
    'docentes_titulo' => get_field('programa_docentes_titulo', $page_id),
    'docentes' => get_field('programa_docentes', $page_id) ?: [],
    'docentes_nota' => get_field('programa_docentes_nota', $page_id),
  ],
];

get_template_part(
  'inc/ui/sections/hero',
  null,
  $data['hero']
);

get_template_part(
  'inc/ui/sections/program-content',
  null,
  $data['program_content']
);

get_footer();
