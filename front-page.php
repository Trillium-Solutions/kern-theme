<?php
/**
 * The template for displaying a static front page
 */
	 get_header(); ?>

		<main id="content">
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
					<div class="map-alerts-wrap">
						<i id="alerts-icon"> </i> <a href="<?php echo get_site_url(); ?>/alerts">Alerts<? if($count_posts > 0) { echo '('.$count_posts.')'; } ?></a> 
					</div> <!-- end .map-alerts-wrap -->
					<?php
					} else {
					
					?>
					<div class="no-alerts map-alerts-wrap">
						No service alerts at this time.
					</div> <!-- end .map-alerts-wrap -->
					<?php	
					}
				?>
					
			</div><!-- end #home-desktop-map-container -->

			<!--Mobile-->
			<div id="mobile-map-holder" class="row visible-xs-block">
				<div class="inner">
				<?php $svg = file_get_contents(get_theme_file_path('library/svg/home_map-01.svg'));
				echo $svg;
				?>
				</div>
			</div>
			<div id="home-route-picker" class="hidden-lg hidden-md hidden-sm">
				<div class="row">
					<?php routeSelect()?> 
				</div><!-- end row -->
			</div><!-- end #home-route-picker -->
									
			<div id="home-secondary-container" class="row-fluid"  >
						
				<section id="how-to-ride-links" class="col-sm-4">
					<div id="right-separator" class="hidden-xs"></div>
					<a href="/how-to-ride">
						<h2>How to Ride</h2>
					</a>
						<ul>
							<li><a href="<?php echo get_permalink( 5 ); ?>" ><i id="accessibility-icon"></i>Accessibility</a></li>
<!--	<li><a href="<?php echo get_permalink( 7 ); ?>" ><i id="dial-a-ride-icon"></i>Dial-A-Ride</a></li>-->
							<li><a href="<?php echo get_permalink( 9 ); ?>" ><i id="bikes-on-buses-icon"></i>Bikes on Buses</a></li>
							<li><a href="<?php echo get_permalink( 1267 ); ?>" ><i id="connections-icon"></i>Connections</a></li>
							<li><a href="<?php echo get_permalink( 37 ); ?>" ><svg xmlns="https://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 8 8">
										<path d="M.09 0c-.06 0-.09.04-.09.09v5.81c0 .05.04.09.09.09h5.91l2 2v-7.91c0-.06-.04-.09-.09-.09h-7.81z" />
									</svg>Contact Us</a></li>
							<li><a href="<?php echo get_permalink( 15 ); ?>" ><i id="holidays-icon"></i>Holidays</a></li>
							<li><a href="<?php echo get_permalink( 13 ); ?>" ><i id="mobile-and-desktop-apps-icon"></i>Mobile Apps and Websites</a></li>
							<li><a href="<?php echo get_permalink( 39 ); ?>" ><svg fill="#000000" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 490 490" xml:space="preserve" width="15px" height="15px"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g id="Black_2_"> <path d="M436.406,76.563L367.5,0H53.594v490h382.813V76.563z M84.219,459.375V30.625h269.531v60.806h52.032v367.944H84.219z"></path> <rect x="137.858" y="281.827" width="214.375" height="30.625"></rect> <rect x="137.858" y="335.068" width="214.375" height="30.625"></rect> <rect x="245.046" y="125.256" width="107.187" height="30.625"></rect> <rect x="245.046" y="178.498" width="107.187" height="30.625"></rect> <rect x="137.858" y="231.724" width="214.375" height="30.625"></rect> <rect x="137.767" y="125.287" width="83.928" height="83.928"></rect> </g> </g></svg></i>Newsletter</a></li>
<li><a href="<?php echo get_permalink( 22011 ); ?>" ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path d="M15.91 13.34l2.636-4.026-.454-.406-3.673 3.099c-.675-.138-1.402.068-1.894.618-.736.823-.665 2.088.159 2.824.824.736 2.088.665 2.824-.159.492-.55.615-1.295.402-1.95zm-3.91-10.646v-2.694h4v2.694c-1.439-.243-2.592-.238-4 0zm8.851 2.064l1.407-1.407 1.414 1.414-1.321 1.321c-.462-.484-.964-.927-1.5-1.328zm-18.851 4.242h8v2h-8v-2zm-2 4h8v2h-8v-2zm3 4h7v2h-7v-2zm21-3c0 5.523-4.477 10-10 10-2.79 0-5.3-1.155-7.111-3h3.28c1.138.631 2.439 1 3.831 1 4.411 0 8-3.589 8-8s-3.589-8-8-8c-1.392 0-2.693.369-3.831 1h-3.28c1.811-1.845 4.321-3 7.111-3 5.523 0 10 4.477 10 10z"/></svg></i>Real-Time Bus Stop Predictions</a></li>
							<li><a href="<?php echo get_permalink(11 ); ?>" ><i id="passenger-conduct-icon"></i>Passenger Conduct</a></li>
						</ul>
				</section><!-- end #how-to-ride-links -->

				
				<section id="home-news-area" class="col-sm-4" >
					<a href="/news">
						<h2>News</h2>
					</a>
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
					Kern Transit provides passenger bus service between and within the rural communities of Kern County. Kern Transit provides intercity/regional fixed routes and also Dial-A-Ride (DAR) service within many communities. The transit system offers service for the communities of Arvin, Bakersfield, Boron, Buttonwillow, California City, Delano, Edwards, Frazier Park, Inyokern, Keene, Kernville, Lake Isabella, Lamont, Lebec, Lost Hills, McFarland, Mojave, Onyx, Ridgecrest, Rosamond, Shafter, Taft, Tehachapi, Wasco, Weldon, and Wofford Heights. Connections to Metrolink in Lancaster and Santa Clarita are also available. Kern Transit is a division of the Kern County Public Works Department.
					&nbsp;<a href="<?php echo get_permalink( 56); ?>" >More About Kern Transit</a>
				</section> <!-- end #home-description-of-services -->
				
			</div><!-- end #home-secondary-container -->
		</main>
					
	<?php get_footer(); ?>
