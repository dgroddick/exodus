<?php
/**
 * Theme Customizer
 *
 * @package nidavellir
 */
function nidavellir_customize_register( $wp_customize ) {

	/**
	 * Settings for changing the page layout
	 */
	$wp_customize->add_section( 'layout' , array(
		'title' => __( 'Layout', 'nidavellir'),
		'priority'  => 30,
	) );

	$wp_customize->add_setting( 'nidavellir_layout', array(
		'default'   => 'layout-left',
		'transport' => 'refresh'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'nidavellir_layout', array(
		'label'     => __( 'Layout', 'nidavellir' ),
		'description' => __( 'Change the layout of the page.', 'nidavellir' ),
		'section'   => 'layout',
		'settings'  => 'nidavellir_layout',
		'type'      => 'radio',
		'choices'   => array(
			'layout-left' => __( 'Left layout', 'nidavellir' ),
			'layout-right' => __( 'Right Layout', 'nidavellir' ),
			'layout-center' => __( 'Center Layout', 'nidavellir' )
		)
	) ) );

}
add_action( 'customize_register', 'nidavellir_customize_register' );

/**
 * Hook for the layout
 */
function nidavellir_layout_settings( $layout ) {

	$layout = get_theme_mod( 'nidavellir_layout', 'layout-left' );
	return $layout;

}
add_filter( 'nidavellir_change_layout' , 'nidavellir_layout_settings' );


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
