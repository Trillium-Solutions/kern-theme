


<?php

		 	 wp_reset_query(); 
							 	
					$service_areas = get_terms("service_area");
;

					//Loop through each service_area
					

							//Search posts with the service_area name
							?> 
							<div class="area-box " id="">



<ul>

<?php
						$query = new WP_Query(array(

							"post_type"=>"route", 
							"posts_per_page"=> -1,
								'meta_key'		=> 'route_number',
								'orderby'		=> 'meta_value',
								'order'			=> 'ASC'

							));

						
						
						if ( $query->have_posts() ) {
								echo '<ul>';
								while ( $query->have_posts() ) {
									$query->the_post();
									?>
										<li>
								<!--		<i id="icon-sml-<?php echo the_field('shared_class', $post->ID); ?>" class="route-icon-med"></i>-->
										
										<?php the_route_circle(get_field('route_number'), 35, 2); ?>
										<div class="route-name" alt="<?php echo the_field('shared_class', $post->ID); ?>"><a href="<?php echo get_site_url(); ?>/routes-and-schedules/<?php $exploded = explode('_',get_field('shared_class', $post->ID)); echo $exploded[1] ?> "><?php echo get_the_title($post->ID); ?></a></div>
										<div class="route-days-of-week"><?php echo the_field('days_of_week', $post->ID); ?></div>
										</li>
										<?php
								}
								echo '</ul>';
							} else {
								// no posts found
							}
							
							?>
							</ul>
</div><!-- end #id -->
<?php

					
					
					?>

