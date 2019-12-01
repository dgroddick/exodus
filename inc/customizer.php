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

	$wp_customize->get_setting( 'blogname' )->transport        = 'refresh';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'refresh';

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
 * Load dynamic logic for the customizer controls area.
 */
function nidavellir_customize_controls_js() {
	wp_enqueue_script( 'nidavellir-customizer', get_theme_file_uri( '/js/customizer.js' ), array( 'customize-controls' ), '1.0', true );
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
