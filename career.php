<?php 
/*
Template Name: Карьера
*/ 
?>
<?php 
    $careerTitle = get_field('careerTitle');
    $careerContent = get_field('careerContent');
    $careerDedicated = get_field('careerDedicated');
    $careerForm = get_field('careerForm');
?>
<?php get_header();?>
    <section class="career">
        <div class="container">
            <?php if( $careerTitle ) : ?>
                <h1><?php echo $careerTitle ?></h1>
            <?php endif; ?>
            <div class="row">
                <div class="col-lg-6 career__content">
                    <?php if( $careerTitle ) : ?>
                <?php echo $careerContent ?>
            <?php endif; ?>
                    <?php if( $careerDedicated ) : ?>
                    <div class="career__contentDedicated">
                       <?php echo $careerDedicated ?>
                    </div>
                    <?php endif; ?>
                </div>
                <div class="career__formWrapper col-lg-6">
                    <div class="career__form">
                        <?php echo $careerForm ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php get_footer();?>
<?php 
if(qtranxf_getLanguage() == 'ua'){
    $buttonText = 'Прикріпіть';
}
if(qtranxf_getLanguage() == 'ru'){
    $buttonText = 'Прикрепить';
}
if(qtranxf_getLanguage() == 'en'){
    $buttonText = 'Connect';
}
?>
<script>
    jQuery('.career__form input[type="file"]').on('change', function(event){
		var fileName = event.target.files[0];
        console.log('123');
		if(fileName){
			jQuery('.chose_file_text').html(fileName.name);
    		console.log(fileName.name);
		}
		else{
			jQuery('.chose_file_text').html('<?php echo $buttonText; ?>');
		}
	});
</script>