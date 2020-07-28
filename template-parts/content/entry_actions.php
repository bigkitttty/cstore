<?php
/**
 * Template part for displaying a post's comment and edit links
 *
 * @package kadence
 */

namespace Kadence;

$readmore_element = kadence()->option( 'post_archive_element_readmore' );
if ( isset( $readmore_element ) && is_array( $readmore_element ) && true === $readmore_element['enabled'] ) {
	?>
	<div class="entry-actions">
		<p class="more-link-wrap">
			<a href="<?php the_permalink(); ?>" class="post-more-link">
				<?php
					echo esc_html__( 'Read More', 'kadence' );
					kadence()->print_icon( 'arrow-right-alt' );
				?>
			</a>
		</p>
	</div><!-- .entry-actions -->
	<?php
}
