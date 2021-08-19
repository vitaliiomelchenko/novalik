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