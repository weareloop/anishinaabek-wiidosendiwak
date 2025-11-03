// Start of main.js
jQuery(document).ready(function ($) {
    
    console.log('main.js ready');

    // Fixing 100vw overflow bug (affecting all browsers but Firefox) – required in doc ready + resize
    const scrollbarWidth = window.innerWidth - document.body.clientWidth; // Calculate width of scrollbar
    document.documentElement.style.setProperty("--scrollbarWidth", `${scrollbarWidth}px`) // Set as css variable

    // A underline + arrow//
    // $(".arrowlink a,a.arrowlink").append("<span class='a_arrow'><img src='/wp-content/uploads/arrow-right-blue.svg'/></span>")
    
    // Accessibility: mouse hover link opens a new window blurb
    $('a').mousemove(function (e) {
        //$('.acc_external', this).css({left: e.pageX - 100, top: e.pageY + 10});
        //$(this).find(".acc_external").css({ left: e.clientX - 100, top: e.clientY + 10 });
        $(this).find(".acc_external").css({left: e.clientX - 135, top: e.clientY - 50});

    });

    // Replace # on empty links
    $("a").each(function(){
        if ($(this).attr("href") == "#")
            $(this).attr("onclick",$(this).attr("onclick")+";event.preventDefault(); return false;")
    });
    
    
    //////////////////////////////////////////
    // Beaver Builder Smooth Scroll options //
    //////////////////////////////////////////
    if ("undefined" != typeof FLBuilderLayoutConfig) {
        if ($(window).width()<992){
            FLBuilderLayoutConfig.anchorLinkAnimations.offset = 50;
        } else {
            FLBuilderLayoutConfig.anchorLinkAnimations.duration = 750;
            FLBuilderLayoutConfig.anchorLinkAnimations.easing = "swing";
            FLBuilderLayoutConfig.anchorLinkAnimations.offset = 70;
        }
    }


    // WINDOW RESIZE //
    $(window).on( "resize", function() {

        // Fixing 100vw overflow bug (affecting all browsers but Firefox) – required in doc ready + resize
        const scrollbarWidth = window.innerWidth - document.body.clientWidth; // Calculate width of scrollbar
        document.body.style.setProperty("--scrollbarWidth", '${scrollbarWidth}px'); // Set as css variable

    });

    // WINDOW SCROLL //
    $(window).on( "scroll", function() {
    

    });

});