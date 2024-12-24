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
<header>
	<?php
	/*
	 * ['\\WPEssential\\Theme\\Templates\\HeaderTemplates', 'logo'] - 10
	 * ['\\WPEssential\\Theme\\Templates\\HeaderTemplates', 'menu'] - 20
	 * ['\\WPEssential\\Theme\\Templates\\HeaderTemplates', 'buttons'] - 30
	 * */
	do_action( 'wpe_header' );
	?>
</header>
<?php do_action( 'wpe_after_header' ); ?>
