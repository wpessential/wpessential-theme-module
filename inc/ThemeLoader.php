<?php

namespace WPEssential\Theme;

// Prevent direct script access.
if ( ! \defined( 'ABSPATH' ) )
{
	exit;
}

/**
 * Class ThemeLoader
 *
 * Dynamically loads the specific theme's custom loader class if available.
 */
final class ThemeLoader
{
	/**
	 * Initializes the loader for the theme.
	 *
	 * This method retrieves the theme's namespace information and attempts to
	 * load a corresponding `Loader` class from the namespace.
	 *
	 * @return void
	 */
	public static function constructor ()
	{
		// Retrieve theme information.
		$theme_info = wpe_theme_info();

		// Construct the loader class name based on the theme namespace.
		$theme_loader_class = "\\WPEssential\\Theme\\{$theme_info->NameSpace}\\Loader";

		// Check if the loader class exists, then initialize it.
		if ( class_exists( $theme_loader_class ) )
		{
			$theme_loader_class::constructor();
		}
	}
}
