<?php
/*Footer Options*/
$wp_customize->add_section('docile_footer_section', array(
    'priority' => 20,
    'capability' => 'edit_theme_options',
    'theme_supports' => '',
    'title' => __('Footer Settings', 'docile'),
    'panel' => 'docile_panel',
));


/*Copyright Setting*/
$wp_customize->add_setting('docile_options[docile-footer-copyright]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['docile-footer-copyright'],
    'sanitize_callback' => 'sanitize_text_field'
));

$wp_customize->add_control('docile_options[docile-footer-copyright]', array(
    'label' => __('Copyright Text', 'docile'),
    'description' => __('Enter your own copyright text.', 'docile'),
    'section' => 'docile_footer_section',
    'settings' => 'docile_options[docile-footer-copyright]',
    'type' => 'text',
    'priority' => 15,
));
