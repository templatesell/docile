<?php
/**
 * Goto Top functions
 *
 * @since Docile 1.0.0
 *
 */

if (!function_exists('docile_go_to_top')) :
    function docile_go_to_top()
    {
    ?>
            <a id="toTop" class="go-to-top" href="#" title="<?php esc_attr_e('Go to Top', 'docile'); ?>">
                <i class="fa fa-angle-double-up"></i>
            </a>
<?php
    } endif;
add_action('docile_go_to_top_hook', 'docile_go_to_top', 10, 1);