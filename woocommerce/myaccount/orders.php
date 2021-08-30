<?php
/**
 * Orders
 *
 * Shows orders on the account page.
 *
 * @version 3.2.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<?php 
if(qtranxf_getLanguage() == 'ua'){
	$completed = 'Виконано';
    $cancelled = 'Відмінено';
    $processing = 'В обробці';
    $total_label = 'Разом';
    $subtotal_label = 'Підсумок';
    $shipping = 'Доставка';
    $page_title = 'Історія замовлень';
    $order_label = 'Замовлення';
    $customer_info_title = 'Інформація про замовника';
    $repeat_order_button_text = 'Повторити замовлення';
}
if(qtranxf_getLanguage() == 'ru'){
    $completed = 'Выполнено';
    $cancelled = 'Отменено';
    $processing = 'В обработке';
    $total_label = 'Итог';
    $subtotal_label = 'Подитог';
    $shipping = 'Доставка';
    $page_title = 'История заказов';
    $order_label = 'Заказ';
    $customer_info_title = 'Информация о заказчике';
    $repeat_order_button_text = 'Повторить заказ';
}
if(qtranxf_getLanguage() == 'en'){
    $completed = 'Completed';
    $cancelled = 'Cancelled';
    $processing = 'Processing';
    $total_label = 'Total';
    $subtotal_label = 'Subtotal';
    $shipping = 'Shipping';
    $page_title = 'Orders';
    $order_label = 'Order';
    $customer_info_title = 'Customer information';
    $repeat_order_button_text = 'Repeat the order';
}
?>
<div class="container">
    <div class="orders_page_title"><?php echo $page_title; ?></div>
<?php do_action( 'woocommerce_before_account_orders', $has_orders ); ?>

<?php if ( $has_orders ) : ?>

	<div class="woocommerce-orders-table woocommerce-MyAccount-orders shop_table shop_table_responsive my_account_orders account-orders-table">
			<?php
			foreach ( $customer_orders->orders as $customer_order ) :
				$order      = wc_get_order( $customer_order );
				$item_count = $order->get_item_count();
				?>
                    
                    <?php 
                        $order_items           = $order->get_items( apply_filters( 'woocommerce_purchase_order_item_types', 'line_item' ) );
                        $show_purchase_note    = $order->has_status( apply_filters( 'woocommerce_purchase_note_order_statuses', array( 'completed', 'processing' ) ) );
                        $show_customer_details = is_user_logged_in() && $order->get_user_id() === get_current_user_id();
                        $downloads             = $order->get_downloadable_items();
                        $show_downloads        = $order->has_downloadable_item() && $order->is_download_permitted();
                    ?>
                    <div class="woocommerce-orders-table__row woocommerce-orders-table__row--status-<?php echo esc_attr( $order->get_status() ); ?> order">
                        <div class="order_head">
                            <div class="order_head_number order_head_time"><?php echo $order_label; ?> №<?php echo $order->get_order_number(); ?>, <time datetime="<?php echo esc_attr( $order->get_date_created()->date( 'c' ) ); ?>"><?php echo esc_html( wc_format_datetime( $order->get_date_created() ) ); ?></time></div>
                            <div class="order_status <?php echo $order->get_status(); ?>"><?php if($order->get_status() == "processing"){ echo $processing; }elseif($order->get_status() == 'completed'){ echo $completed; }elseif( $order->get_status() == "cancelled" ){ echo $cancelled; } ?></div>
                        </div>
                        <?php
                            do_action( 'woocommerce_order_details_before_order_table_items', $order );

                            foreach ( $order_items as $item_id => $item ) {
                                $product = $item->get_product();

                                wc_get_template(
                                    'order/order-details-item.php',
                                    array(
                                        'order'              => $order,
                                        'item_id'            => $item_id,
                                        'item'               => $item,
                                        'show_purchase_note' => $show_purchase_note,
                                        'purchase_note'      => $product ? $product->get_purchase_note() : '',
                                        'product'            => $product,
                                    )
                                );
                            }

                            do_action( 'woocommerce_order_details_after_order_table_items', $order );
                        ?>
                        <div class="order_bottom">  
                            <div class="left_side">
                                <div class="left_side_titla"><?php echo $customer_info_title; ?></div>
                                <div class="address"><?php echo $shipping_address['address_1'] ?></div>
                                <div class="payment_method"><?php echo $order->get_payment_method_title(); ?></div>
                                <div class="name"><?php echo $shipping_address['first_name'] . $shipping_address['last_name']; ?></div>
                                <div class="phone_number"><?php echo $order->get_billing_phone() ?></div>
                            </div>
                            <?php $currency_symbol = get_woocommerce_currency_symbol( get_woocommerce_currency() ); ?>
                            <div class="right_side">
                                <div class="subtotal"><?php echo $subtotal_label . ' ' . number_format($order->get_subtotal(), 0, '.', ' ') . $currency_symbol; ?></div>
                                <div class="shipping"><?php echo $shipping . ' ' ?></div>
                                <div class="total"><?php echo $total_label . ' ' . number_format($order->get_total(), 0, '.', ' ') . $currency_symbol; ?></div>
                            </div>
                        </div>
                        <div class="repeat_order_button_wrapper"><a href="<?php echo wp_nonce_url( add_query_arg( 'order_again', $order->get_id(), wc_get_cart_url() ), 'woocommerce-order_again' ); ?>"><?php echo $repeat_order_button_text; ?></a></div>
                    </div>
                    <?php $shipping_address = $order->get_address('billing'); ?>
                    
            <?php endforeach; ?>
            
	</div>

	<?php do_action( 'woocommerce_before_account_orders_pagination' ); ?>

	<?php if ( 1 < $customer_orders->max_num_pages ) : ?>
		<div class="woocommerce-pagination woocommerce-pagination--without-numbers woocommerce-Pagination">
			<?php if ( 1 !== $current_page ) : ?>
				<a class="woocommerce-button woocommerce-button--previous woocommerce-Button woocommerce-Button--previous button" href="<?php echo esc_url( wc_get_endpoint_url( 'orders', $current_page - 1 ) ); ?>"><?php esc_html_e( 'Previous', 'porto' ); ?></a>
			<?php endif; ?>

			<?php if ( intval( $customer_orders->max_num_pages ) !== $current_page ) : ?>

				<a class="woocommerce-button woocommerce-button--next woocommerce-Button woocommerce-Button--next button" href="<?php echo esc_url( wc_get_endpoint_url( 'orders', $current_page + 1 ) ); ?>"><?php esc_html_e( 'Next', 'porto' ); ?></a>

			<?php endif; ?>
		</div>
	<?php endif; ?>

<?php else : ?>
	<div class="woocommerce-message--info woocommerce-Message woocommerce-Message--info">
		<p><?php esc_html_e( 'No order has been made yet.', 'porto' ); ?></p>
		<a class="woocommerce-Button button btn-lg m-b" href="<?php echo esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ); ?>">
			<?php esc_html_e( 'Go Shop', 'porto' ); ?>
		</a>
	</div>
<?php endif; ?>

<?php do_action( 'woocommerce_after_account_orders', $has_orders ); ?>
</div>