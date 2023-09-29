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
        <main id="content">
            <section id="route-map">
                <iframe src="https://maps.trilliumtransit.com/map/feed/kerncounty-ca-us/"></iframe>
            </section>
        </main>
    </div><!-- end #generic-wide-container -->



<?php get_template_part( 'generic-page-bottom'); ?>

<?php get_footer();

?>
