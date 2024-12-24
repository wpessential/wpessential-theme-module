<?php

namespace WPEssential\Theme;

// Prevent direct access to the script.
use WPEssential\Theme\Templates\CommentsTemplates;
use WPEssential\Theme\Templates\FooterTemplates;
use WPEssential\Theme\Templates\HeaderTemplates;
use WPEssential\Theme\Templates\PostTemplates;
use WPEssential\Theme\Templates\SidebarTemplates;

if ( ! \defined( 'ABSPATH' ) )
{
	exit; // Exit if accessed directly.
}

/**
 * Class ThemeSetup
 *
 * Handles the initialization and setup of theme functionalities, hooks, and templates.
 */
final class ThemeSetup
{
	/**
	 * Initializes core theme components and hooks.
	 *
	 * @return void
	 */
	public static function constructor ()
	{
		Constants::constructor();
		ThemeLoader::constructor();
		Classes::constructor();
		HeaderTemplates::constructor();
		PostTemplates::constructor();
		SidebarTemplates::constructor();
		CommentsTemplates::comments();
		FooterTemplates::constructor();

		// Setup theme-specific actions and filters.
		add_action( 'wpe_setup_theme', [ __CLASS__, 'setup_theme' ] );
		add_action(
			'after_setup_theme',
			function ()
			{
				do_action( 'wpe_before_theme_setup' );
				do_action( 'wpe_setup_theme' );
				do_action( 'wpe_after_theme_setup' );
			},
			2000
		);
	}

	/**
	 * Performs the setup of theme-related features and templates.
	 *
	 * @return void
	 */
	public static function setup_theme ()
	{
		Head::constructor();

		// Set default content width.
		if ( ! isset( $content_width ) )
		{
			$content_width = 1170;
		}

		// Ensures proper page linking.
		wp_link_pages( [ 'echo' => 0 ] );
	}
}
