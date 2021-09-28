<?php
/*
*/
 get_header(); ?>

			
<?php get_template_part( 'generic-page-top'); ?> 
			
		<div id="generic-wide-container">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article" itemscope itemtype="https://schema.org/BlogPosting">

				<?php the_content(); ?>
			
			</article>

			<?php endwhile; else : ?>

				<?php get_template_part( 'template-parts/content', 'none' ); ?>

			<?php endif; ?>

			
		</div><!-- end #generic-wide-container -->
					
		
<?php get_template_part( 'generic-page-bottom'); ?> 
			
<?php get_footer(); 

?>