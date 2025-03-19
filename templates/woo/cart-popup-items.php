<?php
if ( ! \defined( 'ABSPATH' ) )
{
	exit; // Exit if accessed directly.
}
?>
<div class="wpe-mini-cart" id="wpe-mini-cart">
	<div class="wpe-mini-cart-header wpe-mrg-b-px-20 wpe-pad-t-px-50 wpe-pad-r-px-30 wpe-pad-l-px-30 wpe-pad-b-px-5">
		<div class="wpe-title-wrapper">
			<h2 class="wpe-txt-trnsf-upper wpe-fs-px-20 wpe-fw-bold" id="offcanvasLabel"><?php esc_html_e( 'Shopping Cart', 'TEXT_DOMAIN' ); ?></h2>
		</div>
	</div>
	<?php
	if ( WC()->cart && ! WC()->cart->is_empty() ) :
		?>
		<div class="wpe-mini-cart-body has-scrollbar position-relative wpe-pad-r-px-30 wpe-pad-l-px-30">
		<div class="wpe-title-wrapper wpe-mrg-b-px-20">
			<h3 class="wpe-fs-px-16 wpe-fw-bold"><?php echo sprintf( esc_html__( '%s Items', 'TEXT_DOMAIN' ), wpe_wc_cart_count() ); ?></h3>
		</div>
			<?php
			foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item )
			{
				global $product;
				$product    = wc_get_product( $cart_item[ 'product_id' ] );
				$_product   = $cart_item[ 'data' ];
				$product_id = $cart_item[ 'product_id' ];

				if ( $_product && $_product->exists() && $cart_item[ 'quantity' ] > 0 )
				{
					$product_name      = $_product->get_name();
					$thumbnail         = $_product->get_image();
					$product_price     = WC()->cart->get_product_price( $_product );
					$product_permalink = $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '';
					?>
					<div class="wpe-cart-product wpe-display-flx wpe-align-flx-start wpe-gap-px-23 wpe-mrg-b-px-30 wpe-pad-b-px-30 wpe-position-rel" data-product-id="<?php echo esc_attr( $product_id ); ?>" data-key="<?php echo esc_attr( $cart_item_key ) ?>">
					<?php
					echo sprintf(
						'<a href="%s" class="wpe-remove-product wpe-display-in-flx wpe-align-center wpe-just-cntr wpe-width-px-24 wpe-height-px-24 wpe-circle-prcnt-100 wpe-fs-px-9 wpe-fw-extrabold wpe-position-abs wpe-top-px-0 wpe-right-px-0" aria-label="%s" data-product_id="%s" data-cart_item_key="%s" data-product_sku="%s" data-success_message="%s">&times;</a>',
						esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
						esc_attr( sprintf( esc_html__( 'Remove %s from cart', 'TEXT_DOMAIN' ), wp_strip_all_tags( $product_name ) ) ),
						esc_attr( $product_id ),
						esc_attr( $cart_item_key ),
						esc_attr( $_product->get_sku() ),
						esc_attr( sprintf( esc_html__( '&ldquo;%s&rdquo; has been removed from your cart', 'TEXT_DOMAIN' ), wp_strip_all_tags( $product_name ) ) )
					)
					?>
						<div class="wpe-cart-img wpe-flx-prcnt-27">
						<div class="wpe-image-wrapper">
							<div class="wpe-image">
								<?php
								if ( empty( $product_permalink ) ) :
									?>
									<span class="wpe-width-prcnt-100 wpe-height-prcnt-100 wpe-position-abs wpe-bg-repeat wpe-bg-size wpe-bg-position" style="background-image:url(<?php echo get_the_post_thumbnail_url( $_product->get_id(), 'thumbnail' ); ?>);"></span>
								<?php
								else :
									?>
									<a href="<?php echo esc_url( $product_permalink ); ?>" class="wpe-pad-b-px-96 wpe-position-rel wpe-display-block">
										<span class="wpe-width-prcnt-100 wpe-height-prcnt-100 wpe-position-abs wpe-bg-repeat wpe-bg-size wpe-bg-position" style="background-image:url(<?php echo get_the_post_thumbnail_url( $_product->get_id(), 'thumbnail' ); ?>);"></span>
									</a>
								<?php endif; ?>
							</div>
						</div>
					</div>
					<div class="wpe-cart-info">
						<div class="wpe-title-wrapper wpe-mrg-b-px-10">
							<h5 class="wpe-fs-px-22 wpe-fw-bold">
								<?php
								if ( empty( $product_permalink ) )
								{
									echo esc_html( $product_name );
								}
								else
								{
									?>
									<a href="<?php echo esc_url( $product_permalink ); ?>"><?php echo esc_html( $product_name ); ?></a>
								<?php } ?>
							</h5>
						</div>
						<?php echo wc_get_formatted_cart_item_data( $cart_item ); ?>
						<div class="wpe-product-quantity js-quantity-selector wpe-mw-px-170">
							<?php
							woocommerce_quantity_input(
								[
									'min_value'   => $_product->get_min_purchase_quantity(),
									'max_value'   => $_product->get_max_purchase_quantity(),
									'input_value' => $cart_item[ 'quantity' ]
								]
							);
							?>
						</div>
					</div>
				</div>
					<?php
				}
			}
			?>
		</div>
		<div class="wpe-mini-cart-footer wpe-pad-t-px-30 wpe-pad-r-px-30 wpe-pad-b-px-20 wpe-pad-l-px-30 wpe-mrg-t-auto">
		<table class="price-table wpe-width-prcnt-100 wpe-mrg-b-px-20">
			<thead>
				<tr class="cart-subtotal">
					<th class="wpe-fs-px-16 wpe-fw-bold"><?php esc_html_e( 'Subtotal', 'TEXT_DOMAIN' ); ?></th>
					<td class="wpe-fs-px-16 wpe-fw-bold"></td>
					<td class="wpe-fs-px-16 wpe-fw-bold wpe-txt-align-rght"><?php echo WC()->cart->get_cart_subtotal(); ?></td>
				</tr>
			</thead>
			<tfoot>
				<tr class="order-total">
					<th class="wpe-fs-px-22 wpe-fw-bold wpe-pad-t-px-10"><?php esc_html_e( 'Total', 'TEXT_DOMAIN' ); ?></th>
					<td class="wpe-fs-px-22 wpe-fw-bold wpe-pad-t-px-10"></td>
					<td class="wpe-fs-px-22 wpe-fw-bold wpe-pad-t-px-10 wpe-txt-align-rght">
						<?php echo WC()->cart->get_cart_total(); ?>
					</td>
				</tr>
			</tfoot>
		</table>
			<?php do_action( 'woocommerce_widget_shopping_cart_before_buttons' ); ?>
			<div class="wpe-cart-footer-bottom">
			<div class="wpe-content-wrapper wpe-mrg-b-px-10"><p class="wpe-fs-px-16 wpe-fw-regular"><?php wc_privacy_policy_text( $type = 'checkout' ); ?></p></div>
			<div class="wpe-btn-group wpe-display-flx wpe-align-center wpe-just-cntr wpe-gap-px-20 wpe-mrg-t-px-40">
				<a href="<?php echo wc_get_cart_url(); ?>" class="wpe-theme-btn wpe-fs-px-18 wpe-fw-bold wpe-pad-t-px-19 wpe-pad-b-px-19 wpe-pad-r-px-52 wpe-pad-l-px-52 wpe-circle-px-100 wpe-position-rel wpe-overflow-hide wpe-z-1 wpe-display-in-block">
					<?php esc_html_e( 'View Cart', 'TEXT_DOMAIN' ); ?>
					<span class="wpe-width-prcnt-25 wpe-height-prcnt-100 wpe-circle-prcnt-100 wpe-position-abs wpe-left-prcnt-0"></span>
					<span class="wpe-width-prcnt-25 wpe-height-prcnt-100 wpe-circle-prcnt-100 wpe-position-abs wpe-left-prcnt-25"></span>
					<span class="wpe-width-prcnt-25 wpe-height-prcnt-100 wpe-circle-prcnt-100 wpe-position-abs wpe-left-prcnt-50"></span>
					<span class="wpe-width-prcnt-25 wpe-height-prcnt-100 wpe-circle-prcnt-100 wpe-position-abs wpe-left-prcnt-75"></span>
				</a>
				<a href="<?php echo wc_get_checkout_url(); ?>" class="wpe-theme-btn v3 wpe-fs-px-18 wpe-fw-bold wpe-pad-t-px-19 wpe-pad-b-px-19 wpe-pad-r-px-52 wpe-pad-l-px-52 wpe-circle-px-100 wpe-position-rel wpe-overflow-hide wpe-z-1 wpe-display-in-block">
					<?php esc_html_e( 'Checkout', 'TEXT_DOMAIN' ); ?>
					<span class="wpe-width-prcnt-25 wpe-height-prcnt-100 wpe-circle-prcnt-100 wpe-position-abs wpe-left-prcnt-0"></span>
					<span class="wpe-width-prcnt-25 wpe-height-prcnt-100 wpe-circle-prcnt-100 wpe-position-abs wpe-left-prcnt-25"></span>
					<span class="wpe-width-prcnt-25 wpe-height-prcnt-100 wpe-circle-prcnt-100 wpe-position-abs wpe-left-prcnt-50"></span>
					<span class="wpe-width-prcnt-25 wpe-height-prcnt-100 wpe-circle-prcnt-100 wpe-position-abs wpe-left-prcnt-75"></span>
				</a>
			</div>
		</div>
			<?php do_action( 'woocommerce_widget_shopping_cart_after_buttons' ); ?>
		</div>
	<?php
	else :
		?>
		<div class="wpe-cart-product wpe-display-flx wpe-align-flx-start wpe-gap-px-23 wpe-mrg-b-px-30 wpe-pad-b-px-30 wpe-position-rel">
			<p class="wpe-fs-px-16 wpe-fw-regular"><?php esc_html_e( 'No products in the cart.', 'TEXT_DOMAIN' ); ?></p>
		</div>
	<?php
	endif;
	?>
</div>
