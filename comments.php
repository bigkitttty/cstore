<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package kadence
 */

namespace Kadence;

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>
<div id="comments" class="comments-area">
	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) {
		?>
		<h2 class="comments-title">
			<?php
			$comment_count = (int) get_comments_number();
			if ( 1 === $comment_count ) {
				echo esc_html__( 'One Comment', 'kadence' );
			} else {
				printf(
					/* translators: 1: comment count number */
					esc_html( _nx( '%1$s Comment', '%1$s Comments', $comment_count, 'comments title', 'kadence' ) ),
					// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					number_format_i18n( $comment_count )
				);
			}
			?>
		</h2><!-- .comments-title -->

		<?php the_comments_navigation(); ?>

		<?php kadence()->the_comments(); ?>

		<?php
		if ( ! comments_open() ) {
			?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'kadence' ); ?></p>
			<?php
		}
	}

	comment_form();
	?>
</div><!-- #comments -->
