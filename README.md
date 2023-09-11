# WPEssential Theme 1.0

Help to build the WP theme

## Used

```php
# Load the autoloader PHP file
require_once get_template_directory() . '/vendor/autoload.php';

# Allow the menu registration
define( 'WPE_REG_MENUS', true );

# Allow the sidebar registration
define( 'WPE_REG_SIDEBARS', true );

# Allow the default theme support
define( 'WPE_GEN_SUPPORT', true );

# Allow the widget registration
define( 'WPE_REG_WIDGETS', true );

# Check the theme module file exists and then do_action for theme modules.
if ( class_exists( '\WPEssential\Theme\Loader' ) ) {
	\WPEssential\Theme\Loader::constructor();
	if ( has_action( 'wpe_setup_theme' ) ) {
		do_action( 'wpe_setup_theme' );
	}
}
```
