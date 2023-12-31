<?php

namespace WPEssential\Theme\Setup;

if ( ! \defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

final class SetupInit
{

	public static function constructor ()
	{
		self::constants();
		self::theme_clases();
		self::setup_actions();

		add_action(
			'wpe_setup_theme',
			function () {
				do_action( 'wpe_before_theme_setup' );
				add_action( 'after_setup_theme', [ __CLASS__, 'setup_theme' ], 2000 );
				do_action( 'wpe_after_theme_setup' );
			},
			1000
		);
	}

	public static function head ()
	{
		?>
		<meta http-equiv="X-UA-Compatible" content="IE=edge"><!--X-UA-Compatible is a document mode meta-tag that allows web authors to choose what version of Internet Explorer the page should be rendered as-->
		<meta name="generator" content="WPEssential Theme Module <?php echo WPE_THEME_VERSION; ?>" />
		<meta name="HandheldFriendly" content="True"><!--Include this tag in the head element of every page. This tells your M-Business Sync Server that you have optimized your page for being viewed on a mobile device. Without it, tables, JavaScript and certain image tags will be dropped when the page is downloaded.--->
		<?php
	}

	public static function setup_theme ()
	{
		add_action( 'wp_head', [ __CLASS__, 'head' ] );
		if ( ! isset( $content_width ) ) $content_width = 1170;
		add_action( 'wp_body_open', 'wpe_header_template' );
		add_action( 'wp_footer', 'wpe_footer_template', 0 );
	}

	public static function constants ()
	{
		$theme_info = wpe_theme_info();

		$theme_constant = [
			"{$theme_info->UcwordsNameHyphen}_T_VER" => $theme_info->Version,
			"{$theme_info->UcwordsNameHyphen}_T_DIR" => get_stylesheet_directory() . '/',
			"{$theme_info->UcwordsNameHyphen}_T_URI" => get_stylesheet_directory_uri() . '/',
		];
		$theme_constant = array_filter( apply_filters( 'wpe/theme_constant', $theme_constant ) );
		if ( ! empty( $theme_constant ) ) {
			foreach ( $theme_constant as $constant => $key ) {
				wpe_maybe_define_constant( $constant, $key );
			}
		}

	}

	public static function theme_clases ()
	{
		$theme_info   = wpe_theme_info();
		$theme_loader = "\\WPEssential\\Theme\\{$theme_info->NameSpace}\\Loader";
		if ( class_exists( $theme_loader ) ) {
			$theme_loader::constructor();
		}
	}

	public static function setup_actions ()
	{
		$action_list = apply_filters( 'wpe/theme/after_setup/hooks', [
			'Support'  => [
				'callback' => [ 'WPEssential\Theme\Setup\Support', 'constructor' ],
				'priority' => 10
			],
			'Sidebars' => [
				'callback' => [ 'WPEssential\Theme\Setup\Sidebars', 'constructor' ],
				'priority' => 20
			],
			'Widgets'  => [
				'callback' => [ 'WPEssential\Theme\Setup\Widgets', 'constructor' ],
				'priority' => 30
			],
			'Images'   => [
				'callback' => [ 'WPEssential\Theme\Setup\Images', 'constructor' ],
				'priority' => 40
			],
			'Menus'    => [
				'callback' => [ 'WPEssential\Theme\Setup\Menus', 'constructor' ],
				'priority' => 50
			],
			'Tgm'      => [
				'callback' => [ 'WPEssential\Plugins\Assets\Tgm', 'constructor' ],
				'priority' => 60
			],
		] );

		if ( ! empty( $action_list ) ) {
			foreach ( $action_list as $key => $action ) {
				if ( ! wpe_array_get( $action, 'callback' ) && ! wpe_array_get( $action, 'priority' ) && class_exists( wpe_array_get( $action, 'callback' ) ) ) {
					$error = "(wpe/theme/after_setup/hooks) => {$key} " . __( 'have no callback or priority', 'wpessential' );
					wp_die( $error );
				}
				add_action( 'wpe_before_theme_setup', wpe_array_get( $action, 'callback' ), wpe_array_get( $action, 'priority' ) );
			}
		}
	}
}
