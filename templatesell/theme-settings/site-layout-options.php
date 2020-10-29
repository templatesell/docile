<?php
/*Site Layout Options*/

$wp_customize->add_section( 'docile_site_layout_section', array(
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Site Layout Settings', 'docile' ),
    'panel'          => 'docile_panel',
) );

$wp_customize->add_setting( 'docile_options[docile_container_width_options]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['docile_container_width_options'],
    'sanitize_callback' => 'absint'
) );
$wp_customize->add_control( 'docile_options[docile_container_width_options]', array(
   'label'     => __( 'Site Width', 'docile' ),
   'description' => __('Width of the site container. The range is from 70-100 %.', 'docile'),
   'section'   => 'docile_site_layout_section',
   'settings'  => 'docile_options[docile_container_width_options]',
   'type'      => 'range',
   'priority'  => 15,
   'input_attrs' => array(
          'min' => 70,
          'max' => 100,
        ),
) );