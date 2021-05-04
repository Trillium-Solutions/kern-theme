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
								

							<div id="route-left-col">
								<div id="route-locations-served">
									<?php  the_field('locations_served'); ?>
								</div><!-- end #route-locations-served -->
								
								<?php
								
								$route_post_id = $post->ID;
								wp_reset_query(); 
								
								$alert_query = new WP_Query(array(

							"post_type"=>"alert", 
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
												<h3 class="route-alert-header"><i id="alert-icon-black"></i>Service Alert: <?php the_title(); ?></h3>  
												<div id="alert-content" style="display:none;">
												<?php
													the_content();	
												
												?>
												
												</div><!-- end #alert-content -->
												</li>
												<?php
										}
										echo '</ul></div><!-- end #route-alerts -->';
									}  
							wp_reset_postdata();
							
							?>
								
							
										
										
										
										<div class="route-info-box">
											<h2 style="border-left: 13px solid <?php the_field('hex_route_color'); ?>"> Schedules</h2>
											<div id="route_days_of_week">
												<?php  the_field('days_of_week'); ?>
											</div><!-- end #route_days_of_week -->
											<div id="schedule-links">
												<ul>
												
													<?php 
													if (strpos(get_field('timetable_html_file_names'), ',') !== FALSE) {
													
											
													$file_names = explode(',', get_field('timetable_html_file_names'));
														$count = 0;
														foreach(  $file_names as &$html_file_name) {
														?>
														<li>
														<?php
	
															echo '<a href="'.get_the_permalink(intval(explode(",",get_field('timetable_ids'))[$count] )  ) .'"><i></i>'.ucwords(str_replace('-',' - ',str_replace('$',' ',ucwords(explode('.', explode('_', $html_file_name)[1] ) [0])))).'</a>';
														?>
											
														
														</li>
														<?php	
															$count ++;
														}
														
														} else {
														?>
															<li>
															<?php
														
													
															
																echo '<a href="'.get_the_permalink(intval(get_field('timetable_ids') )  ) .'"><i></i>'.str_replace('-', ' ',get_the_title(intval(get_field('timetable_ids')))).'</a>';
															?>
											
														
															</li>
														<?php
														
														
														}
														
														?>
													
												</ul>
																					<br style="clear: both;" />
											</div><!-- end #schedule-links -->
											<div id="route-fares-link">
											<a href="/fares/#<?php the_field('shared_class'); ?>">See fares table for this route >></a>
											</div>

										</div><!-- end #route-info-box -->
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
								
								</div><!-- end #route-left-col -->
								
								<div id="route-side-col">
									<h2>Route Detail Maps (Click to expand)</h2>
									
									<? 
							
$savedRoute = get_field('route_number');
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
			<a href="<?php echo wp_get_attachment_image_src( $attachment_id, 'large' )[0]; ?>"><img src="<?php echo wp_get_attachment_thumb_url( $post->ID ); ?>" /></a>
			</li>
			<?php
			}?>
		
	<?php endwhile; ?>
	</ul>
<?php endif; ?>
 
<?php wp_reset_query(); 
?>
								</div>
					
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