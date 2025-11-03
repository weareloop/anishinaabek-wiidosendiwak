jQuery(document).ready(function ($) {
    console.log('featured-cards.js ready');

    
        

        $("body:not(.fl-builder-edit) .featured_expandable_item").each(function(){
            
            
            $item_height_title= parseInt($(this).find(".card-carousel-title").css("height"))
            $item_height_icon = parseInt($(this).find(".card-carousel-icon").css("height"))
            $item_height_txt = parseInt($(this).find(".card-carousel-txt").css("height"))
            $item_height_cta = parseInt($(this).find(".card-carousel-cta").css("height"))

            //$item_height = $item_height_title + $item_height_icon +$item_height_txt + $item_height_cta
            $item_height = parseInt($(this).css("height"))
            $header_height = $item_height_title + $item_height_icon 

            // console.log($item_height_title)
            // console.log($item_height_icon)
            // console.log($item_height_txt)
            // console.log($item_height_cta)
            // console.log("--")

            $img_height = parseInt($(this).find(".card-carousel-img").css("height"));

            // console.log($item_height + " // " + $img_height)
            $(this).find(".card-carousel-img").css("height", $item_height-$header_height  + "px")


            $(this).find(".card-carousel-cta a").focus(function(){
                $(this).parents(".featured_expandable_item").find(".card-carousel-img").addClass("active")
            })
            $(this).find(".card-carousel-cta a").blur(function(){
                $(this).parents(".featured_expandable_item").find(".card-carousel-img").removeClass("active")
            })
                
        })

    function hideimg() {
        if ($(window).width()<1366)
            $(".featured_expandable_item").addClass("hideimg")
        else
            $(".featured_expandable_item").removeClass("hideimg")
    }
    hideimg()



    ///////////////////
    // WINDOW RESIZE //
    ///////////////////
    $(window).on( "resize", function() {
        hideimg()
    });        

})