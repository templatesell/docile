<?php
/**
 * Wrap the post counts that list widgets print.
 *
 * The Categories and Archives widgets print their count as bare text after the
 * link, like "Travel (10)". There is no element around it, so a theme cannot
 * style the number on its own. These filters put it in a span so the stylesheet
 * can render it as a badge, and label it so a screen reader reads something
 * meaningful instead of a stray number in brackets.
 *
 * @package Docile
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'docile_wrap_list_counts' ) ) :

	/**
	 * Put a span around the "(12)" a list widget prints after each link.
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
