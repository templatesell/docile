<?php
/*Promo Section Options*/

$wp_customize->add_section( 'docile_promo_section', array(
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Highlights News', 'docile' ),
    'panel'          => 'docile_front_page',
) );

/*callback functions slider*/
if ( !function_exists('docile_promo_active_callback') ) :
    function docile_promo_active_callback(){
        global $docile_theme_options;
        $enable_promo = absint($docile_theme_options['docile_enable_promo'])? absint($docile_theme_options['docile_enable_promo']): 0;
        if( 1 == $enable_promo ){
            return true;
        }
        else{
            return false;
        }
    }
endif;

/*Highlights Enable Option*/
$wp_customize->add_setting( 'docile_options[docile_enable_promo]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['docile_enable_promo'],
    'sanitize_callback' => 'docile_sanitize_checkbox'
) );

$wp_customize->add_control( 'docile_options[docile_enable_promo]', array(
    'label'     => __( 'Enable Highlights', 'docile' ),
    'description' => __('Enable and select the category to show the boxes below slider.', 'docile'),
    'section'   => 'docile_promo_section',
    'settings'  => 'docile_options[docile_enable_promo]',
    'type'      => 'checkbox',
    'priority'  => 5,

) );

/*Title of Highlights*/
$wp_customize->add_setting( 'docile_options[docile_highlights_title]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['docile_highlights_title'],
    'sanitize_callback' => 'sanitize_text_field'
) );

$wp_customize->add_control( 'docile_options[docile_highlights_title]', array(
    'label'     => __( 'Title of Highlights', 'docile' ),
    'description' => __('Enter the suitable title for the highlights.', 'docile'),
    'section'   => 'docile_promo_section',
    'settings'  => 'docile_options[docile_highlights_title]',
    'type'      => 'text',
    'priority'  => 5,
    'active_callback'=>'docile_promo_active_callback'

) );

/*Promo Category Selection*/
$wp_customize->add_setting( 'docile_options[docile-promo-select-category]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['docile-promo-select-category'],
    'sanitize_callback' => 'absint'

) );

$wp_customize->add_control(
    new Docile_Customize_Category_Dropdown_Control(
        $wp_customize,
        'docile_options[docile-promo-select-category]',
        array(
            'label'     => __( 'Category For Highlights', 'docile' ),
            'description' => __('From the dropdown select the category for the Highlights. Category having post will display in Highlights section.', 'docile'),
            'section'   => 'docile_promo_section',
            'settings'  => 'docile_options[docile-promo-select-category]',
            'type'      => 'category_dropdown',
            'priority'  => 5,
            'active_callback'=>'docile_promo_active_callback'
        )
    )
);