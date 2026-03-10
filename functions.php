<?php
/**
 * Client Theme Functions
 * @package WordPress
 * @subpackage Client
 * @since 1.0.0
 * @version 1.0.0
 */
if (!defined('ABSPATH')) {
  exit;
}

// === Constants ===
define('URL', get_stylesheet_directory_uri());
define('IMG', URL . '/images');
define('JS', URL . '/libraries/js');
define('CSS', URL . '/libraries/css');
define('THEME_VERSION', '1.0.2');


// === Helpers ===
require_once get_template_directory() . '/inc/helpers/index.php';

// === Enqueue Styles and Scripts ===
require_once get_template_directory() . '/inc/assets.php';

// === Theme Setup ===
require_once get_template_directory() . '/inc/setup/theme-support.php';
require_once get_template_directory() . '/inc/setup/cleanup.php';
require_once get_template_directory() . '/inc/setup/menus.php';
require_once get_template_directory() . '/inc/setup/excerpt.php';

// === Admin ===
require_once get_template_directory() . '/inc/admin/programa-columns.php';

/**
 * Corregir 404 en paginación de taxonomía 'areas'.
 * WordPress usa la consulta principal para validar la URL; si no tiene posts_per_page
 * configurado, puede devolver 404 en /areas/term/page/2/
 */
add_action('pre_get_posts', function ($query) {
  if (is_admin() || !$query->is_main_query()) {
    return;
  }
  if ($query->is_tax('areas')) {
    $query->set('posts_per_page', 9);
    $query->set('post_type', 'programa');
  }
});


/**
 * Permitir SVG inline en campos ACF (textarea, etc).
 * Esto evita que WP/ACF borre <svg> al guardar/mostrar en admin.
 */
add_filter('wp_kses_allowed_html', function ($tags, $context) {

  // ACF usa el contexto "acf" cuando escapa contenido en el admin.
  // También agregamos "post" porque nav_menu_item puede pasar por sanitizado de posts.
  if (!in_array($context, ['acf', 'post'], true)) {
    return $tags;
  }

  $tags['svg'] = [
    'xmlns' => true,
    'viewBox' => true,
    'width' => true,
    'height' => true,
    'fill' => true,
    'stroke' => true,
    'stroke-width' => true,
    'class' => true,
    'aria-hidden' => true,
    'role' => true,
    'focusable' => true,
  ];

  $tags['path'] = [
    'd' => true,
    'fill' => true,
    'stroke' => true,
    'stroke-width' => true,
  ];

  $tags['g'] = [
    'fill' => true,
    'stroke' => true,
    'class' => true,
  ];

  return $tags;
}, 10, 2);
