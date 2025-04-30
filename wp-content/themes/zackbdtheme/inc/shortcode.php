<?php
// Wordpress Shordcode
function basic_shortcoder(){
  return "Zakir BD is a web developer";
}
add_shortcode( 'zakirbd', 'basic_shortcoder');

// Button Shortcode
function button_shortcode( $atts, $content = null ){
  $values = shortcode_atts( array (
    'url' => '#',
  ), $atts );
  return '<a class="button" href="'.esc_attr($values['url']) .'">' . $content . '</a>';
}
add_shortcode( 'button', 'button_shortcode');


// Shortcode & Custom Post


// function service_shotcode( $atts ) {
//     ob_start();
//     $query = new WP_Query( array(
//       'post_type' => 'service',
//       'posts_per_page' => 3,
//       'order' => 'ASC',
//       'orderby' => 'title',
//     ));
//     if ( $query -> have_posts()) { ?>
  
<!-- //     <section id="service_area">
//       <div class="container">
//         <div class="row">
//           <?php //while ( $query -> have_posts () ) : $query->the_post(); ?>
//           <div class="col-md-4">
//             <div class="child_service">
//             <h2><?php //the_title(); ?></h2>
//             <?php //echo the_post_thumbnail('service') ?>
//             <?php //the_excerpt(  ); ?>
//             </div>
//           </div>
  
//           <?php  //endwhile; wp_reset_postdata(); ?>
//         </div>
//       </div>
//     </section> -->
  
    <?php //$myvariable = ob_get_clean(); 
//       return $myvariable;
//     }
//   }
//   add_shortcode( 'service', 'service_shotcode');


function service_shotcode( $atts ) {
    ob_start();

    $count = get_option('service_post_count', 3);
    $order = get_option('service_post_order', 'ASC');

    $query = new WP_Query( array(
        'post_type' => 'service',
        'posts_per_page' => $count,
        'order' => $order,
        'orderby' => 'title',
    ));

    if ( $query->have_posts() ) { ?>
        <section id="service_area">
            <div class="container">
                <div class="row">
                    <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                    <div class="col-md-4">
                        <div class="child_service">
                            <h2><?php the_title(); ?></h2>
                            <?php the_post_thumbnail('service'); ?>
                            <?php the_excerpt(); ?>
                        </div>
                    </div>
                    <?php endwhile; wp_reset_postdata(); ?>
                </div>
            </div>
        </section>
    <?php }

    return ob_get_clean();
}
add_shortcode( 'service', 'service_shotcode' );


add_action('admin_menu', 'service_shortcode_settings_menu');

function service_shortcode_settings_menu() {
    add_menu_page(
        'Service Shortcode Settings',
        'Service Shortcode',
        'manage_options',
        'service-shortcode-settings',
        'service_shortcode_settings_page',
        'dashicons-screenoptions',
        30
    );
}


function service_shortcode_settings_page() {
    if (isset($_POST['service_shortcode_submit'])) {
        update_option('service_post_count', intval($_POST['service_post_count']));
        update_option('service_post_order', sanitize_text_field($_POST['service_post_order']));
        echo '<div class="updated"><p>Settings saved!</p></div>';
    }

    $count = get_option('service_post_count', 3);
    $order = get_option('service_post_order', 'ASC');
    ?>
    <div class="wrap">
        <h1>Service Shortcode Settings</h1>
        <form method="post">
            <table class="form-table">
                <tr>
                    <th scope="row">Number of Posts</th>
                    <td><input type="number" name="service_post_count" value="<?php echo esc_attr($count); ?>" min="1"></td>
                </tr>
                <tr>
                    <th scope="row">Order</th>
                    <td>
                        <select name="service_post_order">
                            <option value="ASC" <?php selected($order, 'ASC'); ?>>Ascending</option>
                            <option value="DESC" <?php selected($order, 'DESC'); ?>>Descending</option>
                        </select>
                    </td>
                </tr>
            </table>
            <p><input type="submit" name="service_shortcode_submit" class="button button-primary" value="Save Settings"></p>
            <p>Use shortcode: <code>[service]</code></p>
        </form>
    </div>
    <?php
}