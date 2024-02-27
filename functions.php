<?php
/**
 * Andries functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Andries
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
function andries_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Andries, use a find and replace
		* to change 'andries' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'andries', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'andries' ),
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
			'andries_custom_background_args',
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
add_action( 'after_setup_theme', 'andries_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function andries_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'andries_content_width', 640 );
}
add_action( 'after_setup_theme', 'andries_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function andries_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'andries' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'andries' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'andries_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function andries_scripts() {
    wp_enqueue_style( 'andries-style', get_stylesheet_uri(), array(), _S_VERSION );
    wp_style_add_data( 'andries-style', 'rtl', 'replace' );

    // Enqueue navigation.js
    wp_enqueue_script( 'andries-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

    // Enqueue animation.js
    wp_enqueue_script( 'andries-animation', get_template_directory_uri() . '/js/animation.js', array(), _S_VERSION, true );

    // Enqueue modal.js
    wp_enqueue_script( 'andries-modal', get_template_directory_uri() . '/js/modal.js', array(), _S_VERSION, true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}

add_action( 'wp_enqueue_scripts', 'andries_scripts' );

function mytheme_add_favicon() {
	// Favicon for older browsers.
	echo '<link rel="shortcut icon" href="' . get_template_directory_uri() . '/favicon.ico" >';

 }
 add_action('wp_head', 'mytheme_add_favicon');
 

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

//Invoice and Client Post Type
function create_custom_post_types() {
    // Labels for the Clients Post Type
    $labels_clients = array(
        'name'                  => _x('Clients', 'Post Type General Name', 'textdomain'),
        'singular_name'         => _x('Client', 'Post Type Singular Name', 'textdomain'),
        'menu_name'             => __('Clients', 'textdomain'),
        'name_admin_bar'        => __('Client', 'textdomain'),
        'archives'              => __('Client Archives', 'textdomain'),
        'attributes'            => __('Client Attributes', 'textdomain'),
        'parent_item_colon'     => __('Parent Client:', 'textdomain'),
        'all_items'             => __('All Clients', 'textdomain'),
        'add_new_item'          => __('Add New Client', 'textdomain'),
        'add_new'               => __('Add New', 'textdomain'),
        'new_item'              => __('New Client', 'textdomain'),
        'edit_item'             => __('Edit Client', 'textdomain'),
        'update_item'           => __('Update Client', 'textdomain'),
        'view_item'             => __('View Client', 'textdomain'),
        'view_items'            => __('View Clients', 'textdomain'),
        'search_items'          => __('Search Client', 'textdomain'),
        'not_found'             => __('Not found', 'textdomain'),
        'not_found_in_trash'    => __('Not found in Trash', 'textdomain'),
        'featured_image'        => __('Client Image', 'textdomain'),
        'set_featured_image'    => __('Set client image', 'textdomain'),
        'remove_featured_image' => __('Remove client image', 'textdomain'),
        'use_featured_image'    => __('Use as client image', 'textdomain'),
        'insert_into_item'      => __('Insert into client', 'textdomain'),
        'uploaded_to_this_item' => __('Uploaded to this client', 'textdomain'),
        'items_list'            => __('Clients list', 'textdomain'),
        'items_list_navigation' => __('Clients list navigation', 'textdomain'),
        'filter_items_list'     => __('Filter clients list', 'textdomain'),
    );
    register_post_type('clients',
        array(
            'labels'        => $labels_clients,
            'public'        => true,
            'has_archive'   => true,
            'rewrite'       => array('slug' => 'clients'),
            'supports'      => array('title', 'editor', 'thumbnail'),
            'show_in_rest'  => false, // Disable Gutenberg editor
            'menu_icon'     => 'dashicons-businessperson', // Custom icon for Clients
        )
    );

    // Labels for the Invoices Post Type
    $labels_invoices = array(
        'name'                  => _x('Invoices', 'Post Type General Name', 'textdomain'),
        'singular_name'         => _x('Invoice', 'Post Type Singular Name', 'textdomain'),
        'menu_name'             => __('Invoices', 'textdomain'),
        'name_admin_bar'        => __('Invoice', 'textdomain'),
        'archives'              => __('Invoice Archives', 'textdomain'),
        'attributes'            => __('Invoice Attributes', 'textdomain'),
        'parent_item_colon'     => __('Parent Invoice:', 'textdomain'),
        'all_items'             => __('All Invoices', 'textdomain'),
        'add_new_item'          => __('Add New Invoice', 'textdomain'),
        'add_new'               => __('Add New', 'textdomain'),
        'new_item'              => __('New Invoice', 'textdomain'),
        'edit_item'             => __('Edit Invoice', 'textdomain'),
        'update_item'           => __('Update Invoice', 'textdomain'),
        'view_item'             => __('View Invoice', 'textdomain'),
        'view_items'            => __('View Invoices', 'textdomain'),
        'search_items'          => __('Search Invoice', 'textdomain'),
        'not_found'             => __('Not found', 'textdomain'),
        'not_found_in_trash'    => __('Not found in Trash', 'textdomain'),
        'featured_image'        => __('Invoice Image', 'textdomain'),
        'set_featured_image'    => __('Set invoice image', 'textdomain'),
        'remove_featured_image' => __('Remove invoice image', 'textdomain'),
        'use_featured_image'    => __('Use as invoice image', 'textdomain'),
        'insert_into_item'      => __('Insert into invoice', 'textdomain'),
        'uploaded_to_this_item' => __('Uploaded to this invoice', 'textdomain'),
        'items_list'            => __('Invoices list', 'textdomain'),
        'items_list_navigation' => __('Invoices list navigation', 'textdomain'),
        'filter_items_list'     => __('Filter invoices list', 'textdomain'),
    );
    register_post_type('invoices',
        array(
            'labels'        => $labels_invoices,
            'public'        => true,
            'has_archive'   => true,
            'rewrite'       => array('slug' => 'invoices'),
            'supports'      => array('title', 'editor', 'thumbnail'),
            'show_in_rest'  => false, // Disable Gutenberg editor
            'menu_icon'     => 'dashicons-editor-insertmore', // Custom icon for Invoices
        )
    );
}
add_action('init', 'create_custom_post_types');

//Habits
function register_habit_entries_post_type() {
    $args = array(
        'labels'             => array(
            'name'               => _x('Habit Entries', 'post type general name', 'your-plugin-textdomain'),
            'singular_name'      => _x('Habit Entry', 'post type singular name', 'your-plugin-textdomain'),
            'menu_name'          => _x('Habit Entries', 'admin menu', 'your-plugin-textdomain'),
            'name_admin_bar'     => _x('Habit Entry', 'add new on admin bar', 'your-plugin-textdomain'),
            'add_new'            => _x('Add New', 'habit entry', 'your-plugin-textdomain'),
            'add_new_item'       => __('Add New Habit Entry', 'your-plugin-textdomain'),
            'new_item'           => __('New Habit Entry', 'your-plugin-textdomain'),
            'edit_item'          => __('Edit Habit Entry', 'your-plugin-textdomain'),
            'view_item'          => __('View Habit Entry', 'your-plugin-textdomain'),
            'all_items'          => __('All Habit Entries', 'your-plugin-textdomain'),
            'search_items'       => __('Search Habit Entries', 'your-plugin-textdomain'),
            'parent_item_colon'  => __('Parent Habit Entries:', 'your-plugin-textdomain'),
            'not_found'          => __('No habit entries found.', 'your-plugin-textdomain'),
            'not_found_in_trash' => __('No habit entries found in Trash.', 'your-plugin-textdomain'),
            'archives'           => __('Habit Entry Archives', 'your-plugin-textdomain'),
            'insert_into_item'   => __('Insert into habit entry', 'your-plugin-textdomain'),
            'uploaded_to_this_item' => __('Uploaded to this habit entry', 'your-plugin-textdomain'),
            'filter_items_list'     => __('Filter habit entries list', 'your-plugin-textdomain'),
            'items_list_navigation' => __('Habit entries list navigation', 'your-plugin-textdomain'),
            'items_list'            => __('Habit entries list', 'your-plugin-textdomain'),
        ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'habit-entries'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'menu_icon'          => 'dashicons-heart',
        'supports'           => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments')
    );

    register_post_type('habit_entries', $args);
}

add_action('init', 'register_habit_entries_post_type');

//view performance button in habit edit screen
function yourtheme_add_view_performance_button() {
    global $post;
    
    // Check if we're on the habit_entries post type
    if ('habit_entries' === get_post_type($post->ID)) {
        // URL to the habit entries archive page
        $habit_archive_url = get_post_type_archive_link('habit_entries');
        
        // Only add the button if the archive URL is successfully retrieved
        if ($habit_archive_url) {
            echo '<div id="view-performance-action" class="misc-pub-section misc-pub-view-performance">';
            echo '<a href="' . esc_url($habit_archive_url) . '" class="button button-secondary" target="_blank">View Performance</a>';
            echo '</div>';
        }
    }
}

// Hook into the action
add_action('post_submitbox_misc_actions', 'yourtheme_add_view_performance_button');
