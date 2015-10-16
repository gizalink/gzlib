<?php 
require('option/gz_option.php');
require('widget/gz_widget.php');

if (!function_exists('get_theme_options_gz')) {
	function get_theme_options_gz() {
		$theme_options = wp_parse_args(
			get_option('gz_theme_options', array()),
			gz_theme_options()
		);
		return $theme_options;
	}
}

?>
