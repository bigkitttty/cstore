<?php if (function_exists('storeone_extension')): ?>
<!-- Testimonial Start -->
<div class="container-fluid bgs-testimonial bgs-space">
	<div class="container">
		<div class="bgs-heading">
			<h2 class="section-heading"><span> <?php echo esc_html(get_theme_mod('storeone_testimonial_heading')); ?></span></h2>
			<p class="section-description"> <?php echo esc_html(get_theme_mod('storeone_testimonial_desc')); ?> </p>
		</div>
		<div class="bgs-home-testimonial">
			<div class="owl-carousel owl-theme testimonial-swiper">
			<?php
				$testmonials  = get_theme_mod('themefarmer_home_testimonials', array());
				foreach ($testmonials as $key => $testi) {					
					?>
					<div class="owl-slide home-testimonial">
						<div class="testimonial-inner">
							<div class="name-img">
								<div class="testi-img-con">
									<img src="<?php echo esc_url( $testi['image']); ?>" alt="<?php esc_attr($testi['title']); ?>" class="img-responsive testi-img">
								</div>
								<div class="testi-name"><?php echo esc_html($testi['title']); ?></div>
							</div>
							<?php if(!empty($testi['web_link'])): ?>
							<div class="testi-link"><?php echo esc_html($testi['web_name']); ?></div>
							<?php endif; ?>
							<div class="testi-desc"><?php echo wp_kses_post($testi['description']); ?></div>
						</div>
					</div>
					<?php
				}
				wp_reset_postdata();
			?>
			</div>
		</div>
	</div>
</div>
<!-- Testimonial End -->
<?php endif; ?>