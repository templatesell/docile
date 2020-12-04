<?php
/**
 * Dynamic css
 *
 * @since Docile 1.0.0
 *
 * @param null
 * @return null
 *
 */
if (!function_exists('docile_dynamic_css')) :

    function docile_dynamic_css()
    {
        global $docile_theme_options;

        /* Color Options Options */
        $docile_primary_color              = esc_attr($docile_theme_options['docile_primary_color']);
        $docile_logo_width              = absint($docile_theme_options['docile_logo_width_option']);
        
        $docile_header_overlay  = esc_attr($docile_theme_options['docile_slider_overlay_color']);
        $docile_header_transparent  = esc_attr($docile_theme_options['docile_slider_overlay_transparent']);
        $docile_header_min_height              = absint($docile_theme_options['docile_header_image_height']);

        $custom_css = '';

        //Primary  Background 
        if (!empty($docile_primary_color)) {
            $custom_css .= "
            #toTop,
            .tags__wrapper ul li a:hover,
            .tags__wrapper ul li a:focus,
            .trending-news .trending-news-inner .title,
            .trending-news-two .title,
            .tab__wrapper .tabs-nav li,
            .title-highlight:before,
            .card__post__category a,
            .slide-wrap .caption .post-category,
            .docile-home-icon a,
            div.menu-description,
            a.effect:before,
            .widget .widget-title:before, 
            .widget .widgettitle:before,
            .show-more,
            a.link-format,
            .meta_bottom .post-share a:hover,
            .tabs-nav li.current,
            .post-slider-section .s-cat,
            .sidebar-3 .widget-title:after,
            .bottom-caption .slick-current .slider-items span,
            aarticle.format-status .post-content .post-format::after,
            article.format-chat .post-content .post-format::after, 
            article.format-link .post-content .post-format::after,
            article.format-standard .post-content .post-format::after, 
            article.format-image .post-content .post-format::after, 
            article.hentry.sticky .post-content .post-format::after, 
            article.format-video .post-content .post-format::after, 
            article.format-gallery .post-content .post-format::after, 
            article.format-audio .post-content .post-format::after, 
            article.format-quote .post-content .post-format::after{ 
                background-color: ". $docile_primary_color."; 
                border-color: ".$docile_primary_color.";
            }";

        }

        //Primary Color
        if (!empty($docile_primary_color)) {
            $custom_css .= "
            a:hover,
            .post__grid .cat-links a,
            .card__post__author-info .cat-links a,
            .post-cats > span i, 
            .post-cats > span a,
            .top-menu > ul > li > a:hover,
            .main-menu ul li.current-menu-item > a, 
            .header-2 .main-menu > ul > li.current-menu-item > a,
            .main-menu ul li:hover > a,
            .post-navigation .nav-links a:hover, 
            .post-navigation .nav-links a:focus,
            ul.trail-items li a:hover span,
            .author-socials a:hover,
            .post-date a:focus, 
            .post-date a:hover,
            .post-excerpt a:hover, 
            .post-excerpt a:focus, 
            .content a:hover, 
            .content a:focus,
            .post-footer > span a:hover, 
            .post-footer > span a:focus,
            .widget a:hover, 
            .widget a:focus,
            .tags__wrapper ul li a,
            .footer-menu li a:hover, 
            .footer-menu li a:focus,
            .footer-social-links a:hover,
            .footer-social-links a:focus,
            .site-footer a:hover, 
            .site-footer a:focus, .content-area p a{ 
                color : ". $docile_primary_color."; 
            }";
        }
        // Border Color
        if (!empty($docile_primary_color)) {
            $custom_css .= "
            div.menu-description:before{ 
                border-color: transparent  ".$docile_primary_color."; 
            }";
        }

        //Logo Width
        if (!empty($docile_logo_width)) {
            $custom_css .= "
            .header-1 .head_one .logo{ 
                max-width : ". $docile_logo_width."px; 
            }";
        }

        //Header Overlay
        if (!empty($docile_header_overlay)) {
            $custom_css .= "
            .header-image:before { 
                background-color : ". $docile_header_overlay."; 
            }";
        }

        //Header Tranparent
        if (!empty($docile_header_transparent)) {
            $custom_css .= "
            .header-image:before { 
                opacity : ". $docile_header_transparent."; 
            }";
        }

        //Header Min Height
        if (!empty($docile_header_min_height)) {
            $custom_css .= "
            .header-1 .header-image .head_one { 
                min-height : ". $docile_header_min_height."px; 
            }";
        }

        wp_add_inline_style('docile-style', $custom_css);
    }
endif;
add_action('wp_enqueue_scripts', 'docile_dynamic_css', 99);