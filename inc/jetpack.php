<?php
/**
 * Jetpack Compatibility File.
 *
 * @link https://jetpack.me/
 *
 * @package Newspaper_Wordpress_Cjk508
 */

/**
 * Add theme support for Infinite Scroll.
 * See: https://jetpack.me/support/infinite-scroll/
 */
function news_cjk508_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'render'    => 'news_cjk508_infinite_scroll_render',
		'footer'    => 'page',
	) );
} // end function news_cjk508_jetpack_setup
add_action( 'after_setup_theme', 'news_cjk508_jetpack_setup' );

/**
 * Custom render function for Infinite Scroll.
 */
function news_cjk508_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/content', get_post_format() );
	}
} // end function news_cjk508_infinite_scroll_render
