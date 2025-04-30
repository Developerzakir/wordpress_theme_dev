<?php

// Theme Title
add_theme_support('title-tag');


// Thumbnil Image Area
add_theme_support( 'post-thumbnails', array('page', 'post') );
add_image_size('post-thumbnails', 970, 350, true);


// Except to 40 Word

function zackbth_excerpt_more($more){
    global $post;
  return '<br> <br> <a class="redmore" href="'.get_permalink( $post->ID) . '">' . 'Read More' . '</a>';
}
add_filter('excerpt_more', 'zackbth_excerpt_more');

function zackbth_excerpt_lenght($length){
  return 40;
}
add_filter('excerpt_length', 'zackbth_excerpt_lenght', 999);