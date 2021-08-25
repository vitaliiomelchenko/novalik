<?php 
add_action( 'wp_enqueue_scripts', 'child_styles' );

function child_styles(){
    wp_enqueue_style( 'main-css', get_stylesheet_directory_uri(  ) . '/dist/main.min.css' );
    wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com' );
    wp_enqueue_style( 'gstatic', 'https://fonts.gstatic.com' );
    wp_enqueue_style( 'fonts', 'https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet' );
    wp_enqueue_style( 'slick_slidere', get_stylesheet_directory_uri() . '/assets/libs/slick.css');
    wp_enqueue_style( 'slick_slider_theme', get_stylesheet_directory_uri() . '/assets/libs/slick-theme.css');
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
	wp_enqueue_script( 'load-more-js', get_stylesheet_directory_uri() . '/assets/js/myloadmore.js');
  wp_enqueue_script( 'slick-main_script', get_stylesheet_directory_uri() . '/assets/js/slick.min.js');
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

//Load more
function misha_my_load_more_scripts() {
 
	global $wp_query; 
 
	// In most cases it is already included on the page and this line can be removed
	wp_enqueue_script('jquery');
 
	// register our main script but do not enqueue it yet
	wp_register_script( 'my_loadmore', get_stylesheet_directory_uri() . '/js/myloadmore.js', array('jquery') );
 
	// now the most interesting part
	// we have to pass parameters to myloadmore.js script but we can get the parameters values only in PHP
	// you can define variables directly in your HTML but I decided that the most proper way is wp_localize_script()
	wp_localize_script( 'my_loadmore', 'misha_loadmore_params', array(
		'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php', // WordPress AJAX
		'posts' => json_encode( $wp_query->query_vars ), // everything about your loop is here
		'current_page' => get_query_var( 'paged' ) ? get_query_var('paged') : 1,
		'max_page' => $wp_query->max_num_pages,
	) );
 
 	wp_enqueue_script( 'my_loadmore' );
}
 
add_action( 'wp_enqueue_scripts', 'misha_my_load_more_scripts' );


function misha_loadmore_ajax_handler(){
 
	// prepare our arguments for the query
	$args = json_decode( stripslashes( $_POST['query'] ), true );
	$args['paged'] = $_POST['page'] + 1; // we need next page to be loaded
  $args['post_status'] = 'publish';
 
	// it is always better to use WP_Query but not here
	query_posts( $args );
 
	if( have_posts() ) :
 
		// run the loop
		while( have_posts() ): the_post();?>
      <div class="product_wrapper col-lg-4 col-md-6 col-12">
        <?php wc_get_template_part( 'content', 'product' ); ?>
      </div>
 
    <?php
		endwhile;
	endif;
	die; // here we exit the script and even no wp_reset_query() required!
}
 
 
 
add_action('wp_ajax_loadmore', 'misha_loadmore_ajax_handler'); // wp_ajax_{action}
add_action('wp_ajax_nopriv_loadmore', 'misha_loadmore_ajax_handler'); // wp_ajax_nopriv_{action}


//Changing shop page ordering
add_filter('woocommerce_default_catalog_orderby', 'custom_catalog_ordering_args', 10, 1);
function custom_catalog_ordering_args( $orderby ) {
    $orderby = 'popularity'; 
    return $orderby; 
}


add_filter( 'woocommerce_checkout_fields' , 'quadlayers_remove_checkout_fields' );
function quadlayers_remove_checkout_fields( $fields ) {

  unset($fields['billing']['billing_last_name']); 
  
  return $fields; 
  
  }
  if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme 404 Settings',
		'menu_title'	=> '404',
		'parent_slug'	=> 'theme-general-settings',
	));