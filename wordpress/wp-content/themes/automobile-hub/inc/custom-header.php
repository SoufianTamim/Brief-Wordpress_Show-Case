<?php
/**
 * Custom header implementation
 *
 * @link https://codex.wordpress.org/Custom_Headers
 *
 * @package Automobile Hub
 * @subpackage automobile_hub
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses automobile_hub_header_style()
 */
function automobile_hub_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'automobile_hub_custom_header_args', array(
		'default-text-color'     => 'fff',
		'header-text' 			 =>	false,
		'width'                  => 1600,
		'height'                 => 400,
		'flex-width'         	 => true,
    	'flex-height'            => true,
		'wp-head-callback'       => 'automobile_hub_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'automobile_hub_custom_header_setup' );

if ( ! function_exists( 'automobile_hub_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see automobile_hub_custom_header_setup().
 */
add_action( 'wp_enqueue_scripts', 'automobile_hub_header_style' );
function automobile_hub_header_style() {
	//Check if user has defined any header image.
	if ( get_header_image() ) :
	$automobile_hub_custom_css = "
        .headerbox{
			background-image:url('".esc_url(get_header_image())."');
			background-position: center top;
		}";
	   	wp_add_inline_style( 'automobile-hub-style', $automobile_hub_custom_css );
	endif;
}
endif; // automobile_hub_header_style
