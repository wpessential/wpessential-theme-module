<?php
if ( ! \defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>
<div class="wpe-footer-bottom">
	<p>
		<?php
		echo sprintf(
			esc_html__( '© %s WPEssential - All Rights Reserved - Made By %s', 'TEXT_DOMAIN' ),
			date( 'Y' ),
			'<a href="' . esc_url( 'wpessential.org' ) . '">' . esc_html__( 'WPEssenital', 'TEXT_DOMAIN' ) . '</a>'
		);
		?>
	</p>
</div>
