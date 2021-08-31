//Product page slider
jQuery(document).ready(function(){
    jQuery(".owl-carousel").owlCarousel({
        margin: 0,
        nav: true,
        dots: false,
        responsive: {
            0: {
                items: 1,
            },
            768: {
                items: 2,
            },
            993: {
                items: 3,
            },
            1200: {
                items: 4,
            }
        }
    });
    jQuery('#openMenu').click(function(){
		jQuery('#mobileMenu').slideDown(300);
        setTimeout(function(){
            var menuHeight = jQuery('.header_height').height();
            jQuery('body').css({'max-height': menuHeight + 18, 'overflow': 'hidden'});
        }, 310);
	});
    jQuery('.categories_list_open_button').on( 'click', function() {
        jQuery(this).parent().find('.header-categories__list').slideToggle(300);
        setTimeout(function(){
            var menuHeight = jQuery('.header_height').height();
            jQuery('body').css({'max-height': menuHeight + 18, 'overflow': 'hidden'});
        }, 310);
    });
	jQuery('#closeMenu').click(function(){
		jQuery('#mobileMenu').slideUp(200);
        jQuery('body').css({'max-height': '100%', 'overflow': 'visible'});
	});
	jQuery('.header-categories .head').click(function(){
	    if(jQuery(this).parent().hasClass('categories-active')){
	        jQuery(this).parent().removeClass('categories-active');
	    }else{
	       jQuery(this).parent().addClass('categories-active');
	    }
	    jQuery(this).parent().toggleClass('hidden');
	});
  	jQuery('.more-categories').click(function(){
  		jQuery(this).parent().toggleClass('category-show');
  		jQuery('.homeOffer__categories_wrapper').toggleClass('category-list-show');
  		jQuery('.homeOffer__slider').toggleClass('cat-open');
        jQuery('.homeOffer').toggleClass('opened_categories_list');
  	});
  	jQuery('.homeStock__slider').slick({
  	  	slidesToShow: 4,
  	  	prevArrow: jQuery('.homeStock-a-prev'),
  	  	nextArrow: jQuery('.homeStock-a-next'),
  	  	infinite: false,
  	  	responsive: [
            {
                breakpoint: 375,
                settings: {
                  arrows: false,
                  slidesToShow: 1
                }
            },
  	  	    {
  	  	        breakpoint: 768,
  	  	        settings: {
  	  	          arrows: false,
  	  	          slidesToShow: 2,
  	  	        }
  	  	    },
            {
                breakpoint: 991,
                settings: {
                  arrows: false,
                  slidesToShow: 3
                }
            },
  	  	  ],
  	 });
    jQuery('.aboutCertificates__slider').slick({
        slidesToShow: 4,
        arrows: true,
        prevArrow: jQuery('.certificates-a-prev'),
        nextArrow: jQuery('.certificates-a-next'),
        infinite: false,
        responsive: [
            {
              breakpoint: 768,
              settings: {
                arrows: true,
                slidesToShow: 1
              },
            }
        ]
        });
        jQuery('.certificates-a-prev').removeClass('slick-hidden');
        jQuery('.certificates-a-next').removeClass('slick-hidden');
        jQuery('.homeOffer__slider').slick({
            slidesToShow: 1,
            dots: true,
            nav: false,
        });
        jQuery('.slick-active button').text('12');
    jQuery('.header .lang_switcher_title').click(function(){
        jQuery(this).parent().find('.menu-lang-switcher-container').toggleClass('opened');
    });
    jQuery('#order_call').click(function(){
        jQuery('body').addClass('order_call_popup');
    });
    jQuery('.close_popup').click(function(){
        jQuery('body').removeClass('order_call_popup');
    });
    jQuery('.overlay').click(function(){
        jQuery('body').removeClass('order_call_popup');
    });
    /*jQuery('#review_form #submit').click(function(event){
        event.preventDefault();
    });*/
});

jQuery('.homeText__content_wrapper .readMore').click(function(){
    console.log(123);

});
jQuery(document).ready(function(){
    

}); 


//Sort By
var $ = jQuery;
$(document).ready(function(){
  var selectedOrder = $('.woocommerce-ordering select').find('option[selected="selected"]');
  var selectedOrderClass = $(selectedOrder).attr('value');
  $('.' + selectedOrderClass).addClass('active');  
  var selectedOrderName = $('.' + selectedOrderClass + ' a').html();
  $('.orderby_title').html(selectedOrderName);
});



//Home page slider
$(document).ready(function(){
    $('.popular_products_slider').owlCarousel({
        margin: 32,
        nav: true,
        dots: false,
        responsive: {
            0: {
                items: 1,
                margin: 16,
            },
            768: {
                items: 2,
            },
            993: {
                items: 3,
            },
            1200: {
                items: 4,
            }
        }
    });
});


