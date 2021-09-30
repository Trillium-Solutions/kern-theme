<?php
/*
*/

get_header(); ?>

			<?php get_template_part( 'generic-page-top'); ?> 
			
				<div class="row-fluid" id="page-holder">
						<main id="main" class="col-sm-9" role="main">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article" itemscope itemtype="https://schema.org/BlogPosting">

						 	    <section class="fare-tables">
									<table>
										<caption>Single Trip Fares</caption>
										<tr>
											<th></th>
											<th>General</th>
											<th>Reduced</th>
										</tr>
										<tr>
											<td>
												<div class="fare-label">Local Routes</div>  
													+ Dial-a-Ride
											</td>
											<td>$2.00</td>
											<td>$1.00</td>
										</tr>
										<tr>
											<td>
												<div class="fare-label">Intercommunity Routes</div>
											</td>
											<td>$3.00</td>
											<td>$1.50</td>
										</tr>
										<tr>
											<td>
												<div class="fare-label">Cross-County Routes</div>
												(For trips passing through Tehachapi)
											</td>
											<td>$5.00</td>
											<td>$2.50</td>
										</tr>
										<tr>
											<td>(For trips passing through Frazier Park)</td>
											<td>$5.00</td>
											<td>$2.50</td>
										</tr>
									</table>
									
									<table>
										<caption>31-Day Pass</caption>
										<tr>
											<th></th>
											<th>General</th>
											<th>Reduced</th>
										</tr>
										<tr>
											<td>
												<div class="fare-label">All Routes</div> 
												+ Dial-a-Ride
											</td>
											<td>$65.00</td>
											<td>$32.50</td>
										</tr>
										<tr>
											<td>
												<div class="fare-label">Local Routes Only</div> 
												+ Dial-a-Ride
											</td>
											<td>$45.00</td>
											<td>$22.50</td>
										</tr>
									</table>
									<div class="table-bottom-info">
										The reduced fare is available for youth (K-12th) with proper identification, and for seniors (62+) and disabled passengers with a Kern Transit "Reduced Fare Card." Up to two (2) pre-K children may ride for free with each paying adult.
									</div>
									</section>
									<section class="fare-tables">
										<h2>Get Passes on your Phone</h2>
										<a href="https://tokentransit.com/app">
											<img class="alignnone wp-image-13577" src="https://kerntransit.org/wp-content/uploads/2018/04/token_transit_name_logo-1.png" alt="Token-transit-logo" width="300" height="69" style="max-width:300px;height:auto;"/></a>
										<ol>
										 	<li><a href="https://tokentransit.com/app">Download the app</a> or <a href="https://tokentransit.com/send/kerntransit">send a pass</a> to any phone number</li>
										 	<li>Purchase any single-ride or monthly bus pass</li>
										 	<li>Show your phone to board</li>
										</ol>
									</section>
									<section class="fare-tables">
										<h3>How to buy a 31-Day Pass</h3>
										<div>
											<dl>
												<dt>By phone:</dt>
												<dd>(661) 862-8648</dd>
												<br>
												<dt>By mail:</dt>
												<dd>Kern Transit</dd>
												<dd>2700 "M" Street #400</dd>
												<dd>Bakersfield CA 93301</dd>
											</dl>
										</div>
										<div>
											<dl>
												<dt>In person:</dt>
												<dd>2700 "M" Street - First floor cashier</dd>
												<dd>Bakersfield, CA 93301</dd>
												<br>
												<dd>Bakersfield</dd>
												<dd>Downtown Transit Center</dd>
												<dd>Golden Empire Transit ticket window</dd>
											</dl>
										</div>
										<br style="clear:both;" />

										<p>Passes will not be sold on the bus. "31 days" begins the day the pass is first used.</p>

										<h3>How to get a Reduced Fare Card</h3>
										<a href="/reduced-fare-application/">Download an application online</a> or call (661) 862-5032.
									</section>
							</article>

							<?php endwhile; else : ?>

								<?php get_template_part( 'template-parts/content', 'none' ); ?>

							<?php endif; ?>

						</main>

						<aside id="sidebar1" class="sidebar col-sm-3" role="complementary">

							<?php get_template_part( 'generic-sidebar'); ?>
						</aside>
				</div>
<?php get_footer(); ?>
