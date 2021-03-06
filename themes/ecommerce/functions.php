<?php
/**
 * ecommerce functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package ecommerce
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'ecommerce_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function ecommerce_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on ecommerce, use a find and replace
		 * to change 'ecommerce' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'ecommerce', get_template_directory() . '/languages' );

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
				'menu-1' => esc_html__( 'Primary', 'ecommerce' ),
				'footer-links' => esc_html__( 'Footer Links', 'ecommerce' ),
				'footer-links-company' => esc_html__( 'Footer Links - Company', 'ecommerce' ),
				'footer-links-social' => esc_html__( 'Footer Links - Social', 'ecommerce' ),
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
				'ecommerce_custom_background_args',
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
endif;
add_action( 'after_setup_theme', 'ecommerce_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function ecommerce_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'ecommerce_content_width', 640 );
}
add_action( 'after_setup_theme', 'ecommerce_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function ecommerce_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'ecommerce' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'ecommerce' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'ecommerce_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function ecommerce_scripts() {
	wp_enqueue_style( 'ecommerce-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'ecommerce-style', 'rtl', 'replace' );

	wp_enqueue_script( 'ecommerce-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	wp_enqueue_style( 'foundation-style', get_template_directory_uri(  ) . '/assets/css/vendor/foundation.css' );
	wp_enqueue_script( 'foundation-script', get_template_directory_uri(  ) .'/assets/js/vendor/foundation.js' );

	wp_enqueue_style( 'block-style', get_template_directory_uri(  ) . '/assets/css/block_styles.css' );
	wp_enqueue_style( 'theme-style', get_template_directory_uri(  ) . '/assets/css/site.css' );
	wp_enqueue_style( 'woocommerce-style', get_template_directory_uri(  ) . '/assets/css/woocommerce_styles.css' );

}
add_action( 'wp_enqueue_scripts', 'ecommerce_scripts' );

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

// Installing Glide Slider
function ecommerce_glide_slider() {
	if ( basename(get_page_template( )) == 'page-home.php' ) {
		wp_enqueue_style( 'glide-css', get_template_directory_uri() . '/assets/vendor/glide/css/glide.core.min.css' );
		wp_enqueue_style( 'glide-theme', get_template_directory_uri() . '/assets/vendor/glide/css/glide.theme.min.css' );
		wp_enqueue_script( 'glide-js', get_template_directory_uri() . '/assets/vendor/glide/glide.min.js' );
	}
}

add_action( 'wp_enqueue_scripts', 'ecommerce_glide_slider' );

// registering new custom post type
function custom_post_registration() {
	register_post_type( 'featured', array(
		"labels" => array(
			"name" => __('Featured Shoes'),
			'singular_name' => __('Feature Shoe'),
		),
		"public" => true,
		"has_archive" => true,
		'show_in_rest' => true,
		'supports' => array('title', 'editor', 'excerpt', 'thumbnail')
	) );
}

// adding custom post type to my theme
add_action( 'init', 'custom_post_registration' );