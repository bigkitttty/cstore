<?php
/**
 * The main single item template file.
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
			do_action( 'kadence_before_main_content' );
			?>
			<div class="content-wrap">
				<?php
				if ( is_404() ) {
					get_template_part( 'template-parts/content/error', '404' );
				} elseif ( have_posts() ) {
					while ( have_posts() ) {
						the_post();

						get_template_part( 'template-parts/content/single-entry', get_post_type() );
					}
				} else {
					get_template_part( 'template-parts/content/error' );
				}
				?>
			</div>
			<?php
			/**
			 * Hook for anything after main content
			 */
			do_action( 'kadence_after_main_content' );
			?>
		</main><!-- #main -->
		<?php
		get_sidebar();
		?>
	</div>
</div><!-- #primary -->
