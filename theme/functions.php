<?php
/**
 * Load Lifter functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Load_Lifter
 */

$theme_version = wp_get_theme()->get( 'Version' );
$version_string = is_string( $theme_version ) ? $theme_version : false;

if ( ! function_exists( 'll_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function ll_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Load Lifter, use a find and replace
		 * to change 'loadlifter' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'loadlifter', get_template_directory() . '/languages' );

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
		// register_nav_menus(
		// 	array(
		// 		'menu-1' => esc_html__( 'Primary', 'loadlifter' ),
		// 		'menu-2' => esc_html__( 'Footer', 'loadlifter' ),
		// 	)
		// );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		// add_theme_support(
		// 	'custom-background',
		// 	apply_filters(
		// 		'll_custom_background_args',
		// 		array(
		// 			'default-color' => 'ffffff',
		// 			'default-image' => '',
		// 		)
		// 	)
		// );

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

		/**
		 * Add responsive embeds and block editor styles.
		 */
		add_theme_support( 'responsive-embeds' );
		add_theme_support( 'editor-styles' );
		add_editor_style( 'style-editor.css' );
		remove_theme_support( 'block-templates' );

		add_theme_support( 'disable-custom-font-sizes' );
	}
endif;
add_action( 'after_setup_theme', 'll_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function ll_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'll_content_width', 640 );
}
add_action( 'after_setup_theme', 'll_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function ll_widgets_init() {

	register_sidebar( [
		'id' 			=> 'sidebar-prehead',
		'name'			=> esc_html__( 'Pre-Head Banner Area', 'loadlifter' ),
		'description'	=> esc_html__( 'Add a single Custom HTML widget here.', 'loadlifter' ),
		'before_widget'	=> '',
		'after_widget'	=> '',
		'before_title'	=> '<h5 class="hidden">',
		'after_title'	=> '</h5>',
	] );

	register_sidebar( [
		'id'            => 'sidebar-1',
		'name'          => esc_html__( 'Sidebar', 'loadlifter' ),
		'description'   => esc_html__( 'Add widgets here.', 'loadlifter' ),
		'before_widget' => '<section id="%1$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h5 class="text-lg">',
		'after_title'   => '</h5>',
	] );

	register_sidebar( [
		'id'            => 'sidebar-after-post',
		'name'          => esc_html__( 'After-Post Area', 'loadlifter' ),
		'description'   => esc_html__( 'Add widgets here.', 'loadlifter' ),
		'before_widget' => '<section id="%1$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h5 class="text-lg">',
		'after_title'   => '</h5>',
	] );

	register_sidebar( [
		'id' 			=> 'sidebar-prefoot',
		'name'			=> esc_html__( 'Pre-Footer Banner Area', 'loadlifter' ),
		'description'	=> esc_html__( 'Add a single Custom HTML widget here.', 'loadlifter' ),
		'before_widget'	=> '',
		'after_widget'	=> '',
		'before_title'	=> '<h5 class="hidden">',
		'after_title'	=> '</h5>',
	] );

}
add_action( 'widgets_init', 'll_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
// function ll_remove_default_block_styles() {
// 	wp_deregister_style( 'wp-block-library' );
// }
// add_action( 'admin_init', 'll_remove_default_block_styles' );

function ll_scripts() {
	global $version_string;

	wp_enqueue_style( 'loadlifter-style', get_stylesheet_uri(), array(), $version_string );
	wp_enqueue_script( 'fa-kit', 'https://kit.fontawesome.com/e89cbc8fa5.js' );
	wp_enqueue_script( 'loadlifter-script', get_template_directory_uri() . '/js/script.min.js', array( 'wp-blocks' ), $version_string, true );


	// if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
	// 	wp_enqueue_script( 'comment-reply' );
	// }
}
add_action( 'wp_enqueue_scripts', 'll_scripts' );

function ll_guten_scripts() {
	global $version_string;

	wp_enqueue_script( 'loadlifter-guten', get_template_directory_uri() . '/js/script.min.js', array( 'wp-blocks' ), $version_string, true );

}
add_action( 'enqueue_block_editor_assets', 'll_guten_scripts' );

/**
 * Add the block editor class to TinyMCE.
 *
 * This allows TinyMCE to use Tailwind Typography styles with no other changes.
 *
 * @param array $settings TinyMCE settings.
 * @return array
 */
function ll_tinymce_add_class( $settings ) {
	$settings['body_class'] = 'block-editor-block-list__layout';
	return $settings;
}
add_filter( 'tiny_mce_before_init', 'll_tinymce_add_class' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Register block styles
 */
require get_template_directory() . '/inc/block-styles.php';

/**
 * Register block patterns
 */
require get_template_directory() . '/inc/block-patterns.php';

/**
 * Custom Post Types
 */
require get_template_directory() . '/inc/cpt-people.php';
require get_template_directory() . '/inc/cpt-industries.php';
