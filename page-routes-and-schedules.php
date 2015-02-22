<?php
/*
Template Name: Routes and Schedules
*/
 get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap cf">

			
					

						<div id="home-secondary-container">
							<div id="secondard-links-row" >
								
								<div id="how-to-ride-links" class="secondary-col">
								<h2>How to Ride</h2>
								<ul>
								<li><a href="<?php echo get_permalink( 5 ); ?>" ><i id="connections-icon"></i>Connections</a></li>
								<li><a href="<?php echo get_permalink( 7 ); ?>" ><i id="dial-a-ride-icon"></i>Dial-A-Ride</a></li>
								<li><a href="<?php echo get_permalink( 5 ); ?>" ><i id="accessibility-icon"></i>Accessibility</a></li>
								<li><a href="<?php echo get_permalink( 9 ); ?>" ><i id="bikes-on-buses-icon"></i>Bikes on Buses</a></li>
								<li><a href="<?php echo get_permalink(11 ); ?>" ><i id="passenger-conduct-icon"></i>Passenger Conduct</a></li>
								<li><a href="<?php echo get_permalink( 13 ); ?>" ><i id="mobile-and-desktop-apps-icon"></i>Mobile and Desktop Apps</a></li>
								<li><a href="<?php echo get_permalink( 15); ?>" ><i id="holidays-icon"></i>Holidays</a></li>
								</ul>
								
								
								
								</div><!-- end #how-to-ride-links -->
							
						<div id="home-news-area" class="secondary-col" >
						<h2>News</h2>
						<?php query_posts('category_name=news&showposts=3'); ?>
						<ul>
						<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
								<li class="home-news-outer" >
    								 <a href="<?php the_permalink(); ?>" class="home-news-inner">
									   
										 <i></i> <?php the_title(); ?>
										 
									 </a>
						   		</li>
						     
							<?php endwhile; ?>
							</ul>
						
						<div id="home-more-news"><a href="./news">See More News >></a></div>
						<?php endif; ?>
					</div> <!-- end #home-news-area -->
								<div id="right-secondary-links" class="secondary-col">

								<?php wp_nav_menu( array( 'theme_location' => 'secondary-link-right-menu' ) ); ?>


						</div><!-- end #right-secondary-links -->
							
							</div> <!-- end #secondary-links-row -->
							<br style="clear: both;" />
														<div id="home-description-of-services">
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
							<a href="<?php echo get_permalink( 56); ?>" >More About Kern Transit</a>
							</div> <!-- end #home-description-of-services -->
						
						
						</div><!-- end #home-secondary-container -->
					

				</div>

			</div>


<?php get_footer(); 




?>