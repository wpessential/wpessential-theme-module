<?php
if ( ! \defined( 'ABSPATH' ) )
{
	exit; // Exit if accessed directly.
}

if ( has_post_thumbnail() )
{
	the_post_thumbnail( $image_size );
}
