<?php
/**
 * Theme functions
 *
 * @package exodus
 *
 */
if ( !function_exists( 'exodus_setup' ) ):

	function exodus_setup() {

		load_theme_textdomain( 'exodus', get_template_directory() . '/languages' );

		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'custom-header' );

		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		add_theme_support( 'wp-block-styles' );
		add_theme_support( 'align-wide' );
		add_theme_support( 'responsive-embeds' );

		register_nav_menus(array(
			'main-menu' => esc_html__( 'Primary', 'exodus' ),
		));

		add_theme_support( 'custom-background', apply_filters( 'exodus_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		)));

		add_theme_support( 'custom-logo', array(
			'height' => 250,
			'width' => 250,
			'flex-width' => true,
			'flex-height' => true,
		));

		add_editor_style( get_stylesheet_uri() );
	}
endif;
add_action( 'after_setup_theme', 'exodus_setup' );

/**
 * Theme content width
 */
function exodus_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'exodus_content_width', 640 );
}
add_action( 'after_setup_theme', 'exodus_content_width', 0 );


/**
 * Register widget area.
 *
 */
function exodus_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'exodus' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'exodus' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'exodus_widgets_init' );

/**
 * Scripts and styles
 *
 */
function exodus_load_scripts() {
	wp_enqueue_style( 'exodus-style', get_stylesheet_uri() );
	
	if (is_singular() && comments_open() && get_option( 'thread_comments' )) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'exodus_load_scripts' );


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
