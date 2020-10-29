<?php 
/*Sticky Sidebar*/
$wp_customize->add_section( 'docile_sticky_sidebar', array(
   'priority'       => 20,
   'capability'     => 'edit_theme_options',
   'theme_supports' => '',
   'title'          => __( 'Sticky Sidebar Settings', 'docile' ),
   'panel' 		 => 'docile_panel',
) );

/*Sticky Sidebar Setting*/
$wp_customize->add_setting( 'docile_options[docile-enable-sticky-sidebar]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['docile-enable-sticky-sidebar'],
    'sanitize_callback' => 'docile_sanitize_checkbox'
) );

$wp_customize->add_control( 'docile_options[docile-enable-sticky-sidebar]', array(
    'label'     => __( 'Enable Sticky Sidebar', 'docile' ),
    'description' => __('Enable and Disable sticky sidebar from this section.', 'docile'),
    'section'   => 'docile_sticky_sidebar',
    'settings'  => 'docile_options[docile-enable-sticky-sidebar]',
    'type'      => 'checkbox',
    'priority'  => 15,
) );