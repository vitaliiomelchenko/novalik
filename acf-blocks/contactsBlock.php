<?php 
	$contactUsBlockForm = get_sub_field('cta_form_shortcode');
?>
<section class="contactsPage">
	<div class="container">
		<h1><?php the_title(); ?></h1>

		<div class="contactsPage__items">
			<div class="row align-items-start justify-content-between">
				<?php
				if( have_rows('contacts_repeater') ):

				    while ( have_rows('contacts_repeater') ) : the_row();
						$contacts_repeater_icon = the_sub_field('contacts_repeater_icon');
				        ?>
				        	<div class="mb-3 mb-lg-0 сol-12 col-sm-6 col-md-4 col-lg-3">
				        		<div class="item">
				        			<?php if( !empty( $contacts_repeater_icon ) ): ?>
				        				<div class="icon">
											<?php echo file_get_contents(esc_url(wp_get_original_image_path($contacts_repeater_icon['id']))); ?>
				        				</div>
				        			<?php endif; ?>
				        			
				        			<div class="text">
				        				<?php the_sub_field('contacts_repeater_text'); ?>
				        			</div>
				        		</div>
				        	</div>
				        <?php

				    endwhile;

				endif;

				?>
			</div>
		</div>
		<div class="contactsPage__cta">
			<?php echo do_shortcode( $contactUsBlockForm ); ?>
		</div>
	</div>
	<div class="contactsPage__map">
		<?php the_sub_field('map'); ?>
	</div>
</section>