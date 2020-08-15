?php
/**
 * ClassicPress TwentySixteen functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package ClassicPress
 * @subpackage ClassicPress_cstore
 * @since 1.0.0
 */


add_action( 'after_setup_theme', 'cpcstore_setup' );

function cpctore_setup() {
	load_theme_textdomain( 'classicpress-twentysixteen' );
}

// Enqueue parent/child themes styles with cachebusting for child theme styles built in
add_action( 'wp_enqueue_scripts', 'cp2016_enqueue_styles' );

function cpcstore_enqueue_styles() {
	$parent_style = 'twentysixteen-style';
	wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
	
	wp_enqueue_style(
		'classicpress-twentysixteen',
		get_stylesheet_directory_uri() . '/style.css',
		array( $parent_style ),
		classicpress_asset_version( 'style', 'classicpress-cpcstore_enqueue_styles' )
	);
}
