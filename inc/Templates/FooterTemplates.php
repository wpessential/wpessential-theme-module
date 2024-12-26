<?php

namespace WPEssential\Theme\Templates;

// Prevent direct access to the script.
if ( ! \defined( 'ABSPATH' ) )
{
	exit; // Exit if accessed directly.
}

/**
 * Class Footer Templates
 *
 * Handles the initialization and setup of theme footer, hooks, and templates.
 */
final class FooterTemplates
{
	/**
	 * Initializes core theme components and hooks.
	 * Also registers template hooks for various sections of the theme.
	 *
	 * @return void
	 */
	public static function constructor ()
	{
		add_action( 'wpe_footer', [ __CLASS__, 'sidebar' ], 10 );
		add_action( 'wpe_footer', [ __CLASS__, 'menu' ], 20 );
		add_action( 'wpe_footer', [ __CLASS__, 'copyright' ], 30 );
		add_action( 'wp_footer', [ __CLASS__, 'footer' ], 0 );
	}

	/**
	 * Includes the template for rendering sidebar.
	 *
	 * @return void
	 */
	public static function sidebar ()
	{
		include wpe_template_load( 'templates/footer/sidebar' );
	}

	/**
	 * Includes the template for rendering menu.
	 *
	 * @return void
	 */
	public static function menu ()
	{
		include wpe_template_load( 'templates/footer/branding/menu' );
	}

	/**
	 * Includes the template for rendering copyright.
	 *
	 * @return void
	 */
	public static function copyright ()
	{
		include wpe_template_load( 'templates/footer/branding/copyright' );
	}

	/**
	 * Includes the template for rendering footer.
	 *
	 * @return void
	 */
	public static function footer ()
	{
		include wpe_template_load( 'templates/footer/index' );
	}
}
