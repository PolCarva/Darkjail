<?php

/**
 * dango acf tailwind functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package dango_acf_tailwind
 */

// BLOCKS
add_action('init', 'register_acf_blocks');
function register_acf_blocks()
{
	// register_block_type(__DIR__ . '/blocks/testimonials');
	// register_block_type(__DIR__ . '/blocks/hero');
	// register_block_type(__DIR__ . '/blocks/secondary-hero');
	// register_block_type(__DIR__ . '/blocks/benefits');
	// register_block_type(__DIR__ . '/blocks/image-text');
	// register_block_type(__DIR__ . '/blocks/logos');
	$blocks = glob(__DIR__ . '/blocks/*', GLOB_ONLYDIR);
	foreach ($blocks as $block) {
		$blockName = basename($block);
		register_block_type(__DIR__ . '/blocks/' . $blockName);
	}
}
add_action('init', 'register_acf_blocks');


// Register the custom post types
function create_posttype()
{
	// Providers Custom Post Type
	register_post_type(
		'providers',
		array(
			'labels' => array(
				'name' => __('Providers'),
				'singular_name' => __('Provider'),
			),
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => 'providers'),
			'show_in_rest' => true,
			'supports' => array('title', 'editor', 'thumbnail', 'custom-fields', 'revisions', 'excerpt', 'page-attributes'), // Add 'page-attributes'
			'taxonomies' => array('category', 'post_tag'),
			'show_in_menu' => 'edit.php?post_type=page', // Display in the Pages menu
		)
	);

	// Service Areas Custom Post Type
	register_post_type(
		'service-areas',
		array(
			'labels' => array(
				'name' => __('Service Areas'),
				'singular_name' => __('Service Area'),
			),
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => 'service-areas'),
			'show_in_rest' => true,
			'supports' => array('title', 'editor', 'thumbnail', 'custom-fields', 'revisions', 'excerpt', 'page-attributes'), // Add 'page-attributes'
			'taxonomies' => array('category', 'post_tag'),
			'show_in_menu' => 'edit.php?post_type=page', // Display in the Pages menu
		)
	);
}
add_action('init', 'create_posttype');


if (!defined('DANGO_ACF_TAILWIND_VERSION')) {
	/*
	 * Set the theme’s version number.
	 *
	 * This is used primarily for cache busting. If you use `npm run bundle`
	 * to create your production build, the value below will be replaced in the
	 * generated zip file with a timestamp, converted to base 36.
	 */
	$versionStyle = date("ymd-Gis", filemtime(get_stylesheet_directory() . '/style.css'));
  $versionScript = date("ymd-Gis", filemtime(get_stylesheet_directory() . '/js/script.min.js'));

  define('DANGO_ACF_TAILWIND_VERSION', $versionStyle);
  define('DANGO_ACF_TAILWIND_VERSION_SCRIPT', $versionScript);
}

if (!defined('DANGO_ACF_TAILWIND_TYPOGRAPHY_CLASSES')) {
	/*
	 * Set Tailwind Typography classes for the front end, block editor and
	 * classic editor using the constant below.
	 *
	 * For the front end, these classes are added by the `dango_acf_tailwind_content_class`
	 * function. You will see that function used everywhere an `entry-content`
	 * or `page-content` class has been added to a wrapper element.
	 *
	 * For the block editor, these classes are converted to a JavaScript array
	 * and then used by the `./javascript/block-editor.js` file, which adds
	 * them to the appropriate elements in the block editor (and adds them
	 * again when they’re removed.)
	 *
	 * For the classic editor (and anything using TinyMCE, like Advanced Custom
	 * Fields), these classes are added to TinyMCE’s body class when it
	 * initializes.
	 */
	define(
		'DANGO_ACF_TAILWIND_TYPOGRAPHY_CLASSES',
		'prose-a:text-primary'
	);
}

if (!function_exists('dango_acf_tailwind_setup')) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function dango_acf_tailwind_setup()
	{
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on dango acf tailwind, use a find and replace
		 * to change 'dango-acf-tailwind' to the name of your theme in all the template files.
		 */
		load_theme_textdomain('dango-acf-tailwind', get_template_directory() . '/languages');

		// Add default posts and comments RSS feed links to head.
		add_theme_support('automatic-feed-links');

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support('title-tag');

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support('post-thumbnails');

		// This theme uses wp_nav_menu() in two locations.
		register_nav_menus(
			array(
				'menu-1' => __('Primary', 'dango-acf-tailwind'),
				'menu-2' => __('Footer 1', 'dango-acf-tailwind'),
				'menu-3' => __('Footer 2', 'dango-acf-tailwind'),
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

		// Add theme support for selective refresh for widgets.
		add_theme_support('customize-selective-refresh-widgets');

		// Add support for editor styles.
		add_theme_support('editor-styles');

		// Enqueue editor styles.
		add_editor_style('style-editor.css');

		// Add support for responsive embedded content.
		add_theme_support('responsive-embeds');

		// Remove support for block templates.
		remove_theme_support('block-templates');
	}
endif;
add_action('after_setup_theme', 'dango_acf_tailwind_setup');

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function dango_acf_tailwind_widgets_init()
{
	register_sidebar(
		array(
			'name'          => __('Footer', 'dango-acf-tailwind'),
			'id'            => 'sidebar-1',
			'description'   => __('Add widgets here to appear in your footer.', 'dango-acf-tailwind'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'dango_acf_tailwind_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function dango_acf_tailwind_scripts()
{
	wp_enqueue_style('dango-acf-tailwind-style', get_template_directory_uri() . '/style.css', array(), DANGO_ACF_TAILWIND_VERSION);
	wp_enqueue_script('dango-acf-tailwind-script', get_template_directory_uri() . '/js/script.min.js', array(), DANGO_ACF_TAILWIND_VERSION_SCRIPT, true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'dango_acf_tailwind_scripts');

/**
 * Enqueue the block editor script.
 */
function dango_acf_tailwind_enqueue_block_editor_script()
{
	wp_enqueue_script(
		'dango-acf-tailwind-editor',
		get_template_directory_uri() . '/js/block-editor.min.js',
		array(
			'wp-blocks',
			'wp-edit-post',
		),
		DANGO_ACF_TAILWIND_VERSION,
		true
	);
}
add_action('enqueue_block_editor_assets', 'dango_acf_tailwind_enqueue_block_editor_script');

/**
 * Enqueue the script necessary to support Tailwind Typography in the block
 * editor, using an inline script to create a JavaScript array containing the
 * Tailwind Typography classes from DANGO_ACF_TAILWIND_TYPOGRAPHY_CLASSES.
 */
function dango_acf_tailwind_enqueue_typography_script()
{
	if (is_admin()) {
		wp_enqueue_script(
			'dango-acf-tailwind-typography',
			get_template_directory_uri() . '/js/tailwind-typography-classes.min.js',
			array(
				'wp-blocks',
				'wp-edit-post',
			),
			DANGO_ACF_TAILWIND_VERSION,
			true
		);
		wp_add_inline_script('dango-acf-tailwind-typography', "tailwindTypographyClasses = '" . esc_attr(DANGO_ACF_TAILWIND_TYPOGRAPHY_CLASSES) . "'.split(' ');", 'before');
	}
}
add_action('enqueue_block_assets', 'dango_acf_tailwind_enqueue_typography_script');

/**
 * Add the Tailwind Typography classes to TinyMCE.
 *
 * @param array $settings TinyMCE settings.
 * @return array
 */
function dango_acf_tailwind_tinymce_add_class($settings)
{
	$settings['body_class'] = DANGO_ACF_TAILWIND_TYPOGRAPHY_CLASSES;
	return $settings;
}
add_filter('tiny_mce_before_init', 'dango_acf_tailwind_tinymce_add_class');

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

function custom_customize_register($wp_customize)
{

	// Add a custom logo field
	$wp_customize->add_setting('custom_site_logo', array(
		'default' => '',
		'sanitize_callback' => 'absint', // Sanitize callback to ensure it's an attachment ID
	));

	$wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'custom_site_logo', array(
		'label' => __('Custom Site Logo', 'text-domain'),
		'section' => 'custom_site_identity',
		'settings' => 'custom_site_logo',
	)));

	// Add a section to the Site Identity panel
	$wp_customize->add_section('custom_site_identity', array(
		'title' => __('Custom Site Identity', 'text-domain'),
		'priority' => 30, // Adjust the priority as needed
	));

	// Add a custom field for the Company Name
	$wp_customize->add_setting('custom_company_name', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field', // You can change the callback function based on your needs
	));

	$wp_customize->add_control('custom_company_name', array(
		'label' => __('Custom Company Name', 'text-domain'),
		'section' => 'custom_site_identity',
		'type' => 'text',
	));



	// Add any other custom fields you need

}
add_action('customize_register', 'custom_customize_register');

// Add a custom image size
add_image_size('extra-large', 1920, 1920, true);