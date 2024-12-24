<?php
if ( ! \defined( 'ABSPATH' ) )
{
	exit; // Exit if accessed directly.
}

do_action( 'wpe_before_post_title' );
echo '<h2>';
echo ( ! is_singular() ) ? '<a href="' . get_the_permalink( get_the_ID() ) . '">' : '';
the_title();
echo ( ! is_singular() ) ? '</a>' : '';
echo '</h2>';
do_action( 'wpe_after_post_title' );

do_action( 'wpe_before_post_format' );
do_action( 'wpe_post_format', get_post_format() );
do_action( 'wpe_after_post_format' );

do_action( 'wpe_before_post_content' );
if ( ( ! is_singular() ) )
{
	the_excerpt();
}
else
{
	the_content();
}
do_action( 'wpe_after_post_content' );
