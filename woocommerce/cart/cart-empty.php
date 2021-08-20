<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$porto_woo_version = porto_get_woo_version_number();
?>
<div class="cart_container empty_cart_container">
	<h2 class="heading-primary m-b-md font-weight-normal clearfix">
		<span><?php esc_html_e( 'Cart', 'woocommerce' ); ?></span>
		<a href="<?php echo esc_url( wc_get_checkout_url() ); ?>" class="btn btn-primary pull-right proceed-to-checkout"><?php esc_html_e( 'Checkout', 'woocommerce' ); ?></a>
	</h2>
    <div class="row">
        <div class="empty_cart_label">
            <?php do_action( 'woocommerce_cart_is_empty' ); ?>
        </div>
        <div class="return-to-shop">
            <a class="button wc-backward" href="<?php echo esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ); ?>">
                <?php esc_html_e( 'Return to shop', 'woocommerce' ); ?>
            </a>
        </div>
    </div>
</div>
