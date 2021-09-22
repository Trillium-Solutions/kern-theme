<?php
/*
Template Name: route_individual_page
*/
 get_header();

 //Used to determine correct fare structure
 $locals = array("140", "142", "145", "210", "220", "223", "225");
 ?>


                <?php get_template_part( 'route-header'); ?>

                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                        <div class="header-container">
                            <?php the_route_title('class="col-sm-9"'); ?>
                       
                            <div id="route-select-container">
                            
								<?php routeSelect(); ?>

                            </div><!-- end #route-select-container -->
                        </div><!-- class="row" -->

                        <div id="generic-wide-container" style="margin-top: 20px">

                                <div id="route-locations-served">
                                    <?php  the_field('locations_served'); ?>
                                </div><!-- end #route-locations-served -->


                                    <div id="route-alerts"> 
                                    <?php //get_svg_icon('alert');?>
                                        <!-- Route Alerts -->
                                        
                                        <?php 
                                            //get_svg_icon('alert');
                                            tcp_do_alerts( array('collapse' => true, 'route-circles' => false, 'use_button' => true ) ); 
                                            ?>

                                        </div><!--route-alerts -->
                                    
                                        <br style="clear:both;" />
                                        <hr />
                                        <div id="route-nav">
                                            <ul id="route-anchors" <?php
                                            if (get_field('route_short_name') == '100') {
                                                echo 'class="route-anchors-100"';
                                            }
                                            ?>>
                                                <li><a style="color:#fff;" href="#schedules">Schedules</a></li>
                                                <li><a style="color:#fff;" href="#maps">Detail Maps</a></li>
                                                <li><a style="color:#fff;" href="#connections">Kern Transit Connections</a></li>
                                                <li><a style="color:#fff;" href="#external-connections">External Connections</a></li>
                                                <li><a style="color:#fff;" href="/fares">Fares</a></li>
                                            </ul>

                                            <div id="route-fares-holder" style="background-color: #<?php the_field('route_color'); ?>">
                                                <?php fare_table(); ?>
                                            </div>
                                            <br style="clear: both;" />
                                        </div><!-- #route-nav -->
                                        <div class="route-info-box timetables">
                                            <h2 style="border-left: 13px solid <?php the_field('hex_route_color'); ?>; border-right: 13px solid <?php the_field('hex_route_color'); ?>">
                                            <a name="schedules"></a>
                                            <div id="h2-inner">Schedules</div>

                                                <div id="route_days_of_week">
                                                    <?php the_field('days_of_week'); ?>
                                                </div>
                                                <?php if (get_field('schedule_pdf')) : ?>
                                                    <span class="span-small-title">
                                                        <a href="<?php the_field('schedule_pdf'); ?>">Download Schedule (PDF)</a>
                                                    </span>
                                                    <?php endif; ?>
                                                <br style="clear:both; margin: 0px;" />
                                            </h2>

                                            <?php the_timetables()?>
                                            <p>
                                                REQ = Request stop only. Must coordinate with agency.<br />
                                                &bullet; = Bus may stop at these locations, in addition to the timed stops.<br />
                                                &darr; = Bus does not stop.
                                            </p>

                                        </div><!-- end #route-info-box -->


                                     <div id="timetable-detail-maps">

                                         <h2 style="border-left: 13px solid <?php the_field('hex_route_color'); ?>; border-right: 13px solid <?php the_field('hex_route_color'); ?>">
                                            <span class"span-title">Route Map</span>
                                                <a name="maps"></a>
                                                <br style="clear: both;" />
                                        </h2>

                                    
                                     <?php the_interactive_map( 'kerncounty-ca-us', array( get_post_meta( get_the_ID(), 'route_id', true )) ); ?>
                

                                    </div><!-- end #timetable-detail-maps -->
                                    <?php

                                    if (have_rows('kern_connections')): ?>
                                     <div class="route-info-box">

                                        <h2 style="border-left: 13px solid <?php the_field('hex_route_color'); ?>; border-right: 13px solid 
                                            <?php the_field('hex_route_color'); ?>">Kern Transit Connections
                                                <a name="connections"></a>  
                                        </h2>

                                            <ul id="internal-connections">

                                                    <?php while (have_rows('kern_connections')): the_row();
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

                                                    <h2 style="border-left: 13px solid 
                                                        <?php the_field('hex_route_color'); ?>; border-right: 13px solid 
                                                            <?php the_field('hex_route_color'); ?>">External Connections
                                                                <a name="external-connections"></a> 
                                                            <span class="span-small-title">
                                                                <a href="<?php echo get_site_url(); ?>/connections"> Go to main connections page >></a>
                                                            </span> 
                                                    </h2>

                                            <ul id="internal-connections">

                                            <?php   


                                                while (have_rows('external_connections')): the_row();
                                                            echo '<li>';    
                                                                printf('<a href="%s" class="btn-link">%s</a> <div>%s</div>',

                                                                get_sub_field('connection_link'), get_sub_field('connection_name'),get_sub_field('connection_description') );
                                                endwhile;
                                                            echo '</li>';
                                            

                                                endif ?>


                                                <?php wp_reset_query(); ?>

                                            </ul><!-- end #external-connections -->

                                    </div> <!-- end .route-info-box -->

                                         <?php endwhile; ?>


                                         <?php endif; ?>

                    
                        </div><!-- end #generic-wide-container -->



        <?php get_template_part( 'generic-page-bottom'); ?>




        <?php get_footer(); ?>














