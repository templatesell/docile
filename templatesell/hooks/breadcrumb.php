<?php
/**
 * Functions to manage breadcrumbs
 */
if (!function_exists('docile_breadcrumb_options')) :
    function docile_breadcrumb_options()
    {
        global $docile_theme_options;
        if (1 == $docile_theme_options['docile-extra-breadcrumb']) {
            docile_breadcrumbs();
        }
    }
endif;
add_action('docile_breadcrumb_options_hook', 'docile_breadcrumb_options');

/**
 * BreadCrumb Settings
 */
if (!function_exists('docile_breadcrumbs')):
    function docile_breadcrumbs()
    {
        if (!function_exists('docile_breadcrumb_trail')) {
            require get_template_directory() . '/templatesell/breadcrumbs/breadcrumbs.php';
        }
        $breadcrumb_args = array(
            'container' => 'div',
            'show_browse' => false
        );        
        docile_breadcrumb_trail($breadcrumb_args);
    }
endif;
add_action('docile_breadcrumbs_hook', 'docile_breadcrumbs');