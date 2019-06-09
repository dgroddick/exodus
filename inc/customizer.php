<?php
/**
 * Theme Customizer
 *
 * @package nidavellir
 */
function nidavellir_customize_register( $wp_customize ) {

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
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
	 * Primary color.
	 */
	$wp_customize->add_setting(
		'primary_color',
		array(
			'default'           => 'default',
			'transport'         => 'postMessage',
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
			'transport'         => 'postMessage',
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
	wp_enqueue_script( 'nidavellir-customize-preview', get_theme_file_uri( '/js/customize.js' ), array( 'customize-preview' ), '1.0', true );
}
add_action( 'customize_preview_init', 'nidavellir_customize_preview_js' );

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
