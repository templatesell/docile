<?php
/**
 * Add sidebar class in body
 *
 * @since Docile 1.0.0
 *
 */

add_filter('body_class', 'docile_body_class');
function docile_body_class($classes)
{
    $classes[] = 'at-sticky-sidebar';
    global $docile_theme_options;
    
    if (is_singular()) {
        $sidebar = $docile_theme_options['docile-sidebar-single-page'];
        if ($sidebar == 'single-no-sidebar') {
            $classes[] = 'single-no-sidebar';
        } elseif ($sidebar == 'single-left-sidebar') {
            $classes[] = 'single-left-sidebar';
        } elseif ($sidebar == 'single-middle-column') {
            $classes[] = 'single-middle-column';
        } else {
            $classes[] = 'single-right-sidebar';
        }
    }
    
    $sidebar = $docile_theme_options['docile-sidebar-blog-page'];
    if ($sidebar == 'no-sidebar') {
        $classes[] = 'no-sidebar';
    } elseif ($sidebar == 'left-sidebar') {
        $classes[] = 'left-sidebar';
    } elseif ($sidebar == 'middle-column') {
        $classes[] = 'middle-column';
    } else {
        $classes[] = 'right-sidebar';
    }
    return $classes;
}