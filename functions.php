<?php 
add_action( 'wp_enqueue_scripts', 'child_styles' );

function child_styles(){
    wp_enqueue_style( 'main-css', get_stylesheet_directory_uri(  ) . '/dist/main.min.css' );
    wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com' );
    wp_enqueue_style( 'gstatic', 'https://fonts.gstatic.com' );
    wp_enqueue_style( 'fonts', 'https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet' );
}


add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
  add_theme_support( 'woocommerce' );
}

//Clean cart button
add_action('init', 'woocommerce_clear_cart_url');
function woocommerce_clear_cart_url() {
    global $woocommerce;
    if( isset($_REQUEST['clear-cart']) ) {
        $woocommerce->cart->empty_cart();
    }
}

add_action( 'wp_enqueue_scripts', 'novalik_child_scripts' );
function novalik_child_scripts(){
	wp_enqueue_script( 'main-js', get_stylesheet_directory_uri() . '/assets/js/main.js');
}

//Woocommerce product page 
add_action( 'product_title', 'woocommerce_template_single_title' );
add_action( 'product_price', 'woocommerce_template_single_price' );
add_action( 'product_add_to_cart', 'woocommerce_template_single_add_to_cart' );
add_action( 'product_rating', 'woocommerce_template_single_rating');
add_action( 'product_desc', 'woocommerce_template_single_excerpt');
add_action( 'product_add_to_cart', 'woocommerce_template_single_add_to_cart' );
add_action( 'product_price', 'woocommerce_template_single_price' );




add_filter( 'woocommerce_product_tabs', 'sb_woo_move_description_tab', 98);
function sb_woo_move_description_tab($tabs) {
    $tabs['reviews']['priority'] = 50;
    return $tabs;
}


add_filter( 'woocommerce_product_tabs', 'misha_rename_additional_info_tab' );

function misha_rename_additional_info_tab( $tabs ) {

	$tabs['reviews']['title'] = 'Відгуки';

	return $tabs;

}


add_filter( 'get_comment_date', 'wpse_comment_date_18350375' );    
function wpse_comment_date_18350375( $date ) {
  $date = date("d F Y");   
  return $date;
}