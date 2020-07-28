<?php
/**
 * Control - Section.
 *
 * @package ThinkUpThemes
 */

if( class_exists( 'WP_Customize_Control' ) ) {
	class thinkup_customizer_customcontrol_section extends WP_Customize_Control {
 
 		// Declare the control type.
		public $type = 'section';

		// Enqueue scripts and styles for the custom control.
		public function enqueue() {
			wp_enqueue_style( 'thinkup-control-section', trailingslashit( get_template_directory_uri() ) . 'admin/main/inc/controls/section/control_section.css', '', time() );
		}

		// Render the control to be displayed in the Customizer.
		public function render_content() {
		?>
			<div class="customize-section-description">
				<span class="title customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			</div>
		<?php
		}
	}
}