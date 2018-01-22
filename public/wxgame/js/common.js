
var domain_url="http://app.027baijia.com",url="http://app.027baijia.com";


//微信jssdk接口
$.post(url+'/get_jssdk',{shareurl:window.location.href, _token:$('meta[name="csrf-token"]').attr('content')},function(data1){
   
    wx.config({
        debug: false,
        appId: data1.data.appId,
        timestamp: data1.data.timestamp,
        nonceStr: data1.data.nonceStr,
        signature: data1.data.signature,
        jsApiList: ['onMenuShareAppMessage','onMenuShareTimeline']
    });

    wx.ready(function() {
        // 在这里调用 API
        wx.onMenuShareAppMessage({
            title:'光韵霜—老吴的守护者', // 分享标题
            desc: '挥动手中的光韵霜，一起击退坏坏，保护老吴吧。更有光韵霜礼品等你来拿。', // 分享描述
            link: window.location.href, // 分享链接
            imgUrl: domain_url + "/wxgame/img/jia.png", 
            type: '', 
            dataUrl: ''
        });
        wx.onMenuShareTimeline({
            title: '光韵霜—老吴的守护者', 
            link: window.location.href, 
            imgUrl: domain_url + "/wxgame/img/jia.png", 

        });
    });

});