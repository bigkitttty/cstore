<?php if (function_exists('storeone_extension')): ?>
<!-- Slider Start  -->
<div class="bps-slider">
	<div class="home-swiper owl-carousel owl-theme">
		<?php
			$slides = get_theme_mod('themefarmer_home_slider', array());
			$i = 1;
			if($slides){
				foreach ($slides as $key => $slide) {
					?>
					<div class="owl-slide">
						<?php 
							if(isset($slide['image'])):
								$slide_img = $slide['image'];
						 	else:
						 		$slide_img = get_template_directory_uri().'/images/slide'.$i.'.jpg';
							endif; 
						?>
						<img src="<?php echo esc_url($slide_img); ?>" class="img-responsive img-slide"/>
						<div class="overlay"></div>
		               	<div class="carousel-caption">
		               		<?php if(isset($slide['heading'])): ?>
							<h2 class="bgs-slider-heading animation animated-item-1"> <?php echo wp_kses_post($slide['heading']); ?> </h2>
							<?php endif; ?>
							<?php if(isset($slide['description'])): ?>
							<div class="bgs-slider-desc animation animated-item-2"><?php echo wp_strip_all_tags($slide['description']); ?></div>
							<?php endif; ?>								
							<?php if(!empty($slide['button1_url'])): ?>
							<a href="<?php echo esc_url($slide['button1_url']); ?>" class="btn animation animated-item-3 banner-link"> <?php echo esc_html($slide['button1_text']); ?> </a>
							<?php endif; ?>								
						</div>
					</div>
					<?php
					if($i == 3){ $i = 1; }
					$i++;
				}
			}
		?>
	</div>			
</div>
<!-- Slider End -->
<?php endif; ?>