<?php

use WPEssential\Theme\MenuWalker;

if ( ! \defined( 'ABSPATH' ) )
{
	exit; // Exit if accessed directly.
}

wp_nav_menu(
	[
		'theme_location'  => 'footer_menu',
		'container'       => 'div',
		'container_class' => 'wpe-ft-link',
		'container_id'    => '',
		'menu_class'      => 'menu wpe-footer-menu wpe-display-flx wpe-align-center wpe-gap-px-30',
		'menu_id'         => '',
		'fallback_cb'     => 'wp_page_menu',
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
		'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
		'item_spacing'    => 'preserve',
		'depth'           => 0,
		'walker'          => new MenuWalker(),
	]
);
