<?php
/**
 * The main archive template file for inner content.
 *
 * @package kadence
 */

namespace Kadence;

/**
 * Hook for Hero Section
 */
do_action( 'kadence_hero_header' );
?>
<div id="primary" class="content-area">
	<div class="content-container site-container">
		<main id="main" class="site-main" role="main">
			<?php
			/**
			 * Hook for anything before main content
			 */
			do_action( 'kadence_before_archive_content' );
			if ( kadence()->show_in_content_title() ) {
				get_template_part( 'template-parts/content/archive_header' );
			}
			if ( have_posts() ) {
				if ( is_search() ) {
					if ( '1' === kadence()->option( 'search_archive_columns' ) ) {
						$placement    = kadence()->option( 'search_archive_item_image_placement' );
						$column_class = 'grid-sm-col-1 grid-lg-col-1 item-image-style-' . $placement;
					} elseif ( '2' === kadence()->option( 'search_archive_columns' ) ) {
						$column_class = 'grid-sm-col-2 grid-lg-col-2 item-image-style-above';
					} else {
						$column_class = 'grid-sm-col-2 grid-lg-col-3 item-image-style-above';
					}
				} else if ( 'post' === get_post_type() ) {
					if ( '1' === kadence()->option( 'post_archive_columns' ) ) {
						$placement    = kadence()->option( 'post_archive_item_image_placement' );
						$column_class = 'grid-sm-col-1 grid-lg-col-1 item-image-style-' . $placement;
					} elseif ( '2' === kadence()->option( 'post_archive_columns' ) ) {
						$column_class = 'grid-sm-col-2 grid-lg-col-2 item-image-style-above';
					} else {
						$column_class = 'grid-sm-col-2 grid-lg-col-3 item-image-style-above';
					}
				} else {
					$column_class = 'grid-sm-col-2 grid-lg-col-3';
				}
				?>
				<div id="archive-container" class="<?php echo esc_attr( implode( ' ', get_archive_container_classes() ) ); ?>content-wrap post-archive grid-cols <?php echo esc_attr( $column_class ); ?>">
					<?php
					while ( have_posts() ) {
						the_post();

						get_template_part( 'template-parts/content/entry', get_post_type() );
					}
					?>
				</div>
				<?php
				get_template_part( 'template-parts/content/pagination' );
			} else {
				get_template_part( 'template-parts/content/error' );
			}
			/**
			 * Hook for anything after main content
			 */
			do_action( 'kadence_after_archive_content' );
			?>
		</main><!-- #main -->
		<?php
		get_sidebar();
		?>
	</div>
</div><!-- #primary -->
