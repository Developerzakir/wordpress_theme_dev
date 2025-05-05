<?php

/*
* Enqueue CSS
*/
function theme_option_custom_css(){
    wp_enqueue_style('theme_option_custom_css', get_template_directory_uri().'/css/theme_option_custom.css', array(), '1.0.0', 'all');
}
add_action( 'admin_enqueue_scripts', 'theme_option_custom_css' );



function zackbth_add_theme_page(){
  add_menu_page('Theme Option for Admin', 'Theme Option', 'manage_options', 'zackbth_theme_option', 'zackbth_theme_create_page', get_template_directory_uri(). '/img/mini-logo.png', 101);

  add_submenu_page( 'zackbth_theme_option', 'Theme Option', 'General', 'manage_options', 'zackbth_theme_option', 'zackbth_theme_create_page', );

  add_submenu_page( 'zackbth_theme_option', 'Theme Custom CSS', 'Custom CSS', 'manage_options', 'zackbth_custom_css', 'zackbth_theme_custom_css_page', );

  add_submenu_page( 'zackbth_theme_option', 'Theme Custom JavaScript', 'Custom JS', 'manage_options', 'zackbth_custom_js', 'zackbth_theme_custom_js_page', );

}
add_action( 'admin_menu', 'zackbth_add_theme_page');

function zackbth_theme_create_page(){
  // Generating Theme option
  require_once(get_template_directory() . '/inc/theme-option/general.php');
}


function zackbth_theme_custom_css_page(){
  // Generating Theme option
  require_once(get_template_directory() . '/inc/theme-option/custom_css.php');
}
  
function zackbth_theme_custom_js_page(){
  // Generating Theme option
  require_once(get_template_directory() . '/inc/theme-option/custom_js.php');
}




//custom css & js dynamically
function zackbth_custom_code_settings() {

    // Custom CSS
    register_setting('zackbth-custom-css-options', 'zackbth_custom_css');
    add_settings_section('zackbth-css-section', 'Add Your Custom CSS Below', null, 'zackbth_custom_css');
    add_settings_field('custom-css', 'Custom CSS', function () {
      $css = esc_textarea(get_option('zackbth_custom_css'));
      echo "<textarea name='zackbth_custom_css' rows='10' cols='70' style='width:100%;'>$css</textarea>";
    }, 'zackbth_custom_css', 'zackbth-css-section');
  
    // Custom JS
    register_setting('zackbth-custom-js-options', 'zackbth_custom_js');
    add_settings_section('zackbth-js-section', 'Add Your Custom JavaScript Below', null, 'zackbth_custom_js');
    add_settings_field('custom-js', 'Custom JS', function () {
      $js = esc_textarea(get_option('zackbth_custom_js'));
      echo "<textarea name='zackbth_custom_js' rows='10' cols='70' style='width:100%;'>$js</textarea>";
    }, 'zackbth_custom_js', 'zackbth-js-section');
  }
  add_action('admin_init', 'zackbth_custom_code_settings');



// Output Custom CSS
function zackbth_output_custom_css() {
    $custom_css = get_option('zackbth_custom_css');
    if (!empty($custom_css)) {
      echo "<style type='text/css'>\n" . wp_strip_all_tags($custom_css) . "\n</style>";
    }
  }
  add_action('wp_head', 'zackbth_output_custom_css');
  
  // Output Custom JS
  function zackbth_output_custom_js() {
    $custom_js = get_option('zackbth_custom_js');
    if (!empty($custom_js)) {
      echo "<script type='text/javascript'>\n" . $custom_js . "\n</script>";
    }
  }
  add_action('wp_footer', 'zackbth_output_custom_js');
