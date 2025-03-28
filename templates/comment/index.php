<?php
if ( ! \defined( 'ABSPATH' ) )
{
	exit; // Exit if accessed directly.
}

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */

if ( post_password_required() )
{
	return;
}

do_action( 'wpe_before_comment_section' );
?>
	<div id="comments" class="wpe-comments-area <?php echo apply_filters( 'wpe/comment/area/classes', 'comments-area' ); ?>">
	<?php
	if ( have_comments() )
	{
		do_action( 'wpe_comment_title' );
		do_action( 'wpe_comment_list' );
	}
	do_action( 'wpe_comments_close' );
	do_action( 'wpe_comment_form' );
	?>
</div>
<?php
do_action( 'wpe_after_comment_section' );
