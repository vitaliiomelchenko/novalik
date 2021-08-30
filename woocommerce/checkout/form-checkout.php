<?php
/**
 * Checkout Form V1
 *
 * @version     3.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<div class="checkout_page_container">
    <div class="page_title"><?php the_title(); ?></div>
<?php
$porto_woo_version = porto_get_woo_version_number();
$checkout          = WC()->checkout();

$uid = get_current_user_id();
if(qtranxf_getLanguage() == 'ua') $required = "*";
if(qtranxf_getLanguage() == 'ru') $required = '*';
if(qtranxf_getLanguage() == 'en') $required = '*';

// filter hook for include new pages inside the payment method
$get_checkout_url = version_compare( $porto_woo_version, '2.5', '<' ) ? apply_filters( 'woocommerce_get_checkout_url', WC()->cart->get_checkout_url() ) : wc_get_checkout_url(); ?>

<form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url( $get_checkout_url ); ?>" enctype="multipart/form-data">

	<?php if ( sizeof( $checkout->checkout_fields ) > 0 ) : ?>

		<?php //do_action( 'woocommerce_checkout_before_customer_details' ); ?>

		<div class="row" id="customer_details">
			<div class="col-lg-8 checkout_fields_wrapper">
				<div class="featured-box bg-white featured-box-primary align-left">
					<div class="box-content">
						<div class="checkout-group-heading"><?=__('Customer','woocommerce')?></div>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<input type="text" class="input-text required" name="billing_first_name" id="billing_first_name" placeholder="<?=__('First name','woocommerce')?> <?=$required?>" value="<?= get_user_meta($uid,'billing_first_name',true)?>" autocomplete="given-name">
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<input type="tel" class="input-text phone-mask required" name="billing_phone" id="billing_phone" placeholder="<?=__('Phone','woocommerce')?> <?=$required?>" value="<?= get_user_meta($uid,'billing_phone',true)?>" autocomplete="tel">
								</div>
							</div>
						</div>
                        <div class="row">
                            <div class="col-sm-12"><?php do_action( 'woocommerce_checkout_shipping' ); ?></div>
                        </div>
						<?php
								if(qtranxf_getLanguage() == 'ua') $np = 'Нова Пошта';
								if(qtranxf_getLanguage() == 'ru') $np = 'Новая Почта';
								if(qtranxf_getLanguage() == 'en') $np = 'Nova Poshta';
							?>
						<div class="checkout-group-heading"><?=__('Shipping','woocommerce')?> - <?=$np?></div>
						
						<?php /* if ( WC()->cart->needs_shipping() && WC()->cart->show_shipping() ) : ?>

							<?php do_action( 'woocommerce_review_order_before_shipping' ); ?>
				
							<?php wc_cart_totals_shipping_html(); ?>
				
							<?php do_action( 'woocommerce_review_order_after_shipping' ); ?>
				
						<?php endif; */ ?>
						
						<div class="form-group" id="billing_nova_poshta_city_box">
							<?php
								if(qtranxf_getLanguage() == 'ua') $city = 'Місто';
								if(qtranxf_getLanguage() == 'ru') $city = 'Город';
								if(qtranxf_getLanguage() == 'en') $city = 'City';
							?>
							<i class="fa fa-search"></i>
							<input type="text" class="input-text required" name="billing_city" id="billing_nova_poshta_city" placeholder="<?=$city?> <?=$required?>" value="" autocomplete="off" data-action="<?=admin_url('admin-ajax.php')?>">
							<?php
								if($cities = get_option('np_cities')){
									// It's cool.
								} else {
									$np = new NP('922f4924b7824d99eb184d90d73134e2', 'ua', FALSE, 'curl');
								    $cities = $np->getCities();
								    
								    update_option('np_cities', $cities);
								}
							    
							    echo '<div class="dd dd-cities" id="dd-billing_state" style="display:none;">';
							    echo '<ul class="reel">';
							    
							    $primarycity = qtranxf_getLanguage() == 'ua' ? 'Description' : 'DescriptionRu';
							    $altcity = qtranxf_getLanguage() == 'ua' ? 'DescriptionRu' : 'Description';
							    
							    foreach($cities['data'] as $city){
							        echo '<li data-ref="'.$city['Ref'].'"><span class="city-ru">'.$city[$primarycity].'</span> <span class="city-ua fixhide">'.$city[$altcity].'</span></li>';
							    }
							    
							    echo '</ul>';
							    echo '</div>';
							    
							    /* if(current_user_can('administrator')){
								    echo '<div>';
								    $np = new NP('922f4924b7824d99eb184d90d73134e2', 'ua', FALSE, 'curl');
								    $n = 0; foreach($cities['data'] as $city){ $n++;
									    if($n>=1000){
								        $result = $np->getWarehouses($city['Ref']);
										echo '<select type="text" class="input-text d-group" data-ref="'.$city['Ref'].'">';
										$n = 0; foreach($result['data'] as $department){ $n++;
										    echo '<option>'.$department['DescriptionRu'].'</option>';
										}
										echo '</select>';
										}
								    }
								    echo '</div>';
							    } */
							?>
						</div>
						<div class="form-group">
							<?php
								if(qtranxf_getLanguage() == 'ua') $warehouse = 'Номер відділення';
								if(qtranxf_getLanguage() == 'ru') $warehouse = 'Номер отделения';
								if(qtranxf_getLanguage() == 'en') $warehouse = 'Warehouse';
							?>
							<input type="text" class="input-text required" name="warehouse" id="warehouse" placeholder="<?=$warehouse?> <?=$required?>">
							<?php /*
							<select type="text" class="input-text " name="dd-departments" id="dd-departments">
								<option disabled="" selected=""><?=$warehouse?></option>
							</select>
							*/ ?>
						</div>
						<div class="form-group none">
							<input type="text" class="input-text " name="billing_address_1" id="billing_address_1" placeholder="<?=__('Address','woocommerce')?>" value="" autocomplete="address-line1">
						</div>
						<div class="checkout-group-heading"><?=__('Billing details','woocommerce')?></div>
						
						<div id="order_review" class="woocommerce-checkout-review-order">
	                		<?php woocommerce_checkout_payment(); ?>
	                	</div>
					</div>
				</div>
			</div>

			<div class="col-lg-4 checkout_total_wrapper">
                <div class="checkout_total">
				    <div class="checkout-order-review featured-box featured-box-primary align-left">
				    	<div class="box-content">
				    		<div id="order_review_heading" class="checkout_review_title"><?=__('Your order','woocommerce')?></div>
                                
				    		<div class="shop_table woocommerce-checkout-review-order-table">
	                        	<?php get_template_part('woocommerce/checkout/order-details'); ?>
		                        <div class="order-total account-box">
		                        	<div class="icon pull-left">
		                        		<span class="glyphicon glyphicon-usd"></span>
		                        	</div>
		                        	<div class="right">
		                        		<div><?php _e( 'Total', 'woocommerce' ); ?></div>
		                                <div><?php wc_cart_totals_order_total_html(); ?></div>
		                        	</div>
		                        </div>
		                    </div>
				    	</div>
				    </div>
				    <?php wc_get_template( 'checkout/terms.php' ); ?>
				    <?php echo apply_filters( 'woocommerce_order_button_html', '<button type="submit" class="btn btn-primary btn-lg" name="woocommerce_checkout_place_order" id="place_order" value="' . __( 'Place order', 'woocommerce' ) . '" data-value="' . __( 'Place order', 'woocommerce' ) . '">'. __( 'Place order', 'woocommerce' ) .'</button><img src="'.$img.'" srcset="'.$img_2x.'" alt="loader"/>' ); // @codingStandardsIgnoreLine ?>

		<?php do_action( 'woocommerce_review_order_after_submit' ); ?>

		<?php wp_nonce_field( 'woocommerce-process_checkout', 'woocommerce-process-checkout-nonce' ); ?>
		
		<div class="form-row place-order">
					<noscript>
						<?php /* translators: $1 and $2 opening and closing emphasis tags respectively */ ?>
						<?php printf( esc_html__( 'Поскольку ваш браузер не поддерживает JavaScript или он отключен, убедитесь, что вы нажали кнопку %1$sUpdate Totals%2$s перед оформлением заказа. С вас может быть снята сумма, превышающая указанную выше сумму, если вы этого не сделаете.', 'porto' ), '<em>', '</em>' ); ?>
						<br/><button type="submit" class="button alt" name="woocommerce_checkout_update_totals" value="<?php esc_attr_e( 'Обновление итогов', 'porto' ); ?>"><?php esc_html_e( 'Обновление итогов', 'porto' ); ?></button>
					</noscript>
			
					<?php do_action( 'woocommerce_review_order_before_submit' ); ?>
			
					<?php if ( 'v2' == porto_checkout_version() ) : ?>
			
						<h3>
							<?php _e('Total','woocommerce'); ?>:&nbsp;&nbsp;
							<span><?php wc_cart_totals_order_total_html(); ?></span>
						</h3>
			
					<?php endif; ?>
				</div>
			</div>
            </div>
		</div>

		<?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>

	<?php endif; ?>

</form>
</div>
<?php 
    if(qtranxf_getLanguage() == 'ua' ){
        $textareaPlaceholder = 'Примітки до замовлення';
    }
    elseif(qtranxf_getLanguage() == 'ru'){
        $textareaPlaceholder = 'Примечания к заказу';
    }
    elseif(qtranxf_getLanguage() == 'en'){
        $textareaPlaceholder = 'Notes to the order';
    }
?>
<script>
    jQuery(document).ready(function(){
        jQuery('.woocommerce-additional-fields__field-wrapper #order_comments_field textarea').attr('placeholder', '<?php echo $textareaPlaceholder; ?>')
    });
</script>