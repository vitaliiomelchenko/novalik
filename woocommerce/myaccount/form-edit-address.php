<?php
// get the user meta
$userMeta = get_user_meta(get_current_user_id());

// get the form fields
$countries = new WC_Countries();
$billing_fields = $countries->get_address_fields( '', 'billing_' );
$shipping_fields = $countries->get_address_fields( '', 'shipping_' );
?>

<!-- billing form -->
<?php
$load_address = 'billing';
$page_title   = __( 'Billing Address', 'woocommerce' );
?>
<div class="container">
    <div class="page_title">Адреси доставки</div>
    <div class="forms_wrapper">
    <div class="row">
<div class="col-md-6 col-12 form_wrapper">
<form action="/my-account/edit-address/billing/" class="edit-account" method="post">

    <h2><?php echo apply_filters( 'woocommerce_my_account_edit_address_title', $page_title ); ?></h2>

    <?php do_action( "woocommerce_before_edit_address_form_{$load_address}" ); ?>

    <?php foreach ( $billing_fields as $key => $field ) : ?>

        <?php woocommerce_form_field( $key, $field, $userMeta[$key][0] ); ?>

    <?php endforeach; ?>

    <?php do_action( "woocommerce_after_edit_address_form_{$load_address}" ); ?>

    <p>
        <input type="submit" class="button" name="save_address" value="<?php esc_attr_e( 'Save Address', 'woocommerce' ); ?>" />
        <?php wp_nonce_field( 'woocommerce-edit_address' ); ?>
        <input type="hidden" name="action" value="edit_address" />
    </p>

</form>
</div>
<!-- shipping form -->
<?php
$load_address = 'shipping';
$page_title   = __( 'Shipping Address', 'woocommerce' );
?>
<div class="col-md-6 col-12 form_wrapper">
<form class="edit-account" method="post">

    <h2><?php echo apply_filters( 'woocommerce_my_account_edit_address_title', $page_title ); ?></h2>

    <?php do_action( "woocommerce_before_edit_address_form_{$load_address}" ); ?>

    <?php foreach ( $shipping_fields as $key => $field ) : ?>

        <?php woocommerce_form_field( $key, $field, $userMeta[$key][0] ); ?>

    <?php endforeach; ?>

    <?php do_action( "woocommerce_after_edit_address_form_{$load_address}" ); ?>

    <p>
        <input type="submit" class="button" name="save_address" value="<?php esc_attr_e( 'Save Address', 'woocommerce' ); ?>" />
        <?php wp_nonce_field( 'woocommerce-edit_address' ); ?>
        <input type="hidden" name="action" value="edit_address" />
    </p>

</form>
</div>
<?php 
if(qtranxf_getLanguage() == 'ua'){
    $save_button_label = 'Зберегти';
}
if(qtranxf_getLanguage() == 'ru'){
    $save_button_label = 'Сохранить';
}
if(qtranxf_getLanguage() == 'en'){
    $save_button_label = 'Save';
}
?>
<div class="save_form_button_wrapper">
<input type="submit" value="<?php echo $save_button_label; ?>" id="save_form_button">
</div>

</div>
</div>
</div>
<script>
    jQuery('#save_form_button').click(function(){
        location.reload();
    });
</script>