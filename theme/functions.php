<?php
/**
 * Load Lifter functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Load_Lifter
 */

if ( ! defined( 'LL_VERSION' ) ) {
	/*
		* Set the theme’s version number.
		*
		* This is used primarily for cache busting. If you use `npm run bundle` to create your production build, the value below will be replaced in the generated zip file with a timestamp, converted to base 36.
		*/
	define( 'LL_VERSION', '2.15.1' );
}

if ( ! defined( 'LL_COMPANY_LEGAL_NAME' ) ) {
	define( 'LL_COMPANY_LEGAL_NAME', 'BeachFleischman PLLC' );
}
if ( ! defined( 'LL_COMPANY_NICE_NAME' ) ) {
	define( 'LL_COMPANY_NICE_NAME', 'BeachFleischman' );
}

if ( ! defined( 'LL_TYPOGRAPHY_CLASSES' ) ) {
	/*
		* Set Tailwind Typography classes for the front end, block editor and classic editor using the constant below.
		*
		* For the front end, these classes are added by the `_tw_content_class` function. You will see that function used everywhere an `entry-content` or `page-content` class has been added to a wrapper element.
		*
		* For the block editor, these classes are converted to a JavaScript array and then used by the `./javascript/block-editor.js` file, which adds them to the appropriate elements in the block editor (and adds them again when they’re removed.)
		*
		* For the classic editor (and anything using TinyMCE, like Advanced Custom Fields), these classes are added to TinyMCE’s body class when it initializes.
		*/
	define( 'LL_TYPOGRAPHY_CLASSES', 'prose prose-neutral prose-headings:font-light prose-h4:font-light max-w-none prose-blockquote:font-serif prose-a:text-brand-gray lg:prose-xl dark:prose-invert print:prose-sm lg:print:prose-sm' );

}

if ( ! defined( 'LL_LP_TEMPLATES' ) ) {
	define(
		'LL_LP_TEMPLATES',
		[ 'tpl-landing-page-bare.php', 'tpl-landing-page-cyber.php', 'tpl-landing-page.php' ]
	);
}


if ( ! function_exists( 'll_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which runs before the init hook. The init hook is too late for some features, such as indicating support for post thumbnails.
	 */
	function ll_setup() {
		/*
			* Make theme available for translation.
			* Translations can be filed in the /languages/ directory. If you're building a theme based on Load Lifter, use a find and replace to change 'loadlifter' to the name of your theme in all the template files.
			*/
		load_theme_textdomain( 'loadlifter', get_template_directory() . '/languages' );

		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
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

		register_nav_menus(
			array(
				'll_submenu_assurance' => __( 'Assurance submenu', 'loadlifter' ),
				'll_submenu_tax' => __( 'Tax submenu', 'loadlifter' ),
				'll_submenu_soar' => __( 'SOAR submenu', 'loadlifter' ),
				'll_submenu_industries' => __( 'Industries submenu', 'loadlifter' ),
				'll_submenu_about' => __( 'About submenu', 'loadlifter' ),
				'll_submenu_careers' => __( 'Careers submenu', 'loadlifter' ),
			)
		);

		add_theme_support( 'responsive-embeds' );
		add_theme_support( 'disable-custom-font-sizes' );
		// Add theme support for selective refresh for widgets.
		// add_theme_support( 'customize-selective-refresh-widgets' );
		add_theme_support( 'editor-styles' );
		add_editor_style( 'style-editor.css' );

		add_post_type_support( 'page', 'excerpt' );

		add_filter( 'feed_links_show_comments_feed', '__return_false' );

		remove_theme_support( 'block-templates' ); // <-- FSE?
		remove_action( 'wp_head', 'rsd_link' );
		remove_action( 'wp_head', 'wp_generator' );
		remove_action( 'wp_head', 'index_rel_link' );
		remove_action( 'wp_head', 'wlwmanifest_link' );
		remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
		remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
		remove_action( 'wp_head', 'adjacent_posts_rel_link', 10, 0 );
		remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
		remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 );
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
	$GLOBALS['content_width'] = apply_filters( 'll_content_width', 960 );
}
// add_action( 'after_setup_theme', 'll_content_width', 0 );

/**
 * Enqueue scripts and styles.
 */
// function ll_remove_default_block_styles() {
// 	wp_deregister_style( 'wp-block-library' );
// }
// add_action( 'admin_init', 'll_remove_default_block_styles' );

function ll_scripts() {
	// wp_register_style( 'a11y-slider-base', 'https://unpkg.com/a11y-slider@latest/dist/a11y-slider.css', [], '' ); /* 20240712 - rolled these into the local a11yslider.css file. Do not need this third-party file */
	wp_register_style( 'a11y-slider-styles', get_template_directory_uri() . '/a11yslider.css', [], LL_VERSION );
	wp_enqueue_style( 'loadlifter-style', get_stylesheet_uri(), [], LL_VERSION );
	if ( get_field( 'll_postpage_css' ) ) {
		$inline_css = get_field( 'll_postpage_css' );
		wp_add_inline_style( 'loadlifter-style', $inline_css );
	}

	// wp_register_script( 'a11y-slider', 'https://unpkg.com/a11y-slider@latest/dist/a11y-slider.js', [], '', false );
	wp_register_script( 'a11y-slider', get_template_directory_uri() . '/js/a11y-slider.min.js', [], '', false );
	wp_register_script( 'block-litevimeoembed', 'https://cdn.jsdelivr.net/npm/lite-vimeo-embed/+esm', [], false, false );
	wp_register_script( 'gcharts', 'https://www.gstatic.com/charts/loader.js', [], LL_VERSION, true );

	// wp_enqueue_script( 'hubspot-forms', 'https://js.hsforms.net/forms/v2.js', [], LL_VERSION, false );
	wp_enqueue_script( 'fa-kit', 'https://kit.fontawesome.com/e89cbc8fa5.js' );

	if ( !is_page_template( LL_LP_TEMPLATES ) ) {
		wp_enqueue_script( 'loadlifter-script', get_template_directory_uri() . '/js/script.min.js', [ 'wp-blocks' ], LL_VERSION, true );
	}
}
add_action( 'wp_enqueue_scripts', 'll_scripts' );


add_filter( 'flying_press_exclude_from_minify:css' , function ($exclude_keywords) {
	$exclude_keywords = ['loadlifter'];
	return $exclude_keywords;
});


function ll_disable_wp_links_menu() {
	remove_menu_page( 'link-manager.php' );
}


function ll_load_admin_styles() {
	wp_register_style( 'rsms-inter', 'https://rsms.me/inter/inter.css' );
	wp_enqueue_style( 'rsms-inter' );

	wp_enqueue_style( 'll-admin', get_template_directory_uri().'/admin.css' );
}


/**
 * Disable automatic creation of YARPP thumbnail sizes
 * ... and disable yarpp stylesheets
 */
add_filter( 'yarpp_add_image_size', '__return_false' );
add_filter( 'yarpp_enqueue_related_style', '__return_false' );
add_filter( 'yarpp_enqueue_thumbnails_style', '__return_false' );


switch( wp_get_environment_type() ) {
	case 'local':
		add_action( 'admin_enqueue_scripts', 'll_load_admin_styles' );
		add_filter( 'be_media_from_production_url', function() {
			return 'https://beachfleischman.com';
		});
		break;

	case 'staging':
		add_action( 'admin_enqueue_scripts', 'll_load_admin_styles' );
		add_filter( 'be_media_from_production_url', function() {
			return 'https://beachfleischman.com';
		});
		break;

	default:
		add_action( 'admin_menu', 'll_disable_wp_links_menu' );
		add_action( 'admin_enqueue_scripts', 'll_load_admin_styles' );
		/* Hide Jetpack upsell ads */
		add_filter( 'jetpack_just_in_time_msgs', '__return_false', 99 );
		break;
}


/**
 * Enqueue CSS and JS for A11y Slider when shortcode is present
 */
function ll_enq_a11y_slider_assets() {
	global $post;
	if( is_a( $post, 'WP_Post' ) && has_shortcode( $post->post_content, 'a11yslider' ) ) {
		wp_enqueue_style( 'a11y-slider-styles' );
		wp_enqueue_script( 'a11y-slider' );
	}
}
add_action( 'wp_enqueue_scripts', 'll_enq_a11y_slider_assets' );

/**
 * Enqueue the block editor script.
 */
function ll_enqueue_block_editor_script() {

	if ( is_admin() ) {
		wp_enqueue_script(
			'll-editor',
			get_template_directory_uri() . '/js/block-editor.min.js',
			array(
				'wp-blocks',
				'wp-edit-post',
			),
			LL_VERSION,
			true
		);
		wp_add_inline_script( 'll-editor', "tailwindTypographyClasses = '" . esc_attr( LL_TYPOGRAPHY_CLASSES ) . "'.split(' ');", 'before' );
	}

}
add_action( 'enqueue_block_assets', 'll_enqueue_block_editor_script' );

/**
 * Add the Tailwind Typography classes to TinyMCE.
 *
 * @param array $settings TinyMCE settings.
 * @return array
 */
function ll_tinymce_add_class( $settings ) {
	$settings['body_class'] = LL_TYPOGRAPHY_CLASSES;
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
if ( 'production' !== wp_get_environment_type() ) {
	require get_template_directory() . '/inc/cpt-job-openings.php';
}

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

/**
 * Custom menu walkers
 */
require get_template_directory() . '/inc/menu-walker.php';

/**
 * Include ACF field content in search results
 */
require get_template_directory() . '/inc/search-mods.php';
