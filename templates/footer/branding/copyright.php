<?php

use WPEssential\Plugins\Admin\Settings;

if ( ! \defined( 'ABSPATH' ) )
{
	exit; // Exit if accessed directly.
}
?>
<div class="wpe-copyright">
	<p class="wpe-fs-px-16 wpe-fw-medium">
		<?php echo wpe_custom_variables( Settings::get_value( 'copyright' ) ); ?>
	</p>
</div>
