<?php

namespace WPEssential\Theme;

use WPEssential\Library\Menus;
use WPEssential\Library\Support;
use WPEssential\Library\Sidebars;
use WPEssential\Library\Images;
use WPEssential\Library\Widget;

// Prevent direct script access.
if ( ! \defined( 'ABSPATH' ) )
{
	exit;
}

/**
 * Class Classes
 *
 * Dynamically initializes and hooks various theme libraries and components.
 */
final class Classes
{
	/**
	 * Initialize theme-specific libraries by hooking them into WordPress actions.
	 *
	 * The list of actions and their priorities can be filtered using the
	 * `wpe/theme/after_setup/hooks` filter.
	 *
	 * @return void
	 */
	public static function constructor ()
	{
		// Define the default list of actions to initialize libraries.
		$action_list = apply_filters( 'wpe/theme/after_setup/hooks', [
			'Support'  => [
				'callback' => [ '\\WPEssential\\Library\\Support::class', 'constructor' ],
				'priority' => 10,
			],
			'Sidebars' => [
				'callback' => [ Sidebars::class, 'init' ],
				'priority' => 20,
			],
			'Widgets'  => [
				'callback' => [ Widget::class, 'init' ],
				'priority' => 30,
			],
			'Images'   => [
				'callback' => [ Images::class, 'init' ],
				'priority' => 40,
			],
			'Menus'    => [
				'callback' => [ Menus::class, 'init' ],
				'priority' => 50,
			],
			'Tgm'      => [
				'callback' => [ Tgm::class, 'init' ],
				'priority' => 60,
			],
		] );

		// Loop through the action list and add them as WordPress actions.
		if ( ! empty( $action_list ) )
		{
			foreach ( $action_list as $key => $action )
			{
				// Ensure required keys exist and the callback class/method exists.
				if (
					! wpe_array_get( $action, 'callback' ) ||
					! wpe_array_get( $action, 'priority' ) ||
					! class_exists( wpe_array_get( $action, 'callback' ) )
				)
				{
					// Error message for invalid configuration.
					$error = "(wpe/theme/after_setup/hooks) => {$key} " . esc_html__( 'has no valid callback or priority', 'TEXT_DOMAIN' );
					wp_die( $error );
				}

				// Hook the callback into the 'wpe_before_theme_setup' action.
				add_action(
					'wpe_before_theme_setup',
					wpe_array_get( $action, 'callback' ),
					wpe_array_get( $action, 'priority' )
				);
			}
		}
	}
}
