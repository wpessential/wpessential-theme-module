<?php
if ( ! \defined( 'ABSPATH' ) )
{
	exit; // Exit if accessed directly.
}
?>
<div class="<?php echo apply_filters( 'wpe_logo_classes', 'wpe-logo ' ); ?>">
	<h1>
		<?php
		if ( has_custom_logo() )
		{
			the_custom_logo();
		}
		else
		{
			$blog_info = get_bloginfo( 'name' );
			if ( ! empty( $blog_info ) )
			{
				?>
				<a class="wpe-a" href="<?php echo esc_url( home_url( '/' ) ); ?>">
					<?php
					bloginfo( 'name' );
					?>
				</a>
				<?php
			}
		}
		?>
	</h1>
	<?php
	if ( ! has_custom_logo() )
	{
		$description = get_bloginfo( 'description', 'display' );
		if ( $description ) :
			?>
			<p class="site-description">
				<?php echo wp_kses( $description, wpe_allowed_html() ); ?>
			</p>
		<?php
		endif;
	}
	?>
</div>
