<?php 
/**
 * Customizer: Logo frame only if using WordPress 4.5
 *
 * @package Squarex Lite
 */

	/* Logo Round Frame */
	$wp_customize->add_setting( 
		'squarex_frame_logo',
		array(
			'sanitize_callback' => 'squarex_sanitize_checkbox',
		)
	);
	$wp_customize->add_control(
		'squarex_frame_logo',
		array(
			'section'   => 'title_tagline',
			'label'     => __( 'No Frame logo', 'squarex-lite' ),
			'type'      => 'checkbox'
		)
	);