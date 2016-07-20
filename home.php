<?php get_header(); ?>





			
					<div id="home-desktop-map-container" class="collapse"> 
						
						<div id="map-holder" class="collapse">
							<div class="spinner">
									  <div class="bounce1"></div>
									  <div class="bounce2"></div>
									  <div class="bounce3"></div>
									</div>
								
									<style>
									.spinner {
										margin-top: 200px;
									  margin: 100px auto 0;
									  width: 70px;
									  text-align: center;
									}

									.spinner > div {
									  width: 18px;
									  height: 18px;
									  background-color: #333;

									  border-radius: 100%;
									  display: inline-block;
									  -webkit-animation: sk-bouncedelay 1.4s infinite ease-in-out;
									  animation: sk-bouncedelay 1.4s infinite ease-in-out;
									  /* Prevent first frame from flickering when animation starts */
									  -webkit-animation-fill-mode: both;
									  animation-fill-mode: both;
									}

									.spinner .bounce1 {
									  -webkit-animation-delay: -0.32s;
									  animation-delay: -0.32s;
									}

									.spinner .bounce2 {
									  -webkit-animation-delay: -0.16s;
									  animation-delay: -0.16s;
									}

									@-webkit-keyframes sk-bouncedelay {
									  0%, 80%, 100% { -webkit-transform: scale(0.0) }
									  40% { -webkit-transform: scale(1.0) }
									}

									@keyframes sk-bouncedelay {
									  0%, 80%, 100% { 
										transform: scale(0.0);
										-webkit-transform: scale(0.0);
									  } 40% { 
										transform: scale(1.0);
										-webkit-transform: scale(1.0);
									  }
									}
									</style>  
									</div><!-- end map-holder -->
<style>
#hovers g, #hovers path,#hovers polygon  {
	cursor: pointer;
}
#map-holder {
	position: relative;
	top: 200px;
	min-height: 400px;
}
</style>
					<script>

						$('#map-holder').load
								("<?php echo get_site_url(); ?>/wp-content/themes/kern/library/svg/home_map-01.svg?v2", function(data){
									
												$('#mobile-map-holder .inner').html(data);
												$(this).css('top','0px');

												// fixes map width for IE.
								 				$.browser={ msie: ( navigator.appName == 'Microsoft Internet Explorer') ? true : false };

												$.browser={ msie: function(){
								 							return ( navigator.appName == 'Microsoft Internet Explorer' || 
								 								navigator.userAgent.test(/Trident.*rv[ :]*11\./));
								 						 }
								 						 };

												if ($.browser.msie) {

													var $mapHolder = $('#map-holder');
													var svg = document.getElementById('home-map');
													var $ratio = svg.getBBox().height/svg.getBBox().width;
													var newHeight = $ratio*$mapHolder.width();
													
													$('#map-holder svg').height(newHeight);
												}
								 				
								 			
								 				$('#hovers').find('polygon, path, circle, g ').on('mouseenter click', function() {
														var routeNameSplit = $(this).attr('id').replace('_x3','').split('_');
														var routeName = routeNameSplit[0]+'_'+routeNameSplit[1];
														console.log(routeName);
														showHighlight(routeName);
													
		
												}).on('mouseout mouseleave', function() {
													
														hideHighlights();
														
												});
								 			
								 				$('#home-desktop-map-container svg #hovers path').on('mouseover', function() {
								 							//alert($(this).attr('fill'));
								 					 });
								 					 
								 					 $('#hovers').find('polygon, path, circle, g').on('click', function() {
	

														var routeNameSplit = $(this).attr('id').replace('_x3','').split('_');
														var routeName = routeNameSplit[0]+'_'+routeNameSplit[1];
														
														var cleanRouteName = routeNameSplit[0]+routeNameSplit[1];
														var routeLink = cleanRouteName;
														var getUrl = window.location;
			
														window.location = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1] + '/routes-and-schedules/'+routeLink;

		
												});
								 					
								 			
									
									
								}); 
					</script>
					<div id="planner-wrap"  >
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
					<div id="mobile-map-holder" class="row visible-xs-block">
						<div class="inner">
						</div>
							</div>
						<div id="home-route-picker" class="hidden-lg hidden-md hidden-sm" style="margin:20px;">
							<div class="row">
							<?php
							wp_reset_query(); 
								
							$query = new WP_Query(array(
							'posts_per_page' => -1,
							"post_type"=>"route", 
							'meta_key'		=> 'route_number',
							'orderby'		=> 'meta_value',
							'order'			=> 'ASC'
								

							));

						if ( $query->have_posts() ) {
							?>
							<select id="routes-dropdown" onchange="location = this.options[this.selectedIndex].value;" style="width: 100%;">
							<option value="#">View a bus route</option>
							<?php
								while ( $query->have_posts() ) {
									$query->the_post();
									
									?>
										<option value="<?php echo explode('_',get_field('shared_class'))[1]; ?>"><?php the_field('route_number'); echo " - "; the_title(); ?></option>
											
									
								<?php
								}
								?>
								</select>
								<?php
							}  
							wp_reset_postdata();
							?>
							</div><!-- end row -->
						</div><!-- end #home-route-picker -->
						<style>
							#home-banner-row {
								/* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#158ad1+33,074687+99 */
								background: #158ad1; /* Old browsers */
								background: -moz-linear-gradient(45deg,  #158ad1 33%, #074687 99%); /* FF3.6-15 */
								background: -webkit-linear-gradient(45deg,  #158ad1 33%,#074687 99%); /* Chrome10-25,Safari5.1-6 */
								background: linear-gradient(45deg,  #158ad1 33%,#074687 99%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
								filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#158ad1', endColorstr='#074687',GradientType=1 ); /* IE6-9 fallback on horizontal gradient */

							}
						</style>
						<div id="home-banner-row" class="row" style="color: white; border: 1px solid white; margin: 0px; margin-bottom: 15px;" >
							<div class="col-sm-2">
								<img width="90%" style="margin-top: 50px; margin-left: 10%" src="<?php echo get_site_url(); ?>/wp-content/themes/kern/library/images/council-logo.jpg" />
							</div><!-- end col-sm-2 -->
							<div class="home-banner col-sm-10">
								<h1 style="text-align: center;">
									Congratulations 
								</h1>
								<h3 style="text-align: center;">to our own Bob Neath, 2015 recipient of the Kern Council of Governments' 
									prestigious <strong> Darell Hildebrand Distinguished Leadership award!<strong>
								</h3>

								<h4 style="text-align: center; "><a href="http://www.kerncog.org/regional-awards" style="color: white; text-decoration: underline;" >Click here to learn more.</a></h4>
																<br />
							</div><!-- end home banner -->
						</div><!-- end home banner row -->
						<div id="home-banner-row" class="row" style="color: white; border: 1px solid white; margin: 0px; margin-bottom: 15px;" >
							
							<div class="home-banner col-sm-12">
								<h1 style="text-align: center;">
									Public Hearing – Proposed Fare Changes 
								</h1>
								<h3 style="text-align: center;">Tuesday, June 7 at 2:00 p.m: Meeting to discuss new fare structure for all fixed routes and Dial-A-Ride services in Kern County<strong>
								</h3>

								<h4 style="text-align: center; "><a href="http://kerntransit.org/news/public-hearing-proposed-fare-changes/" style="color: white; text-decoration: underline;" >Click here to learn more.</a></h4>
																<br />
							</div><!-- end home banner -->
						</div><!-- end home banner row -->
						
						
						<div id="home-secondary-container" class="row-fluid"  >
								
								<div id="how-to-ride-links" class="col-sm-4">
								<div id="right-separator" class="hidden-xs"></div>
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
							
						<div id="home-news-area" class="col-sm-4" >
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
					<div id="right-secondary-links" class="col-sm-4">
						<div id="left-separator" class="hidden-xs"></div>
								<?php wp_nav_menu( array( 'theme_location' => 'secondary-link-right-menu' ) ); ?>


						</div><!-- end #right-secondary-links -->
							

							<br style="clear: both;" />
							<div id="home-description-of-services">
							Kern Transit provides passenger bus service between and in the rural communities of Kern County. There are 17 fixed transit routes, and Dial-A-Ride (DAR) service is available in most communities. The transit system offers intercity service between Arvin, Bakersfield, Bodfish, Boron, Buttonwillow, California City, Delano, Edwards, Frazier Park, Inyokern, Keene, Kernville, Lake Isabella, Lamont, Lebec, Lost Hills, McFarland, Mojave, Onyx, Ridgecrest, Rosamond, Shafter, Taft, Tehachapi, Wasco, Weldon, and Wofford Heights, along with local transit service. Connections to Metrolink in Lancaster are also available. Kern Transit is a division of the Kern County Roads Department.
							&nbsp;<a href="<?php echo get_permalink( 56); ?>" >More About Kern Transit</a>
							</div> <!-- end #home-description-of-services -->
						
						
						</div><!-- end #home-secondary-container -->
					

				


<?php get_footer(); ?>
