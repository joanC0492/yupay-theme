<?php
/**
 * Navigation Menus Registration
 *
 * @package WordPress
 * @subpackage Client
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
  exit;
}

/**
 * Register navigation menus
 */
function client_register_menus()
{
  register_nav_menus([
    'header-menu' => __('Header Menu', 'client'),
    'footer-menu' => __('Footer Menu', 'client'),
  ]);
}
add_action('init', 'client_register_menus');
