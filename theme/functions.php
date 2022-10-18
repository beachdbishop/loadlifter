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

		add_post_type_support( 'page', 'excerpt' );

		remove_action('wp_head', 'rsd_link');
		remove_action('wp_head', 'wp_generator');
		remove_action('wp_head', 'index_rel_link');
		remove_action('wp_head', 'wlwmanifest_link');
		remove_action('wp_head', 'start_post_rel_link', 10, 0);
		remove_action('wp_head', 'parent_post_rel_link', 10, 0);
		remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);
		remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
		remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
		remove_action( 'wp_head', 'print_emoji_detection_script', 7);
		remove_action( 'wp_print_styles', 'print_emoji_styles');
		remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
		remove_action( 'admin_print_styles', 'print_emoji_styles' );
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

	// wp_register_style( 'a11y-slider-base', get_template_directory_uri() . '/a11y-slider.css', [], $version_string );
	wp_register_style( 'a11y-slider-base', 'https://unpkg.com/a11y-slider@latest/dist/a11y-slider.css', [], '' );
	wp_enqueue_style( 'loadlifter-style', get_stylesheet_uri(), [], $version_string );

	wp_enqueue_script( 'fa-kit', 'https://kit.fontawesome.com/e89cbc8fa5.js' );
	wp_enqueue_script( 'vanilla-tilt', get_template_directory_uri() . '/js/vanilla-tilt.min.js', [], $version_string, true );
	wp_enqueue_script( 'loadlifter-script', get_template_directory_uri() . '/js/script.min.js', [ 'wp-blocks' ], $version_string, true );
	// wp_enqueue_script( 'detutils', get_template_directory_uri() . '/js/details-utils.js', [], '', true );
	// wp_register_script( 'a11y-slider', get_template_directory_uri() . '/js/a11y-slider.js', [], $version_string, false );
	wp_register_script( 'a11y-slider', 'https://unpkg.com/a11y-slider@latest/dist/a11y-slider.js', [], '', false );


}
add_action( 'wp_enqueue_scripts', 'll_scripts' );

function ll_guten_scripts() {
	global $version_string;

	wp_enqueue_script( 'loadlifter-guten', get_template_directory_uri() . '/js/script.min.js', [ 'wp-blocks' ], $version_string, true );

}
add_action( 'enqueue_block_editor_assets', 'll_guten_scripts' );


/**
 * Add Checka11y stylesheet on dev
 */
function ll_checka11y_style() {
	wp_enqueue_style( 'checka11y', 'https://cdn.jsdelivr.net/npm/checka11y-css@2.3.0/checka11y.css', array(), '' );
}


add_action( 'admin_head', 'll_disable_wp57_menu_hover' );
function ll_disable_wp57_menu_hover() {
	echo '<style>#adminmenu a:focus, #adminmenu a:hover, .folded #adminmenu .wp-submenu-head:hover { box-shadow: none !important; }</style>';
}


switch( wp_get_environment_type() ) {
	case 'local':
		// add_action( 'wp_enqueue_scripts', 'll_checka11y_style' );
		// add_action( 'admin_head', 'll_disable_wp57_menu_hover' );
		break;

	case 'staging':
		// add_action( 'admin_head', 'll_disable_wp57_menu_hover' );
		break;

	default:
		/**
		 * Hide Jetpack upsell ads
		 */
		add_filter( 'jetpack_just_in_time_msgs', '__return_false', 99 );
		break;
}


/**
 * Enqueue CSS and JS for A11y Slider when shortcode is present
 */
function ll_enq_a11y_slider_assets() {
	global $post;
	if( is_a( $post, 'WP_Post' ) && has_shortcode( $post->post_content, 'a11yslider' ) ) {
		wp_enqueue_style( 'a11y-slider-base' );
		wp_enqueue_script( 'a11y-slider' );
	}
}
add_action( 'wp_enqueue_scripts', 'll_enq_a11y_slider_assets' );

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
 * ACF Pro settings
 */
require get_template_directory() . '/inc/acf.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/template-functions.php';

/**
 * Custom Post Types
 */
require get_template_directory() . '/inc/cpt-people.php';
require get_template_directory() . '/inc/cpt-industries.php';
require get_template_directory() . '/inc/cpt-job-openings.php';

/**
 * Register block categories, patterns, and styles
 */
remove_theme_support( 'core-block-patterns' );
require get_template_directory() . '/inc/block-categories.php';
require get_template_directory() . '/inc/block-styles.php';

/**
 * Register custom blocks
 */
require get_template_directory() . '/inc/blocks.php';

/**
 * Register shortcodes
 */
require get_template_directory() . '/inc/shortcodes.php';
