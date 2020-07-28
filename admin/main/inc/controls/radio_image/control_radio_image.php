<?php
/**
 * Control - Radio Images.
 *
 * @package ThinkUpThemes
 */

if( class_exists( 'WP_Customize_Control' ) ) {
	class thinkup_customizer_customcontrol_radio_image extends WP_Customize_Control {
		
		// Declare the control type.
		public $type = 'radio-image';

		// Enqueue scripts and styles for the custom control.
		public function enqueue() {
			wp_enqueue_style( 'thinkup-radio-image', trailingslashit( get_template_directory_uri() ) . 'admin/main/inc/controls/radio_image/control_radio_image.css', '', time() );
		}
		
		// Render the control to be displayed in the Customizer.
		public function render_content() {
			if ( empty( $this->choices ) ) {
				return;
			}			
			
			$name = '_customize-radio-' . $this->id;
			?>
			<span class="customize-control-title">
				<?php echo esc_attr( $this->label ); ?>
			</span>
			<?php if ( ! empty( $this->description ) ) : ?>
				<span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
			<?php endif; ?>

			<div id="input_<?php echo esc_attr( $this->id ); ?>" class="image">
				<?php foreach ( $this->choices as $value => $label ) : ?>
						<label for="<?php echo esc_attr( $this->id . $value ); ?>">
							<input class="image-select" type="radio" value="<?php echo esc_attr( $value ); ?>" id="<?php echo esc_attr( $this->id . $value ); ?>" name="<?php echo esc_attr( $name ); ?>" <?php esc_attr( $this->link() ); checked( $this->value(), esc_attr( $value ) ); ?>>
							<img src="<?php echo esc_url( $label ); ?>" alt="<?php echo esc_attr( $value ); ?>" title="<?php echo esc_attr( $value ); ?>">
						</label>
					</input>
				<?php endforeach; ?>
			</div>
			<?php
		}
	}
}