<?php

use WPEssential\Theme\Templates\HeaderTemplates;

if ( ! \defined( 'ABSPATH' ) )
{
	exit; // Exit if accessed directly.
}
?>
<div class="wpe-menu-wrapper">
	<div class="navigation-wrapper">
		<div class="cross-btn wpe-mrg-b-px-30 wpe-display-no">
			<a href="javascript:void(0);"><i class="fa-solid fa-xmark"></i></a>
		</div>
		<?php
		add_filter( 'wpe_logo_classes', function ( $classes )
		{
			$classes .= 'wpe-mrg-b-px-20 wpe-display-no';
			return $classes;
		} );
		HeaderTemplates::logo();
		wp_nav_menu( apply_filters( 'wpe_header_menu_args', [
			'theme_location'  => 'primary_menu',
			'container'       => 'nav',
			'container_class' => '',
			'container_id'    => '',
			'menu_class'      => 'menu wpe-header-menu',
			'menu_id'         => '',
			'fallback_cb'     => 'wp_page_menu',
			'before'          => '',
			'after'           => '',
			'link_before'     => '',
			'link_after'      => '',
			'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
			'item_spacing'    => 'preserve',
			'depth'           => 0,
			'walker'          => '',
		] ) );
		?>
	</div>
</div>
