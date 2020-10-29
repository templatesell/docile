<?php 
/* Front Page Options Panel */
    $wp_customize->add_panel( 'docile_front_page', array(
        'priority' => 30,
        'capability' => 'edit_theme_options',
        'title' => __( 'Docile Front Page Options', 'docile' ),
) );

$wp_customize->add_section( 'docile_front_page_grid_posts', array(
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Grid Posts Slider', 'docile' ),
    'panel'          => 'docile_front_page',
) );

/*Enable Grid Post Option*/
$wp_customize->add_setting( 'docile_options[docile_enable_grid_post_front]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['docile_enable_grid_post_front'],
    'sanitize_callback' => 'docile_sanitize_checkbox'
) );

$wp_customize->add_control( 'docile_options[docile_enable_grid_post_front]', array(
    'label'     => __( 'Enable Grid Post Slider', 'docile' ),
    'description' => __('Posts of the selected category will appear as a slider.', 'docile'),
    'section'   => 'docile_front_page_grid_posts',
    'settings'  => 'docile_options[docile_enable_grid_post_front]',
    'type'      => 'checkbox',
    'priority'  => 5,

) );

/*callback functions slider*/
if ( !function_exists('docile_grid_slider_active_callback') ) :
    function docile_grid_slider_active_callback(){
        global $docile_theme_options;
        $enable_grid = absint($docile_theme_options['docile_enable_grid_post_front'])? absint($docile_theme_options['docile_enable_grid_post_front']): 0;
        if( 1 == $enable_grid ){
            return true;
        }
        else{
            return false;
        }
    }
endif;

/*Title Grid Post Option*/
$wp_customize->add_setting( 'docile_options[docile_title_grid_post_front]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['docile_title_grid_post_front'],
    'sanitize_callback' => 'sanitize_text_field'
) );

$wp_customize->add_control( 'docile_options[docile_title_grid_post_front]', array(
    'label'     => __( 'Title Grid Post Slider', 'docile' ),
    'description' => __('Enter the title for this section.', 'docile'),
    'section'   => 'docile_front_page_grid_posts',
    'settings'  => 'docile_options[docile_title_grid_post_front]',
    'type'      => 'text',
    'priority'  => 5,
    'active_callback'=> 'docile_grid_slider_active_callback',

) );

/*Category Selection*/
$wp_customize->add_setting( 'docile_options[docile-grid-slider-select-category]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['docile-grid-slider-select-category'],
    'sanitize_callback' => 'absint'

) );

$wp_customize->add_control(
    new Docile_Customize_Category_Dropdown_Control(
        $wp_customize,
        'docile_options[docile-grid-slider-select-category]',
        array(
            'label'     => __( 'Category For Grid Slider', 'docile' ),
            'description' => __('From the dropdown select the category for the grid slider. Category having post will display in grid section.', 'docile'),
            'section'   => 'docile_front_page_grid_posts',
            'settings'  => 'docile_options[docile-grid-slider-select-category]',
            'type'      => 'category_dropdown',
            'priority'  => 5,
            'active_callback'=>'docile_grid_slider_active_callback'
        )
    )
);

//Footer you may missed section
$wp_customize->add_section( 'docile_front_page_you_may_missed', array(
    'priority'       => 30,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'You May Missed', 'docile' ),
    'panel'          => 'docile_front_page',
) );

/*Enable you may Post Option*/
$wp_customize->add_setting( 'docile_options[docile_enable_missed_post_front]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['docile_enable_missed_post_front'],
    'sanitize_callback' => 'docile_sanitize_checkbox'
) );

$wp_customize->add_control( 'docile_options[docile_enable_missed_post_front]', array(
    'label'     => __( 'Enable You May Missed', 'docile' ),
    'description' => __('This section will appear on the footer section.', 'docile'),
    'section'   => 'docile_front_page_you_may_missed',
    'settings'  => 'docile_options[docile_enable_missed_post_front]',
    'type'      => 'checkbox',
    'priority'  => 5,

) );

/*callback functions you may missed*/
if ( !function_exists('docile_you_may_missed_active_callback') ) :
    function docile_you_may_missed_active_callback(){
        global $docile_theme_options;
        $enable_missed = absint($docile_theme_options['docile_enable_missed_post_front'])? absint($docile_theme_options['docile_enable_missed_post_front']): 0;
        if( 1 == $enable_missed ){
            return true;
        }
        else{
            return false;
        }
    }
endif;

/*Title you may missed Post Option*/
$wp_customize->add_setting( 'docile_options[docile_title_you_missed_post_front]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['docile_title_you_missed_post_front'],
    'sanitize_callback' => 'sanitize_text_field'
) );

$wp_customize->add_control( 'docile_options[docile_title_you_missed_post_front]', array(
    'label'     => __( 'Title You May Missed', 'docile' ),
    'description' => __('Enter the title for this section.', 'docile'),
    'section'   => 'docile_front_page_you_may_missed',
    'settings'  => 'docile_options[docile_title_you_missed_post_front]',
    'type'      => 'text',
    'priority'  => 5,
    'active_callback'=> 'docile_you_may_missed_active_callback',

) );

/*Category Selection*/
$wp_customize->add_setting( 'docile_options[docile-you-missed-select-category]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['docile-you-missed-select-category'],
    'sanitize_callback' => 'absint'

) );

$wp_customize->add_control(
    new Docile_Customize_Category_Dropdown_Control(
        $wp_customize,
        'docile_options[docile-you-missed-select-category]',
        array(
            'label'     => __( 'Category For Missed Section', 'docile' ),
            'description' => __('From the dropdown select the category for the you may missed. Category having post will display in missed section.', 'docile'),
            'section'   => 'docile_front_page_you_may_missed',
            'settings'  => 'docile_options[docile-you-missed-select-category]',
            'type'      => 'category_dropdown',
            'priority'  => 5,
            'active_callback'=>'docile_you_may_missed_active_callback'
        )
    )
);