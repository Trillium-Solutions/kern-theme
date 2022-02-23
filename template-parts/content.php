<?php
/**
 * Template part for displaying posts
 *
 * 
 */

?>

    <div id="post-<?php the_ID(); ?>" role="article" itemscope itemtype="https://schema.org/BlogPosting">


            <?php
                // the content (pretty self explanatory huh)
                if( has_post_thumbnail()) { ?>
                <div id="featured-image-container">
                    <img class="featured-image" src="
                    <?php
                
                        $thumb_id = get_post_thumbnail_id();
                        $thumb_url_array = wp_get_attachment_image_src($thumb_id, 'large', true);
                        $alt = get_post_meta($thumb_id, '_wp_attachment_image_alt', true);
                        echo $thumb_url_array[0];
                
                    ?>
                    " alt="<?php echo $alt; ?>">
                </div><!-- end featured image -->
                <div id="page-anchor-links"><ul></ul></div>
                <?php
                }
                
                the_content(); 

                ?>


		</div>