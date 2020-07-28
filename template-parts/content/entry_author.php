<?php
/**
 * Template part for displaying a post's footer
 *
 * @package kadence
 */

namespace Kadence;

use function Kadence\kadence;
use function get_the_author;
use function get_avatar;
use function get_the_author_meta;
use function the_author_meta;
use function get_the_author_posts_link;

kadence()->print_styles( 'kadence-author-box' );

?>
<div class="entry-author entry-author-style-<?php echo esc_attr( kadence()->option( 'post_author_box_style' ) ); ?>">
	<div class="entry-author-profile author-profile vcard">
		<div class="entry-author-avatar">
			<?php echo get_avatar( get_the_author_meta( 'ID' ), 80 ); ?>
		</div>
		<b class="entry-author-name author-name fn"><?php echo ( kadence()->option( 'post_author_box_link' ) ? get_the_author_posts_link() : get_the_author() ); ?></b>
		<?php if ( get_the_author_meta( 'occupation' ) ) { ?>
			<p class="entry-author-occupation author-occupation"><?php the_author_meta( 'occupation' ); ?></p>
		<?php } ?>
		<div class="entry-author-description author-bio">
			<?php the_author_meta( 'description' ); ?>
		</div>
		<div class="entry-author-follow author-follow">
			<?php
			foreach ( array( 'facebook', 'twitter', 'instagram', 'youtube', 'flickr', 'vimeo', 'linkedin', 'pinterest', 'dribbble' ) as $social ) {
				if ( get_the_author_meta( $social ) ) {
					?>
					<a href="<?php echo esc_url( get_the_author_meta( $social ) ); ?>" class="<?php echo esc_attr( $social ); ?>-link social-button" target="_blank" rel="noopener" title="<?php /* translators: 1: Author Name, 2: Social Media Name */ echo sprintf( esc_attr__( 'Follow %1$s on %2$s', 'kadence' ), esc_attr( get_the_author_meta( 'display_name' ) ), esc_attr( ucfirst( $social ) ) ); ?>">
						<?php kadence()->print_icon( $social, '', false ); ?>
					</a>
					<?php
				}
			}
			?>
		</div><!--.author-follow-->
	</div>
</div><!-- .entry-author -->
