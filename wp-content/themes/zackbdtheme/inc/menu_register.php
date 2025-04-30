<?php


// Menu Register
register_nav_menu( 'main_menu', __('Main Menu', 'zackbth') );


// Walker Menu Properties
// function zackbth_nav_description( $item_output, $item, $args){
//   if( !empty ($item->description)){
//     $item_output = str_replace($args->link_after . '</a>', '<span class="walker_nav">' . $item->description . '</span>' . $args->link_after . '</a>', $item_output);
//   }
//   return $item_output;
// }
// add_filter('walker_nav_menu_start_el', 'zackbth_nav_description', 10, 3);

class Description_Walker extends Walker_Nav_Menu {
  function start_el(&$output, $item, $depth = 0, $args = [], $id = 0) {
      $classes = empty($item->classes) ? [] : (array)$item->classes;
      $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args, $depth));
      $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

      $output .= '<li' . $class_names . '>';

      $attributes  = !empty($item->attr_title) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
      $attributes .= !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';
      $attributes .= ' class="menu-link"';

      $title = apply_filters('the_title', $item->title, $item->ID);
      $description = !empty($item->description) ? '<span class="menu-description">' . esc_html($item->description) . '</span>' : '';

      $item_output = '<a' . $attributes . '>';
      $item_output .= $title;
      $item_output .= $description;
      $item_output .= '</a>';

      $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
  }
}
