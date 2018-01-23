<?php
/**
 * Custom search form template.
 *
 * @package AMPConf
 */

?>

<form role="search" method="get" target="_top" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<span class="screen-reader-text"><?php echo esc_html_x( 'Search for:', 'label', 'ampconf' ); ?></span>
		<input type="search" placeholder="<?php echo esc_attr_x( 'Search', 'placeholder', 'ampconf' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
	</label>

	<button type="submit"><?php esc_html_e( 'Search', 'ampconf' ); ?></button>
</form>
