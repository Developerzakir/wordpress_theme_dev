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
  
  }
  
  add_action('customize_register', 'zackbth_customizar_register');