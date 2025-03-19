<?php
if ( ! \defined( 'ABSPATH' ) )
{
	exit; // Exit if accessed directly.
}

do_action( 'wpe_before_footer' );
?>
	<footer>
		<div class="<?php echo apply_filters( 'wpe_footer_tag_classes', 'wpe-footer-wrapper wpe-pad-t-px-95 wpe-pad-b-px-45 ' ) ?>">
			<div class="wpe-container wpe-width-prcnt-100 wpe-pad-r-px-15 wpe-pad-l-px-15 wpe-mrg-l-auto wpe-mrg-r-auto">
				<?php
				/*
				 * ['\\WPEssential\\Theme\\Templates\\FooterTemplates', 'sidebar'] - 10
				 * */
				do_action( 'wpe_footer' );
				?>
				<div class="wpe-footer-bottom bottom wpe-pad-t-px-35">
					<div class="wpe-inner-bottom wpe-display-flx wpe-align-center wpe-just-space-between">
						<?php
						/*
						 * ['\\WPEssential\\Theme\\Templates\\FooterTemplates', 'copyright'] - 10
						 * ['\\WPEssential\\Theme\\Templates\\FooterTemplates', 'menu'] - 20
						 * */
						do_action( 'wpe_footer_bottom' );
						?>
					</div>
				</div>
			</div>
		</div>
	</footer>
<?php
do_action( 'wpe_after_footer' );
