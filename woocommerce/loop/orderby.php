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

<div class="product_orderby_wrapper">
	<div class="orderby_title"><?php _e('Спочатку за рейтингом'); ?></div>
	<ul class="product_orderby">
		<li class="popularity"><a href="<?php echo get_home_url() . $cateID . '/'; ?>"><?php _e('Спочатку за рейтингом'); ?></a></li>
		<li class="price"><a href="<?php echo get_home_url() . $cateID . '/?orderby=price&paged=1'; ?>"><?php _e('Спочатку від дешевих'); ?></a></li>
		<li class="price-desc"><a href="<?php echo get_home_url() . $cateID . '/?orderby=price-desc&paged=1'; ?>"><?php _e('Спочатку від дорогих'); ?></a></li>
	</ul>
</div>