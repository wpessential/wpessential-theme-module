<?php

namespace WPEssential\Theme\Templates;

// Prevent direct access to the script.
if ( ! \defined( 'ABSPATH' ) )
{
	exit; // Exit if accessed directly.
}

/**
 * Class HeaderTemplates
 *
 * Handles the initialization and setup of theme header, hooks, and templates.
 */
final class HeaderTemplates
{
	/**
	 * Initializes core theme components and hooks.
	 * Also registers template hooks for various sections of the theme.
	 *
	 * @return void
	 */
	public static function constructor ()
	{
		add_action( 'wpe_before_header', [ __CLASS__, 'page_loader' ], 0 );
		add_action( 'wpe_header', [ __CLASS__, 'logo' ] );
		add_action( 'wpe_header', [ __CLASS__, 'menu' ], 20 );
		add_action( 'wpe_header', [ __CLASS__, 'buttons' ], 30 );
		add_action( 'wp_body_open', [ __CLASS__, 'header' ], 0 );
	}

	/**
	 * Includes the template for rendering page loader.
	 *
	 * @return void
	 */
	public static function page_loader ()
	{
		wpe_template_load( 'templates/general/site', 'loader', true, true );
	}

	/**
	 * Includes the template for rendering logo.
	 *
	 * @return void
	 */
	public static function logo ()
	{
		wpe_template_load( 'templates/general/logo', '', true, true );
	}

	/**
	 * Includes the template for rendering menu.
	 *
	 * @return void
	 */
	public static function menu ()
	{
		wpe_template_load( 'templates/header/branding/menu', '', true, true );
	}

	/**
	 * Includes the template for rendering login.
	 *
	 * @return void
	 */
	public static function buttons ()
	{
		wpe_template_load( 'templates/header/branding/buttons', '', true, true );
	}

	/**
	 * Includes the template for rendering header.
	 *
	 * @return void
	 */
	public static function header ()
	{
		wpe_template_load( 'templates/header/index', '', true, true );
	}
}
