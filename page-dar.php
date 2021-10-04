<?php
/*
Template Name: Dial-A-Ride
*/
 get_header(); ?>
		
 	<?php the_breadcrumb() ?> 

	<div id="blue-top-divider"></div>
		<header>
			<div class="header-container">
				<h1 id="route-page-title" class="over-blue col-sm-9">Dial-A-Ride Services</h1>
				<div class="route-select-container" class="col-sm-3" >
						<?php darSelect(); ?>				
				</div><!-- end .route-select-container -->
			</div>	 			
		</header>
			
			<div id="generic-wide-container"  class="row-fluid">
				<main>
					<section id="route-map">
						<iframe 
							src="https://new-maps.trilliumtransit.com/map/feed/kerncounty-ca-us?hiddenRoutes=1166,1161,1162,1163,1164,1366,1368,1374,1173,1367,1175,1167,1168&activeLayers=kerncounty-ca-us:frazier-park-dial-a-ride,kern-river-valley-dial-a-ride,lamont-dial-a-ride,bakersfield-medical-dial-a-ride,mojave-dial-a-ride,rosamond-dial-a-ride,tehachapi-dial-a-ride">
						</iframe>
					</section>
										
					<section id="route-page-connections">
						<?php the_content(); ?>
					</section>
				</main>	
			</div><!-- end #generic-wide-container -->
					
		<?php get_template_part( 'generic-page-bottom'); ?> 
			
<?php get_footer(); 




?>