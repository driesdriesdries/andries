<?php get_header(); ?>
	<div class="wrapper">
		<div class="hero">
			<?php get_template_part( 'template-parts/home/hero' ); ?>
		</div>
		<div class="banner">
			<?php get_template_part( 'template-parts/home/banner' ); ?>
		</div>
		<div class="main-content">
			<?php get_template_part( 'template-parts/home/services' ); ?>
			<?php get_template_part( 'template-parts/home/education' ); ?>
			<?php get_template_part( 'template-parts/home/testimonial' ); ?>
		</div>
	</div>
<?php
