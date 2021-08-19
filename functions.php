<?php 
add_action( 'wp_enqueue_scripts', 'child_styles' );

function child_styles(){
    wp_enqueue_style( 'main-css', get_stylesheet_directory_uri(  ) . '/dist/main.min.css' );
}
