<?php
/*
Template Name: Dial-A-Ride
*/
 get_header(); ?>
		
 	<?php the_breadcrumb() ?> 
	<div id="blue-top-divider"></div>
		<header>
			<div class="header-container">
				<h1 id="route-page-title" class="over-blue">Dial-A-Ride Services</h1>
				<div class="route-select-container" class="col-sm-3" >
			
						<?php darSelect(); ?>				
				</div><!-- end .route-select-container -->
			</div>	 			
		</header>
			
	
			<div id="generic-wide-container"  class="row-fluid">
				<main>
					<div id="route-map">
						<iframe 
							src="https://new-maps.trilliumtransit.com/map/feed/demo-map?hiddenRoutes=1166,1161,1162,1163,1164,1366,1368,1374,1173,1367,1175,1167,1168&activeLayers=demo-map:frazier-park-dial-a-ride,kern-river-valley-dial-a-ride,lamont-dial-a-ride,lost-hills-dial-a-ride,mojave-dial-a-ride,rosamond-dial-a-ride,tehachapi-dial-a-ride">
						</iframe>
					</div>
							
				
					<div id="route-page-connections">
					<h2>How to Use Dial-A-Ride</h2>
						<ul>
							<li>Dial-A-Ride services are available to all riders.</li>
							<li>All Dial-A-Ride services require a reservation least one day in advance to guarantee your ride.</li>
							<li>Same day service will be provided as available, on a first come, first served basis.</li>
							<li>Dial-A-Ride passengers may board or exit the bus at any safe location within the service area.</li>
							<li>Service is provided on paved and maintained roads ONLY.</li>
						</ul>
					</div><!-- end #route-page-connections -->
				</main>	
			</div><!-- end #generic-wide-container -->
					
		<?php get_template_part( 'generic-page-bottom'); ?> 
			
<?php get_footer(); 




?>