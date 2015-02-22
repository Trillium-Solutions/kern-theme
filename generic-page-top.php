<div id="content">

				<div id="inner-content" class="wrap cf">
				
					<?php the_breadcrumb() ?>
					<div id="blue-top-divider"></div>
					<?php if(is_archive()) {
					
					?>
					
					<h1 id="page-title" class="over-blue"><?php post_type_archive_title(); ?></h1>
					
					<?php
					
					} else if(is_search()) { ?>
					
					<h1 id="page-title" class="over-blue"><span><?php _e( 'Search Results for:', 'bonestheme' ); ?></span> <?php echo esc_attr(get_search_query()); ?></h1>
					
					
					<?php } else { ?>
					<h1 id="page-title" class="over-blue"><?php the_title() ?></h1>
					
						<?php }  ?>