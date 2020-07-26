<?php
/**
 * This file implements custom requirements for the StoreOne Companion plugin.
 * It can be used as-is in themes (drop-in).
 *
 * @package StoreOne
 */

$hide_install = get_option('storeone_hide_customizer_companion_notice', false);
if (!function_exists('storeone_extension') && !$hide_install) {
	if (class_exists('WP_Customize_Section') && !class_exists('StoreOne_Companion_Installer_Section')) {
		/**
		 * Recommend the installation of StoreOne Extension using a custom section.
		 *
		 * @see WP_Customize_Section
		 */
		class StoreOne_Companion_Installer_Section extends WP_Customize_Section {
			/**
			 * Customize section type.
			 *
			 * @access public
			 * @var string
			 */
			public $type = 'storeone_companion_installer';

			public function __construct($manager, $id, $args = array()) {
				parent::__construct($manager, $id, $args);

				add_action('customize_controls_enqueue_scripts', 'StoreOne_Companion_Installer_Section::enqueue');
			}

			/**
			 * enqueue styles and scripts
			 *
			 *
			 **/
			public static function enqueue() {
				wp_enqueue_script('plugin-install');
				wp_enqueue_script('updates');
				wp_enqueue_script('storeone-extension-install', get_template_directory_uri() . '/js/plugin-install.js', array('jquery'));
				wp_localize_script('storeone-extension-install', 'storeone_companion_install',
					array(
						'installing' => esc_html__('Installing', 'storeone'),
						'activating' => esc_html__('Activating', 'storeone'),
						'error'      => esc_html__('Error', 'storeone'),
						'ajax_url'   => esc_url_raw(admin_url('admin-ajax.php')),
					)
				);
			}
			/**
			 * Render the section.
			 *
			 * @access protected
			 */
			protected function render() {
				// Determine if the plugin is not installed, or just inactive.
				$plugins   = get_plugins();
				$installed = false;
				//print_r($plugins);
				foreach ($plugins as $plugin) {
					if ('StoreOne Extension' === $plugin['Name']) {
						$installed = true;
					}
				}
				$slug = 'storeone-extension';
				// Get the plugin-installation URL.
				$classes            = 'cannot-expand accordion-section control-section-companion control-section control-section-themes control-section-' . $this->type;
				?>
				<li id="accordion-section-<?php echo esc_attr($this->id); ?>" class="<?php echo esc_attr($classes); ?>">
					<a class="notification-dismiss" id="companion-install-dismiss" href="#companion-install-dismiss"> <i class="fa fa-times"></i> <span><?php esc_html_e('Dismiss', 'storeone'); ?></span></a>
					<?php if (!$installed): ?>
					<?php 
						$plugin_install_url = add_query_arg(
							array(
								'action' => 'install-plugin',
								'plugin' => $slug,
							),
							self_admin_url('update.php')
						);
						$plugin_install_url = wp_nonce_url($plugin_install_url, 'install-plugin_storeone-extension');
					 ?>
						<p><?php esc_html_e('StoreOne Companion plugin is required to take advantage of this theme\'s features in the customizer.', 'storeone');?></p>
						<a class="storeone-plugin-install install-now button-secondary button" data-slug="storeone-extension" href="<?php echo esc_url_raw($plugin_install_url); ?>" aria-label="<?php esc_attr_e('Install StoreOne Extension Now', 'storeone');?>" data-name="<?php esc_attr_e('StoreOne Extension', 'storeone'); ?>">
							<?php esc_html_e('Install & Activate', 'storeone');?>
						</a>
					<?php else: ?>
						<?php 
							$plugin_link_suffix = $slug . '/' . $slug . '.php';
							$plugin_activate_link = add_query_arg(
								array(
									'action'        => 'activate',
									'plugin'        => rawurlencode( $plugin_link_suffix ),
									'plugin_status' => 'all',
									'paged'         => '1',
									'_wpnonce'      => wp_create_nonce( 'activate-plugin_' . $plugin_link_suffix ),
								), self_admin_url( 'plugins.php' )
							);
						?>
						<p><?php esc_html_e('You have installed StoreOne Companion. Activate it to take advantage of this theme\'s features in the customizer.', 'storeone');?></p>
						<a class="storeone-plugin-activate activate-now button-primary button" data-slug="storeone-extension" href="<?php echo esc_url_raw($plugin_activate_link); ?>" aria-label="<?php esc_attr_e('Activate StoreOne Companion now', 'storeone');?>" data-name="<?php esc_attr_e('StoreOne Companion', 'storeone'); ?>">
							<?php esc_html_e('Activate Now', 'storeone');?>
						</a>
					<?php endif;?>
				</li>
				<?php
			}
		}
	}
	if (!function_exists('storeone_companion_installer_register')) {
		/**
		 * Registers the section, setting & control for the StoreOne Companion installer.
		 *
		 * @param object $wp_customize The main customizer object.
		 */
		function storeone_companion_installer_register($wp_customize) {
			$wp_customize->add_section(new StoreOne_Companion_Installer_Section($wp_customize, 'storeone_companion_installer', array(
				'title'      => '',
				'capability' => 'install_plugins',
				'priority'   => 0,
			)));

		}
		add_action('customize_register', 'storeone_companion_installer_register');
	}
}

function storeone_hide_customizer_companion_notice(){
	update_option('storeone_hide_customizer_companion_notice', true);
	echo true;
	wp_die();
}
add_action('wp_ajax_storeone_hide_customizer_companion_notice', 'storeone_hide_customizer_companion_notice');