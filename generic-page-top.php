
<?php the_breadcrumb() ?>
	<div id="blue-top-divider"></div>
		<?php if(is_archive()) {				
			?>	
			<header>
				<h1 id="page-title" class="over-blue"><?php post_type_archive_title(); ?></h1>
			</header>
			
			<?php
			
			} else if(is_search()) { ?>
					
					<header>
						<h1 id="page-title" class="over-blue"><span><?php _e( 'Search Results for:', 'bonestheme' ); ?></span> <?php echo esc_attr(get_search_query()); ?></h1>
					</header>
			
										
					<?php } else { ?>
					
						<header>
							<h1 id="page-title" class="over-blue"><?php the_title() ?></h1>
						</header>
						
						<?php }  ?>