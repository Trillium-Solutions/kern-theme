<?php
/*
Template Name: Dial-A-Ride
*/
 get_header(); ?>

			
<style>
  body { margin:0; padding:0; }
  #map { width:100%; height: 450px;}
</style>

			
<?php get_template_part( 'route-header'); ?> 
			
					 
					
	<h1 id="route-page-title" class="over-blue">Dial-A-Ride Services</h1>
		<div id="route-select-container">
		<?php
							wp_reset_query(); 
								
							$query = new WP_Query(array(
							'posts_per_page' => -1,
							"post_type"		 =>	"dial-a-ride", 
							'meta_key'		=> 'area',
							'orderby'		=> 'meta_value',
							'order'			=> 'ASC'
								

							));

						
						
								if ( $query->have_posts() ) {
									?>
									<select id="routes-dropdown" onchange="location = this.options[this.selectedIndex].value;">
									<option value="#">View a different service</option>
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
							
											</div><!-- end #route-select-container -->
	
						<div id="generic-wide-container"  class="row-fluid">
						
						<div id="routes-left-col" class="col-sm-4" style="padding: 0;">
									<div id="routes-page-blurb">
										Click a Dial-A-Ride service in the list below or in the map to 
										get its detailed service info.
									</div><!-- end #routes-page-blurb -->
										<?php get_template_part( 'dar-table');   ?>
										<div id="key">

										</div>
						
						
						</div> <!-- #end left col -->


									 <!-- For mapbox styles : fixes missing styles error -->
								<meta name='viewport' content='initial-scale=1,maximum-scale=1,user-scalable=no' />
								<script src='https://api.mapbox.com/mapbox.js/v3.3.1/mapbox.js'></script>
								<link href='https://api.mapbox.com/mapbox.js/v3.3.1/mapbox.css' rel='stylesheet' />

								<div id="map-floaty-box" class="col-sm-8 hidden-xs" style="padding: 0;">
									<div id='map'></div>
									<div id="map-floaty-bottom-gradient">
									</div><!-- end #map-floaty-bottom-gradient -->
								</div> <!-- #map-floaty-box -->
								
								<script>
		


								</script>	
					
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
							
							
							
						</div><!-- end #generic-wide-container -->
					
	
			
<?php get_template_part( 'generic-page-bottom'); ?> 
			


<?php get_footer(); 




?>