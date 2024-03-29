<?php
$GLOBALS['docile_theme_options'] = docile_get_options_value();
/*Top Header Options*/
$wp_customize->add_section( 'docile_top_header_section', array(
   'priority'       => 20,
   'capability'     => 'edit_theme_options',
   'theme_supports' => '',
   'title'          => __( 'Top Header', 'docile' ),
   'panel' 		 => 'docile_panel',
) );

/*callback functions header section*/
if ( !function_exists('docile_header_active_callback') ) :
  function docile_header_active_callback(){
      global $docile_theme_options;
      $enable_header = absint($docile_theme_options['docile_enable_top_header'])? absint($docile_theme_options['docile_enable_top_header']) : 0;
      if( 1 == $enable_header ){
          return true;
      }
      else{
          return false;
      }
  }
endif;

/*Enable Top Header Section*/
$wp_customize->add_setting( 'docile_options[docile_enable_top_header]', array(
   'capability'        => 'edit_theme_options',
   'transport' => 'refresh',
   'default'           => $default['docile_enable_top_header'],
   'sanitize_callback' => 'docile_sanitize_checkbox'
) );

$wp_customize->add_control( 'docile_options[docile_enable_top_header]', array(
   'label'     => __( 'Enable Top Header', 'docile' ),
   'description' => __('Checked to show the top header section like search and social icons', 'docile'),
   'section'   => 'docile_top_header_section',
   'settings'  => 'docile_options[docile_enable_top_header]',
   'type'      => 'checkbox',
   'priority'  => 5,
) );

/*Enable Social Icons In Header*/
$wp_customize->add_setting( 'docile_options[docile_enable_top_header_social]', array(
   'capability'        => 'edit_theme_options',
   'transport' => 'refresh',
   'default'           => $default['docile_enable_top_header_social'],
   'sanitize_callback' => 'docile_sanitize_checkbox'
) );

$wp_customize->add_control( 'docile_options[docile_enable_top_header_social]', array(
   'label'     => __( 'Enable Social Icons', 'docile' ),
   'description' => __('You can show the social icons here. Manage social icons from Appearance > Menus. Social Menu will display here.', 'docile'),
   'section'   => 'docile_top_header_section',
   'settings'  => 'docile_options[docile_enable_top_header_social]',
   'type'      => 'checkbox',
   'priority'  => 5,
   'active_callback'=>'docile_header_active_callback'
) );

/*Enable Trending in top Header*/
$wp_customize->add_setting( 'docile_options[docile_enable_top_menu]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['docile_enable_top_menu'],
    'sanitize_callback' => 'docile_sanitize_checkbox'
) );

$wp_customize->add_control( 'docile_options[docile_enable_top_menu]', array(
    'label'     => __( 'Menu in Header', 'docile' ),
    'description' => __('Top Header menu will display here.', 'docile'),
    'section'   => 'docile_top_header_section',
    'settings'  => 'docile_options[docile_enable_top_menu]',
    'type'      => 'checkbox',
    'priority'  => 5,
    'active_callback'=>'docile_header_active_callback'
) );

/*Enable date in top Header*/
$wp_customize->add_setting( 'docile_options[docile_enable_top_date]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['docile_enable_top_date'],
    'sanitize_callback' => 'docile_sanitize_checkbox'
) );

$wp_customize->add_control( 'docile_options[docile_enable_top_date]', array(
    'label'     => __( 'Date in Header', 'docile' ),
    'description' => __('Top Header date will display here.', 'docile'),
    'section'   => 'docile_top_header_section',
    'settings'  => 'docile_options[docile_enable_top_date]',
    'type'      => 'checkbox',
    'priority'  => 5,
    'active_callback'=>'docile_header_active_callback'
) );

/* Header Image Additional Options */
/*Enable Overlay on the Header Image Part*/
$wp_customize->add_setting( 'docile_options[docile_enable_header_image_overlay]', array(
   'capability'        => 'edit_theme_options',
   'transport' => 'refresh',
   'default'           => $default['docile_enable_header_image_overlay'],
   'sanitize_callback' => 'docile_sanitize_checkbox'
) );

$wp_customize->add_control(
    'docile_options[docile_enable_header_image_overlay]', 
    array(
       'label'     => __( 'Enable Header Image Overlay Color Height', 'docile' ),
       'description' => __('This option will add colors over the header image.', 'docile'),
       'section'   => 'header_image',
       'settings'  => 'docile_options[docile_enable_header_image_overlay]',
        'type'      => 'checkbox',
       'priority'  => 15,
   )
 );

/*callback functions slider getting from post*/
if ( !function_exists('docile_header_overlay_color_active_callback') ) :
  function docile_header_overlay_color_active_callback(){
      global $docile_theme_options;
      $slider_overlay = absint($docile_theme_options['docile_enable_header_image_overlay']) ? absint($docile_theme_options['docile_enable_header_image_overlay']): 0;
      if( $slider_overlay == 1 ){
          return true;
      }
      else{
          return false;
      }
  }
endif;  

/*Header Image Height*/
$wp_customize->add_setting( 'docile_options[docile_header_image_height]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['docile_header_image_height'],
    'sanitize_callback' => 'absint'
) );
$wp_customize->add_control( 'docile_options[docile_header_image_height]', array(
   'label'     => __( 'Header Image Min Height', 'docile' ),
   'description' => __('Adjust the header image min height height. Minimum is 50px and maximum is 500px.', 'docile'),
   'section'   => 'header_image',
   'settings'  => 'docile_options[docile_header_image_height]',
   'type'      => 'range',
   'priority'  => 15,
   'input_attrs' => array(
          'min' => 50,
          'max' => 500,
        ),
    'active_callback'=> 'docile_header_overlay_color_active_callback',
) ); 

/* Select the color for the Overlay */
$wp_customize->add_setting( 'docile_options[docile_slider_overlay_color]',
    array(
        'default'           => $default['docile_slider_overlay_color'],
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(                 
        $wp_customize,
        'docile_options[docile_slider_overlay_color]',
        array(
            'label'       => esc_html__( 'Header Image Overlay Color', 'docile' ),
            'description' => esc_html__( 'It will add the color overlay of the Header image. To make it transparent, use the below option.', 'docile' ),
            'section'     => 'header_image', 
            'priority'  => 15, 
            'active_callback'=> 'docile_header_overlay_color_active_callback',
        )
    )
);

/*Overlay Range for transparent*/
$wp_customize->add_setting( 'docile_options[docile_slider_overlay_transparent]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['docile_slider_overlay_transparent'],
    'sanitize_callback' => 'docile_sanitize_number'
) );
$wp_customize->add_control( 'docile_options[docile_slider_overlay_transparent]', array(
   'label'     => __( 'Header Image Overlay Color Transparent', 'docile' ),
   'description' => __('You can make the overlay transparent using this option. Add range from 0.1 to 1.', 'docile'),
   'section'   => 'header_image',
   'settings'  => 'docile_options[docile_slider_overlay_transparent]',
   'type'      => 'number',
   'priority'  => 15,
   'input_attrs' => array(
        'min' => '0.1',
        'max' => '1',
        'step' => '0.1',
    ),
   'active_callback' => 'docile_header_overlay_color_active_callback',
) );