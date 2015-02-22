<?php
/*
Template Name: route_individual_page
*/
 get_header(); ?>

			
<?php get_template_part( 'route-header'); ?> 
			
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?> 
					
	<h1 id="route-page-title" class="over-blue"><i id="icon-lrg-<?php the_field('shared_class'); ?>" class="route-icon"></i><?php the_title() ?></h1>
		<div id="route-select-container">
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
	
						<div id="generic-wide-container">
								

							
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
								
							
										
										
										<div id="pdf-link">
											
											
											<?php
												// add different links here.
												
												$pdfDic = array(
															'Frazier Park' => 'Kern_Transit_Frazier_Park_Guide.pdf',
															'Kern River Valley' => 'Kern_Transit_Kern_River_Guide.pdf',
															'Lamont Area' => 'Kern_Transit_Lamont_Guide.pdf',
															'North Kern' => 'Kern_Transit_North_Kern_Guide.pdf',
															'Taft' => 'Kern_Transit_Taft_Guide.pdf',
															'East Kern' => 'Kern_Transite_East_Kern_Guide.pdf');
												
											?>
											
												<a href="<?php echo get_site_url()."/wp-content/transit-data/route-pdfs/".$pdfDic[get_field('route_pdf_download_filename')]; ?>"><i></i>Download the <?php the_field('route_pdf_download_filename'); ?> route guide [PDF, 4mb]</a>
											</div><!-- end #pdf-link -->
										<div id="route-fares-link">
											<a href="/fares/#<?php the_field('shared_class'); ?>">See fares table for this route >></a>
											
											
											</div>
											<br style="clear:both;" />
											<hr />
											<ul id="route-anchors">
												<li><a href="#schedules">Schedules</a></li>
												<li><a href="#maps">Detail Maps</a></li>
												<li><a href="#connections">Kern Transit Connections</a></li>
												<li><a href="#external-connections">External Connections</a></li>
												<br style="clear: both;" />
											</ul>
										<div class="route-info-box timetables">
											<h2 style="border-left: 13px solid <?php the_field('hex_route_color'); ?>; border-right: 13px solid <?php the_field('hex_route_color'); ?>"> 
											<a name="schedules"></a>
											<div id="h2-inner">Schedules</div>
											
												<div id="route_days_of_week">
														<?php  the_field('days_of_week'); ?>
													
												</div>
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
												
												<?php the_content(); ?>
													
												<?php endwhile; ?>
												
											<?php endif; ?>
 
											<?php wp_reset_query();
											
											?>
											<p>
											↓ = Bus is not scheduled to stop at these locations. <br />
											• = Bus may stop at these locations, in addition to the timed stops. <br />
											REQ = Request stop only. Must coordinate with agency. <br />
											&raquo; = Discharge only. No boarding at this time.
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
											<span class"span-title">Route Detail Maps</span> <span class="span-small-title">(Click a map to expand)</span>
											<a name="maps"></a>
											<br style="clear: both;" />
									</h2>
									
									<? 
							
$savedRoute = get_field('route_number',$post->ID);
$args = array(
    'post_type' => 'attachment', 
    'post_mime_type' =>'image', 
    'post_status' => 'inherit', 
    'posts_per_page' => -1, 
    'meta_key' => 'route_number',
	//'meta_value' => get_field('route_number')
);
 
// get results
$the_query = new WP_Query( $args );
 
// The Loop
?>
<?php if( $the_query->have_posts() ): ?>
	<ul>
	<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
		
		<?php
		if (strpos(get_field('route_number'),$savedRoute) !== false) {
   ?>
    
<li class="route-detail-holder">
			<span class="min"></span><a class="minimized" href="<?php echo wp_get_attachment_image_src( $attachment_id, 'large' )[0]; ?>"><img class="sml" src="<?php echo wp_get_attachment_thumb_url( $post->ID ); ?>" /></a>
			<div class="detail-name"><?php 
				$attachment_meta = wp_prepare_attachment_for_js($post->ID);
				echo $attachment_meta['title'];
				?>
			</div>
			</li>
			<?php
			}?>
		
	<?php endwhile; ?>
	</ul>
	<br style="clear: both;" />
<?php endif; ?>
 
<?php wp_reset_query(); 
?>
</div><!- end #timetable-detail-maps -->
			<div class="route-info-box">
							
<h2 style="border-left: 13px solid <?php the_field('hex_route_color'); ?>; border-right: 13px solid <?php the_field('hex_route_color'); ?>">Kern Transit Connections<a name="connections"></a>	</h2>

<ul id="internal-connections">
<?php


$connections = get_field('connections'); 
$connectionsSplit = explode(';', $connections);

foreach($connectionsSplit as &$connection) {

	echo '<li>';

	echo '<i id="icon-sml-'.$connection.'" class="route-icon"></i>';
	

		
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
			


<?php get_footer(); 




?>