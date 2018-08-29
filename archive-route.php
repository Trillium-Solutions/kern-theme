<?php
/*
Template Name: Routes and Schedules
*/
 get_header(); ?>





					<?php the_breadcrumb() ?>
					<div id="blue-top-divider"></div>
					<h1 id="page-title" class="over-blue">Routes &amp; Schedules</h1>

						<div id="generic-wide-container" class="row-fluid">
              <div id="route-map">
                <iframe src="https://maps.trilliumtransit.com/map/feed/kerncounty-ca-us/"></iframe>
              </div>
						</div><!-- end #generic-wide-container -->



<?php get_template_part( 'generic-page-bottom'); ?>



<?php get_footer();




?>
