<?php 
/**
 * Customizer: Settings & controls for blog page
 *
 * @package Squarex Lite
 */
	/*-----------------------------------------------------------
	 * Post Options
	 *-----------------------------------------------------------*/
	$wp_customize->add_section(
		'squarex_blog_options',
		array(
			'title'     => __( 'Blog Options', 'squarex-lite' ),
			'priority'  => 500
		)
	);
	$wp_customize->add_setting(
		'squarex_title_blog',
		array(
			'default'            => 'Blog',
			'sanitize_callback'  => 'squarex_sanitize_txt',
			'transport'          => 'refresh'
		)
	);
	$wp_customize->add_control(
		'squarex_title_blog',
		array(
			'section'  => 'squarex_blog_options',
			'label'    => __( 'Blog Title', 'squarex-lite' ),
			'type'     => 'text'
		)
	);

	$wp_customize->add_setting(
		'squarex_layout_square',
		array(
			'default'            => '2',
			'sanitize_callback'  => 'absint',
		)
	);
	$wp_customize->add_control(
		'squarex_layout_square',
		array(
			'section'  => 'squarex_blog_options',
			'label'    => esc_html__( 'Blog Layout', 'squarex-lite' ),
			'type' => 'select',
			'choices' => array(
				'1' => 'Two squares',
				'2' => 'Three squares',
				'3' => 'Four squares',
				'4' => 'Two v-rectangle',
				'5' => 'Three v-rectangle',
				'6' => 'Four v-rectangle',
				'7' => 'Horizontal rectangle',
			)
		)
	);