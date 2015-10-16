# gzlib
Library Wordpress Theme by GiaLinh (gizalink)

- Copy folder gzlib to folder your theme (same level functions.php your theme)
- Add this code to file functions.php:
```
require_once('gzlib/gz_lib.php');

```

- To display option value front-end 

```
<?php 
		$get_options_gz = get_theme_options_gz(); 
		echo esc_attr($get_options_gz['phone']); 
?>

```
