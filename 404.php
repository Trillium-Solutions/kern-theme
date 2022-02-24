<?php 
/** 
 * The template for displaying 404 pages (not found)
 *
 * 
 *
 */


get_header(); ?>

			<div id="content" class="content-container">

				<div id="inner-content" class="wrap cf">

					<main class="m-all t-2of3 d-5of7 cf main" role="main">

						<article id="post-not-found" class="hentry cf">

							<header class="article-header">

								<h1><?php _e( 'Epic 404 - Article Not Found', 'bonestheme' ); ?></h1>

							</header>

							<section class="entry-content">

								<p><?php _e( 'The article you were looking for was not found, but maybe try looking again!', 'bonestheme' ); ?></p>

							</section>

							<section class="search">

									<p><?php get_search_form(); ?></p>

							</section>

						</article>

					</main>

				</div>

			</div>

<?php get_footer(); ?>
