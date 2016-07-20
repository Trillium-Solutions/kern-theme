<?php
/*
Template Name: Routes and Schedules
*/
 get_header(); ?>




				
					<?php the_breadcrumb() ?>
					<div id="blue-top-divider"></div>
					<h1 id="page-title" class="over-blue">Routes &amp; Schedules</h1>

						<div id="generic-wide-container" class="row-fluid">
						<div id="mobile-map-holder" class="visible-xs-block col-md-1">
							</div>
							 <div id="routes-left-col" class="col-sm-4" style="padding: 0;">
							 	<div id="routes-page-blurb">
							 		Click a route in the list below or in the map to 
									get its schedule, detailed service maps, and connections.
							 	</div><!-- end #routes-page-blurb -->
							 	
							 	<?php get_template_part( 'routes_and_schedules_table');  
					
?>
							 	
							 </div><!-- end #routes-left-col -->
							 
							
							 
							 	<div id="map-floaty-box" class="col-sm-8 hidden-xs" style="padding: 0;">
									<div id="routes-page-map" class=""  >
										
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
									
									
				
									</div><!-- end #routes-page-map -->
										<script>
					
						$('#routes-page-map').load
								("<?php echo get_site_url(); ?>/wp-content/themes/kern/library/svg/archive-route-map-01.svg?v2", function(data){
									
												
												$(this).css('top','0px');
												$(this).css('min-height','0px');
								 			
								 				$.browser={ msie: function(){
								 							return ( navigator.appName == 'Microsoft Internet Explorer' || 
								 								navigator.userAgent.test(/Trident.*rv[ :]*11\./));
								 						 }
								 						 };


// 												 alert(navigator.userAgent.test(/Trident.*rv[ :]*11\./));
												if ($.browser.msie) {

													var $mapHolder = $('#map-floaty-box');
													var svg = document.getElementById('routes-map');
													var $ratio = svg.getBBox().height/svg.getBBox().width;
													var newHeight = $ratio*$mapHolder.width();
		
													$('#map-floaty-box svg').height(newHeight);
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
								 			$('#mobile-map-holder').html(data);		
								 			
									
									
								}); 
					</script>	
									<style>
									#hovers g, #hovers path,#hovers polygon  {
										cursor: pointer;
									}
									#map-holder {
										position: relative;
										top: -99999px;
										min-height: 400px;
									}
									</style>
									<div id="map-floaty-bottom-gradient">
									</div><!-- end #map-floaty-bottom-gradient -->
								</div> <!-- #map-floaty-box -->
						
							 
			
							<br style="clear:both;" />
						</div><!-- end #generic-wide-container -->
					

			
<?php get_template_part( 'generic-page-bottom'); ?> 
			


<?php get_footer(); 




?>