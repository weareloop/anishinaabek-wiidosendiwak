jQuery(document).ready(function ($) {
    console.log('people.js ready');
    //////////////////////////
    // People Adjust Height //
    //////////////////////////
    function people_adjust_height() {
        $(".people-container .people-list").each(function(){
            
            
            
            let people_count = $(this).find(".people-list_item").length;
            let people_counter = 1;

            let people_cols = 3
            if ($(window).width()<=1366) people_cols = 2
            if ($(window).width()<=768) people_cols = 1

            let people_rows = Math.ceil(people_count/people_cols);

            $(this).find('.people-list_item .item--details').height("initial");



           // console.log("ppl_count = "+people_count)
           // console.log(people_rows +" rows / "+people_cols+" cols")
            
            for (a=0;a<people_rows;a++) {
                
                maxHeight = -1;

                for (b=0;b<people_cols;b++) {
                    //console.log("current element("+(people_counter+b)+") height: "+$(this).find('.people-list_item:nth-child('+(people_counter+b)+') .item--details').height())
                    if ($(this).find('.people-list_item:nth-child('+(people_counter+b)+') .item--details').height()>maxHeight)
                        maxHeight = $(this).find('.people-list_item:nth-child('+(people_counter+b)+') .item--details').height()     
                }

               // console.log("==> FINAL MAXH = "+maxHeight)               


                for (b=0;b<people_cols;b++) {
                    
                   // console.log("row "+a+" / element "+people_counter+" / maxheight "+maxHeight)
                    $(this).find('.people-list_item:nth-child('+people_counter+') .item--details').height(maxHeight);
                    people_counter++;
                    if (people_counter>=people_count+1) {break}
                }

               // console.log("------------------------")   

                


            }

            
            
        })
    }
    
    people_adjust_height();


    $("body").on("click", ".people-container:not(.partner) .moreBtn", 
        function(){
            $(this).text("Close");
            $(this).parent().parent().find(".moreDetails").slideDown(250);
            $(this).removeClass("moreBtn");
            $(this).addClass("lessBtn");
        }
    )
    $("body").on("click", ".people-container:not(.partner) .lessBtn", 
        function(){
            $(this).text("See Bio");
            $(this).parent().parent().find(".moreDetails").slideUp(250);
            $(this).removeClass("lessBtn");
            $(this).addClass("moreBtn");
        }
    )

    $("body").on("click", ".people-container.partner .moreBtn", 
        function(){
            $(this).text("Close");
            $(this).parent().parent().find(".moreDetails").slideDown(250);
            $(this).removeClass("moreBtn");
            $(this).addClass("lessBtn");
        }
    )
    $("body").on("click", ".people-container.partner .lessBtn", 
        function(){
            $(this).text("Learn More");
            $(this).parent().parent().find(".moreDetails").slideUp(250);
            $(this).removeClass("lessBtn");
            $(this).addClass("moreBtn");
        }
    )


    // WINDOW RESIZE //
    $(window).on( "resize", function() {
        people_adjust_height();
    });

    // WINDOW SCROLL //
    $(window).on( "scroll", function() {

    });

});