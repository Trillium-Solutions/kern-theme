<?php
/*
Template Name: route_individual_page
*/
 			get_header(); ?>

			
					<?php get_template_part( 'route-header'); ?> 
			
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					 
				<div class="header-container">	
					<h1 id="route-page-title" class="over-blue col-sm-9" >
						<?php the_title() ?>
					</h1>
					
					
						<div id="route-select-container" class="col-sm-3">
					
							<?php darSelect(); ?>
						
					
						</div><!-- end #route-select-container -->
				</div><!-- class="header-container" -->
				<div id="generic-wide-container" class="row-fluid">
					<div id="dar-info-container" class="col-sm-4" >
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
								<div class="fare-header"><a href="<?php echo get_site_url(); ?>/fares">Fares</a></div>
								<?php if (have_rows('fares')): ?>
									<table id="single-route-fares">
										<tbody>
										<?php
											while (have_rows('fares')): the_row(); ?>
											<tr>
												<th><?php the_sub_field('fare_type')?></th>
												<td><?php the_sub_field('fare_price'); ?></td>
												
											</tr>
										</tbody>
										<?php endwhile; ?>
									</table>
									<?php else :
										printf('No Fares');
									endif; ?>
							</div><!-- end #dar-info -->
					</div><!-- end #dar-info-container -->

		 

					<div id="dar-map-container" class="col-sm-8" style="padding: 0;" >
						<div id='dar-map'>
							<?php if (get_field('custom_imap_url')) : ?>
								<iframe src="<?php wp_specialchars_decode(the_field('custom_imap_url')); ?>"></iframe>
							<?php else : ?>
								<iframe src="https://maps.trilliumtransit.com/map/feed/demo-map/routes/<?php echo get_post_meta( get_the_ID(), 'custom_id', true ); ?>?noui=true&page_embed=true"></iframe>
							<?php endif; ?>
						</div>

					</div>
			
					<div id="route-page-connections">
					<h2>How to Use Dial-A-Ride</h2>
						<ul>
							<li>Dial-A-Ride services are available to all riders.</li>
							<li>All Dial-A-Ride services require a reservation least one day in advance to guarantee your ride.</li>
							<li>Same day service will be provided as available, on a first come, first served basis.</li>
							<li>Dial-A-Ride passengers may board or exit the bus at any safe location within the service area.</li>
							<li>Service is provided on paved and maintained roads ONLY.</li>
						</ul>
					</div><!-- end #route-page-connections -->
						<?php endwhile; ?>


						<?php endif; ?>
				</div><!-- end #generic-wide-container -->
					
	
			
	<?php get_template_part( 'generic-page-bottom'); ?> 
			

	<?php get_footer(); 




	?>