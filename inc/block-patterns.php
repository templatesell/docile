<?php
/**
 * Block patterns and block styles.
 *
 * Registered on init rather than at file scope: registering a pattern loads its
 * translated strings, and doing that before init makes WordPress 6.7 and later
 * fire a _load_textdomain_just_in_time doing_it_wrong notice.
 *
 * @package Docile
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'docile_register_block_patterns' ) ) :

	/**
	 * Register the pattern category and the patterns in it.
	 */
	function docile_register_block_patterns() {

		if ( ! function_exists( 'register_block_pattern' ) ) {
			return;
		}

		if ( function_exists( 'register_block_pattern_category' ) ) {
			register_block_pattern_category(
				'docile',
				array( 'label' => esc_html__( 'Docile', 'docile' ) )
			);
		}

		register_block_pattern(
			'docile/lead-story',
			array(
				'title'      => esc_html__( 'Lead story', 'docile' ),
				'categories' => array( 'docile' ),
				'content'    => '<!-- wp:group {"align":"wide"} --><div class="wp-block-group alignwide">'
					. '<!-- wp:heading {"level":2} --><h2 class="wp-block-heading">'
					. esc_html__( 'The story everyone is reading', 'docile' )
					. '</h2><!-- /wp:heading -->'
					. '<!-- wp:paragraph --><p>'
					. esc_html__( 'Open with the single sentence a reader needs before they decide whether to carry on. Keep it short, concrete, and free of throat-clearing.', 'docile' )
					. '</p><!-- /wp:paragraph -->'
					. '<!-- wp:buttons --><div class="wp-block-buttons"><!-- wp:button --><div class="wp-block-button">'
					. '<a class="wp-block-button__link wp-element-button">'
					. esc_html__( 'Read the full report', 'docile' )
					. '</a></div><!-- /wp:button --></div><!-- /wp:buttons -->'
					. '</div><!-- /wp:group -->',
			)
		);

		register_block_pattern(
			'docile/three-column-briefing',
			array(
				'title'      => esc_html__( 'Three column briefing', 'docile' ),
				'categories' => array( 'docile' ),
				'content'    => '<!-- wp:columns {"align":"wide"} --><div class="wp-block-columns alignwide">'
					. '<!-- wp:column --><div class="wp-block-column">'
					. '<!-- wp:heading {"level":3} --><h3 class="wp-block-heading">' . esc_html__( 'What happened', 'docile' ) . '</h3><!-- /wp:heading -->'
					. '<!-- wp:paragraph --><p>' . esc_html__( 'The facts, in the order a reader needs them.', 'docile' ) . '</p><!-- /wp:paragraph -->'
					. '</div><!-- /wp:column -->'
					. '<!-- wp:column --><div class="wp-block-column">'
					. '<!-- wp:heading {"level":3} --><h3 class="wp-block-heading">' . esc_html__( 'Why it matters', 'docile' ) . '</h3><!-- /wp:heading -->'
					. '<!-- wp:paragraph --><p>' . esc_html__( 'The consequence that makes the story worth the reader\'s time.', 'docile' ) . '</p><!-- /wp:paragraph -->'
					. '</div><!-- /wp:column -->'
					. '<!-- wp:column --><div class="wp-block-column">'
					. '<!-- wp:heading {"level":3} --><h3 class="wp-block-heading">' . esc_html__( 'What comes next', 'docile' ) . '</h3><!-- /wp:heading -->'
					. '<!-- wp:paragraph --><p>' . esc_html__( 'The date, decision, or number to watch for.', 'docile' ) . '</p><!-- /wp:paragraph -->'
					. '</div><!-- /wp:column -->'
					. '</div><!-- /wp:columns -->',
			)
		);

		register_block_pattern(
			'docile/pull-quote-break',
			array(
				'title'      => esc_html__( 'Pull quote break', 'docile' ),
				'categories' => array( 'docile' ),
				'content'    => '<!-- wp:quote {"className":"is-style-docile-statement"} -->'
					. '<blockquote class="wp-block-quote is-style-docile-statement">'
					. '<!-- wp:paragraph --><p>'
					. esc_html__( 'Lift the one line from the piece that a reader would repeat to someone else.', 'docile' )
					. '</p><!-- /wp:paragraph -->'
					. '<cite>' . esc_html__( 'Name, role', 'docile' ) . '</cite>'
					. '</blockquote><!-- /wp:quote -->',
			)
		);
	}

endif;

add_action( 'init', 'docile_register_block_patterns' );

if ( ! function_exists( 'docile_register_block_styles' ) ) :

	/**
	 * Register the theme's block style variations.
	 */
	function docile_register_block_styles() {

		if ( ! function_exists( 'register_block_style' ) ) {
			return;
		}

		register_block_style(
			'core/quote',
			array(
				'name'  => 'docile-statement',
				'label' => esc_html__( 'Statement', 'docile' ),
			)
		);

		register_block_style(
			'core/image',
			array(
				'name'  => 'docile-framed',
				'label' => esc_html__( 'Framed', 'docile' ),
			)
		);

		register_block_style(
			'core/list',
			array(
				'name'  => 'docile-checklist',
				'label' => esc_html__( 'Checklist', 'docile' ),
			)
		);
	}

endif;

add_action( 'init', 'docile_register_block_styles' );
