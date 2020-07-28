<?php
/**
 * Template part for displaying a post or page.
 *
 * @package kadence
 */

namespace Kadence;

?>
<?php
if ( kadence()->show_feature_above() ) {
	get_template_part( 'template-parts/content/entry_thumbnail', get_post_type() );
}
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry content-bg single-entry' ); ?>>
	<div class="entry-content-wrap">
		<?php
		if ( kadence()->show_in_content_title() ) {
			get_template_part( 'template-parts/content/entry_header', get_post_type() );
		}
		if ( kadence()->show_feature_below() ) {
			get_template_part( 'template-parts/content/entry_thumbnail', get_post_type() );
		}

		get_template_part( 'template-parts/content/entry_content', get_post_type() );
		if ( 'post' === get_post_type() && kadence()->option( 'post_tags' ) ) {
			get_template_part( 'template-parts/content/entry_footer', get_post_type() );
		}
		?>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->

<?php
if ( is_singular( get_post_type() ) ) {
	if ( 'post' === get_post_type() && kadence()->option( 'post_author_box' ) ) {
		get_template_part( 'template-parts/content/entry_author', get_post_type() );
	}
	// Show post navigation only when the post type is 'post' or has an archive.
	if ( ( 'post' === get_post_type() || get_post_type_object( get_post_type() )->has_archive ) && kadence()->show_post_navigation() ) {
		the_post_navigation(
			array(
				'prev_text' => '<div class="post-navigation-sub"><small>' . kadence()->get_icon( 'arrow-left-alt' ) . esc_html__( 'Previous', 'kadence' ) . '</small></div>%title',
				'next_text' => '<div class="post-navigation-sub"><small>' . esc_html__( 'Next', 'kadence' ) . kadence()->get_icon( 'arrow-right-alt' ) . '</small></div>%title',
			)
		);
	}
	if ( 'post' === get_post_type() && kadence()->option( 'post_related' ) ) {
		get_template_part( 'template-parts/content/entry_related', get_post_type() );
	}
	// Show comments only when the post type supports it and when comments are open or at least one comment exists.
	if ( kadence()->show_comments() ) {
		kadence()->print_styles( 'kadence-comments' );
		comments_template();
	}
}
