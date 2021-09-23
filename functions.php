<?php
/*
Author: Eddie Machado
URL: htp://themble.com/bones/

This is where you can drop your custom functions or
just edit things like thumbnail sizes, header images,
sidebars, comments, ect.
*/

// LOAD BONES CORE (if you remove this, the theme will break)
require_once( 'library/bones.php' );

// USE THIS TEMPLATE TO CREATE CUSTOM POST TYPES EASILY
require_once( 'library/custom-post-type.php' );

// CUSTOMIZE THE WORDPRESS ADMIN (off by default)
// require_once( 'library/admin.php' );

/*********************
LAUNCH BONES
Let's get everything up and running.
*********************/

function bones_ahoy() {

  // let's get language support going, if you need it
  load_theme_textdomain( 'kerntheme', get_template_directory() . '/library/translation' );

  // launching operation cleanup
  add_action( 'init', 'bones_head_cleanup' );
  // A better title
  add_filter( 'wp_title', 'rw_title', 10, 3 );
  // remove WP version from RSS
  add_filter( 'the_generator', 'bones_rss_version' );
  // remove pesky injected css for recent comments widget
  add_filter( 'wp_head', 'bones_remove_wp_widget_recent_comments_style', 1 );
  // clean up comment styles in the head
  add_action( 'wp_head', 'bones_remove_recent_comments_style', 1 );
  // clean up gallery output in wp
  add_filter( 'gallery_style', 'bones_gallery_style' );

  // enqueue base scripts and styles
  add_action( 'wp_enqueue_scripts', 'bones_scripts_and_styles', 999 );
  // ie conditional wrapper

  // launching this stuff after theme setup
  bones_theme_support();

  // adding sidebars to Wordpress (these are created in functions.php)
  add_action( 'widgets_init', 'bones_register_sidebars' );

  // cleaning up random code around images
  add_filter( 'the_content', 'bones_filter_ptags_on_images' );
  // cleaning up excerpt
  add_filter( 'excerpt_more', 'bones_excerpt_more' );

} /* end bones ahoy */

// let's get this party started
add_action( 'after_setup_theme', 'bones_ahoy' );


/************* OEMBED SIZE OPTIONS *************/

if ( ! isset( $content_width ) ) {
	$content_width = 640;
}

/************* THUMBNAIL SIZE OPTIONS *************/

// Thumbnail sizes
add_image_size( 'bones-thumb-600', 600, 150, true );
add_image_size( 'bones-thumb-300', 300, 100, true );

/*
to add more sizes, simply copy a line from above
and change the dimensions & name. As long as you
upload a "featured image" as large as the biggest
set width or height, all the other sizes will be
auto-cropped.

To call a different size, simply change the text
inside the thumbnail function.

For example, to call the 300 x 300 sized image,
we would use the function:
<?php the_post_thumbnail( 'bones-thumb-300' ); ?>
for the 600 x 100 image:
<?php the_post_thumbnail( 'bones-thumb-600' ); ?>

You can change the names and dimensions to whatever
you like. Enjoy!
*/

add_filter( 'image_size_names_choose', 'bones_custom_image_sizes' );

function bones_custom_image_sizes( $sizes ) {
    return array_merge( $sizes, array(
        'bones-thumb-600' => __('600px by 150px'),
        'bones-thumb-300' => __('300px by 100px'),
    ) );
}

/*
The function above adds the ability to use the dropdown menu to select
the new images sizes you have just created from within the media manager
when you add media to your content blocks. If you add more image sizes,
duplicate one of the lines in the array and name it according to your
new image size.
*/

/**
 * Enqueue scripts and styles.
 * 
 */
function kern_scripts() {
	
	//CSS
	
	wp_enqueue_style( 'kern-style', get_stylesheet_uri(), array() );
	wp_enqueue_style( 'main-style', get_theme_file_uri('/library/css/style.css'), array( ), );
	//wp_enqueue_style('main-style', get_theme_file_uri() . '/library/css/style.css', array(), filemtime(get_template_directory() . '/library/css/style.css'), false);
	wp_enqueue_style('interactive-map', get_theme_file_uri('/library/css/interactive-map.css?v=2'), true);
	wp_enqueue_style('route-icons', get_theme_file_uri('/library/css/route-icons.css?v=2'), true);
	wp_enqueue_style('bootstrap-css', get_theme_file_uri('/library/bootstrap/css/bootstrap.min.css?v=3'), true);
	wp_enqueue_style('single-route', get_theme_file_uri('/library/css/single-route.css?v=3'), true);
	wp_enqueue_style('kern-style', get_theme_file_uri('/library/css/kern-transit.css?v=2.1'), true);
	wp_enqueue_style('dar-style', get_theme_file_uri('/library/css/dar.css?v=2'), true);
	wp_enqueue_style('apple-touch-icon', get_theme_file_uri('/library/images/apple-icon-touch.png'), true);
	wp_enqueue_style('icon', get_theme_file_uri('/favicon.png?v2'), true);
	wp_enqueue_style('icon', 'https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic', true);


	//JS
	
	//wp_enqueue_script('bootstrap', get_theme_file_uri('/library/bootstrap/js/bootstrap.min.js?v=2'), array('jquery'));
	wp_enqueue_script('bootstrap', get_template_directory_uri() . '/library/bootstrap/js/bootstrap.min.js',  array(), '20210129', true  ); 
	//wp_enqueue_script('kern-js', get_template_directory_uri('/library/js/kern.js'), array(), '20210129', true  ); 
	wp_enqueue_script( 'kern-js', get_template_directory_uri() . '/library/js/kern.js', array('jquery'), '20210915', true );

	wp_enqueue_script('jquery-ui', 'https://code.jquery.com/ui/1.11.0/jquery-ui.min.js?v=2' , array('jquery'));
	wp_enqueue_script('moment-js', 'https://momentjs.com/downloads/moment.min.js?v=2' , array('jquery-ui'));
	wp_enqueue_script('jquery', 'https://code.jquery.com/jquery-1.11.1.min.js?v=2' );
	

	if ( is_front_page() ) {
	
	wp_enqueue_script('google-maps', "https://maps.googleapis.com/maps/api/js?key=AIzaSyCgfsid1_jCd-BSTDqugAFgqDnJHywObXA&libraries=places", array(), false, true );

	wp_enqueue_script( 'map', get_template_directory_uri() . '/library/js/map.js', array('jquery'), '20210915', true );
	


	//wp_enqueue_style('jquery-ui-css', "https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css");

	}	

	if (is_page_template('page-dar.php')) {

		wp_enqueue_script( 'dar-maps', get_template_directory_uri() . '/library/js/dar-map.js', array(), '20210821', true );

		wp_enqueue_script('mapbox', 'https://api.mapbox.com/mapbox.js/v3.3.1/mapbox.js', array() );

		wp_enqueue_style('mapbox-css', 'https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.7.2/mapbox-gl-geocoder.css');


	}

	
	
}
add_action( 'wp_enqueue_scripts', 'kern_scripts' );

function get_svg_icon($icon, $class="standard") {
	$icon_file = $icon . '.svg';
	printf('<span class="icon icon-%s icon-%s">', $icon, $class);
	get_template_part('library/images/icon', $icon_file);
	echo '</span>';
}


/************* ACTIVE SIDEBARS ********************/

// Sidebars & Widgetizes Areas
function bones_register_sidebars() {
	register_sidebar(array(
		'id' => 'sidebar1',
		'name' => __( 'Sidebar 1', 'kerntheme' ),
		'description' => __( 'The first (primary) sidebar.', 'kerntheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	/*
	to add more sidebars or widgetized areas, just copy
	and edit the above sidebar code. In order to call
	your new sidebar just use the following code:

	Just change the name to whatever your new
	sidebar's id is, for example:

	register_sidebar(array(
		'id' => 'sidebar2',
		'name' => __( 'Sidebar 2', 'kerntheme' ),
		'description' => __( 'The second (secondary) sidebar.', 'kerntheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	To call the sidebar in your template, you can just copy
	the sidebar.php file and rename it to your sidebar's name.
	So using the above example, it would be:
	sidebar-sidebar2.php

	*/
} // don't remove this bracket!





/*
This is a modification of a function found in the
twentythirteen theme where we can declare some
external fonts. If you're using Google Fonts, you
can replace these fonts, change it in your scss files
and be up and running in seconds.
*/
function bones_fonts() {

  wp_register_style('googleFonts', 'https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic');
  wp_enqueue_style( 'googleFonts');
  wp_register_style('route_icons', get_template_directory_uri().'/library/css/route-icons.css');
  wp_enqueue_style( 'route_icons');
}

add_action('wp_print_styles', 'bones_fonts');


// This theme uses wp_nav_menu() in one location.
register_nav_menus( array(
	'main-nav' => esc_html__( 'Primary', 'kerntheme' ),
	'menu-2' => esc_html__( 'Mobile', 'kerntheme' ),
	
) );



function register_my_menus() {
  register_nav_menus(
    array(
      'secondary-link-right-menu' => __( 'Secondary Links Right Menu' )
    )
  );
}
add_action( 'init', 'register_my_menus' );


function the_breadcrumb() {
    global $post;
    echo '<ul id="breadcrumbs">';
  

    if (!is_home()) {
        echo '<li><a href="';
        echo get_option('home');
        echo '">';
        echo 'Home';
        echo '</a></li><li class="separator"> > </li>';

    	if(is_archive()) {
    		$post_type = get_post_type();

			if ( $post_type )
			{

				$taxonomy = 'alert-zone';
				$taxonomy_terms = get_terms( $taxonomy, array(
					'hide_empty' => 0,
					'fields' => 'ids'
				) );

				if(has_term($taxonomy_terms, 'alert-zone')) {

					echo 'Alerts';

				}	else {

					$post_type_data = get_post_type_object( $post_type );
					$post_type_slug = $post_type_data->rewrite['slug'];
					echo $post_type_data->label;


				}
			}
    	}

    	elseif (is_single()) {

    		$post_type = get_post_type();

			if ( $post_type )
			{
				$post_type_data = get_post_type_object( $post_type );
				$post_type_slug = $post_type_data->rewrite['slug'];
				echo '<li><a href="'.get_post_type_archive_link( $post_type ).'">';
				 echo $post_type_data->label;
				echo '</a></li>';
			}



            if (is_single()) {



                echo '</li><li class="separator"> > </li><li>';
                if( $post_type_data = get_post_type_object( $post_type )->rewrite['slug'] == 'routes-and-schedules') {

                	echo 'Route '.get_field('route_number').'&nbsp; : &nbsp;';
                }

                the_title();
                echo '</li>';
            }
        }

        elseif (is_page()) {
        	 echo '</li><li>';
                the_title();
                echo '</li>';

        }


    echo '</ul>';

    }

}

function fare_table() {
	$table = get_field( 'fares' );

		if ( ! empty ( $table ) ) {

		echo '<table id="single-route-fares">';

			if ( ! empty( $table['caption'] ) ) {

				echo '<caption>' . $table['caption'] . '</caption>';
			}

			if ( ! empty( $table['header'] ) ) {

				echo '<thead>';

					echo '<tr>';

						foreach ( $table['header'] as $th ) {

							echo '<th>';
								echo $th['c'];
							echo '</th>';
						}

					echo '</tr>';

				echo '</thead>';
			}

			echo '<tbody>';

				foreach ( $table['body'] as $tr ) {

					echo '<tr>';

						foreach ( $tr as $td ) {

							echo '<td>';
								echo $td['c'];
							echo '</td>';
						}

					echo '</tr>';
				}

			echo '</tbody>';

		echo '</table>';
	}
}
	
	
//Remove the comments column from Posts
add_action( 'admin_init', 'fb_deactivate_support' );
function fb_deactivate_support() {
    remove_post_type_support( 'post', 'comments' );
    
}

//Remove the comments menu and custom post type menu
function remove_menus(){

	remove_menu_page( 'edit-comments.php' );          //Comments
	remove_menu_page( 'edit.php' );                 //Appearance
	remove_menu_page( 'edit.php?post_type=custom_type' );
  
  }
  add_action( 'admin_menu', 'remove_menus' );
  
//Remove editor from DAR post type 
add_action('init', 'init_remove_support',100);
function init_remove_support(){
    $post_type = 'dial-a-ride';
    remove_post_type_support( $post_type, 'editor');
}

/**
* Change the name of 'Posts' to 'News'

function trillium_change_post_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'News';
    $submenu['edit.php'][5][0] = 'News';
    $submenu['edit.php'][10][0] = 'Add News';
    $submenu['edit.php'][16][0] = 'News Tags';
}
function trillium_change_post_object() {
    global $wp_post_types;
    $labels = &$wp_post_types['post']->labels;
    $labels->name = 'News';
    $labels->singular_name = 'News';
    $labels->add_new = 'Add News';
    $labels->add_new_item = 'Add News';
    $labels->edit_item = 'Edit News';
    $labels->new_item = 'News';
    $labels->view_item = 'View News';
    $labels->search_items = 'Search News';
    $labels->not_found = 'No News found';
    $labels->not_found_in_trash = 'No News found in Trash';
    $labels->all_items = 'All News';
    $labels->menu_name = 'News';
    $labels->name_admin_bar = 'News';
}

add_action( 'admin_menu', 'trillium_change_post_label' );
add_action( 'init', 'trillium_change_post_object' );
*/

/*
Activate Custom Post Types:
Uncomment to enable.

The inc/ folder also contains optional template pages that can be copied into the main
folder to use with the following custom post types.
 */

require get_template_directory() . '/inc/dar.php';
//require get_template_directory() . '/inc/staff-contacts.php';
require get_template_directory() . '/inc/news.php';
require get_template_directory() . '/inc/reports.php';





function add_menu_icons_styles(){
?>

<style>
#adminmenu .menu-icon-alert div.wp-menu-image:before {
  content: '\f227';
}
#adminmenu .menu-icon-timetable div.wp-menu-image:before {
 content: "\f311";
}
#adminmenu .menu-icon-dar div.wp-menu-image:before {
content: "\f507";
}
#adminmenu .menu-icon-route div.wp-menu-image:before {
content: "\f237";
}

#adminmenu .menu-icon-news div.wp-menu-image:before {
content: "\f488";
}
#adminmenu .menu-icon-contact-profile div.wp-menu-image:before {
content: "\f484";
}
</style>

<?php
}
add_action( 'admin_head', 'add_menu_icons_styles' );


function my_admin_enqueue_css() {
	echo '<link rel="stylesheet" id="route_icons-css"  href="https://kerntransit.org/wp-content/themes/kern/library/css/route-icons.css" type="text/css" media="all" />';
}

add_action( 'admin_enqueue_scripts', 'my_admin_enqueue_css' );

/*Route Select */
add_action('route_select', 'routeSelect');
function routeSelect() {

	wp_reset_query();

	$query = new WP_Query(array(
	'posts_per_page' => -1,
	"post_type"     =>"route",
	'meta_key'      => 'route_id',
	'orderby'       => 'meta_value',
	'order'         => 'ASC'


	));

		if ( $query->have_posts() ) {
			?>
			<label class="sr-only" for="routes-dropdown">View a different route</label>
			<select id="routes-dropdown" onchange="location = this.options[this.selectedIndex].value;">
			<option value="#">Select a Route</option>
			<?php
				while ( $query->have_posts() ) {
					$query->the_post();

					?>
						<option value="<?php echo esc_url( get_permalink($post->ID)) ?>"><?php the_field('route_short_name'); echo " - "; the_field('route_long_name'); ?></option>


				<?php
				}
				?>
				</select>
				<?php
			}
	wp_reset_postdata();
		}
	
/*Dial-A-Ride Select */
add_action('dar_select', 'darSelect');
function darSelect() {

	wp_reset_query();

	$query = new WP_Query(array(
	'posts_per_page' => -1,
	"post_type"     =>"dial-a-ride",
	'meta_key'      => 'custom_id',
	'orderby'       => 'meta_value',
	'order'         => 'ASC'


	));

		if ( $query->have_posts() ) {
			?>
			<label class="sr-only" for="routes-dropdown">View a different service</label>
			<select id="routes-dropdown" onchange="location = this.options[this.selectedIndex].value;">
			<option value="#">View a different service</option>
			<?php
				while ( $query->have_posts() ) {
					$query->the_post();

					?>
						<option value="<?php echo esc_url( get_permalink($post->ID)) ?>"><?php the_title(); ?></option>


				<?php
				}
				?>
				</select>
				<?php
			}
	wp_reset_postdata();
		}


/*Interactive map */

function the_interactive_map($feedname, $route_ids = array() ) {
	if (!$feedname) { return; }
	if (empty($route_ids)) {
		printf('<div class="system-map"><iframe src="https://new-maps.trilliumtransit.com/map/feed/%s/"></iframe></div>', $feedname);
	} else {
		printf('<div class="route-map"><iframe src="https://new-maps.trilliumtransit.com/map/feed/%s/routes/%s?noui=true&page_embed=true"></iframe></div>',
			$feedname, implode(',', $route_ids));
	}
}





/* DON'T DELETE THIS CLOSING TAG */ ?>
