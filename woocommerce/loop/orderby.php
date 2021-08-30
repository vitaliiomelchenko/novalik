<?php

/**
 * Show options for ordering
 *
 * @version     3.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<form class="woocommerce-ordering" method="get">
	<label><?php esc_html_e( '[:ua]Сортування[:en]Sort by[:ru]Сортировка', 'porto' ); ?>: </label>
	<select name="orderby" class="orderby" aria-label="<?php esc_attr_e( 'Shop order', 'woocommerce' ); ?>" style="display:none;">
		<?php foreach ( $catalog_orderby_options as $id => $name ) : ?>
			<option value="<?php echo esc_attr( $id ); ?>" <?php selected( $orderby, $id ); ?>><?php echo esc_html( $name ); ?></option>
		<?php endforeach; ?>
	</select>
	<input type="hidden" name="paged" value="1" />


</form>
<?php 
if(is_product_category()){
	$cate = get_queried_object();
	$cateID = '/product-category/' . $cate->slug;
}
else{
	$cateID = "/produkcziya";
}
?>
<?php 
if(qtranxf_getLanguage() == 'ua'){
	$sort_by_rating_label = 'Спочатку за рейтингом';
	$sort_by_price_label = 'Спочатку від дешевих';
	$sort_by_price_desc_label = 'Спочатку від дорогих';
}
if(qtranxf_getLanguage() == 'ru'){
	$sort_by_rating_label = 'Сначала по рейтингу';
	$sort_by_price_label = 'Сначала от дешевых';
	$sort_by_price_desc_label = 'Сначала от дорогих';
}
if(qtranxf_getLanguage() == 'en'){
	$sort_by_rating_label = 'From the most popular';
	$sort_by_price_label = 'From the cheapest';
	$sort_by_price_desc_label = 'From the most expensive';
}
?>
<div class="product_orderby_wrapper">
	<div class="orderby_title"><?php echo $sort_by_rating_label; ?></div>
	<ul class="product_orderby">
		<li class="popularity"><a href="<?php echo get_home_url() . $cateID . '/'; ?>"><?php echo $sort_by_rating_label; ?></a></li>
		<li class="price"><a href="<?php echo get_home_url() . $cateID . '/?orderby=price&paged=1'; ?>"><?php echo $sort_by_price_label; ?></a></li>
		<li class="price-desc"><a href="<?php echo get_home_url() . $cateID . '/?orderby=price-desc&paged=1'; ?>"><?php echo $sort_by_price_desc_label; ?></a></li>
	</ul>
</div>