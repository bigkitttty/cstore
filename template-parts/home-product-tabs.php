<?php if(storeone_is_wc()): ?>
<!-- Product  Start -->
<div class="container-fluid bgs-products-tabs bgs-products bgs-space">
	<div class="container">
		<div class="bgs-heading">
			<h2 class="section-heading"><span> <?php echo esc_html(get_theme_mod('storeone_home_product_tabs_heading')); ?></span></h2>
			<p class="section-description"> <?php echo esc_html(get_theme_mod('storeone_home_product_tabs_desc')); ?> </p>
		</div>
		<div class="bgs-home-products bgs-tabs woocommerce">
			<div class="product-tabs">
				<?php 
					$tab_labels = storeone_get_product_tab_labels();
					$product_tabs = get_theme_mod('storeone_product_tabs', array('best_selling_products', 'sale_products', 'featured_products', 'recent_products', 'top_rated_products'));
				 ?>
				<ul class="nav nav-pills">
					<?php 
						$i = 0;
						if($product_tabs){
						foreach($product_tabs as $key => $atab) {
							$label = $tab_labels[$atab];
							$active = ($i == 0)?'active':'';
							printf('<li class="%1$s"><a class="btn btn-theme" href="%2$s">%3$s</a></li>', esc_attr($active), esc_url('#'.$atab), esc_html($label));
							$i++;
						}}
					?>
				</ul>
				<a href="<?php echo esc_url(get_permalink(wc_get_page_id( 'shop' ))); ?>" class="btn btn-theme shop-link"><i class="fa fa-link"></i> <?php esc_html_e('Show All', 'storeone'); ?></a>
				<div class="clearfix"></div>
				<div class="tab-content">
					<?php 
						$i =0;
						if($product_tabs){
						foreach ($product_tabs as $key => $atab) {
							$active = ($i == 0)?'active':'';
							?>
							<div id="<?php echo esc_attr($atab); ?>" class="tab-pane <?php echo esc_attr($active); ?>">
								<?php echo do_shortcode( '[' . esc_attr($atab) . ' per_page="' . absint( get_theme_mod( 'storeone_home_product_tabs_count', '8' ) ) . '" columns="4" orderby="date" order="ASC"]' ); ?>
							</div>
							<?php
							$i++;
						}}
					?>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Product End -->
<?php endif; ?>