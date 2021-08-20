<?php get_header(); ?>

<?php
wp_reset_postdata();

global $porto_settings, $porto_layout;

$options                = array();
$options['themeConfig'] = true;
$options['lg']          = $porto_settings['post-related-cols'];
if ( in_array( $porto_layout, porto_options_sidebars() ) ) {
	$options['lg']--;
}
if ( $options['lg'] < 1 ) {
	$options['lg'] = 1;
}
$options['md'] = $porto_settings['post-related-cols'] - 1;
if ( $options['md'] < 1 ) {
	$options['md'] = 1;
}
$options['sm'] = $porto_settings['post-related-cols'] - 2;
if ( $options['sm'] < 1 ) {
	$options['sm'] = 1;
}
$options = json_encode( $options );
?>

<div id="content" role="main">
	<section class="postPage">
		<div class="container">
			<div class="row align-items-start justify-content-between">
				<div class="col-lg-8">
					<div class="postPage__content">
						<h1>
							<?php the_title(); ?>
						</h1>
						<?php the_content(); ?>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="related-posts">
						<h4><?php printf( esc_html__( 'Інші %1$sновини%2$s', 'porto' ), '<strong>', '</strong>' ); ?></h4>
						<?php
							$categories = get_the_category($post->ID);
							if ($categories) {
								$category_ids = array();
								foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;
								$args=array(
									'category__in' => $category_ids,
									'post__not_in' => array($post->ID),
									'showposts' => '5',
									'orderby' => 'rand',
									'ignore_sticky_posts' => '1',
									'no_found_rows' => true,
									'cache_results' => false
								);
								$my_query = new wp_query($args);
								if( $my_query->have_posts() ) {
									
									while ($my_query->have_posts()) {
										$my_query->the_post();
										?>
										<article class="blogPage__card">
											<?php 
											//должно находится внутри цикла
											if( has_post_thumbnail() ) {
												?>
													<div class="image">
														<?php the_post_thumbnail(); ?>
													</div>
													<div class="text">
														<div class="rel-date">
															<?php the_date(); ?>
														</div>
														<h3>
															<a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
														</h3>
													</div>
												<?php
											}
											else {
												?>
												<div class="text">
													<div class="rel-date">
														<?php the_date(); ?>
													</div>
													<h3>
														<a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
													</h3>
												</div>
												<?php
											}
											?>
											
										</article>
										<?php
									}
									
								}
								wp_reset_query();
							}
							?>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

<?php get_footer(); ?>
