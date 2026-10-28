<?php
/**
 * Wrap widget post counts in a span so they can be styled.
 *
 * @package Docile
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'docile_wrap_list_counts' ) ) :

	/**
	 * Wrap the "(12)" count printed after each link.
	 *
	 * @param string $html Widget markup.
	 * @return string
	 */
	function docile_wrap_list_counts( $html ) {

		if ( ! is_string( $html ) || '' === $html ) {
			return $html;
		}

		return preg_replace_callback(
			'#</a>\s*\((\d+)\)#',
			function ( $matches ) {
				return sprintf(
					'</a> <span class="post-count"><span class="screen-reader-text">%1$s </span>%2$s</span>',
					esc_html__( 'Posts:', 'docile' ),
					absint( $matches[1] )
				);
			},
			$html
		);
	}

endif;

add_filter( 'wp_list_categories', 'docile_wrap_list_counts' );
add_filter( 'get_archives_link', 'docile_wrap_list_counts' );
