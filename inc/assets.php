<?php
if (!defined('ABSPATH')) {
  exit;
}

add_action('wp_enqueue_scripts', 'enqueue_assets');

function enqueue_assets(): void
{
  enqueue_base_assets();
}

function enqueue_base_assets(): void
{
  $css_path = get_template_directory() . '/public/css/app.min.css';
  $js_path = get_template_directory() . '/public/js/main.min.js';

  wp_enqueue_style(
    'main-css',
    get_template_directory_uri() . '/public/css/app.min.css',
    [],
    file_exists($css_path) ? filemtime($css_path) : THEME_VERSION,
    'all'
  );

  wp_enqueue_script(
    'main-js',
    get_template_directory_uri() . '/public/js/main.min.js',
    [],
    file_exists($js_path) ? filemtime($js_path) : THEME_VERSION,
    true
  );
}
