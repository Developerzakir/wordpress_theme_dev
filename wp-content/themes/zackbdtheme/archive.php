<?php
/*
* The template for displaying Archive Pages
*/ 
get_header(); ?>

  <section id="body_area">
    <div class="container">
      <div class="row">
        <div class="col-md-9">
            <div id="archive_title">
                <?php
                    the_archive_title('<h1 class="title">','</h1>');

                    $author_description = get_the_author_meta('description');
                    if ( $author_description ) {
                        echo '<div class="description">' . esc_html( $author_description ) . '</div>';
                    }
                ?>
            </div>

            <?php get_template_part('template_part/blog_setup'); ?>
        </div>
        <div class="col-md-3">
          <?php get_sidebar(); ?>
        </div>
      </div>
    </div>
  </section>

  <?php get_footer(); ?>