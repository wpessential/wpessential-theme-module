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
		wpe_template_load( 'templates/comment/title', '', true, true );
	}

	/**
	 * Includes the comment form template.
	 *
	 * @return void
	 */
	public static function form ()
	{
		wpe_template_load( 'templates/comment/form', '', true, true );
	}

	/**
	 * Includes the comment list template.
	 *
	 * @return void
	 */
	public static function list ()
	{
		wpe_template_load( 'templates/comment/list', '', true, true );
	}

	/**
	 * Includes the comments template.
	 *
	 * @return void
	 */
	public static function comments ()
	{
		wpe_template_load( 'templates/comment/index', '', true, true );
	}

	/**
	 * Includes the comments close template.
	 *
	 * @return void
	 */
	public static function closed ()
	{
		wpe_template_load( 'templates/comment/close', '', true, true );
	}

	/**
	 * Includes the comments pagination template.
	 *
	 * @return void
	 */
	public static function pagination ()
	{
		wpe_template_load( 'templates/comment/pagination', '', true, true );
	}
}
