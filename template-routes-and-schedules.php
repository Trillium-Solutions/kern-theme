<?php
/*
Template Name: Routes and Schedules
*/
 get_header(); ?>


    <?php get_template_part( 'generic-page-top'); ?>

        <div class="header-container">
            <div id="route-select-container">
                            
                <?php routeSelect(); ?>
                
            </div><!-- end #route-select-container -->
        </div>
        
        <div id="generic-wide-container">
            <div id="route-map">
                <iframe src="https://new-maps.trilliumtransit.com/map/feed/demo-map/"></iframe>
            </div>

        </div><!-- end #generic-wide-container -->



    <?php get_template_part( 'generic-page-bottom'); ?>



<?php get_footer();




?>
