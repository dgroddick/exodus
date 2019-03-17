<?php
/**
 * Theme functions
 *
 * @package exodus
 *
 */
if ( !function_exists( 'exodus_setup' ) ):
	
	function exodus_setup() {
		if ( ! isset( $content_width ) ) {
			$content_width = 600;
		}

		load_theme_textdomain( 'exodus', get_template_directory() . '/languages' );

		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'custom-header' );

		register_nav_menus(array(
			'main-menu' => esc_html__( 'Primary', 'exodus' ),
		));

		add_theme_support('custom-background', apply_filters( 'exodus_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		)));

		add_theme_support( 'custom-logo', array(
			'height' => 250,
			'width' => 250,
			'flex-width' => true,
			'flex-height' => true,
		));
	}
endif;
add_action( 'after_setup_theme', 'exodus_setup' );

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
