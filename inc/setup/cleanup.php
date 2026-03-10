<?php
/**
 * Theme Cleanup
 *
 * Remove unnecessary WordPress features and assets
 *
 * @package WordPress
 * @subpackage Client
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
  exit;
}

/**
 * Remove emoji detection scripts
 */
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

/**
 * Remove WordPress block library CSS
 */
function client_remove_block_css()
{
  wp_dequeue_style('wp-block-library');
  wp_dequeue_style('wp-block-library-theme');
}
add_action('wp_enqueue_scripts', 'client_remove_block_css', 100);
