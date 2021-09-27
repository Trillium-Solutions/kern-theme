<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * 
 */

 get_header(); ?>

	<?php get_template_part( 'generic-page-top'); ?> 

				<div class="row-fluid" id="page-holder">
						<main id="main" class="col-sm-9" role="main">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article">

								<header class="article-header">

									<h3 class="h2 entry-title">
										<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
										<?php the_title(); ?>
										</a>
									</h3>
									<p class="article-date"> <?php the_date() ;?> </p>

								</header>
								

								<section class="entry-content cf">

									<?php the_post_thumbnail( 'bones-thumb-300' ); ?>

									<?php the_excerpt(); ?>

								</section>

							
							</article>

							<?php endwhile; ?>

								<?php bones_page_navi(); ?>

							<?php else : ?>

								<?php get_template_part( 'template-parts/content', 'none' ); ?>


							<?php endif; ?>

						</main><!-- /#main -->

						<aside id="sidebar1" class="sidebar col-sm-3" role="complementary">

							<?php get_template_part( 'generic-sidebar'); ?> 

						</aside>

				</div>
		
<?php get_footer(); ?>
