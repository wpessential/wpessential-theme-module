<?php

use WPEssential\Plugins\Admin\Settings;

if ( ! \defined( 'ABSPATH' ) )
{
	exit; // Exit if accessed directly.
}

if ( class_exists( 'Settings' ) && 'on' !== Settings::get_value( 'cart_popup' ) ) return;
wp_enqueue_script( [ 'wc-cart-fragments', 'bootstrap-input-spinner' ] );
?>
<div class="wpe-mini-cart-wrapper cart offcanvas offcanvas-end" id="cart-popup">
	<div class="wpe-mini-cart" id="wpe-mini-cart"></div>
</div>
