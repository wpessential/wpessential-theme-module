<?php

namespace WPEssential\Theme\Templates;

// Prevent direct access to the script.
if ( ! \defined( 'ABSPATH' ) )
{
	exit; // Exit if accessed directly.
}

/**
 * Class PageTitleBannerTemplates
 *
 * Handles the initialization and setup of theme page title banner, hooks, and templates.
 */
final class PageTitleBannerTemplates
{
	/**
	 * Initializes core theme components and hooks.
	 * Also registers template hooks for various sections of the theme.
	 *
	 * @return void
	 */
	public static function constructor ()
	{
		add_action( 'wp_body_open', [ __CLASS__, 'banner' ] );
	}

	/**
	 * Includes the template for rendering page title banner.
	 *
	 * @return void
	 */
	public static function banner ()
	{
		wpe_template_load( 'templates/general/page', 'title-banner', true, true );
	}
}
