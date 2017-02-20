

<div class="ad">
    <div class="box_top">
        <i class="rt"></i>
        <i class="lt"></i>
    </div>
    <div class="ads_c">
        <div id="idc_box">
            <ul>
                <dd class="hove"><tt class="hove">专业博客主机</tt><a href="http://idc.wopus.org/" target=_blank title="专业博客主机"><img src="http://imgs.zmingcx.com/wp-content/uploads/2013/10/idc-a.jpg"></a></dd>
                <dd><tt class="">国外主机</tt><a href="http://idc.wopus.org/" target=_blank title="国外主机"><img src="http://imgs.zmingcx.com/wp-content/uploads/2013/10/idc-c.jpg"></a></dd>
                <dd><tt class="">国内主机</tt><a href="http://idc.wopus.org/" target=_blank title="国内主机"><img src="http://imgs.zmingcx.com/wp-content/uploads/2013/10/idc-b.jpg"></a></dd>
            </ul>
        </div>
    </div>
    <div class="box-bottom">
        <i class="lb"></i>
        <i class="rb"></i>
    </div>
</div>
<style type="text/css">
#idc_box ul, #idc_box dd, #idc_box tt{
    margin:0px;
    padding:0px;
    float:left;
    list-style: none;
}
#idc_box{
    width:229px;
    height:230px;
    border-left: 1px solid #740a20;
}
#idc_box dd{
    width:21px;
    height:230px;
    overflow:hidden;
    position:relative;
}
#idc_box dd.hove{
    width:187px;
    text-align:right;
}
#idc_box dd tt{
    width:20px;
    height:230px;
    top:0px;
    left:0px;
    color:#fff;
    cursor:pointer;
    text-align:center;
    padding:20px 0 0 0;
    background:#b9000d;
    position:absolute;
    border-right:1px solid #740a20;
}
#idc_box dd tt.hove{
    background:#620317;
}
#hot_tag {
    position:absolute;
    padding:0 8px;
    height:50px;
    left:10px;
    top:-1px;
    border:1px solid #ccc;
}
</style>
<script type="text/javascript">
function myAddEvent(obj, sEvent, fn){
    return obj.attachEvent ? obj.attachEvent('on' + sEvent, fn) : obj.addEventListener(sEvent, fn, false);
}
function Class(oParent, sClass){
    var aElem = oParent.getElementsByTagName('*');
    var aClass = [];
    var i = 0;
    for(i=0;i<aElem.length;i++)if(aElem[i].className == sClass)aClass.push(aElem[i]);
    return aClass;
};
function css(obj, attr, value){
    if(arguments.length == 2){
        var style = obj.style,
            currentStyle = obj.currentStyle;
        if(typeof attr === 'string')return currentStyle ? currentStyle[attr] : getComputedStyle(obj, false)[attr];
        for(var propName in attr)propName == 'opacity' ? (style.filter = "alpha(opacity=" + attr[propName] + ")", style.opacity = attr[propName] / 100) : style[propName] = attr[propName]; 
    }else if(arguments.length == 3){
        switch(attr){
            case "width":
            case "height":
            case "paddingTop":
            case "paddingRight":
            case "paddingBottom":
            case "paddingLeft":
            case "top":
            case "right":
            case "bottom":
            case "left":
            case "marginTop":
            case "marginRigth":
            case "marginBottom":
            case "marginLeft":
                obj.style[attr] = value + "px";
                break;
            case "opacity":
                obj.style.filter = "alpha(opacity=" + value + ")";
                obj.style.opacity = value / 100;
                break;
            default:
                obj.style[attr] = value
        }
    }
};
function extend(destination, source){
    for (var propName in source) destination[propName] = source[propName];
    return destination
};
function doMove(obj, json, fnEnd){
    clearInterval(obj.timer);
    obj.iSpeed = 0;
    fnEnd = extend({
        type: "buffer",
        callback: function() {}
    }, fnEnd);
    obj.timer = setInterval(function(){
        var iCur = 0,
            iStop = true;
        for(var propName in json){
            iCur = parseFloat(css(obj, propName));
            propName == 'opacity' && (iCur = Math.round(iCur * 100));
            switch(fnEnd.type){
                case 'buffer':
                    obj.iSpeed = (json[propName] - iCur) / 5;
                    obj.iSpeed = obj.iSpeed > 0 ? Math.ceil(obj.iSpeed) : Math.floor(obj.iSpeed);
                    json[propName] == iCur || (iStop = false, css(obj, propName, iCur + obj.iSpeed));
                    break;
                case 'elasticity':
                    obj.iSpeed += (json[propName] - iCur) / 5;
                    obj.iSpeed *= 0.75;
                    Math.abs(json[propName] - iCur) <= 1 &&  Math.abs(obj.iSpeed) <= 1 ? css(obj, propName, json[propName]) : css(obj, propName, json[propName]) || (iStop = false, css(obj, propName, iCur + obj.iSpeed));
                    break;
                case 'accelerate':
                    obj.iSpeed = obj.iSpeed + 5;
                    iCur >= json[propName] ? css(obj, propName, json[propName]) : css(obj, propName, json[propName]) || (iStop = false, css(obj, propName, iCur + obj.iSpeed));
                break;
            }
        }
        if(iStop){
            clearInterval(obj.timer);
            obj.timer = null;
            obj.iSpeed = 0;
            fnEnd.callback();
        }
    },30);
};
</script>
<script type="text/javascript">
window.onload = function(){
    var oBox = document.getElementById('idc_box')
    var aSpan = document.getElementsByTagName('tt');
    var aLi = document.getElementsByTagName('dd');
    var playtime = null;
    var iNow = 0;
    for(i=0;i<aSpan.length;i++){
        aSpan[i].index = i;
        aSpan[i].onclick = function(){
            for(var len=aLi.length,i=0;i<len;i++)doMove(aLi[i], {width:21});
            for(var len=aSpan.length,i=0;i<len;i++)aSpan[i].className = '';
            this.className = 'hove';
            doMove(this.parentNode, {width:187});
            iNow = this.index;
        };
    }
    playtime = setInterval(tab,3500);
    oBox.onmouseover = function(){
        clearInterval(playtime);
    }
    oBox.onmouseout = function(){
        playtime = setInterval(tab,3500);
    }
    function tab(){
        iNow == aLi.length-1 ? iNow = 0 : iNow++;
        aSpan[iNow].onclick();
    }
};
</script>
