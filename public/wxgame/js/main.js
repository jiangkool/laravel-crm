//onMouseMove
var p = document.getElementById("p0");
var startx;
var starty;
p.addEventListener("touchmove", function(e) {
	startx = e.changedTouches[0].pageX;
	starty = e.changedTouches[0].pageY;
	$("#guan").css({ "top": starty + "px", "left": startx + 'px' });
}, false);
//初始速度
var sppe = 7;
var x = 0;
var y = 0;
var sj = 0;
var fs = 0;
var hb = 10;
var num2 = 50;
$("#fs").html(fs);
var src;
//家到上边距

fun1();

var time = setInterval(function fun() {
var jiatop = $("#jia").offset().top;
var jiaheight = $("#jia").height() + jiatop;
var jialeft = $("#jia").offset().left;
var jiawidth = $("#jia").width() + jialeft;
//console.log(jiatop+''+jiaheight+" "+jialeft+" "+jiawidth);
	sj += 1;

	//	console.log($(".guai").length);
	if($(".guai").length <= 5) {
		if(sj % 110 == 5) {
			for(var k = 0; k <= 1; k++) {
				fun1();
			}
		}
	}

	for(var i = 0; i <= $(".guai").length - 1; i++) {
		
		//		console.log(222);
		if($(".guai").eq(i).offset().top < jiatop &&
			$(".guai").eq(i).offset().left < jialeft) {
			$(".guai").eq(i).css("top", ($(".guai").eq(i).offset().top + sppe) + "px");
			$(".guai").eq(i).css("left", ($(".guai").eq(i).offset().left + sppe) + "px");
			
			//右上角
		} else if($(".guai").eq(i).offset().top < jiatop &&
			$(".guai").eq(i).offset().left > jiawidth) {
			$(".guai").eq(i).css("top", ($(".guai").eq(i).offset().top + sppe) + "px");
			$(".guai").eq(i).css("left", ($(".guai").eq(i).offset().left - sppe) + "px");
			//左下角
		} else if($(".guai").eq(i).offset().top > jiaheight &&
			$(".guai").eq(i).offset().left < jialeft) {
			$(".guai").eq(i).css("top", ($(".guai").eq(i).offset().top - sppe) + "px");
			$(".guai").eq(i).css("left", ($(".guai").eq(i).offset().left + sppe) + "px");
			//右下角
		} else if($(".guai").eq(i).offset().top > jiaheight &&
			$(".guai").eq(i).offset().left > jiawidth) {
			$(".guai").eq(i).css("top", ($(".guai").eq(i).offset().top - sppe) + "px");
			$(".guai").eq(i).css("left", ($(".guai").eq(i).offset().left - sppe) + "px");
			//左边
		} else if($(".guai").eq(i).offset().top <= jiaheight &&
			$(".guai").eq(i).offset().top >= jiatop &&
			$(".guai").eq(i).offset().left < jialeft) {
			$(".guai").eq(i).css("left", ($(".guai").eq(i).offset().left + sppe) + "px");
			//右边
		} else if($(".guai").eq(i).offset().top <= jiaheight &&
			$(".guai").eq(i).offset().top >= jiatop &&
			$(".guai").eq(i).offset().left > (jiawidth - $(".guai").eq(i).width())) {
			$(".guai").eq(i).css("left", ($(".guai").eq(i).offset().left - sppe) + "px");
			//上边
		} else if($(".guai").eq(i).offset().top < jiatop &&
			$(".guai").eq(i).offset().left <= jiawidth &&
			$(".guai").eq(i).offset().left >= jialeft) {
			$(".guai").eq(i).css("top", ($(".guai").eq(i).offset().top + sppe) + "px");
			//下边
		} else if($(".guai").eq(i).offset().top > (jiaheight - $(".guai").eq(i).height()) &&
			$(".guai").eq(i).offset().left <= jiawidth &&
			$(".guai").eq(i).offset().left >= jialeft) {
			$(".guai").eq(i).css("top", ($(".guai").eq(i).offset().top - sppe) + "px");
		} else if($(".guai").eq(i).offset().top <= (jiaheight - $(".guai").eq(i).height()) &&
			$(".guai").eq(i).offset().top >= jiatop &&
			$(".guai").eq(i).offset().left <= (jiawidth - $(".guai").eq(i).width()) &&
			$(".guai").eq(i).offset().left >= jialeft) {
			//				console.log(111);
			hb--;
			var num1 = hb / 10 * 100;
			$("#hb").css("width", num1 + "%");
			$(".guai").eq(i).css("display","none");
			var obj =$(".guai")[i];
			fun2(obj);
			if(hb == 0) {
				clearTimeout(time);
				var total=fs;
				$("#p0").css("display", "none");
				$("#p4").css("display","block");
				$.post(url + "/save_game_shlw_score",{ score:fs, _token:$('meta[name="csrf-token"]').attr('content') }, 
					function(data) {
					if(data.code == 0) {
						$(".guai").remove();

						$("#p4").css("display","none");
						$("#p1").css("display", "block");
						$("#p1>span").html(total);
					}
				});
			}

			//左上角
		}else{
			alert("游戏加载出错!重新加载");
			window.location.href = "/shlw-main";
		}
		if($(".guai").eq(i).offset().top <= ($("#guan").offset().top + $("#guan").height()) &&
			($(".guai").eq(i).offset().top + $(".guai").eq(i).height()) >= $("#guan").offset().top &&
			$(".guai").eq(i).offset().left <= ($("#guan").offset().left + $("#guan").height()) &&
			($(".guai").eq(i).offset().left + $(".guai").eq(i).width()) >= $("#guan").offset().left) {
			$(".guai").eq(i).css("display","none");
			var obj =$(".guai")[i];
//			console.log(obj);
			fs++;
			$("#fs").html(fs);
			if(fs % 30 == 0) {
				sppe += 2;
			}
			fun2(obj);

		}
	}
}, num2);
//创建对象
function fun1() {
	var num = Math.floor(Math.random() * 4);
	var num1 = Math.floor(Math.random() * 4);

	if(num == 0) { //上
		y = 0;
		x = Math.random() * $("#p0").width();

	} else if(num == 1) { //右
		y = Math.random() * $("#p0").height();
		x = $("#p0").width();

	} else if(num == 2) { //下	
		y = $("#p0").height();
		x = Math.random() * $("#p0").width();

	} else { //左
		y = Math.random() * $("#p0").height();
		x = 0;
	}
	if(num1 == 0) { //怪1
		src = "/wxgame/img/gui.png";
	} else if(num1 == 1) { //怪2
		src = "/wxgame/img/gui1.png";
	} else if(num1 == 2) { //怪3
		src = "/wxgame/img/gui2.png";
	} else { //怪4

		src = "/wxgame/img/gui4.png";
	}
	$("#p0").append('<img src=' + src + ' style="top:' + y + 'px;left:' + x + 'px;" class="guai"/>');
	
}
function fun2(obj){
	var num2= Math.floor(Math.random() * 4);

if(num2 == 0) { //上
		obj.style.top = 0+"px";
		obj.style.left = Math.random() * $("#p0").width()+"px";

	} else if(num2== 1) { //右
		obj.style.top = Math.random() * $("#p0").height()+"px";
		obj.style.left = $("#p0").width()+"px";

	} else if(num2 == 2) { //下	
		obj.style.top = $("#p0").height()+"px";
		obj.style.left = Math.random() * $("#p0").width()+"px";

	} else { //左
		obj.style.top = Math.random() * $("#p0").height()+"px";
		obj.style.left = 0+"px";
	}
	obj.style.display="block";
	}
$("#p1>img").eq(0).click(function() {
	window.location.href = "/shlw-main";
});
$("#p1>img").eq(1).click(function() {
	window.location.href = "/shlw-bottom";
});
$("#p1>img").eq(2).click(function() {
	window.location.href = "/shlw-biaodan";
});