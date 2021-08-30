<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * @version     3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );

?>

<?php wc_get_template_part( 'archive-product-content' ); ?>

<?php
get_footer( 'shop' );?>
<?php 
	if(qtranxf_getLanguage() == 'ua'){
		$loading_label = 'Загрузка';
        $load_more_button_label = 'Показати ще товари';
        
	}
	if(qtranxf_getLanguage() == 'ru'){
		$loading_label = 'Загрузка';
        $load_more_button_label = 'Показать еще товары';
	}
	if(qtranxf_getLanguage() == 'en'){
		$loading_label = 'loading';
        $load_more_button_label = 'Load more products';
	}
?>
<script>
    jQuery(function($){ // use jQuery code inside this to avoid "$ is not defined" error
        $('.misha_loadmore').click(function(){
    
            var button = $(this),
                data = {
                'action': 'loadmore',
                'query': misha_loadmore_params.posts, // that's how we get params from wp_localize_script() function
                'page' : misha_loadmore_params.current_page,
            };
    
            $.ajax({ // you can also use $.post here
                url : misha_loadmore_params.ajaxurl, // AJAX handler
                data : data,
                type : 'POST',
                beforeSend : function ( xhr ) {
                    $(button).find('span').text('<?php echo $loading_label . '...'; ?>'); // change the button text, you can also add a preloader image
                    $(button).addClass('loading');
                },
                success : function( data ){
                    if( data ) { 
                        $(button).find('span').text( '<?php echo $load_more_button_label; ?>' ); // insert new posts
                        $(button).removeClass('loading');
                        jQuery('.archive-products ul .product_wrapper').last().after(data);
                        misha_loadmore_params.current_page++;
                        jQuery('.archive-products .product .single_add_to_cart_button').html('Купити');
                        if ( misha_loadmore_params.current_page == misha_loadmore_params.max_page ) 
                            button.remove(); // if last page, remove the button
    
                        // you can also fire the "post-load" event here if you use a plugin that requires it
                        // $( document.body ).trigger( 'post-load' );
                    } else {
                        button.remove(); // if no data, remove the button as well
                    }
                }
            });
        });
    });
</script>