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
		add_action( 'wp_footer', [ __CLASS__, 'footer' ], 0 );
		add_action( 'wpe_footer', [ __CLASS__, 'sidebar' ], 10 );
		add_action( 'wpe_footer_bottom', [ __CLASS__, 'copyright' ], 10 );
		add_action( 'wpe_footer_bottom', [ __CLASS__, 'menu' ], 20 );
	}

	/**
	 * Includes the template for rendering sidebar.
	 *
	 * @return void
	 */
	public static function sidebar ()
	{
		wpe_template_load( 'templates/footer/sidebar', '', true, true );
	}

	/**
	 * Includes the template for rendering menu.
	 *
	 * @return void
	 */
	public static function menu ()
	{
		wpe_template_load( 'templates/footer/branding/menu', '', true, true );
	}

	/**
	 * Includes the template for rendering copyright.
	 *
	 * @return void
	 */
	public static function copyright ()
	{
		wpe_template_load( 'templates/footer/branding/copyright', '', true, true );
	}

	/**
	 * Includes the template for rendering footer.
	 *
	 * @return void
	 */
	public static function footer ()
	{
		wpe_template_load( 'templates/footer/index', '', true, true );
		wpe_template_load( 'templates/woo/cart', 'popup', true, true );
	}
}
