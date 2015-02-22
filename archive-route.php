<?php
/*
Template Name: Routes and Schedules
*/
 get_header(); ?>

<div id="content">

				<div id="inner-content" class="wrap cf">
				
					<?php the_breadcrumb() ?>
					<div id="blue-top-divider"></div>
					<h1 id="page-title" class="over-blue">Routes &amp; Schedules</h1>

						<div id="generic-wide-container">
							 <div id="routes-left-col">
							 	<div id="routes-page-blurb">
							 		Click a route in the list below or in the map to 
									get its schedule, detailed service maps, and connections.
							 	</div><!-- end #routes-page-blurb -->
							 	
							 	<?php get_template_part( 'routes_and_schedules_table');  
					
?>
							 	
							 </div><!-- end #routes-left-col -->
							 

							 
							 	<div id="map-floaty-box">
									<div id="routes-page-map" class="mapWidth735" >
											<div id="sml-map-background">
												<div id="map-hovers">
													<?php get_template_part( 'sml_mapAreaCoords'); ?> 
												</div><!-- end #map-hovers -->
											</div> <!-- end #map-background --> 
									</div><!-- end #routes-page-map -->
									<div id="map-floaty-bottom-gradient">
									</div><!-- end #map-floaty-bottom-gradient -->
								</div> <!-- #map-floaty-box -->
						
							 
				<!--	<div id="route-page-connections">
					<h2>Connections</h2>
					</div><!-- end #route-page-connections -->
							-->
							<br style="clear:both;" />
						</div><!-- end #generic-wide-container -->
					

			
<?php get_template_part( 'generic-page-bottom'); ?> 
			


<?php get_footer(); 




?>