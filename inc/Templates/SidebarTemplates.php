<?php

namespace WPEssential\Theme\Templates;

// Prevent direct access to the script.
if ( ! \defined( 'ABSPATH' ) )
{
	exit; // Exit if accessed directly.
}

/**
 * Class Sidebar Templates
 *
 * Handles the initialization and setup of theme sidebar, hooks, and templates.
 */
final class SidebarTemplates
{
	/**
	 * Initializes core theme components and hooks.
	 * Also registers template hooks for various sections of the theme.
	 *
	 * @return void
	 */
	public static function constructor ()
	{
		add_action( 'wpe_sidebar_before', [ __CLASS__, 'before' ] );
		add_action( 'wpe_sidebar', [ __CLASS__, 'sidebar' ], 10, 1 );
		add_action( 'wpe_sidebar_after', [ __CLASS__, 'after' ] );
	}

	/**
	 * Includes the template for rendering before.
	 *
	 * @return void
	 */
	public static function before ()
	{
		wpe_template_load( 'templates/sidebar/before', '', true, true );
	}

	/**
	 * Includes the template for rendering sidebar.
	 *
	 * @param string $id The sidebar ID.
	 *
	 * @return void
	 */
	public static function sidebar ( $id = 'sidebar-1' )
	{
		include wpe_template_load( 'templates/sidebar/index' );
	}

	/**
	 * Includes the template for rendering after.
	 *
	 * @return void
	 */
	public static function after ()
	{
		wpe_template_load( 'templates/sidebar/after', '', true, true );
	}
}
