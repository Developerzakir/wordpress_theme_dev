<?php if (have_posts()) :
    while (have_posts()) : the_post(); ?>

    <?php if (get_post_format() == 'audio') : ?>
        <div class="blog_area">
            <span class="dashicons dashicons-format-audio"></span>
            <p>Audio post format</p>
            
            <div class="post_thumb">
                <a href="<?php the_permalink(); ?>"><?php echo the_post_thumbnail('post-thumbnails'); ?></a>
            </div>
            
            <div class="post_details">
                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                
                <!-- Check if there is an audio file URL to embed -->
                <?php 
                    // You can use the built-in audio shortcode if the audio is embedded
                    if (has_post_format('audio')) {
                        // Check if the post content has an embedded audio URL or an audio file URL
                        $audio_url = get_post_meta(get_the_ID(), 'audio_url', true); // Assuming custom field 'audio_url' stores the audio file URL
                        
                        if ($audio_url) {
                            // Display the audio player
                            echo '<audio controls><source src="' . esc_url($audio_url) . '" type="audio/mpeg"></audio>';
                        } else {
                            // If no audio URL is found, display an error message or an alternative content
                            echo '<p>No audio file found for this post.</p>';
                        }
                    }
                ?>
                
                <?php the_content(); ?>
            </div>
        </div>
    <?php else : ?>
        <!-- Handle other post formats (for example, video) -->
        <div class="blog_area">
            <span class="dashicons dashicons-format-<?php echo get_post_format($post->ID); ?>"></span>
            <p>Other post format</p>
            <div class="post_details">
                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <?php the_content(); ?>
            </div>
        </div>
    <?php endif; ?>

<?php endwhile;
  else :
    _e('No post found');
endif; ?>