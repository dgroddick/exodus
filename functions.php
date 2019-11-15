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

		add_theme_support(
			'editor-color-palette',
			array(
				array(
					'name'  => __( 'Primary', 'nidavellir' ),
					'slug'  => 'primary',
					'color' => '#0000ff',
				),
				array(
					'name'  => __( 'Secondary', 'nidavellir' ),
					'slug'  => 'secondary',
					'color' => '#000',
				),
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

function nidavellir_custom_header_setup() {
    $args = array(
        'default-image'      => get_template_directory_uri() . 'img/default-image.jpg',
        'default-text-color' => '000',
        'width'              => 1000,
        'height'             => 250,
        'flex-width'         => true,
        'flex-height'        => true,
	);
	add_theme_support( 'custom-header', $args );
}
add_action( 'after_setup_theme', 'nidavellir_custom_header_setup' );

/**
 * Display custom color CSS in customizer and on frontend.
 */
function nidavellir_colors_css_wrap() {
	// Only include custom colors in customizer or frontend.
	if ( ( ! is_customize_preview() && 'default' === get_theme_mod( 'primary_color', 'default' ) ) || is_admin() ) {
		return;
	}
	require_once get_parent_theme_file_path( '/inc/color-patterns.php' );
	$primary_color = 199;
	if ( 'default' !== get_theme_mod( 'primary_color', 'default' ) ) {
		$primary_color = get_theme_mod( 'primary_color_hue', 199 );
	}
	?>

	<style type="text/css" id="custom-theme-colors" <?php echo is_customize_preview() ? 'data-hue="' . absint( $primary_color ) . '"' : ''; ?>>
		<?php echo nidavellir_custom_colors_css(); ?>
	</style>
	<?php
}
add_action( 'wp_head', 'nidavellir_colors_css_wrap' );


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
