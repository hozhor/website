




$(document).ready(function(){
	  $(".qrcode-img").hide()//隐藏go to top按钮
  $(".qrcode-button").click(function(){
    $(".qrcode-img").animate({
      width:'toggle'
    });
  });


});





  $(document).ready(function(){

    $(function(){   
  $(window).scroll(function() {
    //$("body").css({"background-position":"center "+$(window).scrollTop()+""});
    if($(window).scrollTop()>=180){
        $(".nav").addClass("fixedNav");
    }else{
        $(".nav").removeClass("fixedNav");

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
    });


