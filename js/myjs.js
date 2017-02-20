




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

            $(".white.air8").toggleClass("air12");
             $(".white.air4.last").toggleClass("airhide");

        });        

    });


