<?php
/*
Template Name: route_individual_page
*/
 get_header();

 //Used to determine correct fare structure
 $locals = array("140", "142", "145", "210", "220", "223", "225");
 ?>


<?php get_template_part( 'route-header'); ?>

					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<div class="row">
	<h1 id="route-page-title" class="over-blue col-sm-9"><?php the_route_circle(get_field('route_number'),70,3); ?> <?php the_title() ?></h1>
		<div id="route-select-container" class="col-sm-3">
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
									<select id="routes-dropdown" onchange="location = this.options[this.selectedIndex].value;">
									<option value="#">View a different route</option>
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
						</div><!-- class="row" -->

						<div id="generic-wide-container" style="margin-top: 20px">



								<div id="route-locations-served">
									<?php  the_field('locations_served'); ?>
								</div><!-- end #route-locations-served -->


								<?php

								$route_post_id = $post->ID;
								wp_reset_query();

								$alertCount = 0;
								$alert_query = new WP_Query(array(

							"post_type"=>array("alert", 'news'),
							'tax_query' =>
								array(
									array(
										'taxonomy' => 'alert-zone',
										'field' => 'slug',
										'terms' => array(explode('_',get_field('shared_class', $route_post_id ) )[1], 'all', 'all-routes', 'all-dial')

									)
								),


							));



								if ( $alert_query->have_posts() ) { ?>
								<div id="route-alerts"> <?php
										echo '<ul>';
										while ( $alert_query->have_posts() ) {
											$alert_query->the_post();
											?>
												<li  class="minimized">
												<h3 class="route-alert-header <?php if($alertCount > 0) echo 'not-first'; ?>"><i id="alert-icon-black"></i>Service Alert: <?php the_title(); ?><span id="alert-click-message">Click to Expand</span></h3>
												<div id="alert-content" style="display:none;">
												<?php
													the_content();

												?>
												<div id="route-alert-link">
													<a href="<?php the_permalink(); ?>">Go to Alert Page >></a>
												</div><!-- end #route-alert-link -->

												</div><!-- end #alert-content -->
												</li>
												<?php
												$alertCount ++;
										}
										echo '</ul></div><!-- end #route-alerts -->';
									}
							wp_reset_postdata();

							?>

											<br style="clear:both;" />
											<hr />
											<div id="route-nav">
											<ul id="route-anchors" <?php
											if (get_field('route_number') == '100') {
												echo 'class="route-anchors-100"';
											}
											?>>
												<li><a href="#schedules">Schedules</a></li>
												<li><a href="#maps">Detail Maps</a></li>
												<li><a href="#connections">Kern Transit Connections</a></li>
												<li><a href="#external-connections">External Connections</a></li>
											</ul>

											<div id="route-fares-holder" style="background-color: <?php the_field('hex_route_color'); ?>">
											<table id="single-route-fares">
												<?php
												if (get_field('route_number') == '100'):
												?>
												<tr>
													<th class="mini-label">Fare</th>
													<th>General</th>
													<th>Reduced</th>
												</tr>
												<tr>
													<td>Intercommunity</td>
													<td>$3.00</td>
													<td>$1.50</td>
												</tr>
												<tr>
													<td>Cross-County</td>
													<td>$5.00</td>
													<td>$2.50</td>
												</tr>
												<?php
												else:
												?>
												<tr>
													<th></th>
													<th>General</th>
													<th>Reduced</th>
												</tr>
												<tr>
													<td class="mini-label"><a href="<?php echo get_site_url(); ?>/fares">Fare</a></td>
													<?php
													if (in_array(get_field('route_number'),  $locals)) :
													?>
													<td>$2.00</td>
													<td>$1.00</td>
												<?php else: ?>
													<td>$3.00</td>
													<td>$1.50</td>
												<?php endif; ?>
												</tr>
											<?php endif; ?>
											</table>
										</div>
											<br style="clear: both;" />
										</div>
										<div class="route-info-box timetables">
											<h2 style="border-left: 13px solid <?php the_field('hex_route_color'); ?>; border-right: 13px solid <?php the_field('hex_route_color'); ?>">
											<a name="schedules"></a>
											<div id="h2-inner">Schedules</div>

												<div id="route_days_of_week">
														<?php  the_field('days_of_week'); ?>

												</div>
												<?php if (get_field('schedule_pdf')) : ?>
													<span class="span-small-title">
														<a href="<?php the_field('schedule_pdf'); ?>">Download Schedule (PDF)</a>
													</span>
													<?php endif; ?>
												<br style="clear:both; margin: 0px;" />
											</h2>

											<?php

											$args = array(
												'numberposts' => -1,
												'post_type' => 'timetable',
												'meta_key' => 'shared_class',
												'meta_value' => get_field( 'shared_class')
											);

											// get results
											$the_query = new WP_Query( $args );

											// The Loop
											?>
											<?php if( $the_query->have_posts() ): ?>

												<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
												<div class="table-responsive">
												<?php the_content(); ?>
												</div><!-- table-reponsive -->
												<?php endwhile; ?>

											<?php endif; ?>

											<?php wp_reset_query();

											?>
											<p>
											REQ = Request stop only. Must coordinate with agency.<br />
                      &bullet; = Bus may stop at these locations, in addition to the timed stops.<br />
                      &darr; = Bus does not stop.
											</p>

										</div><!-- end #route-info-box -->


									<!--	<div class="route-info-box">

										<h2 style="border-left: 13px solid <?php the_field('hex_route_color'); ?>">Connections</h2>

										<?php

										$explodedConnections = explode(',', get_field('connections'));
										foreach($explodedConnections as &$one_connection) {
								//	echo $one_connection;
	/*
										$args = array(
	'numberposts' => -1,
	'post_type' => 'route',
	'meta_key' => 'route_number',
	'meta_value' => $one_connection
);

// get results
$the_query = new WP_Query( $args );

// The Loop
?>
<?php if( $the_query->have_posts() ): ?>
	<ul>
	<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
		<li>
				<li>

		</li>
	<?php endwhile; ?>
	</ul>
<?php endif; ?>

<?php wp_reset_query();  // Restore global post data stomped by the_post(). ?>
				*/

										}



										?>
																					<br style="clear: both;" />
										</div> --><!-- end #route-info-box -->

										<br style="clear: both;" />



								<div id="timetable-detail-maps">

								<h2 style="border-left: 13px solid <?php the_field('hex_route_color'); ?>; border-right: 13px solid <?php the_field('hex_route_color'); ?>">
											<span class"span-title">Route Map</span>
											<a name="maps"></a>
											<br style="clear: both;" />
									</h2>

									<?
                  $routeNumber = get_field('route_number',$post->ID);
                  $num2ID = array(
                    '100' => '1166',
                    '110' => '1161',
                    '220' => '1374',
                    '223' => '1372',
                    '225' => '1369',
                    '227' => '1173',
                    '230' => '1367',
                    '240' => '1175',
                    '250' => '1167',
                    '115' => '1168',
                    '120' => '1162',
                    '130' => '1164',
                    '140' => '1163',
                    '145' => '1366',
                    '150' => '1368',
                    '210' => '1171'
                  );
                  ?>
                  <div id="route-map">
                    <iframe src="https://maps.trilliumtransit.com/map/feed/kerncounty-ca-us/routes/<?php echo $num2ID[$routeNumber]; ?>?noui=true&page_embed=true"></iframe>
                  </div>

</div><!-- end #timetable-detail-maps -->
			<div class="route-info-box">

<h2 style="border-left: 13px solid <?php the_field('hex_route_color'); ?>; border-right: 13px solid <?php the_field('hex_route_color'); ?>">Kern Transit Connections<a name="connections"></a>	</h2>

<ul id="internal-connections">
<?php


$connections = get_field('connections');
$connectionsSplit = explode(';', $connections);

foreach($connectionsSplit as &$connection) {

	echo '<li>';
	$connectionClean = explode('-',str_replace('_','',$connection))[0];
	//echo $connectionClean;
	echo the_route_circle($connectionClean ,35,2);



		$args = array(
			'numberposts' => -1,
			'post_type' => 'route',
			'meta_key' => 'shared_class',
			'meta_value' => $connection
		);

		// get results
		$the_query = new WP_Query( $args );

		// The Loop
		?>
		<?php if( $the_query->have_posts() ): ?>

			<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

			<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>

			<?php endwhile; ?>

		<?php endif; ?>

		<?php wp_reset_query();

			echo '</li>';

}


if(get_field('external_connections') != '') {
?>

<h2 style="border-left: 13px solid <?php the_field('hex_route_color'); ?>; border-right: 13px solid <?php the_field('hex_route_color'); ?>">External Connections<a name="external-connections"></a> <span class="span-small-title"><a href="<?php echo get_site_url(); ?>/connections"> Go to main connections page >></a></span>	</h2>

<?php

$external_connections = explode('***',get_field('external_connections'));
?>
<ul id="external-connections">
<?php
foreach($external_connections as &$connection) {

	$connection = str_replace(array( '{', '}' ), '', $connection);
	$connectionItems = explode(';', $connection);

	if(sizeof($connectionItems) > 2) {
	echo '<li><strong><a href="'.$connectionItems[2].'">'.$connectionItems[0].'</strong></a><br /> '.$connectionItems[1].'</li>';
	}
	else {
		 echo '<li><strong>'.$connectionItems[0].'</strong><br /> '.$connectionItems[1].'</li>';
	}

}


?>
</ul>

<?php }

?>
<br stlye="clear: both;" />
</ul><!-- end #internal-connections -->
<br stlye="clear: both;" />
</div> <!-- end .route-info-box -->



					<br style="clear: both;">

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

						</div><!-- end #generic-wide-container -->



<?php get_template_part( 'generic-page-bottom'); ?>

<script>
	function doFixedTimetables() {
	    if (! $('body').hasClass('route-template-default')) {
	        return;
	    }
	   $('.route-table tbody').each(function() {
	       var $tableClass = $(this);
	       // Clone the first column, and absolutely position over table.
	       var $fixedColumn = $tableClass.clone().insertBefore($tableClass).addClass('fixed-column');
	       $fixedColumn.find('th:not(:first-child),td:not(:first-child)').remove();
	   });
   }
</script>


<?php get_footer();




?>
