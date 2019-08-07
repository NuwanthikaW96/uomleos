<?php
/**
 * FortySeven Street functions and definitions.
 *
 * @link https://codex.wordpress.org/Functions_File_Explained
 *
 * @package FortySeven Street
 */
if ( ! function_exists( 'fortyseven_street_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function fortyseven_street_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on FortySeven Street, use a find and replace
	 * to change 'fortyseven-street' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'fortyseven-street', get_template_directory() . '/languages' );

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
	add_image_size('fortyseven-street-home-slider', 1920, 850, true);
	add_image_size('fortyseven-street-home-fullwidth', 1920, 350, true); 
	add_image_size('fortyseven-street-home-portfolio', 285, 285, true); 
	add_image_size('fortyseven-street-blog-large', 565, 460, true); 
	add_image_size('fortyseven-street-blog-small', 565, 223, true); 
	add_image_size('fortyseven-street-circular',250,250,true);

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'fortyseven-street' ),
		) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
		) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside'
		) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'fortyseven_street_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
		) ) );

	add_theme_support( 'custom-logo' , array(
		'header-text' => array( 'site-title', 'site-description' ),
		));

	add_theme_support( 'woocommerce' );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	add_editor_style('css/editor-style.css');
}
endif; // fortyseven_street_setup
add_action( 'after_setup_theme', 'fortyseven_street_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function fortyseven_street_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'fortyseven_street_content_width', 640 );
}
add_action( 'after_setup_theme', 'fortyseven_street_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function fortyseven_street_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'fortyseven-street' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
		) );

	register_sidebar( array(
		'name'          => esc_html__( 'Right Sidebar', 'fortyseven-street' ),
		'id'            => 'fortyseven-street-right-sidebar',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
		) );

	register_sidebar( array(
		'name'          => esc_html__( 'Left Sidebar', 'fortyseven-street' ),
		'id'            => 'fortyseven-street-left-sidebar',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
		) );

	register_sidebar( array(
		'name'          => __( 'Footer Block', 'fortyseven-street' ),
		'id'            => 'fortyseven-street-footer-one',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
		) );

	register_sidebar( array(
		'name'          => __( 'Skills Section', 'fortyseven-street' ),
		'id'            => 'fortyseven-street-skills-section',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
		) );
}
add_action( 'widgets_init', 'fortyseven_street_widgets_init' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load assets/customize file.
 */
require get_template_directory() . '/inc/admin-panel/assets/slider-settings.php';
require get_template_directory() . '/inc/admin-panel/assets/homepage-settings.php';
require get_template_directory() . '/inc/admin-panel/assets/social-link-settings.php';
require get_template_directory() . '/inc/admin-panel/assets/general-settings.php';
require get_template_directory() . '/inc/admin-panel/assets/archive-settings.php';
require get_template_directory() . '/inc/admin-panel/assets/sanitizer.php';

 /**
  * 
  * Load FortySeven Street Custom Widget 
  * 
  */
 require get_template_directory() . '/inc/admin-panel/street-widget.php'; 
 /**
  * 
  * Street Custom metabox/function Files
  * 
  */
 require get_template_directory() . '/inc/admin-panel/street-metabox.php'; 
 require get_template_directory() . '/inc/street-function.php';  
 
 /**
 * Load dropdown file.
 */
 require get_template_directory() . '/inc/admin-panel/dropdown/post-dropdown.php';
 require get_template_directory() . '/inc/admin-panel/dropdown/category-dropdown.php';
 /**
 *  Load forty seven street setup instruction in site
 */
 require get_template_directory() . '/inc/about-theme.php';
 require get_template_directory() . '/inc/custom-header.php';