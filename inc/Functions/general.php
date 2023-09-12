<?php

if ( ! \defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

define( 'WPE_THEME_VERSION', 1.0 );

if ( ! function_exists( 'wpe_template_load' ) ) {
	/**
	 * Retrieve|Find the file location in themes and plugins.
	 *
	 * @param string $path root path of the file.
	 *
	 * @return string|WP_Error The resource or WP_Error message on failure
	 */
	function wpe_template_load ( $path )
	{
		$find_in = apply_filters( 'wpe/template/load', get_theme_file_path( $path ) );
		if ( file_exists( $find_in ) ) {
			return $find_in;
		}

		$find_in = $path;
		if ( file_exists( $find_in ) ) {
			return $find_in;
		}

		$find_in = WPE_DIR . $path;
		if ( file_exists( $find_in ) ) {
			return $find_in;
		}

		$error = new WP_Error(
			[
				404,
				sprintf( __( 'File %s not found' ), basename( $find_in ) ),
				$path
			]
		);
		return $error->get_error_message();
	}
}

if ( ! function_exists( 'wpe_theme_info' ) ) {
	/**
	 * theme info
	 *
	 * @return object
	 */
	function wpe_theme_info ()
	{
		$theme_info      = wp_get_theme();
		$name            = $theme_info->get( 'Name' );
		$lower_name      = strtolower( $name );
		$ucwords_name    = ucwords( $lower_name );
		$strtoupper_name = strtoupper( $lower_name );
		$theme_info      = [
			'Name'              => $name,
			'ThemeURI'          => $theme_info->get( 'ThemeURI' ),
			'Description'       => $theme_info->get( 'Description' ),
			'Author'            => $theme_info->get( 'Author' ),
			'AuthorURI'         => $theme_info->get( 'AuthorURI' ),
			'Version'           => $theme_info->get( 'Version' ),
			'Template'          => $theme_info->get( 'Template' ),
			'Status'            => $theme_info->get( 'Status' ),
			'Tags'              => $theme_info->get( 'Tags' ),
			'TextDomain'        => $theme_info->get( 'TextDomain' ),
			'DomainPath'        => $theme_info->get( 'DomainPath' ),
			'RequiresWP'        => $theme_info->get( 'RequiresWP' ),
			'RequiresPHP'       => $theme_info->get( 'RequiresPHP' ),
			'LowerNameHyphen'   => wpe_replace_in_underscore( $lower_name ),
			'LowerNameDash'     => wpe_replace_in_underscore( $lower_name ),
			'UcwordsNameHyphen' => wpe_replace_in_underscore( $ucwords_name ),
			'UcwordsNameDash'   => wpe_replace_in_underscore( $ucwords_name ),
			'UpperNameHyphen'   => wpe_replace_in_underscore( $strtoupper_name ),
			'UpperNameDash'     => wpe_replace_in_underscore( $strtoupper_name ),
			'NameSpace'         => wpe_replace_in_nospace( $ucwords_name ),
			'Parent'            => []
		];

		$template = $theme_info[ 'Template' ] ?? '';
		if ( $template ) {
			$name            = wpe_replace_in_space( $template );
			$lower_name      = strtolower( $name );
			$ucwords_name    = ucwords( $lower_name );
			$strtoupper_name = strtoupper( $lower_name );
			$parent_theme    = apply_filters( 'wpe/theme_info/parent', [
				'Parent' => (object) array_filter( [
					'Name'              => $ucwords_name,
					'LowerNameHyphen'   => wpe_replace_in_underscore( $lower_name ),
					'LowerNameDash'     => wpe_replace_in_underscore( $lower_name ),
					'UcwordsNameHyphen' => wpe_replace_in_underscore( $ucwords_name ),
					'UcwordsNameDash'   => wpe_replace_in_underscore( $ucwords_name ),
					'UpperNameHyphen'   => wpe_replace_in_underscore( $strtoupper_name ),
					'UpperNameDash'     => wpe_replace_in_underscore( $strtoupper_name ),
					'NameSpace'         => wpe_replace_in_nospace( $ucwords_name ),
				] )
			] );
			$theme_info      = wp_parse_args( $parent_theme, apply_filters( 'wpe/theme_info/child', $theme_info ) );
		}

		return apply_filters( 'wpe/theme_info', (object) $theme_info );
	}
}

if ( ! function_exists( 'wpe_array_get' ) ) {
	function wpe_array_get ( $var, $key, $def = null )
	{

		if ( empty( $var ) && ! empty( $def ) ) {
			return $def;
		}
		if ( ! $var ) {
			return false;
		}
		if ( is_object( $var ) && ! empty( $var->$key ) ) {
			return $var->$key;
		}
		if ( is_array( $var ) && ! empty( $var[ $key ] ) ) {
			return $var[ $key ];
		}

		if ( $def ) {
			return $def;
		}

		return false;
	}
}

if ( ! function_exists( 'wpe_maybe_define_constant' ) ) {
	/**
	 * Define a constant if it is not already defined.
	 *
	 * @param string $name  Constant name.
	 * @param mixed  $value Value.
	 */
	function wpe_maybe_define_constant ( $name, $value )
	{
		if ( ! defined( $name ) ) {
			define( $name, $value );
		}
	}
}

wp_link_pages( [ 'echo' => 0 ] );
