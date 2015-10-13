# gzlib
Library Wordpress Theme by GiaLinh (gizalink)

- Copy folder gzlib to folder your theme (same level functions.php your theme)
- Add this code to file functions.php:
```
require_once('gzlib/gz_option_extra.php');

if (!function_exists('get_theme_options_gz')) {
	function get_theme_options_gz() {
		$theme_options = wp_parse_args(
			get_option('gz_theme_options', array()),
			gz_theme_options()
		);
		return $theme_options;
	}
}
```

- To display front-end 

```
<?php 
		$get_options_gz = get_theme_options_gz(); 
		echo esc_attr($get_options_gz['phone']); 
?>

```
