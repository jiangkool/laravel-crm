
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

//window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

//Vue.component('example', require('./components/Example.vue'));

/*const app = new Vue({
    el: '#app'
});*/


window._ =require('lodash');
window.$ = window.jQuery =require('jquery');

window.Pusher =require('pusher-js');
import Echo from "laravel-echo";
window.Echo =new Echo({
    broadcaster:'pusher',
    key:'9cebe281846450fe2960',
    cluster: 'mt1',
    encrypted: true
});


    window.Echo.private(`App.Models.User.${Laravel.userId}`)
	.notification((notification)=>{
		var tpl='<li class="am-comment"> <a href="#"><img src="http://s.amazeui.org/media/i/demos/bw-2014-06-19.jpg?imageView/1/w/96/h/96" alt="" class="am-comment-avatar" width="48" height="48"></a> <div class="am-comment-main"> <header class="am-comment-hd"> <div class="am-comment-meta"><a href="#" class="am-comment-author">'+notification.author+'</a> 发布于 <small>'+notification.fbtime+'</small></div> </header> <div class="am-comment-bd"><a href="'+notification.aid+'">'+notification.title+'</a> </div> </div> </li> ';
		$("#notifications li:eq(0)").before(tpl);
	}); 

  


