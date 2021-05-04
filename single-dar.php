<?php
/*
Template Name: route_individual_page
*/
 get_header(); ?>

			<style>
  body { margin:0; padding:0; }
  #map { width:100%; height: 450px;}
</style>
<?php get_template_part( 'route-header'); ?> 
			
					<?php if (have_posts()) : while (have_posts()) : the_post(); 
					
					$dar_areas_array = array (

array("Mojave Dial-A-Ride", "East Kern", "Monday thru Saturday", "7:00 AM to 6:00 PM", "dial-mojave", "e0871b", "dial-mojave.json",""),
array("Rosamond Dial-A-Ride", "East Kern", "Monday thru Saturday", "6:30 AM to 5:30 PM", "dial-rosamond", "e0871b", "dial-rosamond.json",""),
array("Tehachapi Dial-A-Ride", "East Kern", "Monday thru Saturday", "5:45 AM to 7:00 PM (Monday-Friday)\r7:30 AM to 5:30 PM (Saturday)", "dial-tehachapi", "e0871b", "dial-tehachapi.json",""),
array("Frazier Park Dial-A-Ride", "Frazier Park", "Monday thru Saturday", "7:15 AM to 5:15 PM", "dial-frazier-park", "25639e", "dial-frazier-park.json","Cuddy Valley, Pinon Pines, Gorman, Lake of the Woods, Lebec, Frazier Park"),
array("Kern River Valley Dial-A-Ride", "Kern River Valley", "Monday thru Saturday", "6:30 AM to 6:30 PM (Monday thru Friday)\r7:45 AM to 6:30 PM (Saturday)", "dial-kern-river-valley", "ed1846", "dial-kern-river-valley.json","Onyx, Riverkern/Kernville North, Kelso Valley, Hillview Acres, Southlake, Mountain Mesa, Bodfish, Lake Isabella, Wofford Heights"),
array("Lamont Dial-A-Ride", "Lamont Area", "Monday thru Sunday", "4:30 AM to 7:00 PM (Monday thru Friday)\r5:30 AM to 7:00 PM (Saturday)\r7:00 AM to 8:00 PM (Sunday)", "dial-lamont", "570961", "dial-lamont.json",""),
array("Lost Hills Dial-A-Ride", "North Kern", "Thursday and Saturday Only", "No hours provided - requires prior day reservation", "dial-lost-hills", "7c51a1", "dial-lost-hills.json","")

);

$the_dar = get_field('shared_class');

$has_map = false;
foreach ($dar_areas_array as &$value) {
	// echo $value[4];
    if ($value[4] == $the_dar) {$the_dar_info = $value; $has_map = true;}
}
					?>
					 
	<div class="row">	
		<h1 id="route-page-title" class="over-blue col-sm-9" >
		<i id="icon-lrg-<?php the_field('shared_class'); ?>" class="route-icon"></i><?php the_title() ?></h1>
		
		
			<div id="route-select-container" class="col-sm-3">
		
				
			<?php
			wp_reset_query(); 
			
			$query = new WP_Query(array(
			'posts_per_page' => -1,
			"post_type"=> "dar", 
			'orderby'		=> 'title',
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
								<option value="<?php echo get_field('shared_class'); ?>"><?php echo the_title(); ?></option>
								
						
						<?php
						}
						?>
						</select>
						<?php
					}  
			wp_reset_postdata();
			?>
		
		</div><!-- end #route-select-container -->
</div><!-- class="row" -->
<div id="generic-wide-container" class="row-fluid">
<div id="dar-info-container" style="padding: 0;" class="col-sm-4 <?php if(!$has_map) {echo 'no-map'; }?>">
				

<div id="dar-cities">
	<?php the_field('cities');  ?>
</div><!-- end #dar-cities -->
<div id="dar-days-of-week">
		<?php  the_field('days_of_week'); ?>
</div><!-- end #dar-days-of-week -->
<div id="dar-times-of-day">
		<?php  the_field('times_of_day'); ?>
</div><!-- end #dar-times-of-day -->
<div id="dar-info">
		<table id="single-route-fares">
			<tr>
				<th></th>
				<th>General</th>
				<th>Reduced</th>
			</tr>
			<tr>
				<td class="mini-label"><a href="<?php echo get_site_url(); ?>/fares">Fare</a></td>
				<td>$2.00</td>
				<td>$1.00</td>
			</tr>
		</table>
</div><!-- end #dar-info -->


		 
		 </div><!-- end #dar-info-container -->
		<div id="dar-map-container" class="col-sm-8" style="padding: 0;" >
		<?php 
		
		
		


		
		 
		if($has_map) { ?>
							<div id='map'></div>
<script>


L.mapbox.accessToken = 'pk.eyJ1IjoidHJpbGxpdW10cmFuc2l0IiwiYSI6ImVUQ2x0blUifQ.2-Z9TGHmyjRzy5GC1J9BTw';
var map = L.mapbox.map('map', 'trilliumtransit.j3p18nh0', {touchZoom:false, scrollWheelZoom:false});


		// set map styles
		// var dashes = '8, 12';

		var default_style = {
			fill: true,
			clickable: true,
			fillOpacity: 0.5,
			weight:5,
			pointerEvents: null
			// dashArray: dashes
			};

		
		// is this necessary
		map._layersMinZoom=map.getZoom();

		
		
		// set up load data function
		// borrowed from stackoverflow.com/questions/2177548/load-json-into-variable
		function load_data(url, dataType, async) {
			dataType = typeof dataType !== 'undefined' ? dataType : "json";
			async = typeof async !== 'undefined' ? async : false;

			var returned_data = null;
			$.ajax({
				'async': async,
				'global': false,
				'url': url,
				'dataType': dataType,
				'success': function (data) {
					returned_data = data;
				}
			});
			return returned_data;
		}
		

var base_json_url = '<?php echo get_site_url();?>/wp-content/transit-data/dar-json/';


<?php 




echo 'var dar_areas_array = new Array(', json_encode($the_dar_info), ');';


?>



var dar_geojson = new Array();
var dar_styles = new Array();
var dar_areas_group = new L.FeatureGroup();


var dar_areas_arrayLength = dar_areas_array.length;
for (var i = 0; i < dar_areas_arrayLength; i++) {
	 
	 dar_styles[i] = $.extend({}, default_style); // Make a simple clone (jQuery)
	 dar_styles[i].color = '#'+dar_areas_array[i][5];
	 dar_styles[i].fillColor = '#'+dar_areas_array[i][5];
	 
	 dar_geojson[i] = L.geoJson(load_data(base_json_url + dar_areas_array[i][6]), {style: dar_styles[i]}).addTo(map);
	 dar_areas_group.addLayer(dar_geojson[i]);

		
}
		
	map.fitBounds(dar_areas_group.getBounds());

	function highlight_dar(dar_id) {
	
	var highlight_style = {
		color: '#'+dar_areas_array[dar_id][5],
		fillColor: '#'+dar_areas_array[dar_id][5],
		fill: true,
		fillOpacity: 0.7,
		weight:20
		};
	
	dar_geojson[dar_id].setStyle(highlight_style);
	}
	
	function unhighlight_dar(dar_id) {
	
	dar_geojson[dar_id].setStyle(dar_styles[dar_id]);
	}


</script>
<?php } else {

echo '<div id="no-map">No map available.</div>';
} ?>
</div><!-- end #dar-map-container -->


<script>


$( document ).ready(function() {

for (var i = 0; i < dar_areas_arrayLength; i++) {

$('#key').append( '<div id="'+dar_areas_array[i][4]+'_key" onmouseover="highlight_dar('+i+');" onmouseout="unhighlight_dar('+i+');" class="key-item" style="margin:20px;float:left;padding:10px;width:200px;border: 5px solid #'+dar_areas_array[i][5]+'"><h3>'+dar_areas_array[i][0]+'</h3><h4>'+dar_areas_array[i][2]+'</h4><p>'+dar_areas_array[i][7]+'</p><p>'+dar_areas_array[i][3]+'</p>' );
}

});



</script>	


							<?php endwhile; else : ?>

									<article id="post-not-found" class="hentry cf">
										<header class="article-header">
											<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
										</header>
										<section class="entry-content">
											<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
										</section>
										<footer class="article-footer">
												<p><?php _e( 'This is the error message in the page.php template.', 'bonestheme' ); ?></p>
										</footer>
									</article>

						
							<?php endif; ?>
						
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