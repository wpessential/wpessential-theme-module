<?php
if ( ! \defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$default = [
	'base'    => esc_url_raw( str_replace( 999999999, '%#%', get_pagenum_link( 999999999, false ) ) ),
	'current' => max( 1, get_query_var( 'paged' ) ),
];
$default = wp_parse_args( $args, $default );
$args    = apply_filters(
	'wpe/pagination/args',
	wp_parse_args(
		[
			'show_all'  => false,
			'add_args'  => false,
			'mid_size'  => 4,
			'end_size'  => 3,
			'next_text' => esc_html__( 'Next', 'TEXT_DOMAIN' ),
			'prev_text' => esc_html__( 'Previous', 'TEXT_DOMAIN' ),
			'type'      => 'list',
		],
		$default
	)
);
?>
<nav class="wpe-padination">
	<?php
	echo paginate_links( $args );
	?>
</nav>
