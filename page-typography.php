<?php 
/*
Template Name: Typography
*/
 ?>
<?php get_header(); ?>
	<section class="textPage">
		<div class="container">
			<div class="content-block">
				<h1><?php the_title(); ?></h1>
				<?php the_field('content_block'); ?>
			</div>
		</div>
	</section>
<?php get_footer(); ?>