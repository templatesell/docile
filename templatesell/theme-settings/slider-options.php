<?php
$GLOBALS['docile_theme_options'] = docile_get_options_value();
/*Slider Options*/
$wp_customize->add_section( 'docile_slider_section', array(
   'priority'       => 20,
   'capability'     => 'edit_theme_options',
   'theme_supports' => '',
   'title'          => __( 'Featured Slider Settings', 'docile' ),
   'panel' 		 => 'docile_front_page',
) );

/*callback functions slider*/
if ( !function_exists('docile_slider_active_callback') ) :
  function docile_slider_active_callback(){
      global $docile_theme_options;
      $enable_slider = absint($docile_theme_options['docile_enable_slider'])? absint($docile_theme_options['docile_enable_slider']): 0;
      if( 1 == $enable_slider ){
          return true;
      }
      else{
          return false;
      }
  }
endif;

/*Slider Enable Option*/
$wp_customize->add_setting( 'docile_options[docile_enable_slider]', array(
   'capability'        => 'edit_theme_options',
   'transport' => 'refresh',
   'default'           => $default['docile_enable_slider'],
   'sanitize_callback' => 'docile_sanitize_checkbox'
) );

$wp_customize->add_control(
    'docile_options[docile_enable_slider]', 
    array(
       'label'     => __( 'Enable Featured Section', 'docile' ),
       'description' => __('You can select the category for the slider and other settings below. More Options are available on premium version.', 'docile'),
       'section'   => 'docile_slider_section',
       'settings'  => 'docile_options[docile_enable_slider]',
        'type'      => 'checkbox',
       'priority'  => 15,
   )
 );        

/*Slider Category Selection*/
$wp_customize->add_setting( 'docile_options[docile-select-category]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['docile-select-category'],
    'sanitize_callback' => 'absint'

) );

$wp_customize->add_control(
    new Docile_Customize_Category_Dropdown_Control(
        $wp_customize,
        'docile_options[docile-select-category]',
        array(
            'label'     => __( 'Select Category For Slider', 'docile' ),
            'description' => __('Choose one category to show the slider. More settings are in pro version.', 'docile'),
            'section'   => 'docile_slider_section',
            'settings'  => 'docile_options[docile-select-category]',
            'type'      => 'category_dropdown',
            'priority'  => 15,
            'active_callback'=> 'docile_slider_active_callback',
        )
    )

);

/*Slider Right Category Selection*/
$wp_customize->add_setting( 'docile_options[docile-select-category-slider-right]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['docile-select-category-slider-right'],
    'sanitize_callback' => 'absint'

) );

$wp_customize->add_control(
    new Docile_Customize_Category_Dropdown_Control(
        $wp_customize,
        'docile_options[docile-select-category-slider-right]',
        array(
            'label'     => __( 'Select Category For Slider Right', 'docile' ),
            'description' => __('The foru post of same category will be displayed right to the slider. More options are in premium version.', 'docile'),
            'section'   => 'docile_slider_section',
            'settings'  => 'docile_options[docile-select-category-slider-right]',
            'type'      => 'category_dropdown',
            'priority'  => 15,
            'active_callback'=> 'docile_slider_active_callback',
        )
    )

);