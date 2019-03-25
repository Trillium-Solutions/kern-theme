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
<div class='mobile-route-buttons'>
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
        <ul class='mobile-route-buttons-list'>
        <?php
            while ( $query->have_posts() ) {
                $query->the_post();
                
                ?>
                    <li 
                        class='mobile-route-buttons-list__button'
                        style='background: <?php the_field('hex_route_color'); ?>;
                        color: <?php the_field('route_text_color'); ?>;'
                    >
                    <a href=' <?php the_permalink(); ?>'>
                        <?php the_field('route_number'); echo " - "; the_title(); ?>
                    </a>
            </li>
                        
                
            <?php
            }
            ?>
            </ul>
            <?php
        }  
        wp_reset_postdata();
    ?>
</div>
						</div><!-- end #generic-wide-container -->



<?php get_template_part( 'generic-page-bottom'); ?>



<?php get_footer();




?>
