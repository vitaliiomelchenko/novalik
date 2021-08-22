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
