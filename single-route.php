<?php
/*
Template Name: route_individual_page
*/
 get_header();

 ?>
            <?php the_breadcrumb() ?> 
				<div id="blue-top-divider"></div>
				
                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                        <header class="header-container">
                            <?php the_route_title('class="col-sm-9"'); ?>
                       
                            <div class="route-select-container">
                            
								<?php routeSelect(); ?>

                            </div><!-- end .route-select-container -->
                        </header><!-- class="row" -->

                        <div id="generic-wide-container" style="margin-top: 20px">
                                <main id="content">

                                    <section id="route-locations-served">
                                        <?php  the_field('locations_served'); ?>
                                    </section><!-- end #route-locations-served -->

                                    <section id="route-alerts"> 
            
                                        <?php 
                                            tcp_do_alerts( array('collapse' => true, 'route-circles' => false, 'use_button' => true ) ); 
                                        ?>

                                    </section><!--route-alerts -->
                                    
                                

                                    <nav id="route-nav" role="navigation" style="background-color: #<?php the_field("route_color"); ?>">
                                        <ul id="route-anchors">
                                            <li><a href="#schedules">Schedules</a></li>
                                            <li><a href="#timetable-detail-maps">Detail Maps</a></li>
                                            <li><a href="#internal-connections">Kern Transit Connections</a></li>
                                            <li><a href="#external-connections">External Connections</a></li>
                                            <li><a href="/fares">Fares</a></li>
                                        </ul>

                                        <?php fare_table(); ?>
                                    
                                    </nav><!-- #route-nav -->
                                 
                                    <div class="route-info-box timetables">
                                        <h2 class="span-text">
                                    
                                        <div id="h2-inner">Schedules</div>

                                            <div id="route_days_of_week">
                                                <?php the_field('days_of_week'); ?>
                                            </div>
                                            <?php if (get_field('schedule_pdf')) : ?>
                                                <span class="span-small-title">
                                                    <a href="<?php the_field('schedule_pdf'); ?>">Download Schedule (PDF)</a>
                                                </span>
                                                <?php endif; ?>
                                                <br style="clear:both;" />
                                        </h2>

                                        <?php the_timetables()?>
                                        <?php the_content() ?>

                                    </div><!-- end #route-info-box -->

                                    <div id="timetable-detail-maps">
                                        <h2 class="span-text"> Route Map</h2>  
                                    </div><!-- end #timetable-detail-maps -->
                                    
                                    <?php the_interactive_map( 'kerncounty-ca-us', array( get_post_meta( get_the_ID(), 'route_id', true )) ); ?>

                                    <?php

                                    if (have_rows('kern_connections')): ?>
                                     <div class="route-info-box">

                                        <h2>Kern Transit Connections</h2>

                                            <ul id="internal-connections">

                                                <?php while 
                                                    (have_rows('kern_connections')): the_row();
                                                            echo '<li>';    
                                                                printf('<a href="%s" class="btn-link">%s</a>',
                                                                    get_sub_field('connection_link'), get_sub_field('connection_name'));
                                                    endwhile;
                                                            echo '</li>';
                                                    endif;
                                                ?>

                                                <?php wp_reset_query(); ?>

                                             </ul><!-- end #internal-connections -->

                                                <?php 
                                                    if (have_rows('external_connections')): ?>

                                                    <h2>
                                                        External Connections
                                                        <span class="span-small-title">
                                                                <a href="/connections"> Go to main connections page >></a>
                                                        </span> 
                                                    </h2>
                                                               
                                                        <ul id="external-connections">

                                                            <?php while 
                                                                (have_rows('external_connections')): the_row();
                                                                    echo '<li>';    
                                                                        printf('<a href="%s" class="btn-link">%s</a> <div>%s</div>',
                                                                            get_sub_field('connection_link'), get_sub_field('connection_name'),get_sub_field('connection_description') );
                                                                endwhile;
                                                                    echo '</li>';
                                                                endif 
                                                            ?>

                                                            <?php wp_reset_query(); ?>

                                                        </ul><!-- end #external-connections -->

                                     </div> <!-- end .route-info-box -->

                                    <?php endwhile; ?>

                                    <?php endif; ?>
                                </main>
                        </div><!-- end #generic-wide-container -->

        <?php get_footer(); ?>














