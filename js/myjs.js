// 打印
var global_Html = "";
function printme() {
    global_Html = document.body.innerHTML;
    document.body.innerHTML = document.getElementById('primary').innerHTML;　　　　　　　　　　　　　　
    window.print();
    window.setTimeout(function() {
        document.body.innerHTML = global_Html;
    }, 500);
}

// 喜欢
$(document).ready(function() { 
    $.fn.postLike = function() {
        if ($(this).hasClass('done')) {
            alert('您已赞过本博客');
            return false;
        } else {
            $(this).addClass('done');
            var id = $(this).data("id"),
            action = $(this).data('action'),
            rateHolder = $(this).children('.count');
            var ajax_data = {
                action: "bigfa_like",
                um_id: id,
                um_action: action
            };
            $.post("<?php bloginfo('url');?>/wp-admin/admin-ajax.php", ajax_data, function(data) {
                $(rateHolder).html(data);
            });
            return false;
        }
    };
    $(document).on("click", ".favorite", function() {
        $(this).postLike();
    });
}); 




$(document).ready(function(){
	  $(".qrcode-img").hide()//隐藏go to top按钮
  $(".qrcode-button").click(function(){
    $(".qrcode-img").animate({
      width:'toggle'
    });
  });


});





  $(document).ready(function(){

$('.archives ul.archives-monthlisting').hide();
$('.archives ul.archives-monthlisting:first').show();
$('.m-title').click(function() {
    $(this).next().slideToggle('fast');
    return false;
});







    $(function(){   
  $(window).scroll(function() {
    //$("body").css({"background-position":"center "+$(window).scrollTop()+""});
    if($(window).scrollTop()>=180){
        $(".top-navber-tag").addClass("fixedNav");
    }else{
        $(".top-navber-tag").removeClass("fixedNav");

    } 
  });
});







        $("#returnTop").hide()//隐藏go to top按钮
        $(function(){
            $(window).scroll(function(){
                if($(this).scrollTop()>10){//当window的scrolltop距离大于1时，go to top按钮淡出，反之淡入
                    $("#returnTop").fadeIn();
                } else {
                    $("#returnTop").fadeOut();
                }
            });
        });
    

        // 给go to top按钮一个点击事件
        $("#returnTop").click(function(){
            $("html,body").animate({scrollTop:0},800);//点击go to top按钮时，以800的速度回到顶部，这里的800可以根据你的需求修改
            return false;
        });
         /**/


         $("#fontsize").click(function(){
           if($("#fontsize").text()=="A+"){ 
            $(".single-content").addClass("fontsmall");
            $("#fontsize").empty();
            $("#fontsize").prepend("<li>A-</li>");
        }else{
            $(".single-content").removeClass("fontsmall");
            $("#fontsize").empty();
            $("#fontsize").prepend("<li>A+</li>");
        }
        });

         $(".r-hide").click(function(){
           if($(".air8.bg_w.p_r").attr("class")=="air8 bg_w p_r"){ 
            $(".air8.bg_w.p_r").addClass("air12");
            $(".air4.last.bg_w").addClass("airhide");

            $(".fa.fa-caret-left").addClass("fa-flip-horizontal");
            $(".fa.fa-caret-right").addClass("fa-flip-horizontal");

        }else{
            $(".air8.bg_w.p_r").removeClass("air12");
            $(".air4.last.bg_w").removeClass("airhide");
            $(".fa.fa-caret-left.fa-flip-horizontal").removeClass("fa-flip-horizontal");
            $(".fa.fa-caret-right.fa-flip-horizontal").removeClass("fa-flip-horizontal");

        }


        });        

    });


