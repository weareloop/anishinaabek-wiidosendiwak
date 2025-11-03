jQuery(document).ready(function( $ ) {

	console.log("interface.js Loaded");
	
	$("body").focus()
    $('h1:first').attr("tabindex","-1")
    
    $('#skip-to-content').attr("tabindex","1")
    $('#menu-main .mainmenu_home >a').attr("tabindex","1")

    $("#skip-to-content").on('click',function(){
        setTimeout(function(){
            if ($("h1:first a").length) $("h1:first a").focus()
            else $("h1:first").focus()
        },50)       
    })

    //Move scroll-top-top from BB to inside <main>
    $("#fl-to-top").appendTo("main");

    $(".has_submenu >button").keydown(function(e) {
        if(e.keyCode == 13) {
            $(this).trigger("click", true);
            e.preventDefault();
        }
    });
    //$(".has_submenu >button").append("<span class='menu_bubble_pointer'></span>")
    $(".has_submenu >button").on("click",function(e, enterKeyPressed){

        var buttonStatte = $(this).attr('aria-expanded');
        if ($(window).width()<993)  {
            submenu = $(this).parent().find(">.sub-menu")
            $(".has_submenu >.sub-menu").not(submenu).slideUp();
            if(buttonStatte=='false'){
                submenu.slideDown({ start: function () {$(this).css({display: "flex"})}});
            }else{
                submenu.slideUp();
            }
            
        }
        
        var $this = $(this);
        var $container = $("html,body");
        var $scrollTo = $this;

        if(!enterKeyPressed) {$this.addClass("nofocus")}
        else $this.removeClass("nofocus")
    
        if ($(".has_submenu >button[aria-expanded='true']").length) delay = 0
        else delay=50
    
        if ($this.attr("aria-expanded") == "false") {
            $(".has_submenu >button").attr("aria-expanded","false")
            $this.attr("aria-expanded","true")
                
            // only focus when ENTER jey pressed
            if(enterKeyPressed) {
                setTimeout(function(){
                    $this.find(" ~ .sub-menu[data-depth='0'] li:first-child a").first().attr("tabindex","0").focus() //This focuses the 1st element within the submenu
                },delay)
            }

            other_offset = 0;
            if ($("#wpadminbar").length) other_offset -= $("#wpadminbar").height();

            //$container.animate({scrollTop: $scrollTo.offset().top + other_offset},300);

        }
        else  {
            $(this).attr("aria-expanded","false")
        }
        
    })

    // Close desired elements when ESC is pressed
    $(document).on(
        'keydown', function(event) {
            //console.log("-->"+$(".slick-slide button.home-page-tab").is(":focus"))
            //console.log("Keypressed ==> "+event.key)
            var KEYCODE_ESC = 27;
            var isESCPressed = (event.key === 'Escape' || event.keyCode === KEYCODE_ESC);
            if (isESCPressed) {
                
                // Main menu: expanded submenu -> close
                 $("#menu-main .has_submenu >button[aria-expanded='true']").focus();
                 $("#menu-main .has_submenu >button").attr("aria-expanded","false");

                // close search modal
                if ($(".searchbox").hasClass("active")) {
                    searchClose()
                    setTimeout(function(){$(".topbar_search button").focus()},50)
                }
            }  

            var KEYCODE_TAB = 9;
            var isTABPressed = (event.key === 'Tab' || event.keyCode === KEYCODE_TAB);
            if (isTABPressed) {
                
                // Remove .nofocus class
                //$(".has_submenu >button").removeClass("nofocus")
                $("*").removeClass("nofocus").removeClass("hidefocus")
                
            }  

            var KEYCODE_ENTER = 13;
            var isENTERPressed = (event.key === 'Enter' || event.keyCode === KEYCODE_ENTER);
            if (isENTERPressed) {
                
                // Homepage Slider Tab Fix
                
                //$(".slick-slide button.home-page-tab").is(":focus").trigger("click")
                
            }  
    });


    ///////////////////
    // Accessibility //
    ///////////////////
    function trapFocus(element) {
        var focusableEls = element.querySelectorAll('a[href]:not([disabled]), button:not([disabled]), textarea:not([disabled]), input[type="text"]:not([disabled]), input[type="radio"]:not([disabled]), input[type="checkbox"]:not([disabled]), select:not([disabled])');
        var firstFocusableEl = focusableEls[0];  
        var lastFocusableEl = focusableEls[focusableEls.length - 1];
        var KEYCODE_TAB = 9;
        
        element.addEventListener('keydown', function(e) {
            var isTabPressed = (e.key === 'Tab' || e.keyCode === KEYCODE_TAB);

            if (!isTabPressed) { 
                return; 
            }
            if ( e.shiftKey ) {
                /* shift + tab */
                if (document.activeElement === firstFocusableEl) {
                    lastFocusableEl.focus();
                    e.preventDefault();
                }
            } else { 
                /* tab */
                if (document.activeElement === lastFocusableEl) {
                    firstFocusableEl.focus();
                    e.preventDefault();
                }
            }
        });
    }

    // close sub-menu when mouse leaves it
    $("#menu-main, #menu-main .has_submenu[aria-expanded='false'] ~ .sub-menu[data-depth='0']").on( {
        'mouseleave':function() { 
            $("#menu-main .has_submenu >button").not(this).attr("aria-expanded","false").blur()
            $("#menu-main .has_submenu >button").attr("aria-expanded","false");
        }
    })

    $(".top-bar-nav, .top-bar-nav .has_submenu[aria-expanded='false'] ~ .sub-menu[data-depth='0']").on( {
        'mouseleave':function() { 
            $(".top-bar-nav .has_submenu >button").not(this).attr("aria-expanded","false").blur()
            $(".top-bar-nav .has_submenu >button").attr("aria-expanded","false");
        }
    })

    // Whey Keyboard navigation: Close the sub-menu when mouse is on other main menu items
    $(".menu-desktop >.mainmenu_item >a").on("focus",function(){
        $("#menu-main *").not(this).blur()
        $("#menu-main .has_submenu >button").attr("aria-expanded","false");
    })


    function mobile_menu_open() {
        $(".mobile_menu_toggle").attr("aria-pressed","true")
        $("#menu-subtree-simple").slideDown({
            start: function () {$(this).css({display: "flex"})},
            duration: 250}).addClass("expanded");
        $("body").addClass("mobile_menu_open");
        $("html").css("overflow",'hidden');
    }
    function mobile_menu_close() {
        $(".mobile_menu_toggle").attr("aria-pressed","false");
        $("#menu-subtree-simple").slideUp(250).removeClass("expanded");
        $("body").removeClass("mobile_menu_open");
        $("html").css("overflow",'initial');
        $(".has_submenu>button").attr('aria-expanded', function (i, attr) {
            return attr == 'true' ? 'false' : 'false'
        });
        $("#search-close").trigger("click")
    }

    $(".mobile_menu_toggle").on('click',function(){
        if ($(this).attr("aria-pressed") == "false") {
            mobile_menu_open()
        }
        else {
            mobile_menu_close()
        }
    })


    function reset_menu_resize() {
        $(".mobile_menu_toggle").attr("aria-expanded","false")
        $('.menu-desktop').removeClass("expanded").attr('style', function(i, style) {
            return style && style.replace(/display[^;]+;?/g, '');
        });
    }


	////////////////////////
	// Searchbox @ Topbar //
    ////////////////////////
	function searchOpen(){
		$(".searchbox").addClass("active");
		$(".searchbox .search_wrap").addClass("active");
	}
	function searchClose(){
		$(".search_wrap").removeClass("active");
		$(".searchbox").removeClass("active");
	}
	$(".topbar_search button, .topbar_search a").on("click",function(){
		if ($(".searchbox").hasClass("active")) {   
            $(this).focus()
            searchClose()
        }
		else {
            searchOpen();
            setTimeout(function(){$("#search_input").focus()},50)
            trapFocus(document.getElementById("searchbox"))
        }
	})
	$(".search_close").on("click",function(){ 
        searchClose()
        setTimeout(function(){$(".topbar_search button").focus()},50)
    })



    // Determine if the interaction is actioned by mouse or keyboard
    clicked_by = "mouse";
    $('*').on("mousedown",function(evt) {
        var KEYCODE_TAB = 9;
        var isTABPressed = (evt.key === 'Tab' || evt.keyCode === KEYCODE_TAB);
        if (evt.screenX == 0 && evt.screenY == 0 || isTABPressed) {clicked_by = "keyboard";} 
        else {clicked_by = "mouse";}

        if (clicked_by == "mouse") {
            //console.log("mouse");
            $(this).addClass("hidefocus");
            $("h1").blur();
        }

        else if (clicked_by == "keyboard") {
            //console.log("keyboard");
            $(this).removeClass("hidefocus");
        }
        
    });






    // --
    // Main Top Menu to hide when scrolling down and show when scrolling up
    // Must add add both function (scrolldirection,menu_main_fixed) in $(window).scroll AND $(window).resize
    // Also accompany with corresponding CSS
    // --

    // Scroll going UP or DOWN //
    // Returns scrollDir="up" or scrollDir="down" //
    var lastScrollTop = 0;
    function scrolldirection()
    {
        var st = $(this).scrollTop();
        if (st > lastScrollTop){scrollDir="down"; }
        else {scrollDir="up";}
        lastScrollTop = st;
    }
    scrolldirection()
    setTimeout (function(){$('header.fl-page-header').addClass("init")},250)
    function menu_main_fixed() {
        
        if (scrollDir=="up") $("body").removeClass("menu_main_out")
        if (scrollDir=="down") $("body").addClass("menu_main_out")

        if ($(window).scrollTop()>50) $("body").addClass("menu_main_scrolled")
        else $("body").removeClass("menu_main_scrolled")
        
        if ($(window).width()>993)  scroll_offset = 100
        else scroll_offset = 0
        if ($(window).scrollTop()<scroll_offset) $("body").removeClass("menu_main_out")

        // SlideUp all opened submenues
        $(".has_submenu >button").attr("aria-expanded","false")

    }
    menu_main_fixed()



    
    


	///////////////////
	// WINDOW RESIZE //
	///////////////////
	
	$(window).on( "resize", function() {
        reset_menu_resize()
        scrolldirection()
        menu_main_fixed()
	});	
	
	
	///////////////////
	// WINDOW SCROLL //
	///////////////////	
	
	$(window).on( "scroll", function() {
        scrolldirection()
        menu_main_fixed()
        searchClose()
	});

    

	
});
	