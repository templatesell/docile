<?php
/*Header Options*/
$wp_customize->add_section('docile_header_section', array(
    'priority' => 20,
    'capability' => 'edit_theme_options',
    'theme_supports' => '',
    'title' => __('Header Settings', 'docile'),
    'panel' => 'docile_panel',
));


/*Header Search Enable Option*/
$wp_customize->add_setting( 'docile_options[docile_enable_search]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['docile_enable_search'],
    'sanitize_callback' => 'docile_sanitize_checkbox'
) );

$wp_customize->add_control( 'docile_options[docile_enable_search]', array(
    'label'     => __( 'Enable Search', 'docile' ),
    'description' => __('It will help to display the search in Menu.', 'docile'),
    'section'   => 'docile_header_section',
    'settings'  => 'docile_options[docile_enable_search]',
    'type'      => 'checkbox',
    'priority'  => 5,

) );


/*Header Offcanvas Enable Option*/
$wp_customize->add_setting( 'docile_options[docile_enable_offcanvas]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['docile_enable_offcanvas'],
    'sanitize_callback' => 'docile_sanitize_checkbox'
) );

$wp_customize->add_control( 'docile_options[docile_enable_offcanvas]', array(
    'label'     => __( 'Enable Offcanvas Sidebar', 'docile' ),
    'description' => __('It will help to display the Offcanvas sidebar in Menu.', 'docile'),
    'section'   => 'docile_header_section',
    'settings'  => 'docile_options[docile_enable_offcanvas]',
    'type'      => 'checkbox',
    'priority'  => 5,

) );

/*Header Advertisement Enable Option*/
$wp_customize->add_setting( 'docile_options[docile_enable_header_ads]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['docile_enable_header_ads'],
    'sanitize_callback' => 'docile_sanitize_checkbox'
) );

$wp_customize->add_control( 'docile_options[docile_enable_header_ads]', array(
    'label'     => __( 'Enable Header Advertisement', 'docile' ),
    'description' => __('You can add the header ads image after enabling it.', 'docile'),
    'section'   => 'docile_header_section',
    'settings'  => 'docile_options[docile_enable_header_ads]',
    'type'      => 'checkbox',
    'priority'  => 5,
) );

/*callback functions header section*/
if ( !function_exists('docile_header_ads_active_callback') ) :
  function docile_header_ads_active_callback(){
      global $docile_theme_options;
      $enable_header = absint($docile_theme_options['docile_enable_header_ads'])? absint($docile_theme_options['docile_enable_header_ads']): 0;
      if( 1 == $enable_header ){
          return true;
      }
      else{
          return false;
      }
  }
endif;

/*Header Ads Image*/
$wp_customize->add_setting( 'docile_options[docile-header-ads-image]', array(
    'capability'    => 'edit_theme_options',
    'default'     => $default['docile-header-ads-image'],
    'sanitize_callback' => 'docile_sanitize_image'
) );
$wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'docile_options[docile-header-ads-image]',
        array(
            'label'   => __( 'Header Ad Image', 'docile' ),
            'section'   => 'docile_header_section',
            'settings'  => 'docile_options[docile-header-ads-image]',
            'type'      => 'image',
            'priority'  => 5,
            'active_callback' => 'docile_header_ads_active_callback',
            'description' => __( 'Recommended image size of 728*90', 'docile' )
        )
    )
);

/*Ads Image Link*/
$wp_customize->add_setting( 'docile_options[docile-header-ads-image-link]', array(
    'capability'    => 'edit_theme_options',
    'default'     => $default['docile-header-ads-image-link'],
    'sanitize_callback' => 'esc_url_raw',
) );
$wp_customize->add_control( 'docile_options[docile-header-ads-image-link]', array(
    'label'   => __( 'Header Ads Image Link', 'docile' ),
    'section'   => 'docile_header_section',
    'settings'  => 'docile_options[docile-header-ads-image-link]',
    'type'      => 'url',
    'active_callback' => 'docile_header_ads_active_callback',
    'priority'  => 5
) );

/*Trending News Below Slider*/
$wp_customize->add_setting( 'docile_options[docile_enable_trending_news_big]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['docile_enable_trending_news_big'],
    'sanitize_callback' => 'docile_sanitize_select'
) );

$wp_customize->add_control( 'docile_options[docile_enable_trending_news_big]', array(
    'choices' => array(
        'trending-1' => __('Slide Trending', 'docile'),
        'trending-2' => __('One Per Slide Trending', 'docile'),
        'hide-trending' => __('Hide Trending', 'docile'),
    ),
    'label'     => __( 'Enable Trending News Below Menu', 'docile' ),
    'description' => __('You can enable the trending news from the category or recent posts.', 'docile'),
    'section'   => 'docile_header_section',
    'settings'  => 'docile_options[docile_enable_trending_news_big]',
    'type'      => 'select',
    'priority'  => 5,
) );

/*callback functions slider*/
if ( !function_exists('docile_trending_active_callback') ) :
  function docile_trending_active_callback(){
      global $docile_theme_options;
      $enable_trending = absint($docile_theme_options['docile_enable_trending_news_big']);
      if( 1 == $enable_trending ){
          return true;
      }
      else{
          return false;
      }
  }
endif;

/*Slider Category Selection*/
$wp_customize->add_setting( 'docile_options[docile-select-big-trending-category]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['docile-select-big-trending-category'],
    'sanitize_callback' => 'absint'

) );

$wp_customize->add_control(
    new Docile_Customize_Category_Dropdown_Control(
        $wp_customize,
        'docile_options[docile-select-big-trending-category]',
        array(
            'label'     => __( 'Select Category For Trending', 'docile' ),
            'description' => __('Choose one category to show the trending. More settings are in pro version.', 'docile'),
            'section'   => 'docile_header_section',
            'settings'  => 'docile_options[docile-select-big-trending-category]',
            'type'      => 'category_dropdown',
            'priority'  => 5,
            'active_callback'=> 'docile_trending_active_callback',
        )
    )

);