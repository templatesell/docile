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

if ( ! function_exists( 'docile_hex_to_rgba' ) ) :

    /**
     * Convert a hex colour to an rgba() string.
     *
     * @param string $hex   Colour, with or without the leading hash.
     * @param float  $alpha Opacity between 0 and 1.
     * @return string rgba() value, or an empty string if the hex is unusable.
     */
    function docile_hex_to_rgba( $hex, $alpha = 1 ) {

        $hex = ltrim( (string) $hex, '#' );

        if ( 3 === strlen( $hex ) ) {
            $hex = $hex[0] . $hex[0] . $hex[1] . $hex[1] . $hex[2] . $hex[2];
        }

        if ( ! preg_match( '/^[0-9a-fA-F]{6}$/', $hex ) ) {
            return '';
        }

        return sprintf(
            'rgba(%d, %d, %d, %s)',
            hexdec( substr( $hex, 0, 2 ) ),
            hexdec( substr( $hex, 2, 2 ) ),
            hexdec( substr( $hex, 4, 2 ) ),
            round( (float) $alpha, 2 )
        );
    }

endif;
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
            .widget_block h2:before,
            .widget_block h3:before,
            .widget .wp-block-heading:before,
            .widget .post-count,
            .widget .wp-block-search__button,
            .widget .wp-block-tag-cloud a:hover,
            .widget .wp-block-tag-cloud a:focus,
            .pagination .page-numbers.current,
            .docile_front_loop_block article.sticky .post-wrap:after,
            .search .site-main article.sticky .post-wrap:after,
            .archive .site-main article.sticky .post-wrap:after,
            .search-no-results .search-form input[type=\"submit\"],
            .page-404-content .search-form input[type=\"submit\"],
            .textwidget input[type=\"submit\"],
            .textwidget button,
            .widget .search-form .search-submit,
            .search-wrapper .search-form .search-submit,
            .comment-form #submit,
            .wp-block-search__button,
            .widget_search #searchform .search-submit,
            .page-404-content .back_home a,
            .error-404 .back_home a,
            .show-more,
            a.link-format,
            .meta_bottom .post-share a:hover,
            .tabs-nav li.current,
            .post-slider-section .s-cat,
            .sidebar-3 .widget-title:after,
            .bottom-caption .slick-current .slider-items span,
            article.format-status .post-content .post-format::after,
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

            // Extra primary colour selectors.
            $custom_css .= "
            article.format-aside .post-content .post-format::after,
            article.format-quote .post-content .post-format::after,
            .format-quote .post-wrap,
            input[type=\"checkbox\"]:checked,
            input[type=\"radio\"]:checked,
            .comment-form #submit:hover,
            .comment-form #submit:focus,
            .textwidget button:hover,
            .textwidget input[type=\"button\"]:hover,
            .textwidget input[type=\"reset\"]:hover,
            .textwidget input[type=\"submit\"]:hover,
            .trending-news-inner .title,
            .docile-post-grid .widget-title:before,
            .post-excerpt .wp-block-file .wp-block-file__button:active,
            .post-excerpt .wp-block-file .wp-block-file__button:focus,
            .post-excerpt .wp-block-file .wp-block-file__button:hover,
            .post-excerpt .wp-block-file .wp-block-file__button:visited,
            .cart-inner,
            .search-no-results .search-form input[type=\"submit\"],
            .page-404-content .search-form input[type=\"submit\"],
            .textwidget input[type=\"submit\"],
            .textwidget button,
            .widget .search-form .search-submit,
            .search-wrapper .search-form .search-submit,
            .comment-form #submit,
            .wp-block-search__button,
            .widget_search #searchform .search-submit,
            .page-404-content .back_home a,
            .error-404 .back_home a{ 
                background-color: ". $docile_primary_color."; 
                border-color: ".$docile_primary_color.";
            }";

        }

        //Primary Color
        if (!empty($docile_primary_color)) {
            $custom_css .= "
            a:hover,
            .post__grid .cat-links a,
            .docile_front_loop_block article .post-cats a,
            .search .site-main article .post-cats a,
            .archive .site-main article .post-cats a,
            .docile_front_loop_block article .post-title a:hover,
            .search .site-main article .post-title a:hover,
            .archive .site-main article .post-title a:hover,
            .docile_front_loop_block article .post-title a:focus,
            .search .site-main article .post-title a:focus,
            .archive .site-main article .post-title a:focus,
            .docile_front_loop_block article .post-wrap:hover .post-title a,
            .search .site-main article .post-wrap:hover .post-title a,
            .archive .site-main article .post-wrap:hover .post-title a,
            .card__post__author-info .cat-links a,
            .post-cats > span i, 
            .post-cats > span a,
            .top-menu > li > a:hover,
            .top-menu > li > a:focus,
            .top-menu li.current-menu-item > a,
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
            .widget .wp-block-categories li a:hover,
            .widget .wp-block-categories li a:focus,
            .widget .wp-block-archives li a:hover,
            .widget .wp-block-archives li a:focus,
            .widget .wp-block-latest-posts li a:hover,
            .widget .wp-block-latest-posts li a:focus,
            .widget .wp-block-page-list li a:hover,
            .widget .wp-block-page-list li a:focus,
            .main-menu ul ul li:hover > a,
            .main-menu ul ul li > a:focus,
            .top-menu ul li:hover > a,
            .top-menu ul li > a:focus,
            .post-navigation .nav-links a:hover .nav-title,
            .post-navigation .nav-links a:focus .nav-title,
            .pagination a.page-numbers:hover,
            .pagination a.page-numbers:focus,
            .tags__wrapper ul li a,
            .footer-menu li a:hover, 
            .footer-menu li a:focus,
            .footer-social-links a:hover,
            .footer-social-links a:focus,
            .site-footer a:hover, 
            .site-footer a:focus, .content-area p a{ 
                color : ". $docile_primary_color."; 
            }";

            // Extra primary colour selectors.
            $custom_css .= "
            blockquote:before,
            .posts-navigation .nav-links a:hover,
            .posts-navigation .nav-links a:focus,
            .about-author-name a:hover,
            .about-author-name a:focus,
            .about-author-posts-link:hover,
            .about-author-posts-link:focus,
            .comment-respond .must-log-in a:hover,
            .comment-respond .must-log-in a:focus,
            .comment-form .logged-in-as a:last-child:hover,
            .comment-form .logged-in-as a:last-child:focus,
            .comment-reply-title #cancel-comment-reply-link:hover,
            .comment-list .pingback .comment-body > a:hover,
            .comment-list .pingback .comment-body > a:focus,
            .comment-list .pingback .comment-body .edit-link .comment-edit-link:hover,
            .comment-list .pingback .comment-body .edit-link .comment-edit-link:focus,
            .comment-meta .comment-author .fn .url:hover,
            .comment-meta .comment-author .fn .url:focus,
            .comment-meta .comment-metadata a:hover,
            .comment-meta .comment-metadata a:focus,
            .comment-content a:hover,
            .comment-content a:focus,
            .comment-body .reply .comment-reply-link:hover,
            .comment-navigation .nav-links a:hover,
            .comment-navigation .nav-links a:focus,
            .page-404-content a:hover,
            .page-404-content a:focus,
            .widget .widget-title a:hover,
            .widget .widget-title a:focus,
            .widget_search #searchform .search-submit:hover,
            .site-footer a:focus,
            .post-excerpt .wp-block-file a:not(.wp-block-file__button),
            .post-excerpt .wp-block-file a:not(.wp-block-file__button):focus,
            .post-excerpt .wp-block-file a:not(.wp-block-file__button):hover,
            .post-excerpt .wp-block-calendar #wp-calendar tfoot td a:hover,
            .post-excerpt .wp-block-calendar #wp-calendar tfoot td a:focus{ 
                color: ". $docile_primary_color."; 
            }";
        }
        // Border Color
        if (!empty($docile_primary_color)) {
            $custom_css .= "
            div.menu-description:before{ 
                border-color: transparent  ".$docile_primary_color."; 
            }";

            $custom_css .= "
            .pagination a.page-numbers:hover,
            .pagination a.page-numbers:focus,
            .widget .wp-block-tag-cloud a:hover,
            .widget .wp-block-tag-cloud a:focus,
            .widget .wp-block-search__input:focus,
            input[type=\"text\"]:focus,
            input[type=\"email\"]:focus,
            input[type=\"url\"]:focus,
            input[type=\"password\"]:focus,
            input[type=\"search\"]:focus,
            input[type=\"number\"]:focus,
            textarea:focus{ 
                border-color: ".$docile_primary_color."; 
            }";

            // Extra primary colour selectors.
            $custom_css .= "
            div.menu-description:before,
            .main-menu.submenu-top-border li > ul,
            input[type=\"checkbox\"]:hover,
            input[type=\"checkbox\"]:focus,
            input[type=\"radio\"]:hover,
            input[type=\"checkbox\"]:checked,
            input[type=\"radio\"]:checked,
            #author:hover,
            #email:hover,
            #url:hover,
            #comment:hover,
            #author:active,
            #email:active,
            #url:active,
            #comment:active,
            #author:focus,
            #email:focus,
            #url:focus,
            #comment:focus,
            .textwidget input[type=\"text\"]:hover,
            .textwidget input[type=\"email\"]:hover,
            .textwidget input[type=\"url\"]:hover,
            .textwidget input[type=\"password\"]:hover,
            .textwidget input[type=\"search\"]:hover,
            .textwidget input[type=\"tel\"]:hover,
            .textwidget input[type=\"number\"]:hover,
            .textwidget input[type=\"date\"]:hover,
            .textwidget textarea:hover,
            .textwidget select:hover,
            .textwidget input[type=\"text\"]:focus,
            .textwidget input[type=\"email\"]:focus,
            .textwidget input[type=\"url\"]:focus,
            .textwidget input[type=\"password\"]:focus,
            .textwidget input[type=\"search\"]:focus,
            .textwidget input[type=\"tel\"]:focus,
            .textwidget input[type=\"number\"]:focus,
            .textwidget input[type=\"date\"]:focus,
            .textwidget textarea:focus,
            .textwidget select:active,
            .textwidget select:focus,
            .textwidget input[type=\"file\"]:hover,
            .textwidget input[type=\"file\"]:focus,
            .skip-link:focus,
            input[type=\"text\"]:focus,
            input[type=\"email\"]:focus,
            input[type=\"url\"]:focus,
            input[type=\"password\"]:focus,
            input[type=\"search\"]:focus,
            input[type=\"number\"]:focus,
            textarea:focus,
            .search-no-results .search-form input[type=\"submit\"],
            .page-404-content .search-form input[type=\"submit\"],
            .textwidget input[type=\"submit\"],
            .textwidget button,
            .widget .search-form .search-submit,
            .search-wrapper .search-form .search-submit,
            .comment-form #submit,
            .wp-block-search__button,
            .widget_search #searchform .search-submit,
            .wp-block-quote.is-style-docile-statement,
            .entry-content .wp-block-quote.is-style-docile-statement,
            .is-style-docile-checklist li:before{ 
                border-color: ". $docile_primary_color."; 
            }";

            $custom_css .= "
            a:focus-visible,
            button:focus-visible,
            input:focus-visible,
            select:focus-visible,
            textarea:focus-visible,
            [tabindex]:focus-visible,
            .skip-link:focus{ 
                outline-color: ".$docile_primary_color."; 
            }";

            $docile_focus_ring = docile_hex_to_rgba( $docile_primary_color, 0.12 );

            if ( $docile_focus_ring ) {
                $custom_css .= "
                input[type=\"text\"]:focus,
                input[type=\"email\"]:focus,
                input[type=\"url\"]:focus,
                input[type=\"password\"]:focus,
                input[type=\"search\"]:focus,
                input[type=\"number\"]:focus,
                textarea:focus{ 
                    box-shadow: 0 0 0 3px ".$docile_focus_ring."; 
                }";
            }
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