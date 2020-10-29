<?php
/**
 * Recommended plugins
 *
 * @package Docile 1.0.3
 */

if ( ! function_exists( 'docile_recommended_plugins' ) ) :

    /**
     * Recommend plugin list.
     *
     * @since 1.0.3
     */
    function docile_recommended_plugins() {

        $plugins = array(
            array(
                'name'     => esc_html__( 'One Click Demo Import', 'docile' ),
                'slug'     => 'one-click-demo-import',
                'required' => false,
            ),
            array(
                'name'     => __( 'Template Sell Demo Importer', 'docile' ),
                'slug'     => 'template-sell-demo-importer',
                'required' => false,
            ),
        );

        tgmpa( $plugins );

    }

endif;

add_action( 'tgmpa_register', 'docile_recommended_plugins' );
