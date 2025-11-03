jQuery(document).ready(function ($) {
    console.log('carousels.js ready');
    
    /*************************************************/
    /* Carousel - Testimonial - Featured Image Cards */
    /*************************************************/

    $("body:not(.fl-builder-edit) .action-carousel-slider .fl-col-content").each(function(){
        //console.log("action carousel running");
        $(this).slick({
        dots: true,
        infinite: true,
        speed: 300,
        adaptiveHeight: false,
        variableWidth: true,
        draggable:false,
        appendDots: $(this).parents('.action-carousel-row').find(".slider-dot"),
        appendArrows: $(this).parents('.action-carousel-row').find(".slider-ctl"),
        prevArrow:'<button type="button" class="slick-prev hidefocus"><img src="/wp-content/uploads/Group-11193.svg" alt="arrow left"></button>',
        nextArrow:'<button type="button" class="slick-next hidefocus"><img src="/wp-content/uploads/Group-11194.svg" alt="arrow right"></button>',
        responsive: [
            {
            breakpoint: 769,
            settings: {
                draggable:false,
            }
            }
        ]
        });
    });

    /**********************************************/
    /* Carousel - Testimonial - Overlapping Cards */
    /**********************************************/

    $("body:not(.fl-builder-edit) .overlap-carousel-img-col .fl-col-content").each(function(){
        var asNav = $(this).parents('.overlap-carousel-row').find('.overlap-carousel-info-col .fl-col-content');
        $(this).slick({
        dots: true,
        infinite: true,
        speed: 300,
        adaptiveHeight: false,
        fade: true,
        slidesToShow: 1,
        draggable:false,
        asNavFor: asNav,
        appendDots: $(this).parents('.overlap-carousel-row').find(".slider-dot"),
        appendArrows: $(this).parents('.overlap-carousel-row').find(".slider-ctl"),
        prevArrow:'<button type="button" class="slick-prev hidefocus"><img src="/wp-content/uploads/Group-11193.svg" alt="arrow left"></button>',
        nextArrow:'<button type="button" class="slick-next hidefocus"><img src="/wp-content/uploads/Group-11194.svg" alt="arrow right"></button>',
        responsive: [
            {
            breakpoint: 769,
            settings: {
                //draggable:false,
            }
            }
        ]
        });
    });
    $("body:not(.fl-builder-edit) .overlap-carousel-info-col .fl-col-content").each(function(){
        var asNav = $(this).parents('.overlap-carousel-row').find('.overlap-carousel-img-col .fl-col-content');
        $(this).slick({
        dots: false,
        arrows: false,
        infinite: true,
        adaptiveHeight: false,
        fade: false,
        slidesToShow: 1,
        draggable:false,
        asNavFor: asNav,
        responsive: [
            {
            breakpoint: 769,
            settings: {
                adaptiveHeight:true
            }
            }
        ]
        });
    });
    //Carousel - Dots change label
    setTimeout(function(){ $(".slick-dots").find("button").each(
        function() {
            $(this).text($(this).attr("aria-label"));
            //replace the 'of' for any other language
        }
    ) }, 100);

    /********************/
    /*  Marquee Ticker  */
    /********************/
    $("body:not(.fl-builder-edit) .marquee__content").each(function(){
        var second = $(this).clone();
        second.attr('aria-hidden', 'true');
        second.appendTo($(this).parents('.marquee'));
        /* developer append more, if marquee is having big gap or not scrolling*/
        var third = $(this).clone();
        third.attr('aria-hidden', 'true');
        third.appendTo($(this).parents('.marquee'));

    });
    /******************/
    /* VIdeo Carousel */
    /******************/

    $("body:not(.fl-builder-edit) .video-carousel-slider .fl-col-content").each(function(){
		$(this).slick({
		  dots: true,
		  infinite: true,
        	speed: 300,
			variableWidth: true,
        	slidesToScroll: 1,
			slidesToShow: 1,
        	centerMode: false,
            variableWidth: true,
        	adaptiveHeight: false,
			centerMode: true,
			draggable:true,
        	centerPadding: '0px',
		  	appendDots: $(this).parents('.video-carousel-row').find(".slider-dot"),
		  	appendArrows: $(this).parents('.video-carousel-row').find(".slider-ctl"),
		  	prevArrow:'<button type="button" class="slick-prev hidefocus"><img src="/wp-content/uploads/Group-11193.svg" alt="arrow left"></button>',
            nextArrow:'<button type="button" class="slick-next hidefocus"><img src="/wp-content/uploads/Group-11194.svg" alt="arrow right"></button>',
            responsive: [
				{
				breakpoint: 993,
					settings: {
						draggable:true,
						variableWidth: true,
                		slidesToShow: 1,
                		slidesToScroll: 1,
						centerPadding: '0px'
					}
				}
		  	]
		});
	});
})