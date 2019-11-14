<?php
/**
 * Theme functions
 *
 * @package nidavellir
 */

if ( ! function_exists( 'nidavellir_setup' ) ) :

	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 */
	function nidavellir_setup() {

		load_theme_textdomain( 'nidavellir', get_template_directory() . '/languages' );

		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'custom-header' );
		add_theme_support( 'customize-selective-refresh-widgets' );
		add_theme_support( 'responsive-embeds' );
		add_theme_support( 'wp-block-styles' );
		add_theme_support( 'align-wide' );
		add_theme_support( 'responsive-embeds' );

		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'script',
				'style',
			)
		);

		register_nav_menus(
			array(
				'main-menu' => esc_html__( 'Primary', 'nidavellir' ),
			)
		);

		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);

		add_editor_style( get_stylesheet_uri() );
	}
endif;
add_action( 'after_setup_theme', 'nidavellir_setup' );

/**
 * Theme content width
 */
function nidavellir_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'nidavellir_content_width', 640 );
}
add_action( 'after_setup_theme', 'nidavellir_content_width', 0 );


/**
 * Register widget area.
 */
function nidavellir_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'nidavellir' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'nidavellir' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'nidavellir_widgets_init' );

/**
 * Scripts and styles
 */
function nidavellir_load_scripts() {
	wp_enqueue_style( 'nidavellir-style', get_stylesheet_uri(), array(), wp_get_theme()->get( 'Version' ) );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'nidavellir_load_scripts' );


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
