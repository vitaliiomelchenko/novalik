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
	?>
<section class="aboutBlock">
	    <div class="container">
	        <div class="row justify-content-between align-items-center">
                <?php if( $aboutBlocktitle || $aboutBlocktextLeft ) ;?>
	            <div class="col-xl-6">
	                <div class="aboutBlock__text">
	                    <h1>
	                        <?php echo $aboutBlocktitle ?>
	                    </h1>
	                    <p>
                            <?php echo $aboutBlocktextLeft ?>
	                    </p>
	                </div>
	            </div>
                <?php endif; ?>
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
                            <?php while( have_rows('image_row') ) : the_row();
                                $aboutBlockimage = get_sub_field('aboutBlockimage');
                            ?>
                                <div class="aboutBlock__images">
	                                <img src="<?php echo esc_url($aboutBlockimage['url']); ?>" alt="<?php echo esc_attr($aboutBlockimage['alt']); ?>">
	                            </div>
                            <?php endwhile; ?>
	                    </div>
                    <?php endif; ?>
                    <?php if( $aboutBlocktextRight ) ;?>
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
        <?php if( $aboutFeaturestitle ); ?>
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
                                <?php if( $aboutFeaturesitemContent ); ?>
                                    <div class="text">
                                        <p>
                                            <?php echo $aboutFeaturesitemContent ?>
                                        </p>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endwhile; ?>
	                </div>
                <?php endif; ?>
	        </div>
	    </div>
	</div>
</section>
<section class="aboutMission">
	<div class="container">
	    <div class="row justify-content-between align-items-center">
	        <div class="col-lg-5">
	            <div class="aboutMission__text">
                    <?php if( $aboutMissiontitle ); ?>
                        <h2 class="title-s">
                            <?php echo $aboutMissiontitle ?>
                        </h2>
                    <?php endif; ?>
                    <?php if( $aboutMissioncontent ); ?>
                        <p>
                            <?php echo $aboutMissioncontent ?>
                        </p>
                    <?php endif; ?>
	            </div>
	        </div>
            <?php if( !empty( $aboutMissionimage ) ): ?>
                <div class="col-lg-7">
                    <div class="aboutMission__video">
                        <img src="<?php echo esc_url($aboutMissionimage['url']); ?>" alt="<?php echo esc_attr($aboutMissionimage['alt']); ?>" />
                    </div>
                </div>
	        <?php endif; ?>
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
                    <?php if( $aboutPersonaltitle ); ?>
                        <h2 class="title-s">
                            <?php echo $aboutPersonaltitle ?>
                        </h2>
                    <?php endif; ?>
                    <?php if( $aboutPersonalcontent ); ?>
                        <p>
                            <?php echo $aboutPersonalcontent ?>
                        </p>
                    <?php endif; ?>
	                <a href="#" class="blue-btn">
	                    Приєднатися до команди
	                </a>
	            </div>
	        </div>
	    </div>
	</div>
</section>
	<section class="aboutDirections">
	    <div class="container">
        <?php if( $aboutDirectionstitle ); ?>
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
                                <?php if( $aboutDirectionsitemContent ); ?>
                                    <div class="text">
                                        <p>
                                            <?php echo $aboutDirectionsitemContent ?>
                                        </p>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endwhile; ?>
	                </div>
                <?php endif; ?>
	            </div>
	        </div>
	    </div>
	</section>
	<section class="aboutCertificates">
	    <div class="container">
	        <div class="head">
				<?php if( $aboutCertificatestitle ); ?>
					<h2 class="title-s">
						<?php echo $aboutCertificatestitle ?>
					</h2>
        		<?php endif ?>
	            <div class="slider-controls">
	                <div class="control certificates-a-prev"><img src="<?php echo get_template_directory_uri() ?>/images/prev-slide.svg" alt=""></div>
	                <div class="control certificates-a-next"><img src="<?php echo get_template_directory_uri() ?>/images/next-slide.svg" alt=""></div>
	            </div>
	        </div>
	        <div class="aboutCertificates__slider">
			
	        </div>
	    </div>
	</section>
<?php get_footer(); ?>