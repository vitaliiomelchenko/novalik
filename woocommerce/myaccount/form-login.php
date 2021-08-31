<?php
/**
 * Login Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-login.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<?php wc_print_notices(); ?>
<?php 
if(qtranxf_getLanguage() == 'ua'){
	$logInPageTitle = 'Авторизація / Реєстація';
	$firstFormTitle = 'Авторизація';
	$secondFormTitle = 'Реєстрація';
	$rememberMeButton = "Запам'ятати мене";
	$forgotPasswordButton = 'Забули пароль?';
	$loginFieldLabel = 'Логін або E-mail *';
	$passwordFiledLabel = 'Пароль *';
	$emailFieldLabel = 'E-mail адреса *';
	$underFormTitle = "* Обов'язкові поля";
}
if(qtranxf_getLanguage() == 'ru'){
	$logInPageTitle = 'Авторизация / Регистрация';
	$firstFormTitle = 'Авторизация';
	$secondFormTitle = 'Регистрация';
	$rememberMeButton = 'Запомнить меня';
	$forgotPasswordButton = 'Забыли пароль?';
	$loginFieldLabel = 'Логин или E-mail *';
	$passwordFiledLabel = 'Пароль *';
	$emailFieldLabel = 'E-mail адрес *';
	$underFormTitle = '* Обязательные поля';
}
if(qtranxf_getLanguage() == 'en'){
	$logInPageTitle = 'Log in / Register';
	$firstFormTitle = 'Log in';
	$secondFormTitle = 'Register';
	$rememberMeButton = 'Remember me';
	$forgotPasswordButton = 'Forgot password?';
	$loginFieldLabel = 'Email';
	$passwordFiledLabel = 'Password *';
	$emailFieldLabel = 'Email address *';
	$underFormTitle = '* Required fields';
}
?>
<div class="container">
<div class="featured-box align-left porto-user-box">
	<div class="box-content">
		<?php do_action( 'woocommerce_before_customer_login_form' ); ?>

		<?php if ( 'yes' === get_option( 'woocommerce_enable_myaccount_registration' ) ) : ?>

		<div class="u-columns col2-set" id="customer_login">

			<div class="u-column1 col-1">

		<?php endif; ?>

				<h2><?php echo $logInPageTitle; ?></h2>

				<form class="woocommerce-form woocommerce-form-login login" method="post">
					<div class="form_title"><?php echo $firstFormTitle; ?></div>
					<?php do_action( 'woocommerce_login_form_start' ); ?>

					<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
						<label for="username"><?php esc_html_e( 'Логин или E-mail', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
						<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="username" autocomplete="username" placeholder="<?php echo $loginFieldLabel; ?>" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
					</p>
					<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
						<label for="password"><?php esc_html_e( 'Пароль', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
						<input class="woocommerce-Input woocommerce-Input--text input-text" type="password" name="password" placeholder="<?php echo $passwordFiledLabel; ?>" id="password" autocomplete="current-password" />
					</p>

					<?php do_action( 'woocommerce_login_form' ); ?>

					<p class="status" style="display: none;"></p>

					<p class="form-row login_button_wrapper">
						<?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
						<button type="submit" class="woocommerce-Button button" name="login" value="<?php echo $firstFormTitle; ?>"><?php echo $firstFormTitle; ?></button>
						<label class="woocommerce-form__label woocommerce-form__label-for-checkbox inline woocommerce-form-login__rememberme">
							<input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" /> <span><?php echo $rememberMeButton; ?></span>
						</label>
					</p>
					<p class="woocommerce-LostPassword lost_password">
						<a href="<?php echo esc_url( wp_lostpassword_url() ); ?>"><?php echo $forgotPasswordButton; ?></a>
					</p>

					<?php do_action( 'woocommerce_login_form_end' ); ?>
					
				</form>
				<div class="under_form_text mobile">
						<?php echo $underFormTitle; ?>
					</div>
		<?php if ( 'yes' === get_option( 'woocommerce_enable_myaccount_registration' ) ) : ?>

			</div>

			<div class="u-column2 col-2 register">


				<form method="post" class="woocommerce-form woocommerce-form-register register" <?php do_action( 'woocommerce_register_form_tag' ); ?> >
					<div class="form_title"><?php echo $secondFormTitle; ?></div>
					<?php do_action( 'woocommerce_register_form_start' ); ?>


					<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide register_password">
						<label for="reg_email"><?php esc_html_e( 'E-mail адрес', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
						<input type="email" class="woocommerce-Input woocommerce-Input--text input-text" placeholder="<?php echo $emailFieldLabel; ?>" name="email" id="reg_email" autocomplete="email" value="<?php echo ( ! empty( $_POST['email'] ) ) ? esc_attr( wp_unslash( $_POST['email'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
					</p>
					<p><?php esc_html_e( 'Пароль будет отправлен на ваш адрес электронной почты.', 'woocommerce' ); ?></p>

					<?php if ( 'no' === get_option( 'woocommerce_registration_generate_password' ) ) : ?>

						<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
							<label for="reg_password"><?php esc_html_e( 'Пароль', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
							<input type="password" class="woocommerce-Input woocommerce-Input--text input-text" name="password" id="reg_password" autocomplete="new-password" />
						</p>

					<?php endif; ?>

					<?php do_action( 'woocommerce_register_form' ); ?>

					<p class="status" style="display: none;"></p>

					<p class="woocommerce-FormRow form-row">
						<?php wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>
						<button type="submit" class="woocommerce-Button button" name="register" value="<?php echo $secondFormTitle; ?>"><?php echo $secondFormTitle; ?></button>
					</p>

					<?php do_action( 'woocommerce_register_form_end' ); ?>

				</form>

			</div>

		</div>
		<?php endif; ?>

		<?php do_action( 'woocommerce_after_customer_login_form' ); ?>
	</div>
	<div class="under_form_text"><?php echo $underFormTitle; ?></div>
</div>
</div>