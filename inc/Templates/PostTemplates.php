<?php

namespace WPEssential\Theme\Templates;

// Prevent direct access to the script.
if ( ! \defined( 'ABSPATH' ) )
{
	exit; // Exit if accessed directly.
}

/**
 * Class Post Templates
 *
 * Handles the initialization and setup of theme post, hooks, and templates.
 */
final class PostTemplates
{
	/**
	 * Initializes core theme components and hooks.
	 * Also registers template hooks for various sections of the theme.
	 *
	 * @return void
	 */
	public static function constructor ()
	{
		// Additional hooks for detail page and post format.
		add_action( 'wpe_post_format', [ __CLASS__, 'format' ], 10, 2 );

		add_action( 'wpe_before_loop', [ __CLASS__, 'before' ], 0 );

		add_action( 'wpe_loop', [ __CLASS__, 'before_post' ], 0 );

		add_action( 'wpe_loop', [ __CLASS__, 'loop' ] );
		// Additional hooks for pagination.
		add_action( 'wpe_pagination', [ __CLASS__, 'pagination' ], 10, 1 );
		// Additional hooks for empty post.
		add_action( 'wpe_no_posts', [ __CLASS__, 'no_posts' ] );

		add_action( 'wpe_loop', [ __CLASS__, 'after_post' ], 10000 );

		add_action( 'wpe_after_loop', [ __CLASS__, 'after' ], 10000 );
	}

	/**
	 * Handles the rendering of different post formats.
	 *
	 * @param string $format     The post format.
	 * @param string $image_size Optional image size for the post format template.
	 *
	 * @return void
	 */
	public static function format ( $format = 'image', $image_size = 'thumbnail' )
	{
		// Dynamically calls the template method for the specified post format.
		return call_user_func( [ __CLASS__, $format ], $image_size );
	}

	/**
	 * Includes the template for rendering aside.
	 *
	 * @param string $image_size Optional image size for the post format template.
	 *
	 * @return void
	 */
	public static function aside ( $image_size )
	{
		include wpe_template_load( 'templates/post/aside' );
	}

	/**
	 * Includes the template for rendering audio.
	 *
	 * @param string $image_size Optional image size for the post format template.
	 *
	 * @return void
	 */
	public static function audio ( $image_size )
	{
		include wpe_template_load( 'templates/post/audio' );
	}

	/**
	 * Includes the template for rendering chat.
	 *
	 * @param string $image_size Optional image size for the post format template.
	 *
	 * @return void
	 */
	public static function chat ( $image_size )
	{
		include wpe_template_load( 'templates/post/chat' );
	}

	/**
	 * Includes the template for rendering gallery.
	 *
	 * @param string $image_size Optional image size for the post format template.
	 *
	 * @return void
	 */
	public static function gallery ( $image_size )
	{
		include wpe_template_load( 'templates/post/gallery' );
	}

	/**
	 * Includes the template for rendering image.
	 *
	 * @param string $image_size Optional image size for the post format template.
	 *
	 * @return void
	 */
	public static function image ( $image_size = 'full' )
	{
		include wpe_template_load( 'templates/post/image' );
	}

	/**
	 * Includes the template for rendering link.
	 *
	 * @param string $image_size Optional image size for the post format template.
	 *
	 * @return void
	 */
	public static function link ( $image_size )
	{
		include wpe_template_load( 'templates/post/link' );
	}

	/**
	 * Includes the template for rendering quote.
	 *
	 * @param string $image_size Optional image size for the post format template.
	 *
	 * @return void
	 */
	public static function quote ( $image_size )
	{
		include wpe_template_load( 'templates/post/quote' );
	}

	/**
	 * Includes the template for rendering status.
	 *
	 * @param string $image_size Optional image size for the post format template.
	 *
	 * @return void
	 */
	public static function status ( $image_size )
	{
		include wpe_template_load( 'templates/post/status' );
	}

	/**
	 * Includes the template for rendering video.
	 *
	 * @param string $image_size Optional image size for the post format template.
	 *
	 * @return void
	 */
	public static function video ( $image_size )
	{
		include wpe_template_load( 'templates/post/video' );
	}

	/**
	 * Includes the template for rendering before loop.
	 *
	 * @return void
	 */
	public static function before ()
	{
		include wpe_template_load( 'templates/post/before', 'loop' );
	}

	/**
	 * Includes the template for rendering loop.
	 *
	 * @return void
	 */
	public static function loop ()
	{
		//do_action( 'wpe_before_loop' );
		include wpe_template_load( 'templates/post/index' );
		//do_action( 'wpe_after_loop' );
	}

	/**
	 * Includes the template for rendering before post.
	 *
	 * @return void
	 */
	public static function before_post ()
	{
		include wpe_template_load( 'templates/post/before', 'post' );
	}

	/**
	 * Includes the template for rendering pagination.
	 *
	 * @return void
	 */
	public static function pagination ( $args = [] )
	{
		include wpe_template_load( 'templates/post/pagination' );
	}

	/**
	 * Includes the template for rendering no_posts.
	 *
	 * @return void
	 */
	public static function no_posts ()
	{
		include wpe_template_load( 'templates/post/no', 'posts' );
	}

	/**
	 * Includes the template for rendering after post.
	 *
	 * @return void
	 */
	public static function after_post ()
	{
		include wpe_template_load( 'templates/post/after', 'post' );
	}

	/**
	 * Includes the template for rendering after loop.
	 *
	 * @return void
	 */
	public static function after ()
	{
		include wpe_template_load( 'templates/post/after', 'loop' );
	}
}
