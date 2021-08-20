<?php if(isset($_GET['exportorders']) && current_user_can('administrator')){
	custom_export_orders();
	die();
} ?>
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
<body <?php body_class( array( $body_class ) ); ?><?php echo ! $showing_overlay ? '' : ' data-loading-overlay'; ?>>

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

			<header class="header">
			    <nav class="nav">
			        <div class="container">
			            <div class="row align-items-center justify-content-between">
			                <div class="d-none d-md-block col-lg-1">
			                    <div class="logo">
			                        <img src="<?php echo get_template_directory_uri() ?>/images/logo.svg" alt="">
			                    </div>
			                </div>
			                <div class="d-block d-md-none">
			                    <div class="logo">
			                        <img src="<?php echo get_template_directory_uri() ?>/images/logo.svg" alt="">
			                    </div>
			                </div>
			                <div class="col-lg-5 d-none d-md-block">
			                    <ul class="menu nav-list">
			                        <li class="menu-item">
			                            <a href="#">Про нас</a>
			                        </li>
			                        <li class="menu-item">
			                            <a href="#">Кар'єра</a>
			                        </li>
			                        <li class="menu-item">
			                            <a href="#">Блог</a>
			                        </li>
			                        <li class="menu-item">
			                            <a href="#">Контакти</a>
			                        </li>
			                    </ul>
			                </div>
			                <div class="d-none d-md-block col-lg-3">
			                    <div class="phone">
			                        <a href="tel:+38 (067) 445 91 50" class="phone-number">+38 (067) 445 91 50</a>
			                        <a href="#" class="call-me">Зателефонувати Вам?</a>
			                    </div>
			                </div>
			                <div class="d-block d-md-none">
			                    <div class="phone">
			                        <a href="tel:+38 (067) 445 91 50" class="phone-number">+38 (067) 445 91 50</a>
			                        <a href="#" class="call-me">Зателефонувати Вам?</a>
			                    </div>
			                </div>
			                <div class="col-lg-1 d-none d-md-block">
			                    <div class="lang-switcher">
			                        UА <img src="<?php echo get_template_directory_uri() ?>/images/down.svg" alt="">
			                    </div>
			                </div>
			                <div class="d-block d-md-none">
			                    <div class="mobile-btn" id="openMenu">
			                        <img src="<?php echo get_template_directory_uri() ?>/images/burger.svg" alt="">
			                    </div>
			                </div>
			            </div>
			        </div>
			        <div class="top-bar">
			            <div class="container">
			                <div class="row align-items-center justify-content-between">
			                    <div class="d-none d-md-block col-lg-3">
			                        <div class="header-categories">
			                            <img src="<?php echo get_template_directory_uri() ?>/images/categories.svg" alt="">
			                            КАТЕГОРІЇ ТОВАРІВ
			                            <div class="header-categories__list">
			                                <a href="#">
			                                    <img src="<?php echo get_template_directory_uri() ?>/images/cat-1.svg" alt="">
			                                    Акційні пропозиції
			                                </a>
			                                <a href="#">
			                                    <img src="<?php echo get_template_directory_uri() ?>/images/cat-2.svg" alt="">
			                                    Опорно-руховий апарат
			                                </a>
			                                <a href="#">
			                                    <img src="<?php echo get_template_directory_uri() ?>/images/cat-3.svg" alt="">
			                                    Протизастудні засоби / для імунітету
			                                </a>
			                                <a href="#">
			                                    <img src="<?php echo get_template_directory_uri() ?>/images/cat-4.svg" alt="">
			                                    Для чоловічого здоров'я
			                                </a>
			                                <a href="#">
			                                    <img src="<?php echo get_template_directory_uri() ?>/images/cat-5.svg" alt="">
			                                   Для жіночого здоров'я
			                                </a>
			                                <a href="#">
			                                    <img src="<?php echo get_template_directory_uri() ?>/images/cat-6.svg" alt="">
			                                    Для ШКТ (Печінка желчевод)
			                                </a>
			                                <a href="#">
			                                    <img src="<?php echo get_template_directory_uri() ?>/images/cat-7.svg" alt="">
			                                    Для дихальних шляхів
			                                </a>
			                                <a href="#">
			                                    <img src="<?php echo get_template_directory_uri() ?>/images/cat-8.svg" alt="">
			                                    Засоби від герпесу
			                                </a>
			                                <a href="#">
			                                    <img src="<?php echo get_template_directory_uri() ?>/images/cat-9.svg" alt="">
			                                    Засоби проти хропіння
			                                </a>
			                                <a href="#">
			                                    <img src="<?php echo get_template_directory_uri() ?>/images/cat-10.svg" alt="">
			                                    Для нервової системи
			                                </a>
			                                <a href="#">
			                                    <img src="<?php echo get_template_directory_uri() ?>/images/cat-11.svg" alt="">
			                                    Для профілактики варикоза
			                                </a>
			                            </div>
			                        </div>
			                    </div>
			                    <div class="col-lg-5">
			                        <div class="top-bar__search">
			                            <form action="">
			                                <input type="search" class="top-bar__input" placeholder="Пошук">
			                                <button type="submit" class="top-bar__btn">
			                                    Знайти
			                                </button>
			                            </form>
			                        </div>
			                    </div>
			                    <div class="d-none d-md-block col-lg-4">
			                        <div class="user-block">
			                            <a href="#" class="user-item cart">
			                                <img src="<?php echo get_template_directory_uri() ?>/images/user-icon.svg" alt="">
			                                Особистий кабінет
			                            </a>
			                            <a href="#" class="user-item cart">
			                                <img src="<?php echo get_template_directory_uri() ?>/images/cart.svg" alt="">
			                                Кошик
			                            </a>
			                        </div>
			                    </div>
			                </div>
			            </div>
			        </div>
			    </nav>
			    <div class="mobile-menu" id="mobileMenu">
			        <div class="mobile-menu__top">
			            <div class="logo">
			                <img src="<?php echo get_template_directory_uri() ?>/images/logo.svg" alt="">
			            </div>
			            <div class="close" id="closeMenu">
			                <img src="<?php echo get_template_directory_uri() ?>/images/close-menu.svg" alt="">
			            </div>
			        </div>
			        <div class="user-block">
			            <a href="#" class="user-item cart">
			                <img src="<?php echo get_template_directory_uri() ?>/images/user-icon.svg" alt="">
			                Особистий кабінет
			            </a>
			            <a href="#" class="user-item cart">
			                <img src="<?php echo get_template_directory_uri() ?>/images/cart.svg" alt="">
			                Кошик
			            </a>
			        </div>
			        <div class="header-categories">
			            <img src="<?php echo get_template_directory_uri() ?>/images/categories.svg" alt="">
			            КАТЕГОРІЇ ТОВАРІВ
			            <div class="arrow">
			                <img src="<?php echo get_template_directory_uri() ?>/images/down.svg" alt="">
			            </div>
			        </div>
			        <ul class="menu nav-list">
			            <li class="menu-item">
			                <a href="#">Про нас</a>
			            </li>
			            <li class="menu-item">
			                <a href="#">Кар'єра</a>
			            </li>
			            <li class="menu-item">
			                <a href="#">Блог</a>
			            </li>
			            <li class="menu-item">
			                <a href="#">Контакти</a>
			            </li>
			        </ul>
			        <div class="languages">
			            <p>Мова</p>
			            <ul class="languages-list">
			                <li>
			                    <a href="#" class="languages_current">Укр</a>
			                </li>
			                <li>
			                    <a href="#">Рус</a>
			                </li>
			                <li>
			                    <a href="#">Eng</a>
			                </li>
			            </ul>
			        </div>
			    </div>
			    <div class="container">
			        <ul class="breadcrumbs">
			            <li>
			                <a href="<?php echo home_url(); ?>">Головна</a>
			            </li>
			            <li>
			                <?php the_title(); ?>
			            </li>
			        </ul>
			    </div>
			</header>