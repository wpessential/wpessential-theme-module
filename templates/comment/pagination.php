<?php
if ( ! \defined( 'ABSPATH' ) )
{
	exit; // Exit if accessed directly.
}

the_comments_pagination(
	[
		'prev_text' => '<span class="screen-reader-text">' . esc_html__( 'Previous', 'twentyseventeen' ) . '</span>',
		'next_text' => '<span class="screen-reader-text">' . esc_html__( 'Next', 'twentyseventeen' ) . '</span>',
	]
);
