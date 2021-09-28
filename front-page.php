<?php
/**
 * The template for displaying a static front page
 */
	 get_header(); ?>

		<main>
			<div id="home-desktop-map-container"> 
						
				<section id="map-holder">
					<?php $svg = file_get_contents(get_theme_file_path('library/svg/home_map-01.svg'));
					echo $svg;
					?>
				</section><!-- end map-holder -->
				
				<section id="planner-wrap">
					<div id="trip-planner-container" class="minimized">
						<?php get_template_part( 'template-parts/asset', 'planner'); ?>
					</div> <!-- end #trip-planner-container -->
					<div id="planner-expand-contract-tab" class="minimized">expand</div>
				</section><!-- end #planner-wrap -->
			
				<div id="drop-down-info-text-wrap">
					&#9660; Click a route for details
				</div><!-- end #drop-down-info-text -->

				<!--Alerts -->
				<?php
					$alerts = array(
							'post_type'			=> 'alert',
							'posts_per_page'	=>  '-1' ,
							'post_status'       => 'publish',
						);
					?>
					<?php $count_posts = count($alerts); 
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
			<div id="mobile-map-holder" class="row visible-xs-block">
				<div class="inner">
				<?php $svg = file_get_contents(get_theme_file_path('library/svg/home_map-01.svg'));
				echo $svg;
				?>
				</div>
			</div>
			<div id="home-route-picker" class="hidden-lg hidden-md hidden-sm" style="margin:20px;">
				<div class="row">
					<?php routeSelect()?> 
				</div><!-- end row -->
			</div><!-- end #home-route-picker -->
									
			<div id="home-secondary-container" class="row-fluid"  >
						
				<section id="how-to-ride-links" class="col-sm-4">
					<div id="right-separator" class="hidden-xs"></div>
					<h2>How to Ride</h2>
						<ul>
							<li><a href="<?php echo get_permalink( 1267 ); ?>" ><i id="connections-icon"></i>Connections</a></li>
						<!--	<li><a href="<?php echo get_permalink( 7 ); ?>" ><i id="dial-a-ride-icon"></i>Dial-A-Ride</a></li>-->
							<li><a href="<?php echo get_permalink( 5 ); ?>" ><i id="accessibility-icon"></i>Accessibility</a></li>
							<li><a href="<?php echo get_permalink( 9 ); ?>" ><i id="bikes-on-buses-icon"></i>Bikes on Buses</a></li>
							<li><a href="<?php echo get_permalink(11 ); ?>" ><i id="passenger-conduct-icon"></i>Passenger Conduct</a></li>
							<li><a href="<?php echo get_permalink( 13 ); ?>" ><i id="mobile-and-desktop-apps-icon"></i>Mobile and Desktop Apps</a></li>
							<li><a href="<?php echo get_permalink( 15 ); ?>" ><i id="holidays-icon"></i>Holidays</a></li>
							<li><a href="<?php echo get_permalink( 39 ); ?>" ><svg xmlns="https://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 8 8">
								<path d="M0 0v1h8v-1h-8zm0 2v5.91c0 .05.04.09.09.09h7.81c.05 0 .09-.04.09-.09v-5.91h-2.97v1.03h-2.03v-1.03h-3z" />
								</svg>Lost and Found</a>
							</li>
							<li><a href="<?php echo get_permalink( 37 ); ?>" ><svg xmlns="https://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 8 8">
								<path d="M.09 0c-.06 0-.09.04-.09.09v5.81c0 .05.04.09.09.09h5.91l2 2v-7.91c0-.06-.04-.09-.09-.09h-7.81z" />
								</svg>Contact Us</a>
							</li>
						</ul>
				</section><!-- end #how-to-ride-links -->
				
				<section id="home-news-area" class="col-sm-4" >
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
				
				</section> <!-- end #home-news-area -->
				<section id="right-secondary-links" class="col-sm-4">
					<div id="left-separator" class="hidden-xs"></div>
					<a class="twitter-timeline" data-width="340" data-height="300" data-theme="dark" data-link-color="#e68c2b" href="https://twitter.com/KernTransit">Tweets by KernTransit</a> <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
				</section><!-- end #right-secondary-links -->
					
				<br style="clear: both;" />

				<section id="home-description-of-services">
					Kern Transit provides passenger bus service between and in the rural communities of Kern County. There are 16 fixed transit routes, and Dial-A-Ride (DAR) service is available in most communities. The transit system offers intercity service between Arvin, Bakersfield, Bodfish, Boron, Buttonwillow, California City, Delano, Edwards, Frazier Park, Inyokern, Keene, Kernville, Lake Isabella, Lamont, Lebec, Lost Hills, McFarland, Mojave, Onyx, Ridgecrest, Rosamond, Shafter, Taft, Tehachapi, Wasco, Weldon, and Wofford Heights, along with local transit service. Connections to Metrolink in Lancaster are also available. Kern Transit is a division of the Kern County Public Works Department.
					&nbsp;<a href="<?php echo get_permalink( 56); ?>" >More About Kern Transit</a>
				</section> <!-- end #home-description-of-services -->
				
			</div><!-- end #home-secondary-container -->
		</main>
					
	<?php get_footer(); ?>
