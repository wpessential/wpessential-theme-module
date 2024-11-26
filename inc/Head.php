<?php

namespace WPEssential\Theme;

// Prevent direct script access.
if ( ! \defined( 'ABSPATH' ) )
{
	exit;
}

/**
 * Class Head
 *
 * Adds custom meta tags to the <head> section of WordPress pages.
 */
final class Head
{
	/**
	 * Initialize the class by hooking into WordPress.
	 *
	 * @return void
	 */
	public static function constructor ()
	{
		// Hook into wp_head to add custom meta tags.
		add_action( 'wp_head', [ __CLASS__, 'head' ] );
	}

	/**
	 * Outputs meta tags in the <head> section of the document.
	 *
	 * This method includes meta tags to improve compatibility and provide
	 * additional information about the theme.
	 *
	 * @return void
	 */
	public static function head ()
	{
		?>
		<!-- Ensures compatibility with older versions of Internet Explorer -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<!-- Provides generator information about the theme -->
		<meta name="generator" content="WPEssential Theme Module <?php echo esc_attr( WPE_THEME_BUILDER_VERSION ); ?>" />

		<!-- Indicates the page is optimized for mobile devices -->
		<meta name="HandheldFriendly" content="True">
		<?php
	}
}
