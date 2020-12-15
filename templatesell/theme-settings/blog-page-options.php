<?php
/*Blog Page Options*/
$wp_customize->add_section('docile_blog_page_section', array(
    'priority' => 20,
    'capability' => 'edit_theme_options',
    'theme_supports' => '',
    'title' => __('Blog Settings', 'docile'),
    'panel' => 'docile_panel',
));
/*Blog Page Sidebar Layout*/

$wp_customize->add_setting('docile_options[docile-sidebar-blog-page]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['docile-sidebar-blog-page'],
    'sanitize_callback' => 'docile_sanitize_select'
));

$wp_customize->add_control( new Docile_Radio_Image_Control(
        $wp_customize,
    'docile_options[docile-sidebar-blog-page]', array(
    'choices' => docile_blog_sidebar_position_array(),
    'label' => __('Blog and Archive Sidebar', 'docile'),
    'description' => __('This sidebar will work blog and archive pages.', 'docile'),
    'section' => 'docile_blog_page_section',
    'settings' => 'docile_options[docile-sidebar-blog-page]',
    'type' => 'select',
    'priority' => 15,
)));

/*Blog Page Show content from*/
$wp_customize->add_setting('docile_options[docile-content-show-from]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['docile-content-show-from'],
    'sanitize_callback' => 'docile_sanitize_select'
));

$wp_customize->add_control('docile_options[docile-content-show-from]', array(
    'choices' => array(
        'excerpt' => __('Show from Excerpt', 'docile'),
        'content' => __('Show from Content', 'docile'),
    ),
    'label' => __('Select Content Display From', 'docile'),
    'description' => __('You can enable excerpt from Screen Options inside post section of dashboard', 'docile'),
    'section' => 'docile_blog_page_section',
    'settings' => 'docile_options[docile-content-show-from]',
    'type' => 'select',
    'priority' => 15,
));


/*Blog Page excerpt length*/
$wp_customize->add_setting('docile_options[docile-excerpt-length]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['docile-excerpt-length'],
    'sanitize_callback' => 'absint'

));

$wp_customize->add_control('docile_options[docile-excerpt-length]', array(
    'label' => __('Excerpt Length', 'docile'),
    'description' => __('Enter the number per Words to show the content in blog page.', 'docile'),
    'section' => 'docile_blog_page_section',
    'settings' => 'docile_options[docile-excerpt-length]',
    'type' => 'number',
    'priority' => 15,
));

/*Exclude Category in Blog Page*/
$wp_customize->add_setting('docile_options[docile-blog-exclude-category]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['docile-blog-exclude-category'],
    'sanitize_callback' => 'sanitize_text_field'
));

$wp_customize->add_control('docile_options[docile-blog-exclude-category]', array(
    'label' => __('Exclude categories in Blog Listing', 'docile'),
    'description' => __('Enter categories ids with comma separated eg: 2,7,14,47.', 'docile'),
    'section' => 'docile_blog_page_section',
    'settings' => 'docile_options[docile-blog-exclude-category]',
    'type' => 'text',
    'priority' => 15,
));

/*Blog Page Pagination Options*/
$wp_customize->add_setting('docile_options[docile-pagination-options]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['docile-pagination-options'],
    'sanitize_callback' => 'docile_sanitize_select'

));

$wp_customize->add_control('docile_options[docile-pagination-options]', array(
    'choices' => array(
        'numeric' => __('Numeric Pagination', 'docile'),
        'default' => __('Previous and Next Pagination', 'docile'),
    ),
    'label' => __('Pagination Types', 'docile'),
    'description' => __('Choose Required Pagination Type', 'docile'),
    'section' => 'docile_blog_page_section',
    'settings' => 'docile_options[docile-pagination-options]',
    'type' => 'select',
    'priority' => 15,
));

/*Blog Page read more text*/
$wp_customize->add_setting('docile_options[docile-read-more-text]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['docile-read-more-text'],
    'sanitize_callback' => 'sanitize_text_field'
));

$wp_customize->add_control('docile_options[docile-read-more-text]', array(
    'label' => __('Read More Text', 'docile'),
    'description' => __('Read more text for blog and archive page.', 'docile'),
    'section' => 'docile_blog_page_section',
    'settings' => 'docile_options[docile-read-more-text]',
    'type' => 'text',
    'priority' => 15,
));


/*Social Share in blog page*/
$wp_customize->add_setting('docile_options[docile-show-hide-share]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['docile-show-hide-share'],
    'sanitize_callback' => 'docile_sanitize_checkbox'
));

$wp_customize->add_control('docile_options[docile-show-hide-share]', array(
    'label' => __('Show Social Share', 'docile'),
    'description' => __('Options to Enable Social Share in blog and archive page.', 'docile'),
    'section' => 'docile_blog_page_section',
    'settings' => 'docile_options[docile-show-hide-share]',
    'type' => 'checkbox',
    'priority' => 15,
));

/*Category Show hide*/
$wp_customize->add_setting('docile_options[docile-show-hide-category]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['docile-show-hide-category'],
    'sanitize_callback' => 'docile_sanitize_checkbox'
));

$wp_customize->add_control('docile_options[docile-show-hide-category]', array(
    'label' => __('Show Category', 'docile'),
    'description' => __('Option to hide the category on the blog page.', 'docile'),
    'section' => 'docile_blog_page_section',
    'settings' => 'docile_options[docile-show-hide-category]',
    'type' => 'checkbox',
    'priority' => 15,
));
/*Date Show hide*/
$wp_customize->add_setting('docile_options[docile-show-hide-date]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['docile-show-hide-date'],
    'sanitize_callback' => 'docile_sanitize_checkbox'
));

$wp_customize->add_control('docile_options[docile-show-hide-date]', array(
    'label' => __('Show Date', 'docile'),
    'description' => __('Option to hide the date on the blog page.', 'docile'),
    'section' => 'docile_blog_page_section',
    'settings' => 'docile_options[docile-show-hide-date]',
    'type' => 'checkbox',
    'priority' => 15,
));
/*Author Show hide*/
$wp_customize->add_setting('docile_options[docile-show-hide-author]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['docile-show-hide-author'],
    'sanitize_callback' => 'docile_sanitize_checkbox'
));

$wp_customize->add_control('docile_options[docile-show-hide-author]', array(
    'label' => __('Show Author', 'docile'),
    'description' => __('Option to hide the author on the blog page.', 'docile'),
    'section' => 'docile_blog_page_section',
    'settings' => 'docile_options[docile-show-hide-author]',
    'type' => 'checkbox',
    'priority' => 15,
));

