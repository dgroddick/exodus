<?php
/**
 * Theme Customizer
 *
 * @package nidavellir
 */

/**
 * Register Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function nidavellir_customize_register( $wp_customize ) {

	$wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'nidavellir_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'nidavellir_customize_partial_blogdescription',
			)
		);
	}

	/**
	 * Settings for changing the page layout
	 */
	$wp_customize->add_section(
		'layout',
		array(
			'title'     => __( 'Layout', 'nidavellir' ),
			'priority'  => 30,
		)
	);

	$wp_customize->add_setting(
		'nidavellir_layout',
		array(
			'default'   => 'layout-center',
			'transport' => 'refresh',
			'sanitize_callback' => 'esc_attr',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'nidavellir_layout',
			array(
				'label'         => __( 'Layout', 'nidavellir' ),
				'description'   => __( 'Change the layout of the page.', 'nidavellir' ),
				'section'       => 'layout',
				'settings'      => 'nidavellir_layout',
				'type'          => 'radio',
				'choices'       => array(
					'layout-left'   => __( 'Left layout', 'nidavellir' ),
					'layout-right'  => __( 'Right Layout', 'nidavellir' ),
					'layout-center' => __( 'Center Layout', 'nidavellir' ),
				),
			)
		)
	);


	/**
	 * Primary color.
	 */
	$wp_customize->add_setting(
		'primary_color',
		array(
			'default'           => 'default',
			'transport'         => 'refresh',
			'sanitize_callback' => 'nidavellir_sanitize_color_option',
		)
	);
	$wp_customize->add_control(
		'primary_color',
		array(
			'type'     => 'radio',
			'label'    => __( 'Primary Color', 'nidavellir' ),
			'choices'  => array(
				'default'  => _x( 'Default', 'primary color', 'nidavellir' ),
				'custom' => _x( 'Custom', 'primary color', 'nidavellir' ),
			),
			'section'  => 'colors',
			'priority' => 5,
		)
	);
	// Add primary color hue setting and control.
	$wp_customize->add_setting(
		'primary_color_hue',
		array(
			'default'           => 199,
			'transport'         => 'refresh',
			'sanitize_callback' => 'absint',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'primary_color_hue',
			array(
				'description' => __( 'Apply a custom color for buttons, links, featured images, etc.', 'nidavellir' ),
				'section'     => 'colors',
				'mode'        => 'hue',
			)
		)
	);
}
add_action( 'customize_register', 'nidavellir_customize_register' );

/**
 * Hook for the layout
 */
function nidavellir_layout_settings() {

	$layout = get_theme_mod( 'nidavellir_layout', 'layout-center' );
	return $layout;

}
add_filter( 'nidavellir_change_layout', 'nidavellir_layout_settings' );


/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function nidavellir_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function nidavellir_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Bind JS handlers to instantly live-preview changes.
 */
function nidavellir_customize_preview_js() {
	wp_enqueue_script( 'nidavellir-customize-preview', get_theme_file_uri( '/js/customize-preview.js' ), array( 'customize-preview' ), '1.0', true );
}
add_action( 'customize_preview_init', 'nidavellir_customize_preview_js' );

/**
 * Load dynamic logic for the customizer controls area.
 */
function nidavellir_customize_controls_js() {
	wp_enqueue_script( 'nidavellir-customize-controls', get_theme_file_uri( '/js/customize-controls.js' ), array( 'customize-controls' ), '1.0', true );
}
add_action( 'customize_preview_init', 'nidavellir_customize_controls_js' );

/**
 * Sanitize custom color choice.
 *
 * @param string $choice Whether image filter is active.
 *
 * @return string
 */
function nidavellir_sanitize_color_option( $choice ) {
	$valid = array(
		'default',
		'custom',
	);
	if ( in_array( $choice, $valid, true ) ) {
		return $choice;
	}
	return 'default';
}
