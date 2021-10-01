<?php 

/*
Template Name: Reports
*/

    get_header(); ?>

			<?php get_template_part( 'generic-page-top'); ?> 
			
			<div class="row-fluid" id="page-holder">
				<main id="main" class="col-sm-9" role="main">

					<?php if (have_posts()) : while (have_posts()) : the_post(); 
							?>
									
                        <?php 
                            $archive_year = date("Y");
                            if(isset($_GET['archiveyear'])) {
                            $archive_year = sanitize_text_field($_GET['archiveyear']);
                            }
                            ?>

                            <form method="get" action="" role="form">
                                <label for="archiveyear">Show different year: </label>
                                    <select name="archiveyear" id="archiveyear">
                                        <?php
                                        $cur = date("Y");
                                        $first = 2011;
                                        $range = range($cur, $first);
                                        foreach($range as $r) {
                                        echo '<option value="'.$r.'">'.$r.'</option>';
                                        }
                                        ?>
                                    </select>
                                <input type="submit" value="Get Reports">
                            </form>

                            <?php
                                $start = $archive_year . '0101';
                                $end = $archive_year . '1231';
                                $args = array(
                                    'post_type' => 'reports',
                                    'meta_key' => 'posted_on',
                                    'order' => 'DESC',
                                    'orderby' => 'meta_value_num',
                                    'posts_per_page' => -1,
                                    'meta_query'	=> array(
                                                'relation' => 'AND',
                                                array(
                                                    'key' => 'posted_on',
                                                    'value' => $start,
                                                    'compare' => '>=',
                                                    'type' => 'NUMERIC',
                                                ),
                                                array(
                                                    'key' => 'posted_on',
                                                    'value' => $end,
                                                    'compare' => '<=',
                                                    'type' => 'NUMERIC',
                                                ),
                                            )
                            );
                            $q = new WP_Query($args);
                            if ( $q->have_posts() ) : ?>

                                <h2><?php echo $archive_year; ?> Reports</h2>

                                <?php while ($q->have_posts() ) : $q->the_post(); ?>

                                <table class="table">
                                    <caption class="screen-reader-text">Reports</caption>
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Title</th>
                                            <th>PDF</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <?php the_field('posted_on'); ?>
                                            </td>
                                            <?php if (have_rows('report_items')) : while (have_rows('report_items')) : the_row(); ?>
                                        
                                            <td>
                                                <?php the_sub_field('title'); ?>
                                            </td>
                                            <td>
                                                <a href="<?php the_sub_field('file'); ?>" target="_blank">
                                                View Report
                                            </td>
                                        </tr>
                                        <?php endwhile; endif; ?>
                                    </tbody>
                                </table>

                            <?php endwhile; wp_reset_postdata(); ?>

                            <?php else: ?>

                                <p>No reports are available from <?php echo $archive_year; ?></p>

                            <?php endif; ?>


                            <?php endwhile; else : ?>

                                <?php get_template_part( 'template-parts/content', 'none' ); ?>


                            <?php endif; ?>

                </main>

                <aside id="sidebar1" class="sidebar col-sm-3" role="complementary">

                    <?php get_template_part( 'generic-sidebar'); ?> 
                </aside>
			</div> <!-- end row -->

<?php get_footer(); ?>
