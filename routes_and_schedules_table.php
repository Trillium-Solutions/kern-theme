


<?php

		 	 wp_reset_query(); 
							 	
					$service_areas = get_terms("service_area");

					//You can use print_r to see the values in the array
					echo "<pre>";
					//print_r($service_areas);
					echo "</pre>";

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
										<i id="icon-sml-<?php echo the_field('shared_class', $post->ID); ?>" class="route-icon-med"></i>
										<div class="route-name" alt="<?php echo the_field('shared_class', $post->ID); ?>"><a href="/routes-and-schedules/<?php $exploded = explode('_',get_field('shared_class', $post->ID)); echo $exploded[1] ?> "><?php echo get_the_title($post->ID); ?></a></div>
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

