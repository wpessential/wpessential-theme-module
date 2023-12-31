<?php

namespace WPEssential\Theme\Setup;

if ( ! \defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

final class Sidebars
{
	public static function constructor ()
	{
		if ( ! \defined( 'WPE_REG_SIDEBARS' ) ) {
			return;
		}

		add_action( 'widgets_init',
			function () {
				self::remove();
				self::register();
			},
			1000
		);
	}

	public static function remove ()
	{
		$sidebars = apply_filters( 'wpe/remove/sidebars', [ '' ] );
		if ( ! empty( $sidebars ) ) {
			$un_reg_sid = 'unre' . 'gister' . '_side' . 'bar';
			foreach ( $sidebars as $sidebar ) {
				$un_reg_sid( $sidebar );
			}
		}
	}

	public static function register ()
	{
		$sidebars = apply_filters(
			'wpe/register/sidebars',
			[
				'main-sidebar'   => [
					'name'          => __( 'WPEssential: Main Sidebar', 'wpessential' ),
					'id'            => 'sidebar-1',
					'description'   => __( 'Widgets in this area will be shown on all posts and pages.', 'wpessential' ),
					'before_widget' => '<div id="%1$s" class="wpe-widget widget %2$s">',
					'after_widget'  => '</div>',
					'before_title'  => '<h2 class="wpe-widget-title">',
					'after_title'   => '</h2>',
				],
				'footer-sidebar' => [
					'name'          => __( 'WPEssential: Footer Sidebar', 'wpessential' ),
					'id'            => 'footer',
					'description'   => __( 'Widgets in this area will be shown on all posts and pages.', 'wpessential' ),
					'before_widget' => '<div id="%1$s" class="wpe-widget widget %2$s">',
					'after_widget'  => '</div>',
					'before_title'  => '<h2 class="wpe-widget-title">',
					'after_title'   => '</h2>',
				]
			]
		);

		if ( ! empty( $sidebars ) ) {
			foreach ( $sidebars as $sidebar ) {
				register_sidebar( $sidebar );
			}
		}
	}
}
