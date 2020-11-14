<?php
/**
 * Docile Theme Customizer
 *
 * @package Docile
 */

if ( !function_exists('docile_default_theme_options_values') ) :

    function docile_default_theme_options_values() {

        $default_theme_options = array(

            /*Logo Options*/
            'docile_logo_width_option' => '600',
            'docile-logo-position'=>'left-logo',

            /*Top Header*/
            'docile_enable_top_header'=> 1, 
            'docile_enable_top_header_social'=> 0,
            'docile_enable_top_trending'=> 1,
            'docile_enable_top_date'=> 1,

            /*Header Image*/
            'docile_enable_header_image_overlay'=> 0,
            'docile_slider_overlay_color'=> '#000000',
            'docile_slider_overlay_transparent'=> '0.1',
            'docile_header_image_height'=> '100',

           /*Header Options*/
            'docile_enable_offcanvas'  => 1,
            'docile_enable_search'  => 0,
            'docile_enable_header_ads'=> 0,
            'docile-header-ads-image'=>'',
            'docile-header-ads-image-link'=>'',
            'docile_enable_trending_news_big'=> 1,
            'docile-select-big-trending-category'=> 0,


            /*Front Page Options*/
            'docile_enable_slider'      => 1,
            'docile-select-category'    => 0,
            'docile-select-category-slider-right'=> 0,
            'docile_enable_promo'       => 1,
            'docile-promo-select-category'=> 0,
            'docile_highlights_title'=> esc_html__('Today Highlights','docile'),
            'docile-select-category-trending'=> 0,
            'docile_enable_grid_post_front'=> 1,
            'docile_title_grid_post_front'=> esc_html__('Grid Posts Slider','docile'),
            'docile-grid-slider-select-category'=> 0,
            'docile_enable_missed_post_front'=> 1,
            'docile_title_you_missed_post_front'=> esc_html__('You May Have Missed','docile'),
            'docile-you-missed-select-category'=> 0, 

            /*Colors Options*/
            'docile_primary_color'              => '#f88c01',
 
            /*Blog Page*/
            'docile-sidebar-blog-page' => 'right-sidebar',
            'docile-content-show-from' => 'excerpt',
            'docile-excerpt-length'    => 15,
            'docile-pagination-options'=> 'numeric',
            'docile-blog-exclude-category'=> '',
            'docile-read-more-text'    => '',
            'docile-show-hide-share'   => 1,
            'docile-show-hide-category'=> 1,
            'docile-show-hide-date'=> 1,
            'docile-show-hide-author'=> 1,

            /*Single Page */
            'docile-single-page-featured-image' => 1,
            'docile-single-page-related-posts'  => 0,
            'docile-single-page-related-posts-title' => esc_html__('Related Posts','docile'),
            'docile-sidebar-single-page'=> 'single-right-sidebar',
            'docile-single-social-share' => 1,

            /*Sticky Sidebar*/
            'docile-enable-sticky-sidebar' => 1,

            /*Footer Section*/
            'docile-footer-copyright'  => esc_html__('Copyright All Rights Reserved 2020','docile'),

            /*Breadcrumb Options*/
            'docile-extra-breadcrumb' => 1,

            /*Miscellaneous Options*/
            'docile-front-page-content'=> 1,
            'docile-front-page-preloader'=> 0,

        );
return apply_filters( 'docile_default_theme_options_values', $default_theme_options );
}
endif;
/**
 *  Docile Theme Options and Settings
 *
 * @since Docile 1.0.0
 *
 * @param null
 * @return array docile_get_options_value
 *
 */
if ( !function_exists('docile_get_options_value') ) :
    function docile_get_options_value() {
        $docile_default_theme_options_values = docile_default_theme_options_values();
        $docile_get_options_value = get_theme_mod( 'docile_options');
        if( is_array( $docile_get_options_value )){
            return array_merge( $docile_default_theme_options_values, $docile_get_options_value );
        }
        else{
            return $docile_default_theme_options_values;
        }
    }
endif;

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function docile_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	
    if ( isset( $wp_customize->selective_refresh ) ) {
      $wp_customize->selective_refresh->add_partial( 'blogname', array(
         'selector'        => '.site-title a',
         'render_callback' => 'docile_customize_partial_blogname',
     ) );
      $wp_customize->selective_refresh->add_partial( 'blogdescription', array(
         'selector'        => '.site-description',
         'render_callback' => 'docile_customize_partial_blogdescription',
     ) );
  }
  $default = docile_default_theme_options_values();

  require get_template_directory() . '/templatesell/theme-settings/theme-settings.php';

  require get_template_directory() . '/templatesell/theme-settings/front-page-options.php';

  /*Getting Home Page Widget Area on Main Panel*/
    $docile_home_section = $wp_customize->get_section( 'sidebar-widgets-docile-home-widget-area' );
    if ( ! empty( $docile_home_section ) ) {
        $docile_home_section->panel = 'docile_front_page';
        $docile_home_section->title = esc_html__( 'Front Page Widgets', 'docile' );
        $docile_home_section->priority = 25;
    }
    /*Getting After Slider Widget Area*/
    $docile_below_slider_section = $wp_customize->get_section( 'sidebar-widgets-below-slider-area' );
    if ( ! empty( $docile_below_slider_section ) ) {
        $docile_below_slider_section->panel = 'docile_front_page';
        $docile_below_slider_section->title = esc_html__( 'Widget Area Below Slider', 'docile' );
        $docile_below_slider_section->priority = 24;
    }

    /*Getting After Slider Widget Area*/
    $docile_before_footer_section = $wp_customize->get_section( 'sidebar-widgets-before-footer-area' );
    if ( ! empty( $docile_before_footer_section ) ) {
        $docile_before_footer_section->panel = 'docile_front_page';
        $docile_before_footer_section->title = esc_html__( 'Widget Area Before Footer', 'docile' );
        $docile_before_footer_section->priority = 26;
    }

}
add_action( 'customize_register', 'docile_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function docile_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function docile_customize_partial_blogdescription() {
	bloginfo( 'description' );
}
/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function docile_customize_preview_js() {
	wp_enqueue_script( 'docile-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20200412', true );
}
add_action( 'customize_preview_init', 'docile_customize_preview_js' );

/*
** Customizer Styles
*/
function docile_panels_css() {
     wp_enqueue_style('docile-customizer-css', get_template_directory_uri() . '/css/customizer-style.css', array(), '4.5.0');
}
add_action( 'customize_controls_enqueue_scripts', 'docile_panels_css' );