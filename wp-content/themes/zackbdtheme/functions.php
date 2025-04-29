<?php
/*
* My Theme Function
*/


// Theme Title
add_theme_support('title-tag');


// Theme CSS and jQuery File calling
function zackbth_css_js_file_calling(){
  wp_enqueue_style('zackbth-style', get_stylesheet_uri());
  wp_register_style('bootstrap', get_template_directory_uri().'/css/bootstrap.css', array(), '5.0.2', 'all');
  wp_register_style('custom', get_template_directory_uri().'/css/custom.css', array(), '1.0.0', 'all');
  wp_enqueue_style('bootstrap');
  wp_enqueue_style('custom');


  //jQuery
  wp_enqueue_script('jquery');
  wp_enqueue_script('bootstrap', get_template_directory_uri().'/js/bootstrap.js', array(), '5.0.2', 'true' );
  wp_enqueue_script('main', get_template_directory_uri().'/js/main.js', array(), '1.0.0', 'true' );

}
add_action('wp_enqueue_scripts', 'zackbth_css_js_file_calling');


// Google Fonts Enqueue
function zackbth_add_google_fonts(){
  wp_enqueue_style('zackbth_google_fonts', 'https://fonts.googleapis.com/css2?family=Kaisei+Decol&family=Oswald&display=swap', false);
}
add_action('wp_enqueue_scripts', 'zackbth_add_google_fonts');


//Theme Function
function zackbth_customizar_register($wp_customize){
  $wp_customize->add_section('zackbth_header_area', array(
    'title' =>__('Header Area', 'zackbth'),
    'description' => 'If you interested to update your header area, you can do it here.'
  ));

  $wp_customize->add_setting('zackbth_logo', array(
    'default' => get_bloginfo('template_directory') . '/img/logo.png',
  ));

  $wp_customize-> add_control(new WP_Customize_Image_Control($wp_customize, 'zackbth_logo', array(
    'label' => 'Logo Upload',
    'description' => 'If you interested to change or update your logo you can do it.',
    'setting' => 'zackbth_logo',
    'section' => 'zackbth_header_area',
  ) ));

   // Menu Position Option
   $wp_customize->add_section('zackbth_menu_option', array(
    'title' => __('Menu Position Option', 'alihossain'),
    'description' => 'If you interested to change your menu position you can do it.'
  ));

  $wp_customize->add_setting('zackbth_menu_position', array(
    'default' => 'right_menu',
  ));

  $wp_customize-> add_control('zackbth_menu_position', array(
    'label' => 'Menu Position',
    'description' => 'Select your menu position',
    'setting' => 'zackbth_menu_position',
    'section' => 'zackbth_menu_option',
    'type' => 'radio',
    'choices' => array(
      'left_menu' => 'Left Menu',
      'right_menu' => 'Right Menu',
      'center_menu' => 'Center Menu',
    ),
  ));


  
  // Footer Option
  $wp_customize->add_section('zackbth_footer_option', array(
    'title' => __('Footer Option', 'zackbth'),
    'description' => 'If you interested to change or update your footer settings you can do it.'
  ));

  $wp_customize->add_setting('zackbth_copyright_section', array(
    'default' => '&copy; Copyright 2021 | Zakir Bd',
  ));

  $wp_customize-> add_control('zackbth_copyright_section', array(
    'label' => 'Copyright Text',
    'description' => 'If need you can update your copyright text from here',
    'setting' => 'zackbth_copyright_section',
    'section' => 'zackbth_footer_option',
  ));

}

add_action('customize_register', 'zackbth_customizar_register');

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
