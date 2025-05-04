<?php if (have_posts()) :
    while (have_posts()) : the_post(); ?>

    <?php if (get_post_format() == 'quote') : ?>
        <div class="blog_area quote_post">
            <!-- Dashicon for Quote Format -->
            <span class="dashicons dashicons-format-quote"></span>

            <div class="quote_content">
                <blockquote>
                    <?php the_content(); ?>
                    <cite>— <?php the_title(); ?></cite>
                </blockquote>
            </div>
        </div>
    <?php endif; ?>

<?php endwhile;
  else :
    _e('No post found');
endif; ?>