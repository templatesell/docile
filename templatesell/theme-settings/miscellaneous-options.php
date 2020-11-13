<?php 
/*Extra Options*/

        $wp_customize->add_section( 'docile_miscellaneous_options', array(
            'priority'       => 20,
            'capability'     => 'edit_theme_options',
            'theme_supports' => '',
            'title'          => __( 'Miscellaneous Settings', 'docile' ),
            'panel'          => 'docile_panel',
        ) );

        /*Front Page content*/
        $wp_customize->add_setting( 'docile_options[docile-front-page-content]', array(
            'capability'        => 'edit_theme_options',
            'transport' => 'refresh',
            'default'           => $default['docile-front-page-content'],
            'sanitize_callback' => 'docile_sanitize_checkbox'
        ) );

        $wp_customize->add_control( 'docile_options[docile-front-page-content]', array(
            'label'     => __( 'Enable Front Page Content', 'docile' ),
            'description' => __( 'This will help to hide the content in Front Page, blog and home page content.', 'docile' ),
            'section'   => 'docile_miscellaneous_options',
            'settings'  => 'docile_options[docile-front-page-content]',
            'type'      => 'checkbox',
            'priority'  => 15,
        ) );

         /*Enable Preloader*/
        $wp_customize->add_setting( 'docile_options[docile-front-page-preloader]', array(
            'capability'        => 'edit_theme_options',
            'transport' => 'refresh',
            'default'           => $default['docile-front-page-preloader'],
            'sanitize_callback' => 'docile_sanitize_checkbox'
        ) );

        $wp_customize->add_control( 'docile_options[docile-front-page-preloader]', array(
            'label'     => __( 'Enable Preloader', 'docile' ),
            'description' => __( 'Hide the preloader. It loads before the site loads.', 'docile' ),
            'section'   => 'docile_miscellaneous_options',
            'settings'  => 'docile_options[docile-front-page-preloader]',
            'type'      => 'checkbox',
            'priority'  => 15,
        ) );