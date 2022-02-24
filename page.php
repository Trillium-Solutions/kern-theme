<?php get_header(); ?>

			<?php get_template_part( 'generic-page-top'); ?> 
			
			<div class="row-fluid" id="page-holder">
						<main id="content" class="col-sm-9 main" role="main">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<div id="post-<?php the_ID(); ?>" role="article" itemscope itemtype="https://schema.org/BlogPosting">

									<?php
										// the content
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

							<?php endwhile; else : ?>

								<?php get_template_part( 'template-parts/content', 'none' ); ?>

							<?php endif; ?>

						</main>

						<aside id="sidebar1" class="sidebar col-sm-3" role="complementary">

							<?php get_template_part( 'generic-sidebar'); ?> 
						</aside>
			</div> <!-- end row -->

<?php get_footer(); ?>
