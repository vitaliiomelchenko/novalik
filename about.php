<?php 
/*
Template Name: About Page
*/
 ?>

<?php get_header(); ?>
<?php 
	$aboutBlocktitle = get_field('aboutBlocktitle');
	$aboutBlocktextLeft = get_field('aboutBlocktextLeft');
	$aboutBlocktextRight = get_field('aboutBlocktextRight');
	$aboutBlocklogo = get_field('aboutBlocklogo');
	$aboutMissiontitle = get_field('aboutMissiontitle');
	$aboutMissioncontent = get_field('aboutMissioncontent');
	$aboutMissionimage = get_field('aboutMissionimage');
	$aboutFeaturestitle = get_field('aboutFeaturestitle');
	$aboutPersonaltitle = get_field('aboutPersonaltitle');
	$aboutPersonalcontent = get_field('aboutPersonalcontent');
	$aboutPersonalimage = get_field('aboutPersonalimage');
	$aboutCertificatestitle = get_field('aboutCertificatestitle');
	$aboutDirectionstitle = get_field('aboutDirectionstitle');
    $aboutMissionVideo = get_field('aboutMissionVideo');
	?>
<section class="aboutBlock">
	    <div class="container">
	        <div class="row justify-content-between align-items-center">
                <?php if( $aboutBlocktitle ) : ?>
	            <div class="col-xl-6">
	                <div class="aboutBlock__text">
	                    <h1 class="title-s"> 
	                        <?php echo $aboutBlocktitle ?>
	                    </h1> 
						<?php endif; ?>
	                    <p>
                            <?php echo $aboutBlocktextLeft ?>
	                    </p>
	                </div>
	            </div>
               
                    <?php if( !empty( $aboutBlocklogo ) ): ?>
                        <div class="col-xl-6">
                            <div class="aboutBlock__img">
                               <?php echo file_get_contents(esc_url(wp_get_original_image_path($aboutBlocklogo['id']))); ?>
                            </div>
                        </div>
                    </div>
            <?php endif; ?>
            <?php 
            if( have_rows('image_row') ):?>
	            <div class="aboutBlock__bottom">
	                <div class="row justify-content-between align-items-center">
	                    <div class="col-xl-6">
							<div class="aboutBlock__images">
                            <?php while( have_rows('image_row') ) : the_row();
                                $aboutBlockimage = get_sub_field('aboutBlockimage');
                            ?>
                                
	                                <img src="<?php echo esc_url($aboutBlockimage['url']); ?>" alt="<?php echo esc_attr($aboutBlockimage['alt']); ?>">
	                            
                            <?php endwhile; ?>
							</div>
	                    </div>
                    <?php endif; ?>
                    <?php if( $aboutBlocktextRight ) : ?>
                        <div class="col-xl-6">
                            <div class="aboutBlock__description">
                                <p>
                                    <?php echo $aboutBlocktextRight  ?>
                                </p>
                            </div>
                        <?php endif; ?>
	                </div>
	            </div>
	        </div>
	    </div>
	</section>
	<section class="aboutFeatures">
	<div class="container">
        <?php if( $aboutFeaturestitle ) : ?>
            <h2 class="title-s">
                <?php echo $aboutFeaturestitle ?>
            </h2>
        <?php endif ?>
        <?php if( have_rows('features__row') ):?>
	        <div class="aboutFeatures__items">
	            <div class="row">
                    <?php while( have_rows('features__row') ) : the_row(); 
                        $aboutFeaturesitemContent = get_sub_field('aboutFeaturesitemContent');
                        $aboutFeaturesitemIcon  = get_sub_field('aboutFeaturesitemIcon');
                    ?>
                        <div class="col-lg-4 mb-4 mb-lg-4">
                            <div class="aboutFeatures__item">
                                <?php if( !empty( $aboutFeaturesitemIcon ) ): ?>
                                    <div class="icon">
                                        <?php echo file_get_contents(esc_url(wp_get_original_image_path($aboutFeaturesitemIcon['id']))); ?>
                                    </div>
                                <?php endif; ?>
                                <?php if( $aboutFeaturesitemContent ) : ?>
                                    <div class="text">
                                        <p>
                                            <?php echo $aboutFeaturesitemContent ?>
                                        </p>
                                    </div>
                                <?php endif; ?>
                            </div>
							  
							 </div>
                        <?php endwhile; ?>	
							</div>
	               
			</div>
        <?php endif; ?>
	</div>
</section>
<section class="aboutMission">
	<div class="container">
	    <div class="row justify-content-between align-items-center">
	        <div class="col-lg-5">
	            <div class="aboutMission__text">
                    <?php if( $aboutMissiontitle ) : ?>
                        <h2 class="title-s">
                            <?php echo $aboutMissiontitle ?>
                        </h2>
                    <?php endif; ?>
                    <?php if( $aboutMissioncontent ) : ?>
                        <p>
                            <?php echo $aboutMissioncontent ?>
                        </p>
                    <?php endif; ?>
	            </div>
	        </div>
                <div class="col-lg-7">
                    <div class="aboutMission__video">
						 <video src="<?php echo $aboutMissionVideo['url']; ?>" controls="controls" poster="<?php echo get_template_directory_uri() ?>/images/video.jpg" alt=""></video>
                    </div>
                </div>
	    </div>
	</div>
</section>
<section class="aboutPersonal">
    <div class="container">
	    <div class="row align-items-center justify-content-between">
            <?php if( !empty( $aboutPersonalimage ) ): ?>
                <div class="order-2 order-md-1 col-lg-6">
                    <div class="aboutPersonal__img">
                        <img src="<?php echo esc_url($aboutPersonalimage['url']); ?>" alt="<?php echo esc_attr($aboutPersonalimage['alt']); ?>" />
                    </div>
                </div>
            <?php endif; ?>
	        <div class="order-1 order-md-2 col-lg-6">
	            <div class="aboutPersonal__text">
                    <?php if( $aboutPersonaltitle ) : ?>
                        <h2 class="title-s">
                            <?php echo $aboutPersonaltitle ?>
                        </h2>
                    <?php endif; ?>
                    <?php if( $aboutPersonalcontent ) : ?>
                        <p>
                            <?php echo $aboutPersonalcontent ?>
                        </p>
                    <?php endif; ?>
	                <a href="http://novalik.levelmedia.com.ua/ru/career/" class="blue-btn">
	                    ?????????????????????? ???? ??????????????
	                </a>
	            </div>
	        </div>
	    </div>
	</div>
</section>
	<section class="aboutDirections">
	    <div class="container">
        <?php if( $aboutDirectionstitle ) : ?>
            <h2 class="title-s">
                <?php echo $aboutDirectionstitle ?>
            </h2>
        <?php endif ?>
		<?php if( have_rows('Directions__row') ):?>
	        <div class="aboutFeatures__items">
	            <div class="row">
				<?php while( have_rows('Directions__row') ) : the_row(); 
                        $aboutDirectionsitemContent = get_sub_field('aboutDirectionsitemContent');
                        $aboutDirectionsitemIcon  = get_sub_field('aboutDirectionsitemIcon');
                    ?>
                        <div class="col-lg-4 mb-4 mb-lg-4">
                            <div class="aboutFeatures__item">
                                <?php if( !empty( $aboutDirectionsitemIcon ) ): ?>
                                    <div class="icon">
                                        <?php echo file_get_contents(esc_url(wp_get_original_image_path($aboutDirectionsitemIcon['id']))); ?>
                                    </div>
                                <?php endif; ?>
                                <?php if( $aboutDirectionsitemContent ) : ?>
                                    <div class="text">
                                        <p>
                                            <?php echo $aboutDirectionsitemContent ?>
                                        </p>
                                    </div>
                                <?php endif; ?>
                            </div></div>
                        <?php endwhile; ?>
	                </div></div>
                <?php endif; ?>
	            
	        
	    </div>
	</section>
	<section class="aboutCertificates">
	    <div class="container">
	        <div class="head">
				<?php if( $aboutCertificatestitle ) : ?>
					<h2 class="title-s">
						<?php echo $aboutCertificatestitle ?>
					</h2>
        		<?php endif ?>
				<?php if( have_rows('aboutCertificates__row') ):?>
	            <div class="slider-controls">
	                <div class="control certificates-a-prev"><img src="<?php echo get_template_directory_uri() ?>/images/prev-slide.svg" alt=""></div>
	                <div class="control certificates-a-next"><img src="<?php echo get_template_directory_uri() ?>/images/next-slide.svg" alt=""></div>
	            </div>
	        </div>
			
	        <div class="aboutCertificates__slider">
			<?php while( have_rows('aboutCertificates__row') ) : the_row(); 
				$aboutCertificatesItem = get_sub_field('aboutCertificatesItem');
			?>
			<?php if( !empty( $aboutCertificatesItem ) ): ?>
				<a href="<?php echo esc_url($aboutCertificatesItem['url']); ?>" class="col-lg-4 aboutCertificatesItemWrapper">
					<div class="aboutCertificatesItemInner">
					<img src="<?php echo esc_url($aboutCertificatesItem['url']); ?>" alt="<?php echo esc_attr($aboutCertificatesItem['alt']); ?>" />
				</div>
					<div class="zoom--icon">
							<svg width="44" height="44" viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
								<circle cx="22" cy="22" r="22" fill="#B8D6ED"/>
								<path d="M31 31L26.65 26.65M29 21C29 25.4183 25.4183 29 21 29C16.5817 29 13 25.4183 13 21C13 16.5817 16.5817 13 21 13C25.4183 13 29 16.5817 29 21Z" stroke="#1E3F6D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
								</svg>
							</div>
				</a>
			<?php endif; ?>
			<?php endwhile; ?>
	        </div>
	    </div>
	</section>
<?php endif; ?>
<?php get_footer(); ?>