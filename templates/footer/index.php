<?php
if ( ! \defined( 'ABSPATH' ) )
{
	exit; // Exit if accessed directly.
}

do_action( 'wpe_before_footer' );
?>
<footer>
	<?php
	/*
	 * ['\\WPEssential\\Theme\\Templates\\FooterTemplates', 'sidebar'] - 10
	 * ['\\WPEssential\\Theme\\Templates\\FooterTemplates', 'menu'] - 20
	 * ['\\WPEssential\\Theme\\Templates\\FooterTemplates', 'copyright'] - 30
	 * */
	do_action( 'wpe_footer' );
	?>
</footer>
<?php
do_action( 'wpe_after_footer' );
