<?php
/**
 * BWS Hotels functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package BWS_Hotels
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function bws_hotels_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on BWS Hotels, use a find and replace
		* to change 'bws-hotels' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'bws-hotels', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-main' => esc_html__( 'primary', 'bws-hotels' ),
			'menu-footer' => esc_html__( 'footer-menu', 'bws-hotels' ),
			'menu-footer-bottom' => esc_html__( 'footer-menu-bottom', 'bws-hotels' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'bws_hotels_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'bws_hotels_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function bws_hotels_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'bws_hotels_content_width', 640 );
}
add_action( 'after_setup_theme', 'bws_hotels_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function bws_hotels_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'bws-hotels' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'bws-hotels' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'bws_hotels_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function bws_hotels_scripts() {
	wp_enqueue_style( 'bws-hotels-style', get_stylesheet_uri(), array(), _S_VERSION );

	wp_enqueue_style( 'bws-hotels-animate-css', get_template_directory_uri() . '/assets/libs/animate/animate.css' );
	wp_enqueue_style( 'bws-hotels-fancybox-css', get_template_directory_uri() . '/assets/libs/fancybox/jquery.fancybox.min.css' );
	wp_enqueue_style( 'bws-hotels-main-style', get_template_directory_uri() . '/assets/css/style.min.css' );

	wp_enqueue_script( 'bws-hotels-fancybox-js', get_template_directory_uri() . '/assets/libs/fancybox/jquery.fancybox.min.js', array('jquery'), '', true );
	wp_enqueue_script( 'bws-hotels-script-js', get_template_directory_uri() . '/assets/js/script.min.js', array('jquery'), '', true );

}
add_action( 'wp_enqueue_scripts', 'bws_hotels_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

//remove Emoji start
add_filter('emoji_svg_url', '__return_empty_string');
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_styles', 'print_emoji_styles');    
remove_filter('the_content_feed', 'wp_staticize_emoji');
remove_filter('comment_text_rss', 'wp_staticize_emoji');  
remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
function wph_remove_emojis_tinymce($plugins) {
	if (is_array($plugins)) {
		return array_diff($plugins, array('wpemoji'));
	} else {
		return array();
	}
}
add_filter('tiny_mce_plugins', 'wph_remove_emojis_tinymce');

remove_action( 'wp_enqueue_scripts', 'wp_enqueue_global_styles' );
remove_action( 'wp_body_open', 'wp_global_styles_render_svg_filters' );

//remove  Emoji end


// added custom post type
add_action('init', 'bws_hotels_init');
function bws_hotels_init(){
	register_post_type('Testimonials', array(
		'labels'             => array(
			'name'               => 'Testimonials',
			'singular_name'      => 'Testimonial',
			'add_new'            => 'Add new',
			'add_new_item'       => 'Add new Testimonial',
			'edit_item'          => 'Edit',
			'new_item'           => 'Edit Testimonial',
			'view_item'          => 'View Testimonial',
			'search_items'       => 'Search Testimonials',
			'not_found'          => 'Testimonials not found',
			'not_found_in_trash' => 'Testimonials not found in trash',
			'parent_item_colon'  => '',
			'menu_name'          => 'Testimonials'

		  ),
		'show_ui'            => true,
    	'menu_icon'          => 'dashicons-testimonial',
		'supports'           => array('title', 'editor', 'author')
	) );


	register_post_type('Locations', array(
		'labels'             => array(
			'name'               => 'Locations',
			'singular_name'      => 'Location',
			'add_new'            => 'Add new',
			'add_new_item'       => 'Add new Location',
			'edit_item'          => 'Edit',
			'new_item'           => 'Edit Location',
			'view_item'          => 'View Location',
			'search_items'       => 'Search Location',
			'not_found'          => 'Locations not found',
			'not_found_in_trash' => 'Locations not found in trash',
			'parent_item_colon'  => '',
			'menu_name'          => 'Locations'

		  ),
		'public'             => false,
		'taxonomies'         => array('country'),
		'show_ui'            => true,
		'show_in_rest'       => true,
    	'menu_icon'          => 'dashicons-location',
		'supports'           => array('title','thumbnail', 'author')
	) );

}

/**
 * Create a Location Country taxonomy
 */
function register_location_taxonomy() {

	$labels = array(
		'name'					=> _x( 'Country', 'bws-hotels' ),
		'singular_name'			=> _x( 'Country', 'bws-hotels' ),
		'search_items'			=> __( 'Search Countries', 'bws-hotels' ),
		'popular_items'			=> __( 'Popular Countries', 'bws-hotels' ),
		'all_items'				=> __( 'All Countries', 'bws-hotels' ),
		'parent_item'			=> __( 'Parent Country', 'bws-hotels' ),
		'parent_item_colon'		=> __( 'Parent Countries', 'bws-hotels' ),
		'edit_item'				=> __( 'Edit Country', 'bws-hotels' ),
		'update_item'			=> __( 'Update Country', 'bws-hotels' ),
		'add_new_item'			=> __( 'Add new Country', 'bws-hotels' ),
		'new_item_name'			=> __( 'New Country', 'bws-hotels' ),
		'add_or_remove_items'	=> __( 'Add or remove Country', 'bws-hotels' ),
		'choose_from_most_used'	=> __( 'Choose from most used Countries', 'bws-hotels' ),
		'menu_name'				=> __( 'Countries', 'bws-hotels' ),
	);

	$args = array(
		'labels'            => $labels,
		'show_admin_column' => true,
		'public'            => true,
		'show_in_nav_menus' => true,
		'hierarchical'      => true,
		'show_tagcloud'     => true,
		'show_ui'           => true,
		'query_var'         => true,
		'rewrite'           => true,
		'capabilities'      => array(),
	);

	register_taxonomy( 'country', array( 'locations' ), $args );
}

add_action( 'init', 'register_location_taxonomy' );

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Footer',
		'menu_title'	=> 'Footer',
		'menu_slug' 	=> 'footer-settings',
		'capability'	=> 'edit_posts',
		'icon_url'      => 'dashicons-table-row-after',
		'position'      => '21',
		'redirect'		=> false
	));

	acf_add_options_page(array(
		'page_title' 	=> 'Site Settings',
		'menu_title'	=> 'Site Settings',
		'menu_slug' 	=> 'site-settings',
		'capability'	=> 'edit_posts',
		'icon_url'      => 'dashicons-editor-kitchensink',
		'position'      => '21',
		'redirect'		=> false
	));
}

// if( function_exists('acf_add_options_page') ) {
// 	acf_add_options_page(array(
// 		'page_title' => 'Header/Footer Content',
// 		'menu_slug' => 'footer-content',
// 		'position' => '21',
// 		'icon_url' => 'dashicons-table-row-after',
// 	));
// }

// Removes from admin menu
add_action( 'admin_menu', 'my_remove_admin_menus' );
function my_remove_admin_menus() {
    remove_menu_page( 'edit-comments.php' );
}
// Removes from post and pages
add_action('init', 'remove_comment_support', 100);

function remove_comment_support() {
    remove_post_type_support( 'post', 'comments' );
    remove_post_type_support( 'page', 'comments' );
}
// Removes from admin bar
function mytheme_admin_bar_render() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('comments');
}
add_action( 'wp_before_admin_bar_render', 'mytheme_admin_bar_render' );

//svg

function my_custom_mime_types( $mimes ) {
// New allowed mime types.
	$mimes['svg'] = 'image/svg+xml';
	$mimes['svgz'] = 'image/svg+xml';

// Optional. Remove a mime type.
	unset( $mimes['exe'] );
	return $mimes;
}
add_filter( 'upload_mimes', 'my_custom_mime_types' );

add_filter( 'wp_check_filetype_and_ext', 'fix_svg_mime_type', 10, 5 );

# fix MIME type for SVG.
function fix_svg_mime_type( $data, $file, $filename, $mimes, $real_mime = '' ){

	// WP 5.1 +
	if( version_compare( $GLOBALS['wp_version'], '5.1.0', '>=' ) )
	$dosvg = in_array( $real_mime, [ 'image/svg', 'image/svg+xml' ] );
	else
	$dosvg = ( '.svg' === strtolower( substr($filename, -4) ) );

	if( $dosvg ){

	if( current_user_can('manage_options') ){

		$data['ext']  = 'svg';
		$data['type'] = 'image/svg+xml';
	}

	else {
		$data['ext'] = $type_and_ext['type'] = false;
	}

	}

	return $data;
}

add_filter( 'wp_prepare_attachment_for_js', 'show_svg_in_media_library' );

# data for SVG media library.
function show_svg_in_media_library( $response ) {
	if ( $response['mime'] === 'image/svg+xml' ) {
	// file name
	$response['image'] = [
		'src' => $response['url'],
	];
	}

	return $response;
}

//svg end

 //// ADD FEATURED IMAGE TO CPT Location

// Add styles to control column width
add_action('admin_head', 'my_custom_table_styles');
  
function my_custom_table_styles() {
  echo '<style>
   .fixed #featured_thumb {
       width:10%
   }
  </style>';
}
 
 
add_filter('manage_posts_columns', 'theme_add_post_admin_thumbnail_column', 2);
add_filter('manage_pages_columns', 'theme_add_post_admin_thumbnail_column', 2);
 
// Add the column
function theme_add_post_admin_thumbnail_column($columns)
{
 
    global $pagenow, $typenow;
    if( 'locations' === $typenow && 'edit.php' === $pagenow ) {
         
        $new = array();
        foreach ($columns as $key => $title) {
            if ($key == 'date') 
            {
                $new['featured_thumb'] = __('Featured Image');
            }
     
            $new[$key] = $title;
        }
        return $new;
 
    }
 
    else {
        return $columns;
    }
 
}
 
 
// Manage Post and Page Admin Panel Columns
add_action('manage_posts_custom_column', 'theme_show_post_thumbnail_column', 5, 2);
add_action('manage_pages_custom_column', 'theme_show_post_thumbnail_column', 5, 2);
 
// Get featured-thumbnail size post thumbnail and display it
function theme_show_post_thumbnail_column($theme_columns, $theme_id) {
 
    global $pagenow, $typenow;
    if( 'locations' === $typenow && 'edit.php' === $pagenow ) {
         
        switch ($theme_columns) {
            case 'featured_thumb':
                if (function_exists('the_post_thumbnail')) {
     
                    $permalink = get_edit_post_link();
     
                    $thumb = get_the_post_thumbnail_url(null, 'thumbnail');
     
                    echo '<a href="' . $permalink . '"><img src="' . $thumb . '" style="width:80px"></a>';
     
                } else {
                    echo 'Your theme doesn\'t support featured image…';
                }
     
                break;
        }
 
    }
    else {

        return $theme_columns;
    }
 
}


//add book now link to the primary menu
add_filter('wp_nav_menu_items', 'my_wp_nav_menu_items', 10, 2);

function my_wp_nav_menu_items( $items, $args ) {
    // get menu
    $menu = wp_get_nav_menu_object($args->menu);
    
    // modify primary only
    if( $args->theme_location === 'menu-main' ||  $args->theme_location == 'menu-footer' ) {
        
        // vars
        $booking_link = get_field('booking_link', $menu);

		if ($booking_link) {
			$link_url = $booking_link['url'];
			$link_title = $booking_link['title'];
			$link_target = $booking_link['target'] ? $booking_link['target'] : '_self';
			
			// prepend logo
			$html_link = '<li class="menu-item menu-booking-item"><a href="'.esc_url( $link_url ).'" target="'. esc_attr( $link_target ) .'">'.$link_title.'</a></li>';
	
					
			// append html
			$items = $items . $html_link;
		}
    }
    
    // return
    return $items;
}


//exclide node_modules and git folders from ain1wm
 
add_filter( 'ai1wm_exclude_themes_from_export', function ( $exclude_filters ) {
	$exclude_filters[] = 'bws-hotels/node_modules';
	$exclude_filters[] = 'bws-hotels/.git'; 
	return $exclude_filters;
} );

