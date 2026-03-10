<?php
/**
 * Programa Custom Columns
 * Añade columnas personalizadas en el listado de Programas en el admin
 *
 * @package WordPress
 * @subpackage Yupay
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
  exit;
}

/**
 * Añadir columna de Áreas en el listado de Programas
 *
 * @param array $columns Columnas existentes
 * @return array Columnas modificadas
 */
function yupay_add_programa_columns($columns) {
  // Crear un nuevo array para insertar la columna después del título
  $new_columns = [];

  foreach ($columns as $key => $value) {
    $new_columns[$key] = $value;

    // Insertar la columna de áreas después del título
    if ($key === 'title') {
      $new_columns['areas'] = __('Área', 'yupay');
    }
  }

  return $new_columns;
}
add_filter('manage_programa_posts_columns', 'yupay_add_programa_columns');

/**
 * Mostrar el contenido de la columna de Áreas
 *
 * @param string $column Nombre de la columna
 * @param int $post_id ID del post
 */
function yupay_programa_custom_column_content($column, $post_id) {
  if ($column === 'areas') {
    // Obtener los términos de la taxonomía 'areas'
    $terms = get_the_terms($post_id, 'areas');

    if (!empty($terms) && !is_wp_error($terms)) {
      $area_links = [];

      foreach ($terms as $term) {
        // Crear enlace filtrable a la taxonomía
        $area_links[] = sprintf(
          '<a href="%s">%s</a>',
          esc_url(add_query_arg([
            'post_type' => 'programa',
            'areas' => $term->slug
          ], 'edit.php')),
          esc_html($term->name)
        );
      }

      echo implode(', ', $area_links);
    } else {
      echo '—';
    }
  }
}
add_action('manage_programa_posts_custom_column', 'yupay_programa_custom_column_content', 10, 2);

/**
 * Hacer la columna de Áreas ordenable
 *
 * @param array $columns Columnas ordenables
 * @return array Columnas ordenables modificadas
 */
function yupay_programa_sortable_columns($columns) {
  $columns['areas'] = 'areas';
  return $columns;
}
add_filter('manage_edit-programa_sortable_columns', 'yupay_programa_sortable_columns');
