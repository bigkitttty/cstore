<?php
/**
 * Template part for displaying the page header of the currently displayed page
 *
 * @package kadence
 */

namespace Kadence;

$slug = ( is_search() && ! is_post_type_archive( 'product' ) ? 'search' : get_post_type() );
?>
<header class="<?php echo esc_attr( implode( ' ', get_archive_title_classes() ) ); ?>">
	<?php
	/**
	 * Kadence Entry Header
	 *
	 * Hooked kadence_entry_header 10
	 */
	do_action( 'kadence_entry_archive_header', $slug . '_archive', 'normal' );
	?>
</header><!-- .entry-header -->
