


<?php




		 	 wp_reset_query(); 
							 	
					$service_areas = get_terms("service_area");

					//You can use print_r to see the values in the array
					

					//Loop through each service_area
					$count = 0;
					foreach($service_areas as $service_area){

							//Search posts with the service_area name
							?> 
							<div class="area-box minimized" id="">


<h2><?php echo $service_area->name; ?></h2>
<ul >

<?php
						$query = new WP_Query(array(

							"post_type"=>"dar", 
							'tax_query' => 
								array(
									array(
										'taxonomy' => 'service_area',
										'field' => 'slug',
										'terms' => $service_area->slug
										
									)
								),
									

							));

						
						
						if ( $query->have_posts() ) {
								echo '<ul>';
								
								while ( $query->have_posts() ) {
									$query->the_post();
									?>
										<li onmouseover="highlight_dar(<?php echo $count; ?>);" onmouseout="unhighlight_dar(<?php echo $count; ?>);" class="key-item" >
										<i id="icon-sml-<?php echo the_field('shared_class', $post->ID); ?>" class="route-icon-med"></i>
										<div class="route-name" alt="<?php echo the_field('shared_class', $post->ID); ?>"><a href="<?php echo get_the_permalink($post->ID); ?>"><?php echo get_the_title($post->ID); ?></a></div>
										<div class="route-days-of-week"><?php echo the_field('days_of_week', $post->ID); ?></div>
										</li>
										<?php
										$count ++;
								}
								echo '</ul>';
							} else {
								// no posts found
							}
							
							?>
							</ul>
</div><!-- end #id -->
<?php

					}
					
					?>

