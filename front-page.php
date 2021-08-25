<?php 
/*
Template Name: Home Page
*/
 ?>
 <?php get_header(); ?>

<?php 

$args = array(
    'taxonomy' 		=> 'product_cat',
    'orderby' 		=> 'name',
    'order'   		=> 'ASC',
    'number'		=>	30,
    'hide_empty' 	=> false,
);

$cats = get_categories($args);?>
<?php
foreach($cats as $cat) {
    ?>
    <?php 
        $thumbnail_id = get_term_meta( $cat->term_id, 'thumbnail_id', true ); 
        // get the image URL
        $image = wp_get_attachment_url( $thumbnail_id ); 
        // print the IMG HTML
    ?>
    <?php 
    echo '
        <style>.cat-item-' . $cat->term_id .  '::before{background-image: url("' . $image . '");}</style>';
    ?>
<?php 
};
?>
 	<section class="homeOffer">
 	    <div class="container">
 	        <div class="row justify-content-between">
 	            <div class="d-none d-md-block col-lg-3">
 	                <div class="homeOffer__categories">
 	                    <div class="more-categories">
 	                        <img src="<?php echo get_template_directory_uri() ?>/images/categories-open.svg" alt="">
 	                    </div>
 	                    <div class="homeOffer__categories_wrapper">
 	                        <?php dynamic_sidebar( 'woo-category-filter-sidebar' ); ?>
 	                    </div>
 	                </div>
 	            </div>
 	            <div class="col-lg-9">
 	                <div class="homeOffer__slider">
 	                    <div class="homeOffer__slide" style="background-image: url(wp-content/themes/porto/images/offer-slider-img.png);">
 	                        <div class="text">
 	                            <div class="pre">
 	                                Новинка
 	                            </div>
 	                            <h2>
 	                                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
 	                            </h2>
 	                            <p>
 	                                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
 	                            </p>
 	                            <a href="#">Детальніше</a>
 	                        </div>
 	                    </div>
 	                    <div class="homeOffer__slide" style="background-image: url(wp-content/themes/porto/images/offer-slider-img.png);">
 	                        <div class="text">
 	                            <div class="pre">
 	                                Новинка
 	                            </div>
 	                            <h2>
 	                                slide 2
 	                            </h2>
 	                            <p>
 	                                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
 	                            </p>
 	                            <a href="#">Детальніше</a>
 	                        </div>
 	                    </div>
 	                </div>
 	            </div>
 	        </div>
 	    </div>
 	</section>
 	<div class="mobile-categories d-block d-md-none">
 	    <div class="header-categories">
 	        <div class="head d-flex align-items-center justify-content-between">
 	            <img src="<?php echo get_template_directory_uri() ?>/images/categories.svg" alt="">
 	            КАТЕГОРІЇ ТОВАРІВ
 	            <div class="arrow">
 	                <img src="<?php echo get_template_directory_uri() ?>/images/down.svg" alt="">
 	            </div>
 	        </div>
 	        <div class="header-categories__list">
 	            <a href="#">
 	                <img src="<?php echo get_template_directory_uri() ?>/images/cat-1.svg" alt="">
 	                Акційні пропозиції
 	            </a>
 	            <a href="#">
 	                <img src="<?php echo get_template_directory_uri() ?>/images/cat-2.svg" alt="">
 	                Опорно-руховий апарат
 	            </a>
 	            <a href="#">
 	                <img src="<?php echo get_template_directory_uri() ?>/images/cat-3.svg" alt="">
 	                Протизастудні засоби / для імунітету
 	            </a>
 	            <a href="#">
 	                <img src="<?php echo get_template_directory_uri() ?>/images/cat-4.svg" alt="">
 	                Для чоловічого здоров'я
 	            </a>
 	            <a href="#">
 	                <img src="<?php echo get_template_directory_uri() ?>/images/cat-5.svg" alt="">
 	               Для жіночого здоров'я
 	            </a>
 	            <a href="#">
 	                <img src="<?php echo get_template_directory_uri() ?>/images/cat-6.svg" alt="">
 	                Для ШКТ (Печінка желчевод)
 	            </a>
 	            <a href="#">
 	                <img src="<?php echo get_template_directory_uri() ?>/images/cat-7.svg" alt="">
 	                Для дихальних шляхів
 	            </a>
 	            <a href="#">
 	                <img src="<?php echo get_template_directory_uri() ?>/images/cat-8.svg" alt="">
 	                Засоби від герпесу
 	            </a>
 	            <a href="#">
 	                <img src="<?php echo get_template_directory_uri() ?>/images/cat-9.svg" alt="">
 	                Засоби проти хропіння
 	            </a>
 	            <a href="#">
 	                <img src="<?php echo get_template_directory_uri() ?>/images/cat-10.svg" alt="">
 	                Для нервової системи
 	            </a>
 	            <a href="#">
 	                <img src="<?php echo get_template_directory_uri() ?>/images/cat-11.svg" alt="">
 	                Для профілактики варикоза
 	            </a>
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
 	            <div class="col-lg-3">
 	                <div class="homeFeatures__item">
                    	<?php if( !empty( $homeFeaturesIcon ) ): ?>
							<div class="icon">
								<?php echo file_get_contents(esc_url(wp_get_original_image_path($homeFeaturesIcon ['id']))); ?>
							</div>
						<?php endif; ?>								
 	                    <div class="text">
							<?php if( $homeFeaturesTitle ): ?>
								<h3>
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
				<h2>
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
							<?php echo esc_url($homeStock__slide['url']); ?>
							<img src="<?php echo esc_url($homeStock__slide['url']); ?>">
						</div>
					<?php endif; ?>
				<?php endwhile; ?>
			<?php endif; ?>
 	    </div>
 	</div>
</section>
	 <?php 
	 	$homeTextContent = get_field('homeTextContent');
	 ?>
	<?php if( $homeTextContent ): ?>
		<section class="homeText">
			<div class="container">
				<div class="homeText__content">
					<p>
					<?php echo $homeTextContent; ?>
					</p>
				</div>
			</div>
		</section>
	 <?php endif; ?>
 
 <?php get_footer(); ?>