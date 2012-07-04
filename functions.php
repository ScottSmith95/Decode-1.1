<?php
/**
 * Melville functions and definitions
 *
 * @package Melville
 * @since Melville 1.0
 */

/* 
 * Loads the Options Panel
 *
 */
 
if ( !function_exists( 'optionsframework_init' ) ) {
	define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/inc/' );
	require_once dirname( __FILE__ ) . '/inc/options-framework.php';
}

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since Melville 1.0
 */
if ( ! isset( $content_width ) )
	$content_width = 1040; /* pixels */

if ( ! function_exists( 'melville_setup' ) ):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * @since Melville 1.0
 */
function melville_setup() {

	/**
	 * Custom template tags for this theme.
	 */
	require( get_template_directory() . '/inc/template-tags.php' );

	/**
	 * Custom functions that act independently of the theme templates
	 */
	//require( get_template_directory() . '/inc/tweaks.php' );

	/**
	 * Custom Theme Options
	 */
	//require( get_template_directory() . '/inc/theme-options/theme-options.php' );

	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 */
	load_theme_textdomain( 'melville', get_template_directory() . '/languages' );

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Enable support for Post Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'melville' ),
	) );
	
	register_nav_menus( array(
		'secondary' => __( 'Secondary Menu', 'melville' ),
	) );

	/**
	 * Add support for the Aside Post Formats
	 */
	add_theme_support( 'post-formats', array( 'aside', ) );
}
endif; // melville_setup
add_action( 'after_setup_theme', 'melville_setup' );

/**
 * Register widgetized area and update sidebar with default widgets
 *
 * @since Melville 1.0
 */
function melville_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Blog Sidebar', 'melville' ),
		'id' => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Page Sidebar', 'melville' ),
		'id' => 'sidebar-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );


	register_sidebar( array(
		'name' => __( 'Footer Widgets', 'melville' ),
		'id' => 'sidebar-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );
		
}
add_action( 'widgets_init', 'melville_widgets_init' );

/**
 * Enqueue scripts and styles
 */
function melville_scripts() {
	global $post;

	wp_enqueue_script( 'small-menu', get_template_directory_uri() . '/js/small-menu.js', array( 'jquery' ), '20120206', true );
	
	/* Enable this script for custom javascript functionality */
	wp_enqueue_script( 'melville', get_template_directory_uri() . '/js/global.js', array( 'jquery' ), '2.0', true );
}

add_action( 'wp_enqueue_scripts', 'melville_scripts' );

/**
 * Implement the Custom Header feature
 */
 
require( get_template_directory() . '/inc/custom-header.php' );

/* 
 * Custom Sidebar Classes 
 */

function melville_layout( $column ) {
	
	$melville_columns = of_get_option('layout', '2c-l-fixed'); 
	
	switch ($melville_columns) {
	    case '2c-r-fixed':
	        $secondary = ' three columns push_one';
	        $primary = ' eight columns';
	        break;
	    case '1c-fixed':
	        $secondary = '';
	        $primary = ' twelve columns';
	        break;
	    default:
	        $secondary = ' three columns pull';
	        $primary = ' eight columns push';
	        break;
	}
	
	if ( $column == 'primary' ) {
		return $primary;	
	} else {
		return $secondary;
	}
}  

// Add specific CSS class by filter

add_filter('body_class','melville_class_names');

function melville_class_names($classes) {
	
	$color = of_get_option('color_scheme', 'warm');
	$classes[] = $color;
	
	return $classes;
}


