<?php if(function_exists('storeone_extension') && get_theme_mod('storeone_shop_slider_enable', '1')): ?>
<!-- Slider Start  -->
<div class="bps-slider shop-slider">
	<div class="owl-carousel owl-theme shop-swiper">
		<?php
			$slides = get_theme_mod( 'themefarmer_shop_slider', array());
			$i = 1;
			if(!empty($slides)):
			foreach ($slides as $key => $slide){
				?>
	        	<div class="owl-slide">
	        		<?php
	        			if(isset($slide['image'])){
							$slide_img = $slide['image'];
						}else{
							$slide_img = get_template_directory_uri().'/images/slide'.$i.'.jpg';
						}
					?>
					<img src="<?php echo esc_url($slide_img); ?>" class="img-responsive img-slide"/>
					<div class="overlay"></div>
	                <div class="carousel-caption">
						<h2 class="bgs-slider-heading animation animated-item-1"><?php echo esc_html($slide['heading']); ?></h2>
						<div class="bgs-slider-desc animation animated-item-2"><?php echo esc_html($slide['description']); ?></div>
						<?php if(!empty($slide['button1_url'])): ?>
						<a href="<?php echo esc_url($slide['button1_url']); ?>" class="btn animation animated-item-3 banner-link"> <?php echo esc_html($slide['button1_text']); ?> </a>
						<?php endif; ?>
					</div>
				</div>
				<?php
				if($i == 3){ $i = 1; }
				$i++;
			}
			endif;
		?>
	</div>			
</div>
<!-- Slider End -->
<?php endif; ?>