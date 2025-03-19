<?php

use WPEssential\Plugins\Admin\Settings;

if ( ! \defined( 'ABSPATH' ) )
{
	exit; // Exit if accessed directly.
}
?>
<span class="wpe-product-count wpe-width-px-17 wpe-height-px-17 wpe-circle-prcnt-100 wpe-display-in-flx wpe-align-center wpe-just-cntr wpe-fs-px-10 wpe-fw-bold wpe-position-abs wpe-top-prcnt-5 wpe-right-prcnt--10">
	<?php echo wpe_wc_cart_count(); ?>
</span>
