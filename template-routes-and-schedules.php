<?php
/*
Template Name: Routes and Schedules
*/
 get_header(); ?>

    <header>
        <?php get_template_part( 'generic-page-top'); ?>

        <div class="header-container">
            <div class="route-select-container">
                            
                <?php routeSelect(); ?>
                
            </div><!-- end .route-select-container -->
        </div>
    </header>
   
    <div id="generic-wide-container">
        <main>
            <div id="route-map">
                <iframe src="https://new-maps.trilliumtransit.com/map/feed/demo-map/"></iframe>
            </div>
        </main>
    </div><!-- end #generic-wide-container -->



<?php get_template_part( 'generic-page-bottom'); ?>

<?php get_footer();

?>
