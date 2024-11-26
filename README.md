# WPEssential Theme Module 1.0

Help to build the WP theme

## Used

```php
# Load the autoloader PHP file
require_once get_template_directory() . '/vendor/autoload.php';

# Check the theme module file exists and then do_action for theme modules.
if ( class_exists( '\WPEssential\Theme\ThemeSetup' ) ) {
	\WPEssential\Theme\ThemeSetup::constructor();
	if ( has_action( 'wpe_setup_theme' ) ) {
		do_action( 'wpe_setup_theme' );
	}
}
```
