<?php

global $porto_settings;

$js_wc_prdctfltr = false;
if ( class_exists( 'WC_Prdctfltr' ) ) {
	$porto_settings['category-ajax'] = false;
}

if ( $porto_settings['category-ajax'] ) {
	// fix price slider issue
	$suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
	wp_register_script( 'wc-jquery-ui-touchpunch', WC()->plugin_url() . '/assets/js/jquery-ui-touch-punch/jquery-ui-touch-punch' . $suffix . '.js', array( 'jquery-ui-slider' ), WC_VERSION, true );
	wp_register_script( 'wc-price-slider', WC()->plugin_url() . '/assets/js/frontend/price-slider' . $suffix . '.js', array( 'jquery-ui-slider', 'wc-jquery-ui-touchpunch' ), WC_VERSION, true );
	wp_enqueue_script( 'wc-price-slider' );
}
?>
<div class="shop_page_container">
	<div class="row">

<?php
	/**
	 * Hook: woocommerce_before_main_content.
	 *
	 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
	 * @hooked woocommerce_breadcrumb - 20
	 * @hooked WC_Structured_Data::generate_website_data() - 30
	 */
	//do_action( 'woocommerce_before_main_content' );
?>



<?php
	/**
	 * Hook: woocommerce_archive_description.
	 *
	 * @hooked woocommerce_taxonomy_archive_description - 10
	 * @hooked woocommerce_product_archive_description - 10
	 */
	do_action( 'woocommerce_archive_description' );
?>

<?php if ( ( function_exists( 'woocommerce_product_loop' ) && woocommerce_product_loop() ) || ( ! function_exists( 'woocommerce_product_loop' ) && have_posts() ) ) { ?>
	<?php do_action( 'woocommerce_sidebar' ); ?>
	<div class="col-lg-9 col-12 archive-products-wrapper">
	<?php
		/**
		 * Hook: woocommerce_before_shop_loop.
		 *
		 * @hooked woocommerce_output_all_notices - 10
		 * @hooked woocommerce_result_count - 20
		 * @hooked woocommerce_catalog_ordering - 30
		 */
		do_action( 'woocommerce_before_shop_loop' );
	?>

	

	<div class="archive-products">
		
		<?php woocommerce_product_loop_start(); ?>
		<?php
		$query_args = array(
			'posts_per_page'   => 12,
    		'order'            => 'DESC',
    		'orderby'          => 'post_views',  //required param
		);
		$query = new WP_Query( $query_args );
		if ( ! function_exists( 'wc_get_loop_prop' ) || wc_get_loop_prop( 'total' ) ) {
			while ( have_posts() ) {
				the_post();

				/**
				 * Hook: woocommerce_shop_loop.
				 *
				 * @hooked WC_Structured_Data::generate_product_data() - 10
				 */
				do_action( 'woocommerce_shop_loop' );?>
 
				<div class="product_wrapper col-lg-4 col-md-6 col-12"><?php wc_get_template_part( 'content', 'product' ); ?></div>
				<?php
			}
		}
		?>
		<?php woocommerce_product_loop_end(); ?>

	</div>
	<?php 
		if(qtranxf_getLanguage() == 'ua'){
			$load_more_button_label = 'Показати ще товари';
		}
		if(qtranxf_getLanguage() == 'ru'){
			$load_more_button_label = 'Показать еще товары';
		}
		if(qtranxf_getLanguage() == 'en'){
			$load_more_button_label = 'Load more products';
		}
	?>
	<div class="misha_loadmore"><span><?php echo $load_more_button_label; ?></span></div>
	<?php
		/**
		 * Hook: woocommerce_after_shop_loop.
		 *
		 * @hooked woocommerce_pagination - 10
		 */
		//do_action( 'woocommerce_after_shop_loop' );

		$args = array(
			'show_all'     => false, // показаны все страницы участвующие в пагинации
			'end_size'     => 1,     // количество страниц на концах
			'mid_size'     => 3,     // количество страниц вокруг текущей
			'prev_next'    => true,  // выводить ли боковые ссылки "предыдущая/следующая страница".
			'prev_text'    => __(''),
			'next_text'    => __(''),
			'add_args'     => false, // Массив аргументов (переменных запроса), которые нужно добавить к ссылкам.
			'add_fragment' => '',     // Текст который добавиться ко всем ссылкам.
			'screen_reader_text' => __( '' ),
		);
		the_posts_pagination( $args );
		
	?>
	</div>

	<?php
} else {

	global $porto_shop_filter_layout;
	if ( isset( $porto_shop_filter_layout ) && 'horizontal2' == $porto_shop_filter_layout ) {
		do_action( 'woocommerce_before_shop_loop' );
	} else {
		?>
	<div class="shop-loop-before clearfix" style="display:none;"> </div>
<?php } ?>

	<div class="archive-products">
	<?php
		/**
		 * Hook: woocommerce_no_products_found.
		 *
		 * @hooked wc_no_products_found - 10
		 */
		do_action( 'woocommerce_no_products_found' );
	?>
	</div>

	<div class="shop-loop-after clearfix" style="display:none;"> </div>

	<?php
}
	/**
	 * Hook: woocommerce_after_main_content.
	 *
	 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
	 */
	//do_action( 'woocommerce_after_main_content' );
?>
</div>
</div>
<script>
	jQuery(document).ready(function(){
		jQuery('.archive-products .product .single_add_to_cart_button').html('Купити');
	});
	jQuery(document).ready(function(){
		jQuery('.orderby_title').click(function(){
			jQuery(this).parent().find('.product_orderby').slideToggle(200);
		});
		jQuery('.mobile_categories_opener').click(function(){
			jQuery(this).parent().find('.sidebar-content').slideToggle();
			console.log(123);
		});
	});

</script>