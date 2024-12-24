<?php
if ( ! \defined( 'ABSPATH' ) )
{
	exit; // Exit if accessed directly.
}
if ( is_active_sidebar( 'footer' ) ) :
	do_action( 'wpe_before_footer_sidebar' );
	?>
	<div class="<?php echo apply_filters( 'wpe/sidebar/classes', 'wpe-footer-sidebar footer' ); ?>">
		<?php dynamic_sidebar( 'footer' ) ?>
	</div>
	<?php
	do_action( 'wpe_after_footer_sidebar' );
endif;
