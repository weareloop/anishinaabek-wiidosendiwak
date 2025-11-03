// Start of animation.js
jQuery(document).ready(function ($) {
    console.log('animation.js ready');

    /************************/
    /*  START :: SVG Lines  */
    /************************/
    $('.line--module').each( function () {
        var containerRow = $(this).parents(".line--row");
        //Move .line--module, so position absolute will be relative to row and not wrapper
        $(containerRow).append($(this));
    });
    
    
    let target = '.line--module';
    createObserver();

    function createObserver() {
        let observer;    
        let options = {
            root: null,
            rootMargin: "0px",
            threshold: 0, 
        };

        observer = new IntersectionObserver(handleIntersect, options);

        // If target is one element, use lines below
        // let target = document.querySelectorAll(".line--module");
        // observer.observe(target);

        // If target is multiple elements, use lines below 
        document.querySelectorAll(target).forEach((i) => {
            if (i) {
                observer.observe(i);
            }
        });
        
    }

    function handleIntersect(entries, observer) {
        entries.forEach((entry) => {
            // Each entry describes an intersection change for one observed target element:
            // entry.boundingClientRect
            // entry.intersectionRatio
            // entry.intersectionRect
            // entry.isIntersecting
            // entry.rootBounds
            // entry.target
            // entry.time
            if (entry.isIntersecting) {
                entry.target.dataset.active = "true";
            } else {
                entry.target.dataset.active = "false";
            }
        });
    }
    /************************/
    /*  END   :: SVG Lines  */
    /************************/

    /*****************************/
    /*  START :: Lottie Players  */
    /*****************************/
    
    createLottieObserver();

    function createLottieObserver() {
        let target = 'lottie-player'; // no class, just element
        let observer;    
        let options = {
            root: null,
            rootMargin: "0px",
            threshold: 0, 
        };
        let lottieid;

        observer = new IntersectionObserver(handleLottieIntersect, options);

        // If target is one element, use lines below
        // let target = document.querySelectorAll(".line--module");
        // observer.observe(target);

        // If target is multiple elements, use lines below 
        document.querySelectorAll(target).forEach((i) => {
            if (i) {
                observer.observe(i);
                // stop the lottie autoplay on each player, before if isIntersecting runs
                i.stop();
            }
        });

    }

    function handleLottieIntersect(entries, observer) {
        entries.forEach((entry) => {
            // Each entry describes an intersection change for one observed target element:
            // entry.boundingClientRect
            // entry.intersectionRatio
            // entry.intersectionRect
            // entry.isIntersecting
            // entry.rootBounds
            // entry.target
            // entry.time
            if (entry.isIntersecting) {
                entry.target.dataset.active = "true";
                // play the lottie animation
                entry.target.play(); 
                
            } else {
                entry.target.dataset.active = "false";
                // stop rather than pause, so it resets the lottie animation
                entry.target.stop(); 
            }
        });
    }
    /*****************************/
    /*  END   :: Lottie Players  */
    /*****************************/



    // WINDOW RESIZE //
    $(window).on( "resize", function() {

    });

    // WINDOW SCROLL //
    $(window).on( "scroll", function() {
   
    });

});