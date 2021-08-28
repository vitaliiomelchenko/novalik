<?php
/**
 * Edit account form
 *
 * @version     3.5.0
 */

defined( 'ABSPATH' ) || exit;?>
<div class="container">
    <?php 
        if(qtranxf_getLanguage() == 'ua'){
            $title = 'Персональні дані';
            $back_button_text = 'Повернутися назад';
        }
        if(qtranxf_getLanguage() == 'ru'){
            $title = 'Персональные данные';
            $back_button_text = 'Вернуться назад';
        }
        if(qtranxf_getLanguage() == 'en'){
            $title = 'Personal Data';
            $back_button_text = 'Go back';
        }
        ?>
    <div class="page_title_wrapper">
        
        <div class="edit_account_page_title">
            <?php echo $title; ?>
        </div>
        <a class="back_button" href="<?php echo get_home_url() . '/my-account' ?>">← <?php echo $back_button_text; ?></a>
    </div>
<?php
$porto_woo_version = porto_get_woo_version_number();
if ( version_compare( $porto_woo_version, '2.6', '<' ) ) :
	wc_print_notices();
	?>
	<div class="featured-box align-left">
		<div class="box-content">
<?php endif; ?>
<?php do_action( 'woocommerce_before_edit_account_form' ); ?>

<form action="" method="post" class="woocommerce-EditAccountForm edit-account  row account--form--row " <?php do_action( 'woocommerce_edit_account_form_tag' ); ?> >
	<div class="col-lg-6 account--form--wrapper ">
		<legend class="account--form--title"><?php echo" Профіль" ?></legend>
	<?php do_action( 'woocommerce_edit_account_form_start' ); ?>
	<p class="woocommerce-FormRow woocommerce-FormRow--first form-row form-row-first">
		<input placeholder="Ім’я" type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="account_first_name" id="account_first_name" autocomplete="given-name" value="<?php echo esc_attr( $user->first_name ); ?>" />
	</p>
	<p class="woocommerce-FormRow woocommerce-FormRow--last form-row form-row-last">
		<input placeholder="Прізвище" type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="account_last_name" id="account_last_name" autocomplete="family-name" value="<?php echo esc_attr( $user->last_name ); ?>" />
	</p>
	<p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide form-row_email-input">
		<input placeholder="E-mail *" type="email" class="woocommerce-Input woocommerce-Input--email input-text" name="account_email" id="account_email" autocomplete="email" value="<?php echo esc_attr( $user->user_email ); ?>" />
	</p>
	</div>
	<div class="col-lg-6 account--form--wrapper ">
	<fieldset class=" change-password-cust change-password-cust--featured">
		<legend class="account--form--title"><?php esc_html_e( 'Password change', 'woocommerce' ); ?></legend>
	
		<p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
			<input  placeholder="Пароль" type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="password_current" id="password_current" autocomplete="off" />
		</p>

		<p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
			<input placeholder="Новий пароль" type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="password_1" id="password_1" autocomplete="off" />
		</p>

		<p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
			<input placeholder="Підтвердження пароля" type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="password_2" id="password_2" autocomplete="off" />
		</p>
		</div>
	</fieldset>
	<div class="clear"></div>

	<?php do_action( 'woocommerce_edit_account_form' ); ?>

	<p class="clearfix account--button--wrapper">
		<?php wp_nonce_field( 'save_account_details', 'save-account-details-nonce' ); ?>
		<button type="submit" class="woocommerce-Button button  blue-btn" name="save_account_details" value="<?php esc_attr_e( 'Save', 'woocommerce' ); ?>"><?php esc_html_e( 'Save', 'woocommerce' ); ?></button>
		<input type="hidden" name="action" value="save_account_details" />
	</p>

	<?php do_action( 'woocommerce_edit_account_form_end' ); ?>

</form>

<?php do_action( 'woocommerce_after_edit_account_form' ); ?>

<?php if ( version_compare( $porto_woo_version, '2.6', '<' ) ) : ?>
		</div>
	</div>
<?php endif; ?>
<a class="mobile_back_button" href="<?php echo get_home_url() ?>/my-account">← <?php echo $back_button_text; ?></a>

</div>