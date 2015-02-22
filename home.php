<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap cf">

			
					<div id="home-desktop-map-container" class="mapWidth1151"> 
						
						<div id="map-background">
							<div id="map-hovers">
								<?php get_template_part( 'mapAreaCoords'); ?> 
							</div><!-- end #map-hovers -->
						</div> <!-- end #map-background -->
					<div id="planner-wrap">
						<div id="trip-planner-container" class="minimized">
							<?php get_template_part( 'home-planner'); ?>
						
		
						</div> <!-- end #trip-planner-container -->
						<div id="planner-expand-contract-tab" class="minimized">expand</div>
						</div><!-- end #planner-wrap -->
						
						<div id="drop-down-info-text-wrap">
							&#9660; Click a route for details
						</div><!-- end #drop-down-info-text -->
						
						<?php  $count_posts = get_alertCount(); 
						if($count_posts > 0) { ?>
						<div id="map-alerts-wrap">
						
							<i id="alerts-icon"> </i> <a href="<?php echo get_site_url(); ?>/alerts">Alerts<? if($count_posts > 0) { echo '('.$count_posts.')'; } ?></a> 
						</div> <!-- end #map-alerts-wrap -->
						<?php
						} else {
						
						?>
							<div id="map-alerts-wrap" class="no-alerts">
						
							No service alerts at this time.
						</div> <!-- end #map-alerts-wrap -->
						<?php
						
						}
						?>
					
					</div><!-- end #home-desktop-map-container -->

						<div id="home-secondary-container">
							<div id="secondard-links-row" >
								
								<div id="how-to-ride-links" class="secondary-col">
								<h2>How to Ride</h2>
								<ul>
								<li><a href="<?php echo get_permalink( 1267 ); ?>" ><i id="connections-icon"></i>Connections</a></li>
							<!--	<li><a href="<?php echo get_permalink( 7 ); ?>" ><i id="dial-a-ride-icon"></i>Dial-A-Ride</a></li>-->
								<li><a href="<?php echo get_permalink( 5 ); ?>" ><i id="accessibility-icon"></i>Accessibility</a></li>
								<li><a href="<?php echo get_permalink( 9 ); ?>" ><i id="bikes-on-buses-icon"></i>Bikes on Buses</a></li>
								<li><a href="<?php echo get_permalink(11 ); ?>" ><i id="passenger-conduct-icon"></i>Passenger Conduct</a></li>
								<li><a href="<?php echo get_permalink( 13 ); ?>" ><i id="mobile-and-desktop-apps-icon"></i>Mobile and Desktop Apps</a></li>
								<li><a href="<?php echo get_permalink( 15); ?>" ><i id="holidays-icon"></i>Holidays</a></li>
								</ul>
								
								
								
								</div><!-- end #how-to-ride-links -->
							
						<div id="home-news-area" class="secondary-col" >
						<h2>News</h2>
						<?php
							
								
							$query = new WP_Query(array(
							'posts_per_page' => 3,
							"post_type"=>"news", 
								

							));

						
						
								if ( $query->have_posts() ) {
									?>
									<ul>
									<?php
									
										while ( $query->have_posts() ) {
											$query->the_post();
											
											?>
												<li class="home-news-outer" >
													 <a href="<?php the_permalink(); ?>" class="home-news-inner">
									   
														 <i></i> <?php the_title(); ?>
										 
													 </a>
												</li>	
											
										<?php
										}
										?>
										</ul>
										<?php
									}  
							wp_reset_postdata();
							?>
						
						<div id="home-more-news"><a href="./news">See More News >></a></div>
						
					</div> <!-- end #home-news-area -->
								<div id="right-secondary-links" class="secondary-col">

								<?php wp_nav_menu( array( 'theme_location' => 'secondary-link-right-menu' ) ); ?>


						</div><!-- end #right-secondary-links -->
							
							</div> <!-- end #secondary-links-row -->
							<br style="clear: both;" />
														<div id="home-description-of-services">
							Kern Transit provides passenger bus service between and in the rural communities of Kern County. There are 17 fixed transit routes, and Dial-A-Ride (DAR) service is available in most communities. The transit system offers intercity service between Arvin, Bakersfield, Bodfish, Boron, Buttonwillow, California City, Delano, Edwards, Frazier Park, Inyokern, Keene, Kernville, Lake Isabella, Lamont, Lebec, Lost Hills, McFarland, Mojave, Onyx, Ridgecrest, Rosamond, Shafter, Taft, Tehachapi, Wasco, Weldon, and Wofford Heights, along with local transit service. Connections to Metrolink in Lancaster are also available. Kern Transit is a division of the Kern County Roads Department.
							&nbsp;<a href="<?php echo get_permalink( 56); ?>" >More About Kern Transit</a>
							</div> <!-- end #home-description-of-services -->
						
						
						</div><!-- end #home-secondary-container -->
					

				</div>

			</div>


<?php get_footer(); ?>
