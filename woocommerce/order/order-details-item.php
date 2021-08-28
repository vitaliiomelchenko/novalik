<?php
/**
 * Order Item Details
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/order/order-details-item.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! apply_filters( 'woocommerce_order_item_visible', true, $item ) ) {
	return;
}
?>
<div class="<?php echo esc_attr( apply_filters( 'woocommerce_order_item_class', 'woocommerce-table__line-item order_item', $item, $order ) ); ?>">
	<?php
		$is_visible        = $product && $product->is_visible();
		$product_permalink = apply_filters( 'woocommerce_order_item_permalink', $is_visible ? $product->get_permalink( $item ) : '', $item, $order );
	?>
	<div class="product-image">
		<?php echo $product->get_image(); ?>
	</div>
	<div class="order-item-data">
		<div class="product-title">
			<?php echo $item->get_name(); ?>
		</div>
		<div class="product-price">
			<?php echo $product->get_price_html(); ?>
		</div>
		<div class="quantity">
			<?php echo $item->get_quantity() . ' уп'; ?>
		</div>
	</div>
	<div class="total-price">
		<?php echo $order->get_formatted_line_subtotal( $item );; ?>
	</div>
</div>