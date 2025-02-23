<?php

use WPEssential\Plugins\Admin\Settings;

if ( ! \defined( 'ABSPATH' ) )
{
	exit; // Exit if accessed directly.
}
?>
<div class="<?php echo apply_filters( 'wpe_header_button_wrapper_classes', 'wpe-user-data wpe-display-flx wpe-align-center wpe-gap-px-10 ' ); ?>">
	<div class="wpe-menu-bar"><a href="javascript:void(0)" class="wpe-fs-px-25"><i class="fa-solid fa-bars"></i></a></div>
	<?php
	$auth = Settings::get_value( 'user_authority' );
	$cart = Settings::get_value( 'cart' );
	if ( $auth || $cart ):
		?>
		<div class="wpe-contact">
			<ul class="wpe-display-flx wpe-align-center wpe-gap-px-7">
				<?php if ( $auth === 'on' ): ?>
					<li class="wpe-login wpe-fs-px-16 wpe-fw-bold">
						<?php echo esc_html( Settings::get_value( 'user_authority_label' ) ); ?>
						<a href="javascript:void(0)" class="wpe-cnt-icn wpe-width-px-48 wpe-mrg-l-px-10 wpe-height-px-48 wpe-display-in-flx wpe-align-center wpe-just-cntr wpe-circle-prcnt-100">
							<i class="fa-solid fa-user"></i>
						</a>
					</li>
				<?php endif; ?>
				<?php if ( $cart === 'on' && function_exists( 'WC' ) ): ?>
					<li>
						<a href="javascript:void(0)" data-bs-toggle="offcanvas" data-bs-target="#cart-popup" aria-controls="cart-popup" class="wpe-shp-icn wpe-width-px-48 wpe-height-px-48 wpe-display-in-flx wpe-align-center wpe-just-cntr wpe-circle-prcnt-100 wpe-position-rel">
							<i class="fa-solid fa-bag-shopping"></i>
							<span class="wpe-width-px-17 wpe-height-px-17 wpe-circle-prcnt-100 wpe-display-in-flx wpe-align-center wpe-just-cntr wpe-fs-px-10 wpe-fw-bold wpe-position-abs wpe-top-prcnt-5 wpe-right-prcnt--10"><?php echo wpe_wc_cart_count(); ?></span>
						</a>
					</li>
				<?php endif; ?>
			</ul>
		</div>
	<?php endif; ?>
</div>
