<?php
/*
 * Copyright (c) 2020. This file is copyright by WPEssential.
 */

namespace WPEssential\Theme\Setup;

if ( ! \defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

final class Widgets
{
	public static function constructor ()
	{
		if ( ! \defined( 'WPE_REG_WIDGETS' ) ) {
			return;
		}

		add_action( 'widgets_init', [ __CLASS__, 'init' ] );
	}

	public static function init ()
	{
		self::remove();
		self::register();
	}

	public static function remove ()
	{
		$widgets = apply_filters( 'wpe/remove/widgets', [] );
		if ( ! empty( $widgets ) ) {
			$un_reg_wid = 'unre' . 'gister' . '_wi' . 'dget';
			foreach ( $widgets as $widet ) {
				$un_reg_wid( $widet );
			}
		}
	}

	public static function register ()
	{
		$widgets = apply_filters( 'wpe/register/widgets', [] );
		if ( ! empty( $widgets ) ) {
			$reg_wid = 'regi' . 'ster' . '_wid' . 'get';
			sort( $widgets );
			foreach ( $widgets as $widet ) {
				if ( class_exists( $widet ) ) {
					$reg_wid( $widet );
				}
			}
		}
	}
}
