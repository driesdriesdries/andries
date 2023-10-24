<?php get_header(); ?>
	<div class="wrapper">
		<div class="hero fade-in">
			<?php get_template_part( 'template-parts/home/hero' ); ?>
		</div>
		<div class="banner fade-in">
			<?php get_template_part( 'template-parts/home/banner' ); ?>
		</div>
		<div class="main-content">
			<?php get_template_part( 'template-parts/home/services' ); ?>
			<?php get_template_part( 'template-parts/home/education' ); ?>
			<?php get_template_part( 'template-parts/home/testimonial' ); ?>
			<?php get_template_part( 'template-parts/home/callout' ); ?>
			<?php get_template_part( 'template-parts/home/contact-modal' ); ?>
		</div>
	</div>
<?php

get_footer();