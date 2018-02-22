<?php
/**
 * Bloghub Theme Customizer
 *
 * @package Bloghub
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function bloghub_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'bloghub_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'bloghub_customize_partial_blogdescription',
		) );
	}
//*************************** GENERAL SETTINGS PANEL ***************************//
$wp_customize->add_panel( 'bloghub_general_panel' ,array(
	'priority'              => 100,
	'type'                  =>'option',
	'title'                 => esc_html__( 'Front page settings', 'bloghub' ),
	'description'           => '',
) );
	// Blog SETTINGS
 $wp_customize->add_section( 'bloghub_blog_section', array(
  'title' => __( 'blog', 'bloghub' ),
  'priority' => 115,
  'panel'    =>'bloghub_general_panel',
) );

 $wp_customize->add_setting( 'bloghub_blog_layout', array(
  'default'        => 'layout-one',
  'sanitize_callback' =>'bloghub_sanitize_choices',
) );

 $wp_customize->add_control( 'bloghub_blog_layout', array(
  'label'   => __('Blog Layouts','bloghub'),
  'section' => 'bloghub_blog_section',
  'type'    => 'radio',
  'choices' => array(
   'layout-one' => esc_html__( 'Layout one', 'bloghub' ), 
   'layout-two' => esc_html__( 'layout-two', 'bloghub' ),
   'layout-three' => esc_html__( 'layout-three', 'bloghub' ), 
    'layout-four' => esc_html__( 'layout-four', 'bloghub' ),  
 ),
  'priority' => 1
) );
  $wp_customize->add_setting( 'bloghub_related_post_count', array(      
		'default'                   => 6,
		'sanitize_callback'         => 'absint',
		'transport'                 => 'refresh',               
	) );    

	$wp_customize->add_control( 'bloghub_related_post_count', array(
		'type'						=> 'text',
		'label' 					=> __( 'Related post count', 'bloghub' ),
		'section'  					=> 'bloghub_blog_section',
		'priority' 					=> 2,
	) );	
}
add_action( 'customize_register', 'bloghub_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function bloghub_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function bloghub_customize_partial_blogdescription() {
	bloginfo( 'description' );
}
function bloghub_sanitize_choices( $input, $setting ) {
	global $wp_customize;

	$control = $wp_customize->get_control( $setting->id );

	if ( array_key_exists( $input, $control->choices ) ) {
		return $input;
	} else {
		return $setting->default;
	}
}
/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function bloghub_customize_preview_js() {
	wp_enqueue_script( 'bloghub-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'bloghub_customize_preview_js' );
