<?php
if ( ! \defined( 'ABSPATH' ) )
{
	exit; // Exit if accessed directly.
}

/*
 * ['\\WPEssential\\Theme\\Templates\\HeaderTemplates', 'page_loader'] - 0
 * */
do_action( 'wpe_before_header' );
?>
	<header class="<?php echo apply_filters( 'wpe_header_tag_classes', 'wpe-position-abs wpe-top-prcnt-0 wpe-left-prcnt-0 wpe-width-prcnt-100 wpe-z-999 ' ); ?>">
		<div class="wpe-header-wrapper">
			<div class="wpe-container wpe-width-prcnt-100 wpe-pad-r-px-15 wpe-pad-l-px-15 wpe-mrg-l-auto wpe-mrg-r-auto">
				<div class="wpe-inner-header wpe-display-flx wpe-align-center wpe-just-space-between wpe-pad-t-px-40">
					<?php
					/*
					 * ['\\WPEssential\\Theme\\Templates\\HeaderTemplates', 'logo'] - 10
					 * ['\\WPEssential\\Theme\\Templates\\HeaderTemplates', 'menu'] - 20
					 * ['\\WPEssential\\Theme\\Templates\\HeaderTemplates', 'buttons'] - 30
					 * */
					do_action( 'wpe_header' );
					?>
				</div>
			</div>
		</div>
	</header>
<?php
do_action( 'wpe_after_header' );
