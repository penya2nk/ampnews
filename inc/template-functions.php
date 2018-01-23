<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package AMPConf
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function ampconf_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'ampconf_body_classes' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function ampconf_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'ampconf_pingback_header' );

/**
 * Adds a search form as the last top-level menu item of the header menu.
 *
 * @param string   $items The HTML list content for the menu items.
 * @param stdClass $args  An object containing wp_nav_menu() arguments.
 *
 * @return string $items
 */
function ampconf_wp_nav_menu_items( $items, $args ) {
	if ( 'header' !== $args->theme_location ) {
		return $items;
	}

	$form = '<li class="menu-item menu-item-search-form">' . get_search_form( false ) . '</li>';

	return $items . $form;
}
add_filter( 'wp_nav_menu_items', 'ampconf_wp_nav_menu_items', 10, 2 );
