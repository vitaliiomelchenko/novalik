<?php if(isset($_GET['exportorders']) && current_user_can('administrator')){
	custom_export_orders();
	die();
} 
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

	<?php get_template_part( 'head' ); ?>
</head>
<?php
global $porto_settings;
$wrapper     = porto_get_wrapper_type();
$body_class  = $wrapper;
$body_class .= ' blog-' . get_current_blog_id();
$body_class .= ' ' . $porto_settings['css-type'];

$header_is_side = porto_header_type_is_side();

if ( $header_is_side ) {
	$body_class .= ' body-side';
}

$loading_overlay = porto_get_meta_value( 'loading_overlay' );
$showing_overlay = false;
if ( 'no' !== $loading_overlay && ( 'yes' === $loading_overlay || ( 'yes' !== $loading_overlay && $porto_settings['show-loading-overlay'] ) ) ) {
	$showing_overlay = true;
	$body_class     .= ' loading-overlay-showing';
}

?>
<body <?php body_class( array( $body_class ) ); ?><?php echo ! $showing_overlay ? '' : ' data-loading-overlay'; ?> style="background-image: url('') !important;">

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NGHQTSJ"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<?php if ( $showing_overlay ) : ?>
	<div class="loading-overlay">
		<div class="bounce-loader">
			<div class="bounce1"></div>
			<div class="bounce2"></div>
			<div class="bounce3"></div>
		</div>
	</div>
	<?php
endif;

	// Get Meta Values
	wp_reset_postdata();
	global $porto_layout, $porto_sidebar;

	$porto_layout_arr = porto_meta_layout();
	$porto_layout     = $porto_layout_arr[0];
	$porto_sidebar    = $porto_layout_arr[1];
if ( in_array( $porto_layout, porto_options_both_sidebars() ) ) {
	$GLOBALS['porto_sidebar2'] = $porto_layout_arr[2];
}

	$porto_banner_pos = porto_get_meta_value( 'banner_pos' );

if ( porto_show_archive_filter() ) {
	if ( 'fullwidth' == $porto_layout ) {
		$porto_layout = 'left-sidebar';
	}
	if ( 'widewidth' == $porto_layout ) {
		$porto_layout = 'wide-left-sidebar';
	}
}

	$breadcrumbs       = $porto_settings['show-breadcrumbs'] ? porto_get_meta_value( 'breadcrumbs', true ) : false;
	$page_title        = $porto_settings['show-pagetitle'] ? porto_get_meta_value( 'page_title', true ) : false;
	$content_top       = porto_get_meta_value( 'content_top' );
	$content_inner_top = porto_get_meta_value( 'content_inner_top' );

if ( ( is_front_page() && is_home() ) || is_front_page() ) {
	$breadcrumbs = false;
	$page_title  = false;
}

	do_action( 'porto_before_wrapper' );
?>
<?php 
if(qtranxf_getLanguage() == 'ua'){
	$home_page_title = '??????????????';
	$account_button_label = '?????????????????? ??????????????';
	$cart_button_label = '??????????';
	$search_submit_from_button_label = '????????????';
	$product_categories_button_label = '?????????????????? ??????????????';
	$search_placeholder = '??????????';
	$lang_switcher_title = 'UA';
}
if(qtranxf_getLanguage() == 'ru'){
	$home_page_title = '??????????????';
	$account_button_label = '???????????? ??????????????';
	$cart_button_label = '??????????????';
	$search_submit_from_button_label = '??????????';
	$product_categories_button_label = '?????????????????? ??????????????';
	$search_placeholder = '??????????';
	$lang_switcher_title = 'RU';
}
if(qtranxf_getLanguage() == 'en'){
	$home_page_title = 'Home';
	$account_button_label = 'Account';
	$cart_button_label = 'Cart';
	$search_submit_from_button_label = 'Search';
	$product_categories_button_label = 'Product categories';
	$search_placeholder = 'Search';
	$lang_switcher_title = 'ENG';
}
?>
<?php 

$args = array(
    'taxonomy' 		=> 'product_cat',
    'orderby' 		=> 'name',
    'order'   		=> 'ASC',
    'number'		=>	30,
    'hide_empty' 	=> false,
);

$cats = get_categories($args);?>
<?php
foreach($cats as $cat) {
    ?>
    <?php 
        $thumbnail_id = get_term_meta( $cat->term_id, 'thumbnail_id', true ); 
        // get the image URL
        $image = wp_get_attachment_url( $thumbnail_id ); 
        // print the IMG HTML
    ?>
    <?php 
    echo '
        <style>.cat-item-' . $cat->term_id .  '::before{background-image: url("' . $image . '");}</style>';
    ?>
<?php 
};
?>
<?php 
global $woocommerce;
?>
			<header class="header">
			    <nav class="nav">
			        <div class="container">
			            <div class="row align-items-center justify-content-between">
			                <div class="d-none d-lg-block col-lg-1">
			                    <div class="logo">
			                        <a href="<?php echo get_home_url() ?>"><img src="<?php echo get_template_directory_uri() ?>/images/logo.svg" alt=""></a>
			                    </div>
			                </div>
			                <div class="d-block d-lg-none">
			                    <div class="logo">
			                        <img src="<?php echo get_template_directory_uri() ?>/images/logo.svg" alt="">
			                    </div>
			                </div>
			                <div class="col-lg-5 d-none d-lg-block">
							<ul class="menu nav-list">
							<?php wp_nav_menu( [
											'theme_location'  => 'Main Menu',
											'menu'            => 'main-menu',
											'container'		 	=> false,
											'menu_class'      => 'menu nav-list',
											'echo'            => true,
											'fallback_cb'     => 'wp_page_menu',
											'items_wrap'      => '<li  class="menu-item" >%3$s</li>'
										] );
										?>
								</ul>
			                </div>
							<?php 
								$headerPhone = get_field('headerPhone', 'option');
								$headerQ = get_field('headerQ', 'option');
							?>
			                <div class="d-none d-lg-block col-lg-3">
			                    <div class="phone">
			                        <a href="tel:<?php echo $headerPhone ?>" class="phone-number"><?php echo $headerPhone ?></a>
			                        <a class="call-me" id="order_call"><?php echo $headerQ ?></a>
			                    </div>
			                </div>
			                <div class="d-block d-lg-none">
			                    <div class="phone">
			                        <a href="tel:<?php echo $headerPhone ?>" class="phone-number"><?php echo $headerPhone ?></a>
			                        <a href="#" class="call-me"><?php echo $headerQ ?></a>
			                    </div>
			                </div>
			                <div class="col-lg-1 d-none d-lg-block">
			                    <div class="lang-switcher">
								<ul class="languages-list">
			                <li class="lang_switcher_wrapper">
								<div class="lang_switcher_title"><?php echo $lang_switcher_title; ?></div>
								<?php 
									wp_nav_menu( [
										'theme_location'  => 'lang-switcher',
									] );
								?>
			                </li>
			            </ul>
			                        
						 
			                    </div>
			                </div>
			                <div class="d-block d-lg-none">
			                    <div class="mobile-btn" id="openMenu">
			                        <img src="<?php echo get_template_directory_uri() ?>/images/burger.svg" alt="">
			                    </div>
			                </div>
			            </div>
			        </div>
			        <div class="top-bar">
			            <div class="container">
			                <div class="row align-items-center justify-content-between">
			                    <div class="d-none d-lg-block col-lg-3">
			                        <div class="header-categories">
			                            <img src="<?php echo get_template_directory_uri() ?>/images/categories.svg" alt="">
			            				<?php echo $product_categories_button_label; ?>
			                            <div class="header-categories__list">
											<?php dynamic_sidebar( 'woo-category-filter-sidebar' ); ?>
			                            </div>
			                        </div>
			                    </div>
			                    <div class="col-lg-5">
			                        <div class="top-bar__search">
										<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>"">
											
				                            <input type="search" class="search-field top-bar__input" placeholder="<?php echo $search_placeholder; ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>">
			                                <button type="submit" class="top-bar__btn">
			                                    <?php echo $search_submit_from_button_label; ?>
			                               </button>
										</form>
			                        </div>
			                    </div>
			                    <div class="d-none d-lg-block col-lg-4">
			                        <div class="user-block">
			                            <a href="<?php echo get_home_url( null, 'my-account/', 'https' ); ?>" class="user-item cart">
			                                <img src="<?php echo get_template_directory_uri() ?>/images/user-icon.svg" alt="">
											<?php echo $account_button_label; ?>
			                            </a>
			                            <a href="<?php echo get_home_url( null, 'cart/', 'https' ); ?>" class="user-item cart">
			                                <img src="<?php echo get_template_directory_uri() ?>/images/cart.svg" alt="">
											<?php echo $cart_button_label; ?>(<?php echo $woocommerce->cart->cart_contents_count; ?>)
			                            </a>
			                        </div>
			                    </div>
			                </div>
			            </div>
			        </div>
			    </nav>
			    <div class="mobile-menu" id="mobileMenu">
					<div class="header_height">
			        <div class="mobile-menu__top">
			            <div class="logo">
			                <img src="<?php echo get_template_directory_uri() ?>/images/logo.svg" alt="">
			            </div>
			            <div class="close" id="closeMenu">
			                <img src="<?php echo get_template_directory_uri() ?>/images/close-menu.svg" alt="">
			            </div>
			        </div>
			        <div class="user-block">
			            <a href="<?php echo get_home_url( null, 'my-account/', 'https' ); ?>" class="user-item cart">
			                <img src="<?php echo get_template_directory_uri() ?>/images/user-icon.svg" alt="">
			                <?php echo $account_button_label; ?>
			            </a>
			            <a href="<?php echo get_home_url( null, 'cart/', 'https' ); ?>" class="user-item cart">
			                <img src="<?php echo get_template_directory_uri() ?>/images/cart.svg" alt="">
			                <?php echo $cart_button_label; ?>
			            </a>
			        </div>
			        <div class="header-categories" style="pointer-events:all;">
			            <div class="d-flex align-items-center justify-content-center categories_list_open_button" style="width: 100%;">
			            	<img src="<?php echo get_template_directory_uri() ?>/images/categories.svg" alt="">
			            	<?php echo $product_categories_button_label; ?>
			            	<div class="arrow">
			            	    <img src="<?php echo get_template_directory_uri() ?>/images/down.svg" alt="">
			            	</div>
							
			            </div>
						<div class="header-categories__list">
							<?php dynamic_sidebar( 'woo-category-filter-sidebar' ); ?>
			            </div>
			        </div>
					<ul class="menu nav-list nav-list-mobile">
						<?php wp_nav_menu( [
												'theme_location'  => 'Main Menu',
												'menu'            => 'main-menu',
												'container'       => false,
												'menu_class'      => 'menu nav-list',
												'echo'            => true,
												'fallback_cb'     => 'wp_page_menu',
												'items_wrap'      => '<li  class="menu-item" >%3$s</li>'
											] );
											?>
					</ul>
			        <div class="languages">
			            <p>????????</p>
			            <?php 
							wp_nav_menu( [
								'theme_location'  => 'lang-switcher',
							] );
						?>
			        </div>
					</div>
			    </div>
				<?php if(!is_front_page()): ?>
			    <div class="container">
			        <ul class="breadcrumbs">
			            <li>
			                <a href="<?php echo home_url(); ?>"><?php echo $account_button_label; ?></a>
			            </li>
			            <li>
			                <?php the_title(); ?>
			            </li>
			        </ul>
			    </div>
				<?php endif; ?>
				
			</header>
			<div class="overlay"></div>
			<div class="order_call_popup_wrapper">
				<div class="order_call_popup">
					<div class="popup_title">???????????????? ??????????????</div>
					<div class="popup_text">?????????????? ?????????????? ?????? ???????????? ???????????????? ????????????????????????? ?????????????? ???????? ?????????????????? ???????? ?? ?????? ???????????????? ????'?????????????? ?? ???????? ???????????????????? ??????????</div>
					<div class="popup_form"><?php echo do_shortcode('[contact-form-7 id="4432" title="???????????????? ??????????????"]') ?></div>
				</div>
				<div class="close_popup"></div>
			</div>