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
});


//Shop page


//Sort By
var $ = jQuery;
$(document).ready(function(){
  var selectedOrder = $('.woocommerce-ordering select').find('option[selected="selected"]');
  var selectedOrderClass = $(selectedOrder).attr('value');
  $('.' + selectedOrderClass).addClass('active');  
  var selectedOrderName = $('.' + selectedOrderClass + ' a').html();
  $('.orderby_title').html(selectedOrderName);
});



jQuery(document).ready(function(){
    var productCount = jQuery('.product_wrapper').length;
    if(productCount <= 12){
        $('.misha_loadmore').remove();
    }
})