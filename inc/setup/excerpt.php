<?php
/**
 * Content Filters
 *
 * Custom filters for content modification
 *
 * @package WordPress
 * @subpackage Client
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
  exit;
}

/**
 * Customize excerpt length
 *
 * @param int $length Default excerpt length
 * @return int Modified excerpt length
 */
function client_excerpt_length($length)
{
  return 30;
}
add_filter('excerpt_length', 'client_excerpt_length');
