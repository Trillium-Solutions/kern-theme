<?php
/*
*/
	get_header(); ?>
	
		<?php the_breadcrumb() ?> 
			<div id="blue-top-divider"></div>
				
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				
				<header class="header-container">	
					<h1 id="route-page-title" class="over-blue col-sm-9" >
						<?php the_title() ?>
					</h1>
			
					<div class="route-select-container" class="col-sm-3">
						<?php darSelect(); ?>
					</div><!-- end .route-select-container -->
				</header><!-- class="header-container" -->
				<div id="generic-wide-container" class="row-fluid">
					<main>
						<section id="dar-info-container" class="col-sm-4" >
							<div id="dar-cities">
								<?php the_field('cities');  ?>
							</div><!-- end #dar-cities -->
							<div id="dar-days-of-week">
								<?php  the_field('days_of_week'); ?>
							</div><!-- end #dar-days-of-week -->
							<div id="dar-times-of-day">
								<?php  the_field('times_of_day'); ?>
							</div><!-- end #dar-times-of-day -->
							<div id="dar-info">
								<div class="fare-header">
									<a href="/fares">Fares</a>
								</div>
									<?php fare_table(); ?>
							</div><!-- end #dar-info -->
						</section><!-- end #dar-info-container -->

						<section id="dar-map-container" class="col-sm-8" style="padding: 0;" >
							<div id='dar-map'>
								<?php if (get_field('custom_imap_url')) : ?>
									<iframe src="<?php wp_specialchars_decode(the_field('custom_imap_url')); ?>"></iframe>
								<?php else : ?>
									<iframe src="https://maps.trilliumtransit.com/map/feed/demo-map/routes/<?php echo get_post_meta( get_the_ID(), 'custom_id', true ); ?>?noui=true&page_embed=true"></iframe>
								<?php endif; ?>
							</div>
						</section>
			
						<section id="route-page-connections">
							<?php the_content(); ?>
						</section><!-- end #route-page-connections -->
						<?php endwhile; ?>
						
						<?php endif; ?>
					</main>
				</div><!-- end #generic-wide-container -->
					
	<?php get_footer(); 

	?>