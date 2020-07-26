<?php
// Exit if accessed directly
if (!defined('ABSPATH')) {
	exit;
}

if (!class_exists('WP_Customize_Control')) {
	return;
}

if (!class_exists('ThemeFarmer_Field_Icon')) {
class ThemeFarmer_Field_Icon extends WP_Customize_Control {

	public $type            = 'themefarmer-icon';
	private $icon_container = '';
	public $divider = false;
	public $divider_before = false;
	public $divider_after = false;
	/**
	 * Class constructor
	 */
	public function __construct($manager, $id, $args = array()) {
		parent::__construct($manager, $id, $args);

		$this->icon_container = trailingslashit(THEMEFARMER_FIELDS_DIR) . 'icon/inc/icons.php';		
	}

	public function enqueue() {
		wp_enqueue_style('font-awesome', THEMEFARMER_FIELDS_URI . 'icon/css/font-awesome.min.css');
		wp_enqueue_style('themefarmer-iconpicker', THEMEFARMER_FIELDS_URI . 'icon/css/themefarmer-iconpicker.css');
		wp_enqueue_style('themefarmer-icon', THEMEFARMER_FIELDS_URI . 'icon/css/themefarmer-icon.css');

		// wp_enqueue_script('themefarmer-field-icon', THEMEFARMER_FIELDS_URI . 'icon/js/themefarmer-field-icon.js', array('jquery', 'jquery-ui-sortable', 'jquery-ui-draggable', 'wp-color-picker'), null, true);
		wp_enqueue_script('themefarmer-iconpicker', THEMEFARMER_FIELDS_URI . 'icon/js/themefarmer-iconpicker.js', array('jquery'), '2.1.4', true);
	}


	public function render_content() {
		$value  = $this->value();
		?>
		<?php if($this->divider || $this->divider_before):  ?>
		<div class="themefarmer-divider"><hr></div>
		<?php endif; ?>
		<div class="themefarmer-field-icon">
			<?php if (!empty($this->label)): ?>
				<span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
			<?php endif;?>

			<?php if (!empty($this->description)): ?>
				<span class="description customize-control-description"><?php echo $this->description; ?></span>
			<?php endif;?>

			<div class="icon-field-group">
				<span class="tf-rep-icon">
					<span class="icon-show"><i class="fa <?php echo esc_attr($value); ?>"></i></span>
					<input type="text" class="widefat icon-select-field themefarmer-icon-field" id="<?php echo esc_attr($this->id); ?>" <?php $this->link(); ?>>
				</span>
				<?php
					if (file_exists($this->icon_container)) {
						include $this->icon_container;
					}
				?>
			</div>
		</div>
		<?php if($this->divider || $this->divider_after):  ?>
		<div class="themefarmer-divider"><hr></div>
		<?php endif; ?>
		<?php

	}
}
}