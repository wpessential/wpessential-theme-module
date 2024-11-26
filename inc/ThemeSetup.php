<?php

namespace WPEssential\Theme;

// Prevent direct access to the script.
if ( ! \defined( 'ABSPATH' ) )
{
	exit; // Exit if accessed directly.
}

/**
 * Class ThemeSetup
 *
 * Handles the initialization and setup of theme functionalities, hooks, and templates.
 */
final class ThemeSetup
{
	/**
	 * Initializes core theme components and hooks.
	 *
	 * @return void
	 */
	public static function constructor ()
	{
		require_once __DIR__ . '/Functions/template.php';

		Constants::constructor();
		ThemeLoader::constructor();
		Classes::constructor();

		// Setup theme-specific actions and filters.
		add_action(
			'wpe_setup_theme',
			function ()
			{
				do_action( 'wpe_before_theme_setup' );
				add_action( 'after_setup_theme', [ __CLASS__, 'setup_theme' ], 2000 );
				do_action( 'wpe_after_theme_setup' );
			},
			1000
		);
	}

	/**
	 * Performs the setup of theme-related features and templates.
	 *
	 * @return void
	 */
	public static function setup_theme ()
	{
		Head::constructor();

		// Set default content width.
		if ( ! isset( $content_width ) )
		{
			$content_width = 1170;
		}

		// Ensures proper page linking.
		wp_link_pages( [ 'echo' => 0 ] );

		// Add hooks for header and footer templates.
		add_action( 'wp_body_open', [ __CLASS__, 'header_template' ] );
		add_action( 'wp_footer', [ __CLASS__, 'footer_template' ], 0 );
	}

	/**
	 * Registers template hooks for various sections of the theme.
	 *
	 * @return void
	 */
	private static function templates_hooks ()
	{
		add_action( 'wpe_before_loop', [ __CLASS__, 'before_loop_template' ] );
		add_action( 'wpe_after_loop', [ __CLASS__, 'after_loop_template' ] );
		add_action( 'wpe_no_posts_found', [ __CLASS__, 'no_posts_found_template' ] );
		// Additional hooks for sidebars, footer, header, loops, pagination, comments, etc.
		add_action( 'wpe_default_sidebar_before', [ __CLASS__, 'default_sidebar_before_template' ] );
		add_action( 'wpe_default_sidebar', [ __CLASS__, 'default_sidebar_template' ] );
		add_action( 'wpe_default_sidebar_after', [ __CLASS__, 'default_sidebar_after_template' ] );
		// More hooks continue...
	}

	/**
	 * Includes the template for rendering before the loop starts.
	 *
	 * @return void
	 */
	public function before_loop_template ()
	{
		include wpe_template_load( 'templates/general/before-loop.php' );
	}

	/**
	 * Includes the template for rendering when no posts are found.
	 *
	 * @return void
	 */
	public function no_posts_found_template ()
	{
		include wpe_template_load( 'templates/general/no-posts-found.php' );
	}

	/**
	 * Includes the template for rendering the content before each post in the loop.
	 *
	 * @return void
	 */
	public function loop_post_before_template ()
	{
		include wpe_template_load( 'templates/general/loop-post-before.php' );
	}

	/**
	 * Includes the template for rendering the content after each post in the loop.
	 *
	 * @return void
	 */
	public function loop_post_after_template ()
	{
		include wpe_template_load( 'templates/general/loop-after-loop.php' );
	}

	/**
	 * Includes the template for rendering after the loop ends.
	 *
	 * @return void
	 */
	public function after_loop_template ()
	{
		include wpe_template_load( 'templates/general/after-loop.php' );
	}

	/**
	 * Includes the template for pagination.
	 *
	 * @param array $args Pagination arguments.
	 *
	 * @return void
	 */
	public static function pagination_template ( $args = [] )
	{
		include wpe_template_load( 'templates/general/pagination.php' );
	}

	// Similarly, other methods such as `default_sidebar_template`, `footer_template`, etc.,
	// include templates for specific sections of the theme.

	/**
	 * Includes the template for the site's footer.
	 *
	 * @return void
	 */
	public static function footer_template ()
	{
		include wpe_template_load( 'templates/footer/footer.php' );
	}

	// More methods...

	/**
	 * Handles the rendering of different post formats.
	 *
	 * @param string $format     The post format.
	 * @param string $image_size Optional image size for the post format template.
	 *
	 * @return void
	 */
	public static function post_format_template ( $format, $image_size = '' )
	{
		if ( ! $format )
		{
			return wpe_post_format_image_template( $image_size );
		}

		// Dynamically calls the template method for the specified post format.
		return call_user_func( "wpe_post_format_{$format}_template", $image_size );
	}

	/**
	 * Includes the comment form template.
	 *
	 * @return void
	 */
	public static function comment_form ()
	{
		include wpe_template_load( 'templates/comment/form.php' );
	}

	/**
	 * Includes the comments template.
	 *
	 * @return void
	 */
	public static function comments ()
	{
		include wpe_template_load( 'templates/comment/comments.php' );
	}

	/**
	 * Includes the comments close template.
	 *
	 * @return void
	 */
	public static function comments_close ()
	{
		include wpe_template_load( 'templates/comment/close.php' );
	}

	/**
	 * Includes the comments pagination template.
	 *
	 * @return void
	 */
	public static function comments_pagination ()
	{
		include wpe_template_load( 'templates/comment/pagination.php' );
	}
}
