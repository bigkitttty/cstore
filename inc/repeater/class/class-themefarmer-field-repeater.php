<?php
// Exit if accessed directly
if (!defined('ABSPATH')) {
	exit;
}

if (!class_exists('WP_Customize_Control')) {
	return;
}

if (!class_exists('ThemeFarmer_Field_Repeater')) {
class ThemeFarmer_Field_Repeater extends WP_Customize_Control {

	public $type            = 'themefarmer-repeater';
	public $fields          = array();
	public $max_fields      = 999;
	public $default         = array();
	public $row_label       = '';
	public $responsive 	= false;
	private $icon_container = '';

	public $divider = false;
	public $divider_before = false;
	public $divider_after = false;

	/**
	 * Class constructor
	 */
	public function __construct($manager, $id, $args = array()) {
		parent::__construct($manager, $id, $args);

		$this->icon_container = '';//trailingslashit(THEMEFARMER_FIELDS_DIR) . 'repeater/inc/icons.php';		
	}

	public function enqueue() {
		wp_enqueue_style('font-awesome', get_template_directory_uri() . '/inc/repeater/css/font-awesome.min.css');
		wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_style('themefarmer-iconpicker', get_template_directory_uri() . '/inc/repeater/css/themefarmer-iconpicker.css');
		wp_enqueue_style('themefarmer-repeater', get_template_directory_uri() . '/inc/repeater/css/themefarmer-repeater.css');

		wp_enqueue_script('themefarmer-iconpicker', get_template_directory_uri() . '/inc/repeater/js/themefarmer-iconpicker.js', array('jquery'), '2.1.4', true);
		wp_enqueue_script('themefarmer-field-repeater', get_template_directory_uri() . '/inc/repeater/js/themefarmer-field-repeater.js', array('jquery', 'jquery-ui-sortable', 'jquery-ui-draggable', 'wp-color-picker'), '2.1.4', true);
	}


	public function render_content() {
		if (empty($this->fields)) {
			return;
		}

		$fields  = $this->fields;
		$default = $this->default;
		$values  = $this->value();
		$fields  = $this->fields;
		if (empty($values)) {
			$values = $default;
		}

		?>
		<?php if($this->divider || $this->divider_before):  ?>
		<div class="themefarmer-divider"><hr></div>
		<?php endif; ?>
		<?php if (!empty($this->label)): ?>
			<span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
		<?php endif;?>

		<?php if (!empty($this->description)): ?>
			<span class="description customize-control-description"><?php echo $this->description; ?></span>
		<?php endif;?>
		<input class="themefarmer-repeater-data" id="themefarmer-shortable-data-<?php echo esc_attr($this->id); ?>" type="hidden"  value <?php $this->link();?>>
		<ul class="themefarmer-repeater-copy" style="display: none !important;">
			<li class="themefarmer-repeater-item-copy">
				<div class="themefarmer-repeater-contaier">
					<div class="repeater-head">
						<i class="dashicons dashicons-menu"></i>
						<label class="repeater-label"><span class="lable"><?php echo esc_html($this->row_label); ?></span> <span class="index"></span> </label>
						<i class="dashicons dashicons-arrow-right"></i>
					</div>
					<div class="repeater-body">
						<?php foreach ($fields as $key => $field): ?>
						<div class="repeater-element">
							<?php if (isset($field['label'])): ?>
							<label><?php echo esc_html($field['label']); ?></label>
							<?php endif;?>
							<?php $this->get_field($field, $key);?>
							<?php if(isset($field['description'])): ?>
								<span class="description"><?php echo esc_html($field['description']); ?></span>
							<?php endif; ?>
						</div>
						<?php endforeach;?>
						<button type="button" class="tf-remove-button themefarmer-repeater-remove-item"><?php esc_html_e('Remove Field', 'storeone');?></button>
					</div>
				</div>
			</li>
		</ul>
		<ul class="themefarmer-repeater">
			<?php $i = 1;?>			
			<?php if ($values): foreach ($values as $key => $value): ?>
					<li class="themefarmer-repeater-item">
						<div class="themefarmer-repeater-contaier">
							<div class="repeater-head">
								<i class="dashicons dashicons-menu"></i>
								<label class="repeater-label"><span class="lable"><?php echo esc_html($this->row_label); ?></span> <span class="index"><?php echo esc_html($i); ?></span> </label>
								<i class="dashicons dashicons-arrow-right"></i>
							</div>
							<div class="repeater-body">
								<?php foreach ($fields as $key => $field): ?>
								<div class="repeater-element">
									<?php if (isset($field['label'])): ?>
									<label><?php echo esc_html($field['label']); ?></label>
									<?php endif;?>
									<?php
										$field_value = isset($value[$key]) ? $value[$key] : '';
										$this->get_field($field, $key, $field_value);
									?>
									<?php if(isset($field['description'])): ?>
										<span class="description"><?php echo esc_html($field['description']); ?></span>
									<?php endif; ?>
								</div>
								<?php endforeach;?>
								<button type="button" class="tf-remove-button themefarmer-repeater-remove-item"><?php esc_html_e('Remove Field', 'storeone');?></button>
							</div>
						</div>
					</li>
			<?php $i++;endforeach;endif;?>
		</ul>
		<button type="button" class="button button-secondary themefarmer-repeater-add-new"><i class="fa fa-plus"></i> <?php printf("%s %s", esc_html_e("Add New", 'storeone'), $this->row_label);?></button>
		<?php if($this->divider || $this->divider_after):  ?>
		<div class="themefarmer-divider"><hr></div>
		<?php endif; ?>
		<?php

	}

	// return html
	private function get_field($field = array(), $key = '', $value = '') {
		if (empty($field)) {
			return;
		}
		$type = '';

		if (isset($field['type'])) {
			$type = $field['type'];
		}
		if (empty($value) && isset($field['default'])) {
			$value = $field['default'];
		}

		switch ($type) {
		case 'text':
			?> <input type="text" class="widefat themefarmer-repeater-field" data-tf-index="<?php echo esc_attr($key); ?>" value="<?php echo esc_attr($value); ?>"> <?php
			break;
		
		case 'color':
			?> <input type="text" class="widefat themefarmer-repeater-field tf-color-field" data-tf-index="<?php echo esc_attr($key); ?>" value="<?php echo esc_attr($value); ?>"> <?php
			break;
			
		case 'textarea':
			?><textarea class="widefat themefarmer-repeater-field" data-tf-index="<?php echo esc_attr($key); ?>"><?php echo wp_kses_post($value); ?></textarea><?php
			break;

		case 'select':
			?>
			<?php if(!empty($field['choices'])): ?>
			<select class="widefat themefarmer-repeater-field" data-tf-index="<?php echo esc_attr($key); ?>">
				<?php foreach ($field['choices'] as $key => $choice): ?>
					<option value="<?php echo esc_attr($key); ?>" <?php selected($key, $value) ?>><?php echo esc_html($choice); ?></option>
				<?php endforeach; ?>
			</select>
			<?php endif;  
			break;

		case 'image':
			if($this->responsive):
				$single = '';
				if(is_array($value)){
					$imgValue = $value;
				}else{
					$single = $value;
					$imgValue = array();
					if(!isset($value['desktop'])){
						$imgValue['desktop'] = $value;
					}
					if(!isset($value['tablet'])){
						$imgValue['tablet'] = $value;
					}
					if(!isset($value['mobile'])){
						$imgValue['mobile'] = $value;
					}
				}

			?>
			<span class="themefarmer-device-controls responsive-image-select">
				<button type="button" class="preview-desktop active" data-device="desktop" title="<?php esc_attr_e('Click to set image for desktop devices', 'storeone'); ?>">
					<i class="dashicons dashicons-desktop"></i>
				</button>
				<button type="button" class="preview-tablet" data-device="tablet" title="<?php esc_attr_e('Click to set image for tablet devices', 'storeone'); ?>">
					<i class="dashicons dashicons-tablet"></i>
				</button>
				<button type="button" class="preview-mobile" data-device="mobile" title="<?php esc_attr_e('Click to set image for mobile devices', 'storeone'); ?>">
					<i class="dashicons dashicons-smartphone"></i>
				</button>
			</span>
			<div class="themefarmer-responsive-slide-images-container">
				<div class="themefarmer-responsive-slide-images-control slide-image-desktop active">
					<input type="text" class="widefat image-select-field themefarmer-repeater-image-field" data-tf-index="<?php echo esc_attr($key); ?>" data-sub-index="desktop" value="<?php echo isset($imgValue['desktop'])?esc_url($imgValue['desktop']):''; ?>">
					<input type="hidden" class="widefat image-select-field themefarmer-repeater-field" data-tf-index="<?php echo esc_attr($key); ?>_single" value="<?php echo esc_url($single); ?>">
					<button type="button" class="button button-secondary cimage-select-button"><i class="fa fa-image"></i> <?php esc_html_e('Select Image', 'storeone')?></button>
				</div>
				<div class="themefarmer-responsive-slide-images-control slide-image-tablet">
					<input type="text" class="widefat image-select-field themefarmer-repeater-image-field" data-tf-index="<?php echo esc_attr($key); ?>" data-sub-index="tablet" value="<?php echo isset($imgValue['tablet'])?esc_url($imgValue['tablet']):''; ?>">
					<button type="button" class="button button-secondary cimage-select-button"><i class="fa fa-image"></i> <?php esc_html_e('Select Image', 'storeone')?></button>
				</div>
				<div class="themefarmer-responsive-slide-images-control slide-image-mobile">
					<input type="text" class="widefat image-select-field themefarmer-repeater-image-field" data-tf-index="<?php echo esc_attr($key); ?>" data-sub-index="mobile" value="<?php echo isset($imgValue['mobile'])?esc_url($imgValue['mobile']):''; ?>">
					<button type="button" class="button button-secondary cimage-select-button"><i class="fa fa-image"></i> <?php esc_html_e('Select Image', 'storeone')?></button>
				</div>
			</div>
			<?php else: ?>
				<input type="text" class="widefat image-select-field themefarmer-repeater-field" data-tf-index="<?php echo esc_attr($key); ?>" value="<?php echo esc_url($value); ?>">
				<button type="button" class="button button-secondary cimage-select-button"><i class="fa fa-image"></i> <?php esc_html_e('Select Image', 'storeone')?></button>
			<?php endif; ?>
				<?php
			break;

		case 'icon':
			?>
				<div class="icon-field-group">
					<span class="tf-rep-icon">
						<span class="icon-show"><i class="fa <?php echo esc_attr($value); ?>"></i></span>
						<input type="text" class="widefat icon-select-field themefarmer-repeater-field" data-tf-index="<?php echo esc_attr($key); ?>" value="<?php echo esc_attr($value); ?>">
					</span>
					<?php
						if (file_exists($this->icon_container)) {
							include $this->icon_container;
						}
					?>
				</div>
				<?php
					break;

		case 'dropdown-pages':

			$pages = get_pages(array('hide_empty' => false));
			if (!empty($pages)): ?>
	              	<select class="widefat themefarmer-repeater-field" data-tf-index="<?php echo esc_attr($key); ?>">
		                <option value="0"><?php esc_html_e('Select Page', 'storeone');?></option>
		              	<?php
							foreach ($pages as $page):
								printf('<option value="%s" %s>%s</option>',
									$page->ID,
									selected($value, $page->ID, false),
									$page->post_title
								);
							endforeach;
						?>
	              	</select>
	            <?php endif;
			break;

		case 'repeater':
			?>
				<div class="themefarmer-repeater-repeater-copy" style="display: none !important;" data-tf-index="<?php echo esc_attr($key); ?>">
					<div class="themefarmer-repeater-repeater-group-copy">
						<?php
							if(isset( $field['fields']) && !empty($field['fields'])):
						 		foreach ($field['fields'] as $rkey => $rfield):
						 			$this->get_repeater_field($rfield, $rkey);
						 		endforeach;
						 	endif; 
						?>
						<button type="button" class="tf-remove-button themefarmer-repeater-remove-repeater"><?php esc_html_e('Remove Icon', 'storeone');?></button>
					</div>
				</div>
				<div class="themefarmer-repeater-repeater" data-tf-index="<?php echo esc_attr($key); ?>">
					<?php if (!empty($value)): foreach ($value as $ikey => $item): ?>
						<div class="themefarmer-repeater-repeater-group"> 
						<?php
							if(isset( $field['fields']) && !empty($field['fields'])):
						 		foreach ($field['fields'] as $rkey => $rfield):
						 			$this->get_repeater_field($rfield, $rkey, $item[$rkey]);
						 		endforeach;
						 	endif;  	 
						?>
						<button type="button" class="tf-remove-button themefarmer-repeater-remove-repeater"><?php esc_html_e('Remove', 'storeone');?></button>
						</div>
					<?php endforeach;endif;?>
					<?php $button_label = (isset($field['button_label'])) ? $field['button_label'] : __('Add Item', 'storeone');?>
					<button type="button" class="button button-secondary themefarmer-repeater-add-repeater"><i class="fa fa-plus"></i>  <?php echo esc_html($button_label); ?></button>
				</div>
				<?php
				break;

		default:
			?> <input type="text" class="widefat themefarmer-repeater-field" data-tf-index="<?php echo esc_attr($key); ?>" value="<?php echo esc_attr($value); ?>"> <?php
		break;
		}
	}

	private function get_repeater_field($field = array(), $key = '', $value = '') {

		/*if (empty($field)) {
			return;
		}*/
		$type = 'social';

		if (isset($field['type'])) {
			$type = $field['type'];
		}
		if (empty($value) && isset($field['default']) && $type !== 'repeater') {
			$value = $field['default'];
		}
		switch ($type) {
			case 'text':
				?>
				 
					<div class="themefarmer-repeater-repeater-element">
						<input type="text" class="widefat themefarmer-repeater-repeater-field" data-tf-index="<?php echo esc_attr($key); ?>" value="<?php echo esc_attr($value); ?>"> 
					</div>
					
				
				<?php
				break;

			case 'textarea':
				?>
				
					<div class="themefarmer-repeater-repeater-element">
						<textarea class="widefat themefarmer-repeater-repeater-field" data-tf-index="<?php echo esc_attr($key); ?>"><?php echo wp_kses_post($value); ?></textarea>
					</div>
					
				
				<?php
				break;

			case 'image':
				?>
				
					<div class="themefarmer-repeater-repeater-element">
						<input type="text" class="widefat image-select-field themefarmer-repeater-repeater-field" data-tf-index="<?php echo esc_attr($key); ?>" value="<?php echo esc_url($value); ?>">
						<button type="button" class="button button-secondary cimage-select-button"><?php esc_html_e('Select Image', 'storeone')?></button>
					</div>
					
				
				<?php
			break;
			case 'icon':
				?>
				<div class="themefarmer-repeater-repeater-element">
					<div class="icon-field-group">
						<span>
							<span class="icon-show"><i class="fa <?php echo esc_attr($value); ?>"></i></span>
							<input type="text" class="widefat icon-select-field themefarmer-repeater-repeater-field" data-tf-index="<?php echo esc_attr($key); ?>" value="<?php echo esc_attr($value); ?>">
						</span>
						<?php
							if (file_exists($this->icon_container)) {
								include $this->icon_container;
							}
						?>
					</div>
				</div>
				<?php
				break;
			case 'social':
			default:
				?>
				
					<div class="themefarmer-repeater-repeater-element">
						<div class="icon-field-group">
							<span>
								<span class="icon-show"><i class="fa <?php echo esc_attr($item['icon']); ?>"></i></span>
								<input type="text" class="widefat icon-select-field themefarmer-repeater-repeater-field" data-tf-index="icon" value="<?php echo esc_attr(isset($value['icon'])?$value['icon']:''); ?>">
							</span>
							<?php
								if (file_exists($this->icon_container)) {
									include $this->icon_container;
								}
							?>
						</div>
					</div>
					<div class="themefarmer-repeater-repeater-element">
						<input type="text" class="widefat themefarmer-repeater-repeater-field" data-tf-index="link" value="<?php echo esc_attr(isset($value['link'])?$value['link']:''); ?>">
					</div>
				
				<?php
			break;
		}	
	}
}
}