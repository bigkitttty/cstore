<?php
/**
 * Template part for displaying a post's featured image
 *
 * @package kadence
 */

namespace Kadence;

if ( post_password_required() || ! post_type_supports( get_post_type(), 'thumbnail' ) || ! has_post_thumbnail() ) {
	return;
}
$slug            = ( is_search() ? 'search' : 'post' );
$feature_element = kadence()->option( $slug . '_archive_element_feature' );
if ( isset( $feature_element ) && is_array( $feature_element ) && true === $feature_element['enabled'] ) {
	$ratio = ( isset( $feature_element['ratio'] ) && ! empty( $feature_element['ratio'] ) ? $feature_element['ratio'] : '2-3' );
	$size  = ( isset( $feature_element['size'] ) && ! empty( $feature_element['size'] ) ? $feature_element['size'] : 'medium_large' );
	?>
	<a class="post-thumbnail  kadence-thumbnail-ratio-<?php echo esc_attr( $ratio ); ?>" href="<?php the_permalink(); ?>" aria-hidden="true">
		<div class="post-thumbnail-inner">
			<?php
			the_post_thumbnail(
				$size,
				array(
					'alt' => the_title_attribute(
						array(
							'echo' => false,
						)
					),
				)
			);
			?>
		</div>
	</a><!-- .post-thumbnail -->
	<?php
}
