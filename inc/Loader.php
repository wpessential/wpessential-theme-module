<?php

namespace WPEssential\Theme;

use WPEssential\Theme\Setup\SetupInit;

if ( ! \defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

final class Loader
{
	public static function constructor ()
	{

		self::load_files();
		self::start();
	}

	public static function load_files ()
	{
		require_once __DIR__ . '/Functions/template.php';
	}

	public static function start ()
	{
		SetupInit::constructor();
	}
}

Loader::constructor();
