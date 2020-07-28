<?php
/**
 * Control - Switch.
 *
 * @package ThinkUpThemes
 */

if( class_exists( 'WP_Customize_Control' ) ) {
	class thinkup_customizer_customcontrol_switch extends WP_Customize_Control {

		// Declare the control type.
		public $type = 'switch';

		// Enqueue scripts and styles for the custom control.
		public function enqueue() {

			// Load style and scripts for deafault switch control.
			wp_enqueue_script( 'thinkup-control-switch', trailingslashit( get_template_directory_uri() ) . 'admin/main/inc/controls/switch/control_switch.js', array( 'jquery' ) );

			wp_enqueue_style( 'thinkup-control-switch', trailingslashit( get_template_directory_uri() ) . 'admin/main/inc/controls/switch/control_switch.css', '', time() );

			// Load style and scripts for slider switch control.
			wp_enqueue_script( 'thinkup-control-switch-slider', trailingslashit( get_template_directory_uri() ) . 'admin/main/inc/controls/switch/control_switch_slider.js', array( 'jquery' ) );

			wp_enqueue_style( 'thinkup-control-switch-slider', trailingslashit( get_template_directory_uri() ) . 'admin/main/inc/controls/switch/control_switch_slider.css', '', time() );

		}

		// Render the control to be displayed in the Customizer.
		public function render_content() {

			if ( empty( $this->choices ) ) {
				return;
			}

			$choices        = NULL;
			$count          = NULL;
			$class_button   = NULL;
			$class_selected = NULL;
			?>

			<?php if ( !empty( $this->label ) ) : ?>
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<?php endif; ?>

			<?php if ( !empty( $this->description ) ) : ?>
				<span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
			<?php endif; ?>

			<div class="switch-option">

			<?php
				$choices = $this->choices;
			?>

				<?php foreach ( $choices as $value => $label ) : ?>						

						<?php if ( empty( $count ) ) { $class_button = 'cb-enable'; } else { $class_button = 'cb-disable'; } ?>

						<?php if ( $this->value() == esc_attr( $value ) ) { $class_selected = ' selected'; } else { $class_selected = NULL; } ?>
						<?php if ( ! $this->value() and $class_button == 'cb-disable' ) { $class_selected = ' selected'; } ?>

						<label class="<?php echo esc_attr( $class_button ) . esc_attr( $class_selected ); ?>" value="<?php echo esc_attr( $value ); ?>">
							<span><?php echo esc_html( $label ); ?></span>
						</label>

						<?php $count++; ?>

				<?php endforeach; ?>
			</div>

			<input type="hidden" <?php esc_attr( $this->link() ); ?> value="<?php echo esc_attr( $this->value() ); ?>" />
		<?php }
	}
}