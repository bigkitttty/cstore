<?php

function storeone_settings_control($wp_customize) {
	$wp_customize->add_panel( 'storeone_homepage', array(
		'priority'	 => 2,
		'title'		 => __( 'Frontpage Sections', 'storeone' ),
	));

/** Social **/
	$wp_customize->add_section('storeone_socials_section', array(
		'title'      => __('Social Options', 'storeone'),
		'priority'   => 10,
		
	));

	$wp_customize->add_setting('storeone_social_new_tab', array(
			'default'           => true,
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'sanitize_callback' => 'storeone_sanitize_checkbox',
	));

	$wp_customize->add_control('storeone_social_new_tab', array(
		'type'     => 'checkbox',
		'priority' => 200,
		'section'  => 'storeone_socials_section',
		'label'    => __('Open social links in new tab', 'storeone'),
	));

	$wp_customize->add_setting('storeone_social_link_facebook', array(
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'sanitize_callback' => 'storeone_sanitize_url',
	));

	$wp_customize->add_control('storeone_social_link_facebook', array(
		'type'     => 'url',
		'priority' => 200,
		'section'  => 'storeone_socials_section',
		'label'    => __('Facebook Page URL', 'storeone'),
	));

	$wp_customize->add_setting('storeone_social_link_google', array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'transport'         => 'refresh',
		'sanitize_callback' => 'storeone_sanitize_url',
	));

	$wp_customize->add_control('storeone_social_link_google', array(
		'type'     => 'url',
		'priority' => 200,
		'section'  => 'storeone_socials_section',
		'label'    => __('Google Page URL', 'storeone'),
	));

	$wp_customize->add_setting('storeone_social_link_youtube', array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'transport'         => 'refresh',
		'sanitize_callback' => 'storeone_sanitize_url',
	));

	$wp_customize->add_control('storeone_social_link_youtube', array(
		'type'     => 'url',
		'priority' => 200,
		'section'  => 'storeone_socials_section',
		'label'    => __('Youtube Page URL', 'storeone'),
	));

	$wp_customize->add_setting('storeone_social_link_twitter', array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'transport'         => 'refresh',
		'sanitize_callback' => 'storeone_sanitize_url',
	));

	$wp_customize->add_control('storeone_social_link_twitter', array(
		'type'     => 'url',
		'priority' => 200,
		'section'  => 'storeone_socials_section',
		'label'    => __('Twitter Page URL', 'storeone'),
	));

	$wp_customize->add_setting('storeone_social_link_instagram', array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'transport'         => 'refresh',
		'sanitize_callback' => 'storeone_sanitize_url',
	));

	$wp_customize->add_control('storeone_social_link_instagram', array(
		'type'     => 'url',
		'priority' => 200,
		'section'  => 'storeone_socials_section',
		'label'    => __('Instagram Page URL', 'storeone'),
	));

	$wp_customize->add_setting('storeone_social_link_linkedin', array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'transport'         => 'refresh',
		'sanitize_callback' => 'storeone_sanitize_url',
	));

	$wp_customize->add_control('storeone_social_link_linkedin', array(
		'type'     => 'url',
		'priority' => 200,
		'section'  => 'storeone_socials_section',
		'label'    => __('Linkedin Page URL', 'storeone'),
	));

/** Social **/

/* Contact */
	$wp_customize->add_section('storeone_contacts_section', array(
		'title'      => __('Contact Options', 'storeone'),
		'priority'   => 10,
		
	));

	$wp_customize->add_setting('storeone_top_email', array(
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'sanitize_callback' => 'storeone_sanitize_email',
	));

	$wp_customize->add_control('storeone_top_email', array(
		'type'     => 'email',
		'priority' => 200,
		'section'  => 'storeone_contacts_section',
		'label'    => __('Email', 'storeone'),
	));

	$wp_customize->add_setting('storeone_top_phone', array(
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
	));

	$wp_customize->add_control('storeone_top_phone', array(
		'type'     => 'text',
		'priority' => 200,
		'section'  => 'storeone_contacts_section',
		'label'    => __('Phone', 'storeone'),
	));
/* Contact */


/** Recent Products **/

	$wp_customize->add_section('storeone_home_recent_product_section', array(
		'title'      => __('Recent Products', 'storeone'),
		'priority'   => 30,
		'panel'		 => 'storeone_homepage',
		
	));

	$wp_customize->add_setting('storeone_home_recent_product_heading', array(
		'default'           => __('Latest In Product', 'storeone'),
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	));

	$wp_customize->add_control('storeone_home_recent_product_heading', array(
		'type'     => 'text',
		'priority' => 1,
		'section'  => 'storeone_home_recent_product_section',
		'label'    => __('Heading', 'storeone'),
	));

	$wp_customize->add_setting('storeone_home_recent_product_desc', array(
		'default'           => __('Description Latest Product', 'storeone'),
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	));

	$wp_customize->add_control('storeone_home_recent_product_desc', array(
		'type'     => 'text',
		'priority' => 2,
		'section'  => 'storeone_home_recent_product_section',
		'label'    => __('Description', 'storeone'),
	));

	$wp_customize->add_setting('storeone_home_recent_product_count', array(
		'default'           => 15,
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'transport'         => 'refresh',
		'sanitize_callback' => 'absint',
	));

	$wp_customize->add_control('storeone_home_recent_product_count', array(
		'type'     => 'number',
		'priority' => 3,
		'section'  => 'storeone_home_recent_product_section',
		'label'    => __('Product Count', 'storeone'),
	));

/** Recent Products **/

/** Product Tabs **/

	$wp_customize->add_section('storeone_home_product_tabs_section', array(
		'title'      => __('Product Tabs', 'storeone'),
		'priority'   => 40,
		'panel'		 => 'storeone_homepage',
		
	));

	$wp_customize->add_setting('storeone_home_product_tabs_heading', array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	));

	$wp_customize->add_control('storeone_home_product_tabs_heading', array(
		'type'     => 'text',
		'priority' => 1,
		'section'  => 'storeone_home_product_tabs_section',
		'label'    => __('Heading', 'storeone'),
	));

	$wp_customize->add_setting('storeone_home_product_tabs_desc', array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	));

	$wp_customize->add_control('storeone_home_product_tabs_desc', array(
		'type'     => 'text',
		'priority' => 2,
		'section'  => 'storeone_home_product_tabs_section',
		'label'    => __('Description', 'storeone'),
	));

	$wp_customize->add_setting('storeone_home_product_tabs_count', array(
		'default'           => 8,
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'transport'         => 'refresh',
		'sanitize_callback' => 'absint',
	));

	$wp_customize->add_control('storeone_home_product_tabs_count', array(
		'type'     => 'number',
		'priority' => 3,
		'section'  => 'storeone_home_product_tabs_section',
		'label'    => __('Product Count', 'storeone'),
	));

	$wp_customize->add_setting('storeone_product_tabs', array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'default'  => array('best_selling_products', 'sale_products', 'featured_products', 'recent_products', 'top_rated_products'),
		'sanitize_callback' => 'storeone_sanitize_sortable',

	));

	$wp_customize->add_control(new StoreOne_Field_Sortable($wp_customize, 'storeone_product_tabs',
		array(
			'section'  => 'storeone_home_product_tabs_section',
			'label'    => esc_attr__('Manage Product Tabs', 'storeone'),
			'help'     => esc_attr__('Drag and Drop to change order of tab and enable/disable any tab.', 'storeone'),
			'priority' => 10,
			'choices'  => array(
				'best_selling_products' => esc_html__('Best Selling Products', 'storeone'),
				'sale_products'         => esc_html__('Sale Products', 'storeone'),
				'featured_products'     => esc_html__('Featured Products', 'storeone'),
				'recent_products'       => esc_html__('Recent Products', 'storeone'),
				'top_rated_products'    => esc_html__('Top Rated Products', 'storeone'),
		),
	)));

/** Product Tabs **/

/** Latest Posts **/

	$wp_customize->add_section('storeone_home_blog_section', array(
		'title'      => __('Latest Posts', 'storeone'),
		'priority'   => 70,
		'panel'		 => 'storeone_homepage',
		
	));

	$wp_customize->add_setting('storeone_home_blog_heading', array(
		'default'           => __('Our Blog', 'storeone'),
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	));

	$wp_customize->add_control('storeone_home_blog_heading', array(
		'type'     => 'text',
		'priority' => 1,
		'section'  => 'storeone_home_blog_section',
		'label'    => __('Heading', 'storeone'),
	));

	$wp_customize->add_setting('storeone_home_blog_desc', array(
		'default'           => __('Be updated with latest news', 'storeone'),
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	));

	$wp_customize->add_control('storeone_home_blog_desc', array(
		'type'     => 'text',
		'priority' => 2,
		'section'  => 'storeone_home_blog_section',
		'label'    => __('Description', 'storeone'),
	));

	$wp_customize->add_setting('storeone_home_blog_count', array(
		'default'           => 3,
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'transport'         => 'refresh',
		'sanitize_callback' => 'absint',
	));

	$wp_customize->add_control('storeone_home_blog_count', array(
		'type'     => 'number',
		'priority' => 3,
		'section'  => 'storeone_home_blog_section',
		'label'    => __('Post Count', 'storeone'),
	));
	
	if(!class_exists('WooCommerce')){
		$wp_customize->add_setting('storeone_woocommerce_info', array(
			'sanitize_callback' => 'storeone_sanitize_html',
		));

		$wp_customize->add_control(new StoreOne_Info_Text($wp_customize, 'storeone_woocommerce_info',
			array(
				'label'    => __('Install WooCommerce', 'storeone'),
				'description' => __('Please install woocommerce plugin to use show products on your site and use this section', 'storeone'),
				'priority' => 0,
				'section'  => 'storeone_home_recent_product_section',
		)));

		$wp_customize->add_setting('storeone_woocommerce_info1', array(
			'sanitize_callback' => 'storeone_sanitize_html',
		));

		$wp_customize->add_control(new StoreOne_Info_Text($wp_customize, 'storeone_woocommerce_info1',
			array(
				'label'    => __('Install WooCommerce', 'storeone'),
				'description' => __('Please install woocommerce plugin to use show products on your site and use this section', 'storeone'),
				'priority' => 0,
				'section'  => 'storeone_home_product_tabs_section',
		)));
	}
/** Latest Posts **/


/*hompage sections*/

	$wp_customize->add_section('storeone_homepage_layout_section', array(
		'title'    => __('Homepage Layout', 'storeone'),
		'panel'    => 'storeone_homepage',
		'priority' => 10,
	));

	$wp_customize->add_setting('storeone_homepage_layout', array(
		'default'  => array('slider', 'product-recent', 'product-tabs', 'testimonial', 'blog'),
		'sanitize_callback' => 'storeone_sanitize_sortable',

	));

	$wp_customize->add_control(new StoreOne_Field_Sortable($wp_customize, 'storeone_homepage_layout',
		array(
			'section'  => 'storeone_homepage_layout_section',
			'label'    => esc_attr__('Homepage Sections', 'storeone'),
			'help'     => esc_attr__('Drag and Drop to change order of section and enable/disable any section.', 'storeone'),
			'priority' => 10,
			'choices'  => function_exists('storeone_extension')?array(
				'slider'         => esc_attr__('Slider', 'storeone'),
				'product-recent' => esc_attr__('WooCommerce Recent Products', 'storeone'),
				'product-tabs'   => esc_attr__('WooCommerce Tabs', 'storeone'),
				'testimonial'    => esc_attr__('Testimonial', 'storeone'),
				'blog'           => esc_attr__('Blog', 'storeone'),):array(
				'product-recent' => esc_attr__('WooCommerce Recent Products', 'storeone'),
				'product-tabs'   => esc_attr__('WooCommerce Tabs', 'storeone'),
				'blog'           => esc_attr__('Blog', 'storeone'),
			),
	)));

/*hompage sections*/

/*testimonials*/
	
	$wp_customize->add_section('storeone_home_testimonial_section', array(
		'title'    => __('Home Testimonial', 'storeone'),
		'priority'   => 50,
		'panel'		 => 'storeone_homepage',
		
	));

	$wp_customize->add_setting('storeone_testimonial_heading', array(
		'default'           => __('Testimonials', 'storeone'),
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	));

	$wp_customize->add_control('storeone_testimonial_heading', array(
		'type'     => 'text',
		'priority' => 1,
		'section'  => 'storeone_home_testimonial_section',
		'label'    => __('Heading', 'storeone'),
	));

	$wp_customize->add_setting('storeone_testimonial_desc', array(
		'sanitize_callback' => 'sanitize_text_field',
	));

	$wp_customize->add_control('storeone_testimonial_desc', array(
		'type'     => 'text',
		'priority' => 2,
		'section'  => 'storeone_home_testimonial_section',
		'label'    => __('Description', 'storeone'),
	));

/*testimonials*/

/* Other Options */
	$wp_customize->add_panel('storeone_shop_panel', array(
		'priority' => 4,
		'title'    => __('Shop Options', 'storeone'),
	));

	$wp_customize->add_section('storeone_shop_slider_section', array(
		'title'    => __('Shop Slider', 'storeone'),
		'panel'    => 'storeone_shop_panel',
		'priority' => 10,
	));

	$wp_customize->add_setting('storeone_shop_slider_enable', array(
		'sanitize_callback' => 'storeone_sanitize_checkbox',
		'default'     => true,
	));

	$wp_customize->add_control('storeone_shop_slider_enable', array(
		'type'     => 'checkbox',
		'section'  => 'storeone_shop_slider_section',
		'label'       => __('Slider ON/OFF', 'storeone'),
		'description' => __('Enable or Disable Slider on Shop', 'storeone'),
		'priority'    => 10,
	));


	$wp_customize->add_panel('storeone_blog_panel', array(
		'priority' => 4,
		'title'    => __('Blog Options', 'storeone'),
	));

	$wp_customize->add_section('storeone_blog_slider_section', array(
		'title'    => __('Blog Slider', 'storeone'),
		'panel'    => 'storeone_blog_panel',
		'priority' => 10,
	));

	$wp_customize->add_setting('storeone_blog_slider_enable', array(
		'sanitize_callback' => 'storeone_sanitize_checkbox',
		'default'     => true,
	));

	$wp_customize->add_control('storeone_blog_slider_enable', array(
		'type'     => 'checkbox',
		'section'  => 'storeone_blog_slider_section',
		'label'       => __('Slider ON/OFF', 'storeone'),
		'description' => __('Enable or Disable Slider on Blog', 'storeone'),
		'priority'    => 10,
	));

/* Other Options */


	if(function_exists('storeone_extension')){
		$wp_customize->add_section('storeone_home_slider_section', array(
			'title'    => __('Slider', 'storeone'),
			'priority'   => 20,
			'panel' => 'storeone_homepage'
			
		));

	}
	
	$wp_customize->add_setting('storeone_add_post_button', array(
			'sanitize_callback' => 'storeone_sanitize_html',
		));

	$wp_customize->add_control(new StoreOne_Info_Text($wp_customize, 'storeone_add_post_button',
		array(
			'label'    => __('Add Post', 'storeone'),
			'description' => sprintf('<a class="button button-default" href="%1$s" target="_blank">%2$s</a>', esc_url(admin_url('edit.php')), esc_html__('Add Post', 'storeone')),
			'priority' => 999,
			'section'  => 'storeone_home_blog_section',
	)));

	if(class_exists('WooCommerce')){
		$wp_customize->add_setting('storeone_add_product_button', array(
			'sanitize_callback' => 'storeone_sanitize_html',
		));

		$wp_customize->add_control(new StoreOne_Info_Text($wp_customize, 'storeone_add_product_button',
			array(
				'label'    => __('Add Product', 'storeone'),
				'description' => sprintf('<a class="button button-default" href="%1$s" target="_blank">%2$s</a>', esc_url(admin_url('edit.php?post_type=product')), esc_html__('Add Product', 'storeone')),
				'priority' => 999,
				'section'  => 'storeone_home_recent_product_section',
		)));
	}

	if(class_exists('StoreOne_Upsale_Customize_Control')){
		$wp_customize->add_section(new StoreOne_Upsale_Customize_Control($wp_customize, 'storeone-upsell', array(
			'priority' => 9999,
		)));
	}

	$wp_customize->get_section('title_tagline')->priority     = 1.5;
	
	$wp_customize->get_setting('blogname')->transport         = 'postMessage';
	$wp_customize->get_setting('blogdescription')->transport  = 'postMessage';
	$wp_customize->get_setting('header_textcolor')->transport = 'postMessage';
	$wp_customize->get_setting('background_color')->transport = 'postMessage';
}

add_action('customize_register', 'storeone_settings_control');

function storeone_customize_preview_js() {
	wp_enqueue_script( 'storeone-customizer-preview-script', get_template_directory_uri() . '/js/customizer.js', array('jquery', 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'storeone_customize_preview_js' );

function storeone_custmizer_style() {
	wp_enqueue_style('storeone-customizer-style', get_template_directory_uri() . '/css/customizer-style.css');
}
add_action('customize_controls_print_styles', 'storeone_custmizer_style');

function storeone_customize_controls_scripts(){
	wp_enqueue_script( 'storeone-customizer-controls', get_template_directory_uri() . '/js/customizer-controls.js', array('jquery'), '20151215', true );
}
add_action( 'customize_controls_enqueue_scripts',   'storeone_customize_controls_scripts' );

if (class_exists('WP_Customize_Control')){
	class StoreOne_Info_Text extends WP_Customize_Control {

		public function render_content() {
			?>
			    <span class="customize-control-title">
					<?php echo esc_html($this->label); ?>
				</span>

				<?php if ($this->description) {?>
					<span class="description customize-control-description">
					<?php echo wp_kses_post($this->description); ?>
					</span>
				<?php }
		}

	}
}

if (class_exists('WP_Customize_Section')){
	class StoreOne_Upsale_Customize_Control extends WP_Customize_Section {
		public $type = 'themefarmer-upsell';
		public function render() {
			$classes = 'accordion-section control-section-' . $this->type;
			$id      = 'themefarmer-upsell-buttons-section';
			?>
		    <li id="accordion-section-<?php echo esc_attr($this->id); ?>"class="<?php echo esc_attr($classes); ?>">
		        <div class="themefarmer-upsale">
		          	<a href="<?php echo esc_url('https://themefarmer.com/product/storeone-pro/'); ?>" target="_blank" class="themefarmer-upsale-bt" id="themefarmer-pro-button"><?php esc_html_e('VIEW PRO VERSION ', 'storeone');?></a>
		        </div>
		    </li>
		    <?php
		}
	}
}
