<?php get_header(); ?>

			<div id="content" class="content-container">

				<div id="inner-content" class="wrap cf">

						<div class="m-all t-2of3 d-5of7 cf main" role="main">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article">

								<header class="article-header">

									<h1 class="h2 entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
										<p class="byline vcard">
											<?php printf( __( 'Posted', 'kerntheme' ) . ' <time class="updated" datetime="%1$s" pubdate>%2$s</time> ' . __('by', 'kerntheme' ) . ' <span class="author">%3$s</span>', get_the_time('Y-m-j'), get_the_time(get_option('date_format')), get_the_author_link( get_the_author_meta( 'ID' ) )); ?>
										</p>

								</header>

								<section class="entry-content cf">
									<?php the_content(); ?>
								</section>

								<footer class="article-footer cf">
									<p class="footer-comment-count">
										<?php comments_number( __( '<span>No</span> Comments', 'kerntheme' ), __( '<span>One</span> Comment', 'kerntheme' ), _n( '<span>%</span> Comments', '<span>%</span> Comments', get_comments_number(), 'kerntheme' ) );?>
									</p>


									<?php printf( '<p class="footer-category">' . __('filed under', 'kerntheme' ) . ': %1$s</p>' , get_the_category_list(', ') ); ?>

									<?php the_tags( '<p class="footer-tags tags"><span class="tags-title">' . __( 'Tags:', 'kerntheme' ) . '</span> ', ', ', '</p>' ); ?>

								</footer>

							</article>

							<?php endwhile; ?>

									<?php bones_page_navi(); ?>

							<?php else : ?>

									<?php get_template_part( 'template-parts/content', 'none' ); ?>

							<?php endif; ?>

						</div>

					</div>

			</div>
		
<?php get_footer(); ?>
