<?php
/*
    Template name: Seminarios Internacionales
*/
get_header();

$page_id = get_queried_object_id();

$hero_cta_link = get_field('hero_cta_link', $page_id);
$hero_side_image = get_field('hero_side_image', $page_id);
$hero_side_html = get_field('hero_side_html', $page_id);
$hero_content_type = get_field('hero_seleccion_img_html', $page_id);
$seminars_items = get_field('seminars_items', $page_id);

$data = [
  'hero' => [
    'section_class' => 'seminarios-hero',
    'breadcrumb_text' => get_field('hero_breadcrumb_text', $page_id),
    'badge_text' => get_field('hero_badge_text', $page_id),
    'title' => get_field('hero_title', $page_id),
    'description' => get_field('hero_description', $page_id),
    'cta_link' => is_array($hero_cta_link) ? $hero_cta_link : [],
    'side_content_type' => in_array($hero_content_type, ['imagen', 'html'], true) ? $hero_content_type : 'html',
    'side_image' => is_array($hero_side_image) ? $hero_side_image : [],
    'side_html' => $hero_side_html ?: '',
  ],
  'seminars' => [
    'section_class' => 'seminarios-list-section',
    'badge_text' => get_field('seminars_badge_text', $page_id),
    'title' => get_field('seminars_title', $page_id),
    'description' => get_field('seminars_description', $page_id),
    'items' => is_array($seminars_items) ? $seminars_items : [],
  ],
];

// Hero Section
get_template_part(
  'inc/ui/sections/hero',
  null,
  $data['hero']
);

// Seminarios
get_template_part(
  'inc/ui/sections/seminars',
  null,
  $data['seminars']
);

get_footer();
