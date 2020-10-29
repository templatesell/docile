<?php 
/*Extra Options*/

        $wp_customize->add_section( 'docile_extra_options', array(
            'priority'       => 20,
            'capability'     => 'edit_theme_options',
            'theme_supports' => '',
            'title'          => __( 'Breadcrumb Settings', 'docile' ),
            'panel'          => 'docile_panel',
        ) );

        /*Breadcrumb Enable*/
        $wp_customize->add_setting( 'docile_options[docile-extra-breadcrumb]', array(
            'capability'        => 'edit_theme_options',
            'transport' => 'refresh',
            'default'           => $default['docile-extra-breadcrumb'],
            'sanitize_callback' => 'docile_sanitize_checkbox'
        ) );

        $wp_customize->add_control( 'docile_options[docile-extra-breadcrumb]', array(
            'label'     => __( 'Enable Breadcrumb', 'docile' ),
            'description' => __( 'Breadcrumb will appear on all pages except home page. More settings will be on the premium version.', 'docile' ),
            'section'   => 'docile_extra_options',
            'settings'  => 'docile_options[docile-extra-breadcrumb]',
            'type'      => 'checkbox',
            'priority'  => 15,
        ) );