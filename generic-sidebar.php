<div id="how-to-ride-links" class="secondary-col">
								
								<ul>
								<li><a href="<?php echo get_permalink( 1267 ); ?>" ><i id="connections-icon"></i>Connections</a></li>
								<!--<li><a href="<?php echo get_permalink( 7 ); ?>" ><i id="dial-a-ride-icon"></i>Dial-A-Ride</a></li> -->
								<li><a href="<?php echo get_permalink( 5 ); ?>" ><i id="accessibility-icon"></i>Accessibility</a></li>
								<li><a href="<?php echo get_permalink( 9 ); ?>" ><i id="bikes-on-buses-icon"></i>Bikes on Buses</a></li>
								<li><a href="<?php echo get_permalink(11 ); ?>" ><i id="passenger-conduct-icon"></i>Passenger Conduct</a></li>
								<li><a href="<?php echo get_permalink( 13 ); ?>" ><i id="mobile-and-desktop-apps-icon"></i>Mobile and Desktop Apps</a></li>
								<li><a href="<?php echo get_permalink( 15); ?>" ><i id="holidays-icon"></i>Holidays</a></li>
								</ul>
									
								<hr />
								<div class="secondary">
								<ul>
									<li><a href="<?php echo get_site_url(); ?>/news">News</a></li>
									<?php  $count_posts = get_alertCount(); 
									 if($count_posts > 0) { ?>
										<li> <a href="<?php echo get_site_url(); ?>/alerts">Alerts<? echo '('.$count_posts.')';  ?></a> </li>
									<?php } ?>
								</ul>
								
								<hr />
								
								<a class="twitter-timeline" data-width="340" data-height="450" data-theme="dark" data-link-color="#e68c2b" href="https://twitter.com/KernTransit">Tweets by KernTransit</a> <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
								</div><!-- end .secondary -->
								
								</div><!-- end #how-to-ride-links -->