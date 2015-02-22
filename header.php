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

		<?php // icons & favicons (for more: http://www.jonathantneal.com/blog/understand-the-favicon/) ?>
		<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/library/images/apple-icon-touch.png">
		<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png?v2">
		<link href='http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
		<!--[if IE]>
			<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
		<![endif]-->
		<?php // or, set /favicon.ico for IE10 win ?>
		<meta name="msapplication-TileColor" content="#f01d4f">
		<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/library/images/win8-tile-icon.png">

		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
		<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>

<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="http://momentjs.com/downloads/moment.min.js"></script>

		<script src="http://code.jquery.com/ui/1.11.0/jquery-ui.min.js"></script>
			<script src="<?php echo get_template_directory_uri(); ?>/library/js/kern.js"></script>
		<?php // wordpress head functions ?>
		<?php wp_head(); ?>
		<?php // end of wordpress head ?>

		<?php // drop Google Analytics Here ?>
		<?php // end analytics ?>
		
		
		<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css">
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/library/css/interactive-map.css">
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/library/css/sml_interactive-map.css">
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/library/css/route-icons.css">
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/library/css/single-route.css">   
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/library/css/kern-transit.css">  
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/library/css/dar.css">  

<script src='https://api.tiles.mapbox.com/mapbox.js/v2.1.0/mapbox.js'></script>
<link href='https://api.tiles.mapbox.com/mapbox.js/v2.1.0/mapbox.css' rel='stylesheet' /> 


		<script>

		function initialize() {

		var defaultBounds = new google.maps.LatLngBounds(
		 new google.maps.LatLng(35.372915,-119.018819));

		var origin_input = document.getElementById('saddr');
		var destination_input = document.getElementById('daddr');


		var options = {
		 bounds: defaultBounds,
		 componentRestrictions: {country: 'us'}
		};


		var autocomplete_origin = new google.maps.places.Autocomplete(origin_input, options);    
		var autocomplete_destination = new google.maps.places.Autocomplete(destination_input, options);
		}

		google.maps.event.addDomListener(window, 'load', initialize);


		</script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-53349417-1', 'auto');
  ga('send', 'pageview');

</script>
<meta name="google-translate-customization" content="f25af25643c7b829-5e44eb73351882d9-gcc7ef8ab8e200b71-13"></meta>
        
	</head>

	<body <?php body_class(); ?>>


		<div id="container">

			<header class="header" role="banner">

				<div id="inner-header" class="wrap cf">

			
        
					<div id="number-and-search-wrap">
					<div id="google_translate_element"></div><script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
}
</script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
						
						<div id="search-wrap">
							<form action="/" method="get">
									<input type="text" name="s" id="search" placeholder="Search" value="<?php the_search_query(); ?>" />
									<input type="image" alt="Search" src="<?php echo get_template_directory_uri(); ?>/library/images/clear.png" id="header-search-icon-submit" />
							</form>
						</div>
						<div id="kern-phone">
							<a href="tel:8003232396">800-323-2396</a>
						</div><!-- end #kern-phone -->
					</div> <!-- end #number-and-search-wrap -->
					<?php // to use a image just replace the bloginfo('name') with your img src and remove the surrounding <p> ?>
					<a href="<?php echo home_url(); ?>" rel="nofollow"><div id="logo"></div></a>
					<nav id="main-nav">
						<ul>
							<li id="routes_and_schedules_link" class="<?php if( is_post_type_archive('route')){echo 'current';}else if ( 'route' == get_post_type() ||  'timetable' == get_post_type()) {echo "parent-active"; }?>"><a href="<?php echo get_permalink(17) ?>"><i id="routes-and-schedules-icon" class="main-nav-icon"></i><span>Routes &amp; <br />Schedules</span></a></li>
							<li id="dial-a-ride-link" class="<?php if( is_post_type_archive('dar')){echo 'current';}else if ( 'dar' == get_post_type()) {echo "parent-active"; }?>"><a href="<?php echo get_site_url(); ?>/dial-a-ride"><i id="dial-a-ride-icon" class="main-nav-icon"></i><span>Dial-A-Ride</span></a></li>
							<li id="fares-link"><a href="<?php echo get_permalink(23) ?>"><i id="fares-icon" class="main-nav-icon"></i><span>Fares</span></a></li>
							<li id="how-to-ride-link"><a href="<?php echo get_permalink(19) ?>" ><i id="how-to-ride-icon" class="main-nav-icon"></i><span>How &nbsp; to &nbsp; Ride</span></a></li>
						</ul>
					</nav>
					<?php // if you'd like to use the site description you can un-comment it below ?>
					<?php // bloginfo('description'); ?>


					<nav role="navigation">
						<?php wp_nav_menu(array(
    					'container' => false,                           // remove nav container
    					'container_class' => 'menu cf',                 // class of container (should you choose to use it)
    					'menu' => __( 'The Main Menu', 'bonestheme' ),  // nav name
    					'menu_class' => 'nav top-nav cf',               // adding custom nav class
    					'theme_location' => 'main-nav',                 // where it's located in the theme
    					'before' => '',                                 // before the menu
        			'after' => '',                                  // after the menu
        			'link_before' => '',                            // before each link
        			'link_after' => '',                             // after each link
        			'depth' => 0,                                   // limit the depth of the nav
    					'fallback_cb' => ''                             // fallback function (if there is one)
						)); ?>

					</nav>

				</div>

			</header>

