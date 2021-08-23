jQuery(document).ready(function(){
	jQuery('#openMenu').click(function(){
		jQuery('#mobileMenu').slideDown(200);
	});
	jQuery('#closeMenu').click(function(){
		jQuery('#mobileMenu').slideUp(200);
	});
	jQuery('.header-categories').click(function(){
	  if(jQuery(this).hasClass('categories-active')){
	    jQuery(this).removeClass('categories-active');
	    }else{
	       jQuery(this).addClass('categories-active');
	    }
	    jQuery(this).toggleClass('hidden');
	});
  	jQuery('.more-categories').click(function(){
  		jQuery(this).toggleClass('categori-show');
  		jQuery('.homeOffer__categories_wrapper').toggleClass('categori-list-show');
  		jQuery('.homeOffer__slider').toggleClass('cat-open');
  	});
  	jQuery('.homeStock__slider').slick({
  	  	slidesToShow: 4,
  	  	prevArrow: jQuery('.homeStock-a-prev'),
  	  	nextArrow: jQuery('.homeStock-a-next'),
  	  	infinite: false,
  	  	responsive: [
  	  	    {
  	  	      breakpoint: 768,
  	  	      settings: {
  	  	        arrows: false,
  	  	        slidesToShow: 1
  	  	      }
  	  	    }
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
              }
            }
          ],
     });
    jQuery('.certificates-a-prev').removeClass('slick-hidden');
    jQuery('.certificates-a-next').removeClass('slick-hidden');
  	jQuery('.homeOffer__slider').slick({
  	  	slidesToShow: 1,
  	  	dots: true,
  	  	nav: false,
  	  	
  	 });
  	jQuery('.slick-active button').text('12');
});