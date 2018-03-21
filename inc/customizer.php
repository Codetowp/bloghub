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
  load_template( get_template_directory() . '/inc/customizer-controls.php', true ) ;

	$args = array(
  'numberposts' => -1
);
 
$pages = get_posts( $args );
    $bloghub_option_pages = array();
    $bloghub_option_pages[0] = esc_html__( 'Select page', 'bloghub' );
    foreach( $pages as $p )
        {
            $bloghub_option_pages[ $p->ID ] = $p->post_title;
        }

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '#top-header .navbar-brand',
			'render_callback' => 'bloghub_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.top-social-nav-block .logo-tagline a',
			'render_callback' => 'bloghub_customize_partial_blogdescription',
		) );
	}

	// Blog SETTINGS
 $wp_customize->add_section( 'bloghub_blog_section', array(
  'title' => __( 'blog', 'bloghub' ),
  'priority' => 115,
 
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
   'layout-one' => esc_html__( 'layout-one', 'bloghub' ), 
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
	
$wp_customize->add_setting( 'bloghub_blog_list_count', array(      
    'default'                   => 6,
    'sanitize_callback'         => 'absint',
    'transport'                 => 'refresh',               
  ) );    

  $wp_customize->add_control( 'bloghub_blog_list_count', array(
    'type'            => 'text',
    'label'           => __( 'Blog list count', 'bloghub' ),
    'section'           => 'bloghub_blog_section',
    'priority'          => 2,
  ) );
 //header
    $wp_customize->add_section( 'bloghub_header_section', array(
  'title' => __( 'Slider', 'bloghub' ),
  'priority' => 114,
  
) );
$wp_customize->add_setting( 'bloghub_slider_images', array(
        'sanitize_callback' => 'bloghub_sanitize_repeatable_data_field',
        'transport' => 'refresh', // refresh or postMessage
    ) );
$wp_customize->add_control(
    new Bloghub_Customize_Repeatable_Control(
$wp_customize,
    'bloghub_slider_images',
    array(
        'label'         => esc_html__('Slider', 'bloghub'),
        'description'   => __('max add item 5','bloghub'),
        'section'       => 'bloghub_header_section',
        'live_title_id' => 'content_page', // apply for unput text and textarea only
        'title_format'  => esc_html__('[live_title]', 'bloghub'), // [live_title]
        'max_item'      => 8, // Maximum item can add
        'fields'        => array(
            'content_page'  => array(
                'title'     => esc_html__('Select a page', 'bloghub'),
                'type'      =>'select',
                'options'       => $bloghub_option_pages
            ),
            
     
    ),

        )
    ) );	
// Social Links

  $wp_customize->add_section( 'bloghub_social_links', array(
    'title'                     => __( 'Social Links', 'bloghub'  ),
    'priority'                  => 117,
      
  ) );

  $social_sites = array( 'facebook', 'twitter','instagram',  'google-plus', 'pinterest', 'linkedin', 'rss');

  foreach( $social_sites as $social_site ) {
    $wp_customize->add_setting( "bloghub_social_links[$social_site]", array(
      'default'           => '',
      'type'              => 'theme_mod',
      'capability'        => 'edit_theme_options',
      'sanitize_callback' => 'esc_url_raw'
    ) );

    $wp_customize->add_control( "bloghub_social_links[$social_site]", array(
      'label'   => ucwords( $social_site ) . __( " Url:", 'bloghub' ),
      'section' => 'bloghub_social_links',
      'type'    => 'text',
    ) );
  }
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
function bloghub_customizer_css_style() {
    wp_enqueue_style( 'bloghub-customizer-css', get_template_directory_uri() . '/assets/css/customizer.css' );
}
add_action( 'customize_controls_enqueue_scripts', 'bloghub_customizer_css_style' );