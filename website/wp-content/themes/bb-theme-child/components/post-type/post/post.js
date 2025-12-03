jQuery(document).ready(function ($) {
    //console.log('post.js ready');
    $('button.cat-btn').on('click', function(event) {
        //console.log($(this).attr('data-term'));
        event.preventDefault();
        var active = $(this);
        var cat = $(this).attr('data-term');

        $.ajax({
            type: 'POST',
            url: '/wp-admin/admin-ajax.php',
            dataType: 'html',
            data: {
              action: 'filter_projects',
              category: cat
            },
            beforeSend: function() {
                $('.post-lists').css("opacity", 0);
                $('.post-lists').css("max-height","0px");
                $('button.cat-btn').removeClass('active');
                $('.loading').css("display", 'block');
            },
            complete:function() {
                $('.loading').css("display", 'none');
            },
            success: function(res) {
                console.log("success");
                $('.post-lists').css("max-height","5000px");
                $('.post-lists').html(res);
                $('.post-lists').css("opacity", 1);
                active.addClass('active');
                $(".loadMore_btn").each(
                    function(){
                        console.log($(this).parents(".fl-col-content").find(".post-lists").children(".active").length);
                        console.log($(this).parents(".fl-col-content").find(".post-lists").children().length);

                        if($(this).parents(".fl-col-content").find(".post-lists").children(".active").length==$(this).parents(".fl-col-content").find(".post-lists").children().length){
                            $(this).parent().hide();
                        }else{
                            $(this).parent().show();
                        }
                    }
                );
            }

          })
    });

    $('.post-list').on('click', function(){
        var link = $(this).find('a').attr('href');
        var win = window.open(link, '_blank');
        win.focus();
    });

    $('.cat-clear .clear').on('click', function(){
        $('button.cat-btn.all').trigger("click");
    });

    //Load more Btn
    $("body").on('click', ".loadMore_btn", function (e) {
        var perpage = $(this).attr("class").split("perpage_")[1].split(" ")[0];
        
        $(this).parents(".fl-col-content").find(".post-list:not(.active)").each(function(){
            if(perpage>=0){
                $(this).addClass("active");
            }
            perpage--;
        });
        if($(this).parents(".fl-col-content").find(".post-lists").children(".active").length==$(this).parents(".fl-col-content").find(".post-lists").children().length){
            $(this).parent().hide();
        }
    });
    
    //Load more Btn hidden on fully loaded
    $(".loadMore_btn").each(
        function(){
            console.log($(this).parents(".fl-col-content").find(".post-lists").children(".active").length);
            console.log($(this).parents(".fl-col-content").find(".post-lists").children().length);

            if($(this).parents(".fl-col-content").find(".post-lists").children(".active").length==$(this).parents(".fl-col-content").find(".post-lists").children().length){
                $(this).parent().hide();
            }else{
                $(this).parent().show();
            }
        }
    );
});
