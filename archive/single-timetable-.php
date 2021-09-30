<?php
/*
*/
 get_header(); ?>

			
<?php get_template_part( 'route-header'); ?> 


			<?php if (have_posts()) : while (have_posts()) : the_post(); ?> 
			<?php $parent_id = -1;
			// get the parent route by shared class
			get_field( 'shared_class', $post_id );
						$args = array(
							'numberposts' => -1,
							'post_type' => 'route',
							'meta_key' => 'shared_class',
							'meta_value' => get_field( 'shared_class')
						);
			
						// get results
						$the_query = new WP_Query( $args );
			
					if( $the_query->have_posts() ): 
							
							while ( $the_query->have_posts() ) : $the_query->the_post(); 
								$parent_id = $post->ID;
							endwhile; 
							
					endif; 
						
					wp_reset_query();

			?>
			<h1 id="route-page-title" class="over-blue"><i id="icon-lrg-<?php the_field('shared_class'); ?>" class="route-icon"></i><?php echo get_the_title($parent_id) ?>

				<?php 

				echo " - ";
				if (strpos(get_the_title(),'_') !== false) {
					echo ucwords(explode('_',get_the_title())[1]);
				} else {
					echo "Timetable";
				}
				?>
			</h1>
			<div class="route-select-container">
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
										
			</div><!-- end .route-select-container -->
			<br />
			<div id="timetable-return-link"><a href="<?php echo get_the_permalink($parent_id) ?>"><< Back to <?php echo get_the_title($parent_id); ?> Route Page</a></div>
			<div id="generic-wide-container">
			<?php

			$saved_id = $post->ID;
			// get the parent route by shared class
			get_field( 'shared_class', $post_id );
						$args = array(
							'numberposts' => -1,
							'post_type' => 'timetable',
							'meta_key' => 'shared_class',
							'meta_value' => get_field( 'shared_class')
						);
			
						// get results
						$the_query = new WP_Query( $args );
						if(sizeof($the_query->posts)  > 1) {
							if( $the_query->have_posts() ): ?>
								<div id="other-timetables">
									<?php
									echo "<h3>Other Timetables for this Route</h3><ul>";
									while ( $the_query->have_posts() ) : $the_query->the_post(); 
										
										if($saved_id !== $post->ID) {
										
											$title_length = sizeof(explode('_',get_the_title()));
											?>
											<li><a href="<?php echo get_the_permalink(); ?>"><?php echo ucwords(str_replace('-',' - ',str_replace('_',', &nbsp;',get_the_title() ) )); ?></a></li>
											<?php
										}
									endwhile; 
									?>
									</ul>
									<?php
									endif; 
									?>
								</div><!-- end #other-timetables -->
							<?php
							} else {
							?>
							<br />
							<?php
							
							}
						
					wp_reset_query();

			?>


		<?php

		?>


						<div id="timetable-content" class="timetable-left-marg">
							<?php the_content(); ?>
						</div><!-- end #timetable-content -->
						<br style="clear: both;" />
						
							<?php endwhile; else : ?>

									<article id="post-not-found" class="hentry cf">
										<header class="article-header">
											<h1><?php _e( 'Oops, Post Not Found!', 'kerntheme' ); ?></h1>
										</header>
										<section class="entry-content">
											<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'kerntheme' ); ?></p>
										</section>
										<footer class="article-footer">
												<p><?php _e( 'This is the error message in the page.php template.', 'kerntheme' ); ?></p>
										</footer>
									</article>

						
							<?php endif; ?>
							<div id="timetable-detail-maps">
									<h2>Route Detail Maps (Click to expand)</h2>
									
									<? 
							
									$savedRoute = get_field('route_number',$parent_id);
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
												<span class="min"></span>
												<a class="minimized" href="<?php echo wp_get_attachment_image_src( $attachment_id, 'large' )[0]; ?>"><img class="sml" src="<?php echo wp_get_attachment_thumb_url( $post->ID ); ?>" /></a>
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
																
						</div><!-- end #generic-wide-container -->
 
			


<?php get_footer(); 




?>
