<?php
global $porto_settings, $porto_layout;

$default_layout = porto_meta_default_layout();
$wrapper        = porto_get_wrapper_type();
?>
		<?php get_sidebar(); ?>

		<?php if ( porto_get_meta_value( 'footer', true ) ) : ?>

			<?php

			$cols = 0;
			for ( $i = 1; $i <= 4; $i++ ) {
				if ( is_active_sidebar( 'content-bottom-' . $i ) ) {
					$cols++;
				}
			}

			if ( is_404() ) {
				$cols = 0;
			}

			if ( $cols ) :
				?>
				<?php if ( 'boxed' == $wrapper || 'fullwidth' == $porto_layout || 'left-sidebar' == $porto_layout || 'right-sidebar' == $porto_layout ) : ?>
					<div class="container sidebar content-bottom-wrapper">
					<?php
				else :
					if ( 'fullwidth' == $default_layout || 'left-sidebar' == $default_layout || 'right-sidebar' == $default_layout ) :
						?>
					<div class="container sidebar content-bottom-wrapper">
					<?php else : ?>
					<div class="container-fluid sidebar content-bottom-wrapper">
						<?php
					endif;
				endif;
				?>

				<div class="row">

					<?php
					$col_class = array();
					switch ( $cols ) {
						case 1:
							$col_class[1] = 'col-md-12';
							break;
						case 2:
							$col_class[1] = 'col-md-12';
							$col_class[2] = 'col-md-12';
							break;
						case 3:
							$col_class[1] = 'col-lg-4';
							$col_class[2] = 'col-lg-4';
							$col_class[3] = 'col-lg-4';
							break;
						case 4:
							$col_class[1] = 'col-lg-3';
							$col_class[2] = 'col-lg-3';
							$col_class[3] = 'col-lg-3';
							$col_class[4] = 'col-lg-3';
							break;
					}
					?>
						<?php
						$cols = 1;
						for ( $i = 1; $i <= 4; $i++ ) {
							if ( is_active_sidebar( 'content-bottom-' . $i ) ) {
								?>
								<div class="<?php echo esc_attr( $col_class[ $cols++ ] ); ?>">
									<?php dynamic_sidebar( 'content-bottom-' . $i ); ?>
								</div>
								<?php
							}
						}
						?>

					</div>
				</div>
			<?php endif; ?>

			</div><!-- end main -->

			<?php
			do_action( 'porto_after_main' );
			$footer_view = porto_get_meta_value( 'footer_view' );
			?>
			<footer class="footer">
			    <div class="container">
			        <div class="row align-items-start justify-content-center justify-content-md-between">
			            <div class="col-12 col-sm-8 col-lg-3">
			                <div class="logo">
			                    <img src="<?php echo get_template_directory_uri() ?>/images/logo.svg" alt="">
			                </div>
			            </div>
			            <div class="col-12 col-sm-8 col-lg-3">
			                <div class="footer-col footer-contacts">
			                    <a href="tel:+38 (044) 390-36-46" class="footer-link">+38 (044) 390-36-46</a>
			                    <a href="tel:+38 (067) 445-91-50" class="footer-link">+38 (067) 445-91-50</a>
			                    <a href="mailto:info@novalik.com" class="footer-link">info@novalik.com</a>
			                </div>
			            </div>
			            <div class="col-12 col-sm-8 col-lg-3">
			                <ul class="footer-col footer-nav">
			                    <li>
			                        <a href="#" class="footer-link">Про компанію</a>
			                    </li>
			                    <li>
			                        <a href="#" class="footer-link">Кар'єра</a>
			                    </li>
			                    <li>
			                        <a href="#" class="footer-link">Продукція</a>
			                    </li>
			                    <li>
			                        <a href="#" class="footer-link">Блог</a>
			                    </li>
			                </ul>
			            </div>
			            <div class="col-12 col-sm-8 col-lg-3">
			                <div class="footer-col footer-links">
			                    <a href="#" class="footer-link">Договір публічної оферти</a>
			                    <a href="#" class="footer-link">Політика конфіденційності</a>
			                    <a href="#" class="footer-link">Правила та умови</a>
			                </div>
			            </div>
			            <div class="col-12 col-sm-8 col-lg-2 d-block d-md-none">
			                <div class="footer-socials">
			                    <a href="#"><img src="<?php echo get_template_directory_uri() ?>/images/soc-1.svg" alt="linkedin"></a>
			                    <a href="#"><img src="<?php echo get_template_directory_uri() ?>/images/soc-2.svg" alt="fb"></a>
			                    <a href="#"><img src="<?php echo get_template_directory_uri() ?>/images/soc-3.svg" alt="insta"></a>
			                    <a href="#"><img src="<?php echo get_template_directory_uri() ?>/images/soc-4.svg" alt="youtube"></a>
			                </div>
			            </div>
			            <div class="col-12 col-sm-8 col-lg-3 d-block d-md-none">
			                <div class="footer-payments d-flex align-items-center">
			                    <div class="item mr-1">
			                        <img src="<?php echo get_template_directory_uri() ?>/images/visa.svg" alt="">
			                    </div>
			                    <div class="item mr-1">
			                        <img src="<?php echo get_template_directory_uri() ?>/images/mastercard.svg" alt="">
			                    </div>
			                </div>
			            </div>
			        </div>
			        <div class="footer-bottom">
			            <div class="row align-items-center justify-content-between">
			                <div class="col-12 col-sm-8 col-lg-4">
			                    <div class="copyright">
			                        © 2021 «Новалік-Фарма» Усі права збережено
			                    </div>
			                </div>
			                <div class="col-12 col-sm-8 col-lg-3 d-none d-md-block">
			                    <div class="footer-payments d-flex align-items-center">
			                        <div class="item mr-1">
			                            <img src="<?php echo get_template_directory_uri() ?>/images/visa.svg" alt="">
			                        </div>
			                        <div class="item mr-1">
			                            <img src="<?php echo get_template_directory_uri() ?>/images/mastercard.svg" alt="">
			                        </div>
			                    </div>
			                </div>
			                <div class="col-12 col-sm-8 col-lg-2 d-none d-md-block">
			                    <div class="footer-socials">
			                        <a href="#"><img src="<?php echo get_template_directory_uri() ?>/images/soc-1.svg" alt="linkedin"></a>
			                        <a href="#"><img src="<?php echo get_template_directory_uri() ?>/images/soc-2.svg" alt="fb"></a>
			                        <a href="#"><img src="<?php echo get_template_directory_uri() ?>/images/soc-3.svg" alt="insta"></a>
			                        <a href="#"><img src="<?php echo get_template_directory_uri() ?>/images/soc-4.svg" alt="youtube"></a>
			                    </div>
			                </div>
			                <div class="col-12 col-sm-8 col-lg-2">
			                    <div class="by">
			                        by<a href="#" target="_blank">Level Media</a>
			                    </div>
			                </div>
			            </div>
			        </div>
			    </div>
			</footer>

		<?php else : ?>

			</div><!-- end main -->

			<?php
			do_action( 'porto_after_main' );
		endif;
		?>

	</div><!-- end wrapper -->
	<?php do_action( 'porto_after_wrapper' ); ?>

<?php

if ( isset( $porto_settings['mobile-panel-type'] ) && 'side' === $porto_settings['mobile-panel-type'] ) {
	// navigation panel
	get_template_part( 'panel' );
}

?>

<div class="modal fade alert-modal" tabindex="-1" role="dialog" id="alert-modal">
    <div class="modal-dialog" role="document">
        <div id="the-alert" class="the-alert">
            
        </div>
        <div id="alert-actions" class="alert-actions">
            
        </div>
        <div class="clearfix"></div>
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!--[if lt IE 9]>
<script src="<?php echo esc_url( PORTO_JS ); ?>/libs/html5shiv.min.js"></script>
<script src="<?php echo esc_url( PORTO_JS ); ?>/libs/respond.min.js"></script>
<![endif]-->

<?php wp_footer(); ?>

<?php
// js code (Theme Settings/General)
if ( isset( $porto_settings['js-code'] ) && $porto_settings['js-code'] ) {
	?>
	<script>
		<?php echo porto_filter_output( $porto_settings['js-code'] ); ?>
	</script>
<?php } ?>
<?php if ( isset( $porto_settings['page-share-pos'] ) && $porto_settings['page-share-pos'] ) : ?>
	<div class="page-share position-<?php echo esc_attr( $porto_settings['page-share-pos'] ); ?>">
		<?php get_template_part( 'share' ); ?>
	</div>
<?php endif; ?>
</body>
</html>
