jQuery(document).ready(function ($) {
    console.log('statistics.js ready');


    /////////////////////////////////
    // Statistics + Image Parallax //
    /////////////////////////////////
    function radius_set() {
        setTimeout(function(){
            $('.floating-img').each(function(){
                radius = $(this).find(".fl-photo-img").css("border-radius")
                $(this).find(".fl-photo-img").parent().css("border-radius",radius);
            })
        },500)
    }


    if ( $('.floating-img').length > 0 ) {

        radius_set()

        if ( $(window).width() > 768 ) {
            let windowHeight;
            let windowOffsetTop;
            let windowOffsetBottom;
            let imgHeight;
            let imgOffsetTop;
            let imgOffsetBottom;
            let imgPos;
            let parentHeight;
            let parentOffsetTop;
            let parentOffsetBottom;
            let textOffsetBottom;

            $( document ).scroll( function () {
                windowHeight = $(window).height();
                windowOffsetTop = $(window).scrollTop();
                windowOffsetBottom = windowHeight + windowOffsetTop;

                // for XL view only, 
                if ( $(window).width() > 1351 ) {
                    // bottom of floating-txt is 45px below bottom of floating-img
                    textOffsetBottom = 45;
                }
                // for L, tablet & mobile, 
                else {
                    // bottom of floating-txt is 120px below bottom of floating-img
                    textOffsetBottom = 120;
                }

                $('.floating-img').each( function () {
                    imgHeight = $(this).height();
                    imgOffsetTop = $(this).offset().top;
                    imgOffsetBottom = imgHeight + imgOffsetTop;

                    parentHeight = $(this).parents('.fl-col-content').height();
                    parentOffsetTop = $(this).parents('.fl-col-content').offset().top;
                    parentOffsetBottom = parentHeight + parentOffsetTop;



                    // Calculate image position relative to window,
                    // if top of img is above bottom of window
                    // & bottom of img is bellow top of window
                    if (imgOffsetTop < windowOffsetBottom && imgOffsetBottom > windowOffsetTop) {
                        if ((windowOffsetBottom - imgOffsetTop) / (imgOffsetBottom - windowOffsetTop) < 1) {
                            imgPos = ((windowOffsetBottom - imgOffsetTop) / (imgOffsetBottom - windowOffsetTop)) * 50;
                        } else if ((imgOffsetBottom - windowOffsetTop) / (windowOffsetBottom - imgOffsetTop) < 1) {
                            imgPos = 100 - ((imgOffsetBottom - windowOffsetTop) / (windowOffsetBottom - imgOffsetTop)) * 50;
                        }
                        // Parallax effect
                        $(this).find('img').css({'object-position': `0 ${imgPos}%`});
                        // Slide container
                        if ($(this).hasClass('slide-up')) {
                            $(this).parents('.fl-col-content').find('.floating-txt').css({'bottom': `calc(-${textOffsetBottom}px + ${parentOffsetBottom - imgOffsetBottom}px)`});
                            $(this).css({'transform': `translateY(-${imgPos / 6}%)`});
                        } else if ($(this).hasClass('slide-down')) {
                            $(this).parents('.fl-col-content').find('.floating-txt').css({'bottom': `calc(-${textOffsetBottom}px + ${parentOffsetBottom - imgOffsetBottom}px)`});
                            $(this).css({'transform': `translateY(${imgPos / 6}%)`});
                        }
                    }
                });
            });
        };
    };
    
    

    $(window).on( "resize", function() {

        radius_set()

    });

    
})