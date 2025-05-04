<?php 



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

     // Theme Color
    $wp_customize-> add_section('zackbth_colors', array(
      'title' => __('Theme Color', 'zackbth'),
      'description' => 'If need you can change your theme color.',
    ));

    $wp_customize ->add_setting('zackbth_bg_color', array(
      'default' => '#ffffff',
    ));
    $wp_customize->add_control( new WP_Customize_color_control($wp_customize, 'zackbth_bg_color', array(
      'label' => 'Background Color',
      'section' => 'zackbth_colors',
      'settings' => 'zackbth_bg_color',
    )));
    $wp_customize ->add_setting('zackbth_primary_color', array(
      'default' => '#ea1a70',
    ));
    $wp_customize->add_control( new WP_Customize_color_control($wp_customize, 'zackbth_primary_color', array(
      'label' => 'Primary Color',
      'section' => 'zackbth_colors',
      'settings' => 'zackbth_primary_color',
    )));


    //all project text dynamically change option create
    $wp_customize->add_section('project_section', array(
      'title'    => __('Project Page Settings', 'zackbth'),
      'priority' => 30,
    ));

    $wp_customize->add_setting('project_page_title', array(
        'default'   => 'All Projects',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'project_page_title', array(
        'label'    => __('Projects Page Title', 'zackbth'),
        'section'  => 'project_section',
        'settings' => 'project_page_title',
        'type'     => 'text',
    )));

    //project post count dynamically change option
    $wp_customize->add_section('project_settings_section', array(
      'title'    => __('Project Post Count ', 'zackbth'),
      'priority' => 31,
    ));

    $wp_customize->add_setting('project_posts_per_page', array(
        'default'   => 3,
        'sanitize_callback' => 'absint',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('project_posts_per_page', array(
        'label'    => __('Number of Projects to Show', 'zackbth'),
        'section'  => 'project_settings_section',
        'type'     => 'number',
        'input_attrs' => array(
            'min' => 1,
            'step' => 1
        )
    ));

    // Theme custom login page
    $wp_customize-> add_section('custom_login', array(
      'title' => __('Custom Login', 'zackbth'),
      'description' => 'If need you can change your theme custom login info.',
    ));

    $wp_customize->add_setting('custom_login_logo', array(
      'default' => get_template_directory_uri() . '/img/logo-sm.png',
      'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize-> add_control(new WP_Customize_Image_Control($wp_customize, 'custom_login_logo', array(
      'label' => 'Logo Upload',
      'description' => 'If you interested to change or update your logo you can do it.',
      'setting' => 'custom_login_logo',
      'section' => 'custom_login',
    ) ));

    $wp_customize->add_setting('custom_login_bg', array(
      'default' => get_template_directory_uri() . '/img/login.jpg',
      'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize-> add_control(new WP_Customize_Image_Control($wp_customize, 'custom_login_bg', array(
      'label' => 'Background Upload',
      'description' => 'If you interested to change or update your background image you can do it.',
      'setting' => 'custom_login_bg',
      'section' => 'custom_login',
    ) ));
    $wp_customize ->add_setting('custom_primary_color', array(
      'default' => '#ea1a70',
    ));
    $wp_customize->add_control( new WP_Customize_color_control($wp_customize, 'custom_primary_color', array(
      'label' => 'Primary Color',
      'section' => 'custom_login',
      'settings' => 'custom_primary_color',
    )));


  
  }
  
  add_action('customize_register', 'zackbth_customizar_register');


  // theme color change
  function zackbth_theme_color_cus(){
    ?>
    <style>
      body{background: <?php echo get_theme_mod('zackbth_bg_color'); ?>}
      :root{ --pink:<?php echo get_theme_mod('zackbth_primary_color'); ?>}
    </style>
    <?php 
  }
  add_action('wp_head', 'zackbth_theme_color_cus');



  
// Theme Custom Login page Style
function custom_color_login(){
  ?>
  <style>
    #login h1 a, .login h1 a{
      background-image: url(<?php print get_theme_mod("custom_login_logo"); ?>) !important;
    }

    body.login {
      background: url(<?php print get_theme_mod("custom_login_bg"); ?>) !important;
    }

    #login form p.submit input {
      background: <?php print get_theme_mod("custom_primary_color"); ?>  !important;
    }  
    .login #login_error,
    .login .message,
    .login .success {
      border-left: 4px solid <?php print get_theme_mod("custom_primary_color"); ?>  !important;
    }
    input#user_login,
    input#user_pass {
      border-left: 4px solid <?php print get_theme_mod("custom_primary_color"); ?>  !important;
    }  
  </style>
  <?php 
}
add_action('login_enqueue_scripts', 'custom_color_login');