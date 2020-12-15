<?php
/**
 * Post Navigation Function
 *
 * @since Docile 1.0.0
 *
 * @param null
 * @return void
 *
 */
if (!function_exists('docile_posts_navigation')) :
    function docile_posts_navigation()
    {
        global $docile_theme_options;
        $docile_pagination_option = $docile_theme_options['docile-pagination-options'];
        if ('numeric' == $docile_pagination_option) {
            echo "<div class='pagination'>";
                the_posts_pagination();
            echo "</div>";
        } else{
            the_posts_navigation();
        }
    }
endif;
add_action('docile_action_navigation', 'docile_posts_navigation', 10);