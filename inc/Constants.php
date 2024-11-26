<?php

namespace WPEssential\Theme;

// Prevent direct script access.
if ( ! \defined( 'ABSPATH' ) )
{
	exit;
}

/**
 * Class Constants
 *
 * Dynamically defines theme-specific constants, such as version, directory path, and URI.
 */
final class Constants
{
	/**
	 * Initializes the theme constants.
	 *
	 * This method retrieves theme information, prepares an array of constants,
	 * and defines them using a utility function. The constants can be filtered
	 * using the `wpe/theme_constant` filter.
	 *
	 * @return void
	 */
	public static function constructor ()
	{
		defined( 'WPE_THEME_BUILDER_VERSION' ) || define( 'WPE_THEME_BUILDER_VERSION', '1.0' );

		// Retrieve theme information (likely from a utility function `wpe_theme_info()`).
		$theme_info = wpe_theme_info();

		// Define a set of constants based on theme information.
		$theme_constant = [
			"{$theme_info->UcwordsNameHyphen}_T_VER" => $theme_info->Version,
			"{$theme_info->UcwordsNameHyphen}_T_DIR" => get_stylesheet_directory() . '/',
			"{$theme_info->UcwordsNameHyphen}_T_URI" => get_stylesheet_directory_uri() . '/',
		];

		// Allow developers to filter and modify the constants.
		$theme_constant = array_filter( apply_filters( 'wpe/theme_constant', $theme_constant ) );

		// Define constants if they are not empty.
		if ( ! empty( $theme_constant ) )
		{
			foreach ( $theme_constant as $constant => $value )
			{
				wpe_maybe_define_constant( $constant, $value );
			}
		}
	}
}
