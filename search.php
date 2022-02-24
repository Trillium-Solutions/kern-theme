<?php get_header(); ?>

<?php get_template_part( 'generic-page-top'); ?> 
			<div id="content" class="content-container">

				<div id="inner-content" class="wrap cf">

					<main class="m-all t-2of3 d-5of7 cf main" role="main">
						
						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class('cf'); ?> role="article">

								<header class="article-header">

									<h3 class="search-title">
										<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
									</h3>

									<?php printf( __( 'Posted <time class="updated" datetime="%1$s" pubdate>%2$s</time> by <span class="author">%3$s</span>', 'kerntheme' ), get_the_time('Y-m-j'), get_the_time(get_option('date_format')), get_the_author_link( get_the_author_meta( 'ID' ) )); ?>
							
								</header>

								<section class="entry-content">
									<?php the_excerpt( '<span class="read-more">' . __( 'Read more &raquo;', 'kerntheme' ) . '</span>' ); ?>
								</section>

								<footer class="article-footer">

									<!-- <?php printf( __( 'Filed under: %1$s', 'kerntheme' ), get_the_category_list(', ') ); ?> -->

									<?php the_tags( '<p class="tags"><span class="tags-title">' . __( 'Tags:', 'kerntheme' ) . '</span> ', ', ', '</p>' ); ?>

								</footer> <!-- end article footer -->

							</article>

							<?php endwhile; ?>

								<?php bones_page_navi(); ?>

							<?php else : ?>

								<?php get_template_part( 'template-parts/content', 'none' ); ?>

							<?php endif; ?>

					</main>

					<aside id="sidebar1" class="sidebar m-all t-1of3 d-2of7 last-col cf" role="complementary">

						<?php get_template_part( 'generic-sidebar'); ?> 
					</aside>

				</div>

			</div>
			
<?php get_footer(); ?>
