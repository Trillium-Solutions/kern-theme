<?php 

/*
The template for displaying all single posts
*/

get_header(); ?>

			<?php get_template_part( 'generic-page-top'); ?> 
			
			<div class="row-fluid content-container" id="page-holder">
					<main id="content" class="col-sm-9 main" role="main">

							<?php if (have_posts()) : while (have_posts()) : the_post(); 
							?>
									
								<?php get_template_part( 'template-parts/content', get_post_type() );?>


							<?php endwhile; else : ?>

								<?php get_template_part( 'template-parts/content', 'none' ); ?>


							<?php endif; ?>

					</main>

					<aside id="sidebar1" class="sidebar col-sm-3" role="complementary">

						<?php get_template_part( 'generic-sidebar'); ?> 
						
					</aside>
			</div> <!-- end row -->

<?php get_footer(); ?>
