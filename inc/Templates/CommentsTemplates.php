<?php

namespace WPEssential\Theme\Templates;

// Prevent direct access to the script.
if ( ! \defined( 'ABSPATH' ) )
{
	exit; // Exit if accessed directly.
}

/**
 * Class Comments Templates
 *
 * Handles the initialization and setup of theme comments, hooks, and templates.
 */
final class CommentsTemplates
{
	/**
	 * Initializes core theme components and hooks.
	 * Also registers template hooks for various sections of the theme.
	 *
	 * @return void
	 */
	public static function constructor ()
	{
		add_action( 'wpe_comment_title', [ __CLASS__, 'title' ] );
		add_action( 'wpe_comment_form', [ __CLASS__, 'form' ] );
		add_action( 'wpe_comments_close', [ __CLASS__, 'closed' ] );
		add_action( 'wpe_comment_list', [ __CLASS__, 'list' ] );
		add_action( 'wpe_comments', [ __CLASS__, 'comments' ] );
		add_action( 'wpe_comment_list', [ __CLASS__, 'pagination' ], 1000 );
	}

	/**
	 * Includes the comment title template.
	 *
	 * @return void
	 */
	public static function title ()
	{
		include wpe_template_load( 'templates/comment/title' );
	}

	/**
	 * Includes the comment form template.
	 *
	 * @return void
	 */
	public static function form ()
	{
		include wpe_template_load( 'templates/comment/form' );
	}

	/**
	 * Includes the comment list template.
	 *
	 * @return void
	 */
	public static function list ()
	{
		include wpe_template_load( 'templates/comment/list' );
	}

	/**
	 * Includes the comments template.
	 *
	 * @return void
	 */
	public static function comments ()
	{
		include wpe_template_load( 'templates/comment/index' );
	}

	/**
	 * Includes the comments close template.
	 *
	 * @return void
	 */
	public static function closed ()
	{
		include wpe_template_load( 'templates/comment/close' );
	}

	/**
	 * Includes the comments pagination template.
	 *
	 * @return void
	 */
	public static function pagination ()
	{
		include wpe_template_load( 'templates/comment/pagination' );
	}
}
