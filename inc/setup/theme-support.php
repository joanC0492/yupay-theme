<?php
/**
 * Theme Support Configuration
 *
 * @package WordPress
 * @subpackage Client
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
  exit;
}

/**
 * Setup theme support features
 */
function client_theme_support()
{
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
  add_theme_support('html5', [
    'search-form',
    'comment-form',
    'comment-list',
    'gallery',
    'caption'
  ]);
}
add_action('after_setup_theme', 'client_theme_support');
