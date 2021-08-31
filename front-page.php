<?php 
/*
Template Name: Home Page
*/
 ?>
 <?php get_header(); ?>


 	<section class="homeOffer">
 	    <div class="container">
 	        <div class="row justify-content-between">
 	            <div class="d-none d-md-block col-md-3 categories-col">
 	                <div class="homeOffer__categories">
 	                    <div class="more-categories">
 	                        <img src="<?php echo get_template_directory_uri() ?>/images/categories-open.svg" alt="">
 	                    </div>
 	                    <div class="homeOffer__categories_wrapper">
 	                        <?php dynamic_sidebar( 'woo-category-filter-sidebar' ); ?>
 	                    </div>
 	                </div>
 	            </div>
				<?php if( have_rows('homeOffer__slider') ): ?>
 	            <div class="col-md-9 slider-col">
 	                <div class="homeOffer__slider">
    					<?php while( have_rows('homeOffer__slider') ) : the_row();
							$bannerBackground = get_sub_field('bannerBackground');
							$bannerLink = get_sub_field('bannerLink');
						?>
							<a href="<?php echo esc_url( $bannerLink ); ?>" class="homeOffer__slide" style="position: relative">
								<img style="position: absolute; top: 0; left: 0;  width: 100%; z-index: -1;" src="<?php echo esc_url($bannerBackground['url']); ?>" alt="">
							</a>
						<?php endwhile; ?>
 	                </div>
 	            </div>
				<?php endif; ?>
 	        </div>
 	    </div>
 	</section>
 	<div class="mobile-categories d-block d-md-none">
 	    <div class="header-categories">
 	        <div class="head d-flex">
 	            <img src="<?php echo get_template_directory_uri() ?>/images/categories.svg" alt="">
 	            КАТЕГОРІЇ ТОВАРІВ
 	            <div class="arrow">
 	                <img src="<?php echo get_template_directory_uri() ?>/images/down.svg" alt="">
 	            </div>
 	        </div>
 	        <div class="header-categories__list">
			 <?php dynamic_sidebar( 'woo-category-filter-sidebar' ); ?>
 	        </div>
 	    </div>
 	</div>
<?php if( have_rows('homeFeatures') ): ?>
 	<section class="homeFeatures"> 
 	    <div class="container"> 
 	        <div class="row">
				 <?php while( have_rows('homeFeatures') ) : the_row();
				 	$homeFeaturesTitle = get_sub_field('homeFeaturesTitle');
					$homeFeaturesContent = get_sub_field('homeFeaturesContent');
					$homeFeaturesIcon = get_sub_field('homeFeaturesIcon');
				 ?>   
 	            <div class="col-md-6 col-lg-3 homeFeatures__item_wrapper">
 	                <div class="homeFeatures__item">
                    	<?php if( !empty( $homeFeaturesIcon ) ): ?>
							<div class="icon">
								<?php echo file_get_contents(esc_url(wp_get_original_image_path($homeFeaturesIcon ['id']))); ?>
							</div>
						<?php endif; ?>								
 	                    <div class="text">
							<?php if( $homeFeaturesTitle ): ?>
								<h3 class="title-s">
									<?php echo $homeFeaturesTitle ?>
								</h3>
							<?php endif; ?>
							<?php if( $homeFeaturesContent ): ?>
								<p>
									<?php echo $homeFeaturesContent ?>
								</p>
							 <?php endif; ?>
 	                    </div>
 	                </div>
 	            </div>
				<?php endwhile; ?>
 	        </div>  
 	    </div>  
 	</section>
<?php endif; ?>  
<?php 
	$homeStockTitle = get_field('homeStockTitle')
?>
<section class="homeStock">
 	<div class="container">
		 <?php if( $homeStockTitle ): ?>
 	        <div class="head">
				<h2 class="title-s">
					<?php echo $homeStockTitle ?>
				</h2>
			<?php endif; ?>
 	            <a href="#" class="view-more">
 	                Показати всі
 	            </a>
 	            <div class="slider-controls">
 	                <div class="control homeStock-a-prev"><img src="<?php echo get_template_directory_uri() ?>/images/prev-slide.svg" alt=""></div>
 	                <div class="control homeStock-a-next"><img src="<?php echo get_template_directory_uri() ?>/images/next-slide.svg" alt=""></div>
 	            </div>
 	        </div>
			 <?php if( have_rows('homeStock__slider') ): ?>
 	        	<div class="homeStock__slider">
					<?php while( have_rows('homeStock__slider') ) : the_row();
						$homeStock__slide = get_sub_field('homeStock__slide');
						
					?>
					<?php if( !empty( $homeStock__slide ) ): ?>
						<div class="homeStock__slide">
							<img src="<?php echo esc_url($homeStock__slide['url']); ?>">
						</div>
					<?php endif; ?>
				<?php endwhile; ?>
			<?php endif; ?>
 	    </div>
 	</div>
</section>
<?php 
if(qtranxf_getLanguage() == 'ua'){
	$populaar_products_slider_title = 'Популярні товари';
	$show_all_button_label = 'Показати всі';
}
if(qtranxf_getLanguage() == 'ru'){
	$populaar_products_slider_title = 'Популярные товары';
	$show_all_button_label = 'Показать все';
}
if(qtranxf_getLanguage() == 'en'){
	$populaar_products_slider_title = 'Popular products';
	$show_all_button_label = 'Show all';
}
?>
<section class="popular_products_wrapper">
	<div class="popular_products_container container">
		<div class="popular_products_slider_title_wrapper">
			<div class="popular_products_slider_title"><?php echo $populaar_products_slider_title; ?></div>
			<a class="show_all" href="<?php echo get_home_url() ?>/produkcziya"><?php echo $show_all_button_label ?></a>
		</div>
		<div class="popular_products_slider">
			<?php 
				$posts = get_posts( array(
				'numberposts' => 8,
				'orderby' => 'popularity',
				'order'   => 'ASC',
				'post_type'   => 'product',
			) );

			foreach( $posts as $post ){
				setup_postdata($post);?>
				<?php wc_get_template_part( 'content', 'product' ); ?>

			<?php
			}

			wp_reset_postdata(); // сброс
			?>
		</div>
	</div>
</section>
	 <?php 
	 	$homeTextContent = get_field('homeTextContent');
	 ?>
	<?php if( $homeTextContent ): ?>
		<section class="homeText">
			<div class="container">
				<div class="homeText__content_wrapper">
					<div class="homeText__content">
						<?php echo $homeTextContent; ?>
						
					</div>
					<div class="read_more">
						Читати більше
					</div>
				</div>
			</div>
		</section>
	 <?php endif; ?>
 
 <?php get_footer(); ?>
<script>
	jQuery(document).ready(function(){
		jQuery('.popular_products_wrapper .add_to_cart_button').html('Купить');
	});
	jQuery('.read_more').click(function(){
		jQuery('.homeText__content_wrapper').toggleClass('opened');
	});
</script>