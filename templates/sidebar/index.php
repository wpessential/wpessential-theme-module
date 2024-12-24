<?php
if ( ! \defined( 'ABSPATH' ) )
{
	exit; // Exit if accessed directly.
}

if ( is_active_sidebar( $id ) ) :
	do_action( 'wpe_sidebar_before' );
	dynamic_sidebar( $id );
	do_action( 'wpe_sidebar_after' );
endif;
