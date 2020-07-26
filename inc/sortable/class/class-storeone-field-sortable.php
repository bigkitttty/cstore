<?php
// Exit if accessed directly
if (!defined('ABSPATH')) {
	exit;
}

if (class_exists('WP_Customize_Control') && !class_exists('StoreOne_Field_Sortable')) {

	class StoreOne_Field_Sortable extends WP_Customize_Control {

		public $type    = 'storeone-sortable';
		

		/**
		 * Class constructor
		 */
		public function __construct($manager, $id, $args = array()) {
			parent::__construct($manager, $id, $args);
		}

		public function enqueue() {
			wp_enqueue_style('storeone-sortable', get_template_directory_uri() . '/inc/sortable/css/themefarmer-sortable.css');
			wp_enqueue_script('storeone-field-sortable', get_template_directory_uri() . '/inc/sortable/js/themefarmer-field-sortable.js', array('jquery', 'jquery-ui-sortable', 'jquery-ui-draggable'), null, true);
		}
		

		public function render_content() {
			if (empty($this->choices)) {
				return;
			}
			$values  = $this->value();
			$choices = $this->choices;
			$choices_count = count($choices);
			$hiddens = $choices;
			foreach ($values as $key => $value) {
				if(isset($hiddens[$value])){
					unset($hiddens[$value]);
				}
			}
			$hiddens  = array_keys($hiddens);
			?>

			<?php if (!empty($this->label)): ?>
				<span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
			<?php endif;?>

			<?php if (!empty($this->description)): ?>
				<span class="description customize-control-description"><?php echo $this->description; ?></span>
			<?php endif;?>

			<ul class="sortable ui-sortable themefarmer-sortable">
				<?php $this->print_sortable_list($values, true); ?>
				<?php $this->print_sortable_list($hiddens); ?>
			</ul>
			<input class="themefarmer-sortable-data" id="themefarmer-shortable-data-<?php echo esc_attr($this->id); ?>" type="hidden"  value="" <?php $this->link();?>>
			<?php

		}

		private function print_sortable_list($values=array(), $show = false){
			if($values){
				foreach ($values as $key => $value) {
					if(isset($this->choices[$value])){
					?>
					<li class="themefarmer-sortable-item ui-sortable-handle <?php echo ($show) ? '' : 'invisible'; ?>" data-value="<?php echo esc_attr($value); ?>">
						<i class="dashicons dashicons-menu"></i>
						<i class="dashicons dashicons-visibility visibility"></i>
						<span><?php echo esc_html($this->choices[$value]); ?></span>
					</li>
					<?php
					}
				}
			}
		}
	}
}