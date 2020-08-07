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

	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
	
	$wp_customize->remove_control( 'header_textcolor' );

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

	$wp_customize->add_setting( 'nidavellir_header_textcolor' , array(
		'default'   => '#000000',
		'type' 		=> 'theme_mod',
		'transport' => 'postMessage',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nidavellir_header_textcolor', array(
		'label'      => __( 'Header Text Color', 'nidavellir' ),
		'section'    => 'colors',
		'settings'   => 'nidavellir_header_textcolor',
	) ) );

	$wp_customize->add_setting( 'nidavellir_hover_color' , array(
		'default'   => '#FFFF00',
		'type' 		=> 'theme_mod',
		'transport' => 'postMessage',
      	'sanitize_callback' => 'sanitize_hex_color'
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nidavellir_hover_color', array(
		'label'      => __( 'Link Hover Color', 'nidavellir' ),
		'section'    => 'colors',
		'settings'   => 'nidavellir_hover_color',
	) ) );

}
add_action( 'customize_register', 'nidavellir_customize_register' );

function nidavellir_layout_settings() {
	$layout = get_theme_mod( 'nidavellir_layout', 'layout-center' );
	return $layout;
}
add_filter( 'nidavellir_change_layout', 'nidavellir_layout_settings' );

function nidavellir_customize_partial_blogname() {
	bloginfo( 'name' );
}

function nidavellir_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

function nidavellir_customize_preview_js() {
	wp_enqueue_script( 'nidavellir-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), 0, true );
}
add_action( 'customize_preview_init', 'nidavellir_customize_preview_js' );
