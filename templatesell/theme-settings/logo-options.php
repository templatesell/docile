<?php 
/*Logo Section*/
$wp_customize->add_setting( 'docile_options[docile_logo_width_option]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['docile_logo_width_option'],
    'sanitize_callback' => 'absint'
) );
$wp_customize->add_control( 'docile_options[docile_logo_width_option]', array(
   'label'     => __( 'Logo Width', 'docile' ),
   'description' => __('Adjust the logo width. Minimum is 100px and maximum is 600px.', 'docile'),
   'section'   => 'title_tagline',
   'settings'  => 'docile_options[docile_logo_width_option]',
   'type'      => 'range',
   'priority'  => 30,
   'input_attrs' => array(
          'min' => 100,
          'max' => 600,
        ),
) );

/*Logo Option*/
$wp_customize->add_setting('docile_options[docile-logo-position]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['docile-logo-position'],
    'sanitize_callback' => 'docile_sanitize_select'
));

$wp_customize->add_control('docile_options[docile-logo-position]', array(
    'choices' => array(
        'center-logo' => __('Center Logo', 'docile'),
        'left-logo' => __('Left Logo', 'docile'),
    ),
    'label' => __('Logo Position in Header', 'docile'),
    'description' => __('Logo Position in the header, left or in center.', 'docile'),
    'section' => 'title_tagline',
    'settings' => 'docile_options[docile-logo-position]',
    'type' => 'select',
    'priority' => 30,
));