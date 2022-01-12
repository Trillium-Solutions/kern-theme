<?php 
/**
* The header for this theme
*
* This is the template that displays all of the <head> section and everything up until <div id="content">
*
*
*/
?>
<!doctype html>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

	<head>
		<meta charset="utf-8">

		<?php // force Internet Explorer to use the latest rendering engine available ?>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<title><?php wp_title(' | '); ?></title>

		<?php // mobile meta (hooray!) ?>
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

	
		<!--[if IE]>
			<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
		<![endif]-->
		<?php // or, set /favicon.ico for IE10 win ?>
		<meta name="msapplication-TileColor" content="#f01d4f">
		<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/library/images/win8-tile-icon.png">

		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
		
		<script src="https://code.jquery.com/jquery-1.11.1.min.js?v=2"></script>
		<!--<script src="https://momentjs.com/downloads/moment.min.js?v=2"></script>-->

		<script src="https://code.jquery.com/ui/1.11.0/jquery-ui.min.js?v=2"></script>
	
		<?php // wordpress head functions ?>
			<?php wp_head(); ?>
		<?php // end of wordpress head ?>

		<?php // drop Google Analytics Here ?>
		<script>
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','//www.google-analytics.com/analytics.js?v=2','ga');

			ga('create', 'UA-53349417-1', 'auto');
				ga('set', 'anonymizeIp', true);
			ga('send', 'pageview');

		</script>
		<?php // end analytics ?>

		<script src="https://kit.fontawesome.com/a1f5cfbb67.js"></script>
		<meta name="google-translate-customization" content="f25af25643c7b829-5e44eb73351882d9-gcc7ef8ab8e200b71-13"></meta>

	</head>

	<body <?php body_class(); ?>>
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'kern' ); ?></a>
	
		<?php
		$system_alert = new WP_Query( array(
			'post_type' 		=> 'alert',
			'posts_per_page' 	=> 1,
			'meta_key'			=> 'system_alert',
			'meta_value'		=> 1,
			'meta_query' => array(
				'relation' => 'AND',
				array( 
					'relation' => 'OR',
					array(
						'key'		=> 'effective_date',
						'compare'	=> 'NOT EXISTS',
						'value'		=> '',
						/*'compare' => '='*/
					),
					array(
						'key'		=> 'effective_date',
						'value' 	=> current_time('Y-m-d'),
						'compare'	=> '<=',
						'type'		=> 'DATE',
					),
				),
				array(
					'relation' => 'OR',
				array(
					'key'		=> 'end_date',
					'compare'	=> 'NOT EXISTS',
					'value'		=> '',
				),
				array(
					'key'		=> 'end_date',
					'value' 	=> current_time('Y-m-d'),
					'compare'	=> '>=',
					'type'		=> 'DATE',
				)
				)
			)
			
		));
		if ( $system_alert->have_posts() ) : while ( $system_alert->have_posts() ) :
			$system_alert->the_post();
			?>
			<div id="system-alert-bar">
				<?php echo '<i class="fas fa-exclamation-triangle"></i>' ?> System Alert: <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
			</div>
		<?php endwhile; wp_reset_postdata(); endif; ?>

	
		<div class="container-fluid">
			<header>
				<div class="row">
					<div id="number-and-search-wrap" class="col-md-6 col-md-push-6 col-xs-10 col-xs-push-1">
						<div class="row">
							<div id="kern-phone" class="col-sm-4">
								<a href="tel:8003232396">800-323-2396</a>
							</div><!-- end #kern-phone -->
							<div id="search-wrap" class="form-inline col-sm-4 col-xs-6" >
								<form action="/" method="get">
									<label class="sr-only" for="search">Search</label>
									<img alt="search-icon" src="<?php echo get_template_directory_uri(); ?>/library/images/clear.png" id="header-search-icon-submit" />
									<input type="text" name="s" id="search" placeholder="Search" aria-label="search text value="<?php the_search_query(); ?>" />
									
								</form>
							</div>
							<div id="google_translate_element" class="col-sm-4 col-xs-6"></div>
						</div><!-- class="row" -->
					</div> <!-- end #number-and-search-wrap -->
				</div> <!-- end row -->
				<div class="row">
					<div class="col-sm-1 visible-sm visible-xs"></div>
					<?php
						if(is_front_page()) : ?>
						<div id="logo-holder" class="col-md-5 col-sm-10" >
							<a href="/">
								<h1 class="screen-reader-text">Kern Transit</h1>
									<img id="logo-image" src="<?php echo get_template_directory_uri();?>/library/images/kern-transit-logo.png" alt="Kern Transit home" />
							</a>
						</div><!-- end logo-holder -->
						<?php else: ?>
						<div id="logo-holder" class="col-md-5 col-sm-10" >
							<a href="<?php echo home_url(); ?>" rel="nofollow">
								<img id="logo-image" src="<?php echo get_template_directory_uri();?>/library/images/kern-transit-logo.png" alt="Kern Transit home" />
							</a>
						</div><!-- end logo-holder -->
						<?php endif; ?>
						<nav id="site-navigation" class="col-md-7 col-sm-10" role="navigation">
							<ul>
								<li id="routes_and_schedules_link">
									<a href="/routes-and-schedules">
										<i id="routes-and-schedules-icon" class="main-nav-icon"></i>
										<span>Routes &amp; <br />Schedules</span>
									</a>
								</li>
								<li id="dial-a-ride-link">
									<a href="/dial-a-ride">
										<i id="dial-a-ride-icon" class="main-nav-icon"></i>
										<span>Dial-A-Ride</span>
									</a>
								</li>
								<li id="fares-link">
									<a href="/fares">
										<i id="fares-icon" class="main-nav-icon"></i>
										<span>Fares</span>
									</a>
								</li>
								<li id="how-to-ride-link">
									<a href="/how-to-ride">
										<i id="how-to-ride-icon" class="main-nav-icon"></i>
										<span>How &nbsp; to &nbsp; Ride</span>
									</a>
								</li>
							</ul>
						</nav>
						<?php // if you'd like to use the site description you can un-comment it below ?>
						<?php // bloginfo('description'); ?>
				</div><!-- end class row -->
			</header>
				
	
	