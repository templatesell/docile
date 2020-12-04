<?php
$GLOBALS['docile_theme_options'] = docile_get_options_value();

/*Single Page Options*/
$wp_customize->add_section('docile_single_page_section', array(
    'priority' => 20,
    'capability' => 'edit_theme_options',
    'theme_supports' => '',
    'title' => __('Single Page Settings', 'docile'),
    'panel' => 'docile_panel',
));

/*Featured Image Option*/
$wp_customize->add_setting('docile_options[docile-single-page-featured-image]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['docile-single-page-featured-image'],
    'sanitize_callback' => 'docile_sanitize_checkbox'
));

$wp_customize->add_control('docile_options[docile-single-page-featured-image]', array(
    'label' => __('Enable Featured Image on Single Posts', 'docile'),
    'description' => __('You can hide images on single post from here.', 'docile'),
    'section' => 'docile_single_page_section',
    'settings' => 'docile_options[docile-single-page-featured-image]',
    'type' => 'checkbox',
    'priority' => 15,
));

/*Single Page Sidebar Layout*/
$wp_customize->add_setting('docile_options[docile-sidebar-single-page]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['docile-sidebar-single-page'],
    'sanitize_callback' => 'docile_sanitize_select'
));

$wp_customize->add_control( 
    new Docile_Radio_Image_Control(
        $wp_customize,
    'docile_options[docile-sidebar-single-page]', array(
    'choices' => docile_sidebar_position_array(),
    'label' => __('Select Sidebar', 'docile'),
    'description' => __('From Appearance > Customize > Widgets and add the widgets on the respected widget areas.', 'docile'),
    'section' => 'docile_single_page_section',
    'settings' => 'docile_options[docile-sidebar-single-page]',
    'type' => 'select',
    'priority' => 15,
)));

/*Related Post Options*/
$wp_customize->add_setting('docile_options[docile-single-page-related-posts]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['docile-single-page-related-posts'],
    'sanitize_callback' => 'docile_sanitize_checkbox'
));

$wp_customize->add_control('docile_options[docile-single-page-related-posts]', array(
    'label' => __('Related Posts', 'docile'),
    'description' => __('2 posts of same category will appear.', 'docile'),
    'section' => 'docile_single_page_section',
    'settings' => 'docile_options[docile-single-page-related-posts]',
    'type' => 'checkbox',
    'priority' => 15,
));


/*callback functions related posts*/
if (!function_exists('docile_related_post_callback')) :
    function docile_related_post_callback()
    {
        global $docile_theme_options;
        $related_posts = absint($docile_theme_options['docile-single-page-related-posts'])? absint($docile_theme_options['docile-single-page-related-posts']): 0;
        if (1 == $related_posts) {
            return true;
        } else {
            return false;
        }
    }
endif;

/*Related Post Title*/
$wp_customize->add_setting('docile_options[docile-single-page-related-posts-title]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['docile-single-page-related-posts-title'],
    'sanitize_callback' => 'sanitize_text_field'
));

$wp_customize->add_control('docile_options[docile-single-page-related-posts-title]', array(
    'label' => __('Related Posts Title', 'docile'),
    'description' => __('Enter the suitable title.', 'docile'),
    'section' => 'docile_single_page_section',
    'settings' => 'docile_options[docile-single-page-related-posts-title]',
    'type' => 'text',
    'priority' => 15,
    'active_callback' => 'docile_related_post_callback'
));

/*Social Share Options*/
$wp_customize->add_setting('docile_options[docile-single-social-share]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['docile-single-social-share'],
    'sanitize_callback' => 'docile_sanitize_checkbox'
));

$wp_customize->add_control('docile_options[docile-single-social-share]', array(
    'label' => __('Social Sharing', 'docile'),
    'description' => __('Enable Social Sharing on Single Posts.', 'docile'),
    'section' => 'docile_single_page_section',
    'settings' => 'docile_options[docile-single-social-share]',
    'type' => 'checkbox',
    'priority' => 15,
));
