<?php
/**
 * My Account Dashboard
 *
 * Shows the first intro screen on the account dashboard.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/dashboard.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce/Templates
 * @version     2.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>
<?php 
if(qtranxf_getLanguage() == 'ua'){
	$edit_account = 'Персональні дані';
	$edit_address = 'Адреси доставки';
	$orders = 'Історія замовлень';
	$exit = 'Вийти';
}
if(qtranxf_getLanguage() == 'ru'){
	$edit_account = 'Персональные данные';
	$edit_address = 'Адреса доставки';
	$orders = 'История заказов';
	$exit = 'Выйти';
}
if(qtranxf_getLanguage() == 'en'){
	$edit_account = 'Personal data';
	$edit_address = 'Shipping addresses';
	$orders = 'Orders';
	$exit = 'Exit';
}
?>
<div class="container">
	<div class="dashboard">
		<div class="dashboard_top">
			<div class="dashboard_title"><?php the_title(); ?></div>
			<div class="dashboard_log_out"><a href="<?php echo wp_logout_url( get_permalink( wc_get_page_id( 'myaccount' ) ) ) ?>"><?php echo $exit; ?></a></div>
		</div>

		<ul class="dashboard_list">
			<li class="dashboar_list_item"><a href="<?php echo get_home_url() . '/my-account/edit-account' ?>"><img src="<?php echo get_stylesheet_directory_uri() . '/assets/img/edit_account_icon.svg' ?>"><?php echo $edit_account; ?></a></li>
			<li class="dashboar_list_item"><a href="<?php echo get_home_url() . '/my-account/edit-address' ?>"><img src="<?php echo get_stylesheet_directory_uri() . '/assets/img/edit_address_icon.svg' ?>"><?php echo $edit_address ?></a></li>
			<li class="dashboar_list_item"><a href="<?php echo get_home_url() . '/my-account/orders' ?>"><img src="<?php echo get_stylesheet_directory_uri() . '/assets/img/orders_icon.svg' ?>"><?php echo $orders ?></a></li>
		</ul>
	</div>
</div>
