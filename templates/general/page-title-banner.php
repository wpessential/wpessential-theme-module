<?php
if ( ! \defined( 'ABSPATH' ) )
{
	exit; // Exit if accessed directly.
}
global $wpe_page_title_banner;
if ( ! wpe_array_get( $wpe_page_title_banner, 'wpe_show_banner' ) ) return;
$banner_image = '';
if ( wpe_array_get( $wpe_page_title_banner, 'wpe_show_banner_image' ) )
{
	$image = wpe_array_get( $wpe_page_title_banner, 'wpe_banner_image' );
	if ( $image )
	{
		$banner_image = ( false !== filter_var( $image, FILTER_VALIDATE_URL ) ) ? $image : wp_get_attachment_image_url( $image, 'full' );
		$banner_image = "background-image:url('{$banner_image}')";
	}
}
do_action( 'wpe_page_banner_before' );
?>
	<section>
		<div class="wpe-banner-wrapper wpe-bg-repeat wpe-bg-size wpe-bg-position-bottom wpe-pad-t-px-100 wpe-pad-b-px-120" style="<?php echo esc_attr( $banner_image ); ?>">
			<div class="wpe-container wpe-width-prcnt-100 wpe-pad-r-px-15 wpe-pad-l-px-15 wpe-mrg-l-auto wpe-mrg-r-auto">
				<div class="wpe-inner-banner wpe-pad-t-px-120 wpe-position-rel">
					<div class="wpe-banner-info wpe-mw-prcnt-79 wpe-mrg-r-auto wpe-mrg-l-auto wpe-txt-align-cntr">
						<?php
						if ( wpe_array_get( $wpe_page_title_banner, 'wpe_show_banner_title' ) ) :
							do_action( 'wpe_page_banner_title_before' );
							?>
							<div class="wpe-title-wrapper wpe-mrg-b-px-10">
								<h1 class="wpe-fs-px-50 wpe-fw-bold">
									<?php
									if ( 'custom' === wpe_array_get( $wpe_page_title_banner, 'wpe_banner_title_type' ) )
									{
										echo esc_html( wpe_array_get( $wpe_page_title_banner, 'wpe_banner_title' ) );
									}
									else
									{
										echo wpe_get_page_title( wpe_array_get( $wpe_page_title_banner, 'wpe_banner_title_context' ) );
									}
									?>
								</h1>
							</div>
							<?php
							do_action( 'wpe_page_banner_title_after' );
						endif;
						if ( wpe_array_get( $wpe_page_title_banner, 'wpe_show_banner_desc' ) ) :
							do_action( 'wpe_page_banner_description_before' );
							?>
							<div class="wpe-content-wrapper">
								<p class="wpe-fs-px-24 wpe-fw-regular"><?php echo esc_html( wpe_array_get( $wpe_page_title_banner, 'wpe_banner_desc' ) ); ?></p>
							</div>
							<?php
							do_action( 'wpe_page_banner_description_after' );
						endif;
						?>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php
do_action( 'wpe_page_banner_after' );
