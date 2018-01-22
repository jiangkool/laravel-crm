(function($) {
  'use strict';

  $(function() {
    var $fullText = $('.admin-fullText');
    $('#admin-fullscreen').on('click', function() {
      $.AMUI.fullscreen.toggle();
    });

    $(document).on($.AMUI.fullscreen.raw.fullscreenchange, function() {
      $fullText.text($.AMUI.fullscreen.isFullscreen ? '退出全屏' : '开启全屏');
    });
  });
})(jQuery);


$(function() {
  $('#doc-modal-list').find('.am-delete').add('#doc-confirm-toggle').on('click', function() {
      $('#my-confirm').modal({
        relatedTarget: this,
        onConfirm: function(options) {
          var $link = $(this.relatedTarget);
         // alert($link.data('id'))
          window.location.href='/admin/course/'+$link.data('id')+'/delete'
        },
        // closeOnConfirm: false,
        onCancel: function() {
        }
      });
    });

   $('#doc-modal-list').find('.am-delete2').add('#doc-confirm-toggle').on('click', function() {
      $('#my-confirm').modal({
        relatedTarget: this,
        onConfirm: function(options) {
          var $link = $(this.relatedTarget);
          window.location.href='/admin/customer/'+$link.data('id')+'/delete'
        },
        // closeOnConfirm: false,
        onCancel: function() {
        }
      });
    });
});

$("#bmsearch").click(function(){
  var course_id=$("#course_id").val();
  var key=$("#keywords").val();
  if (getParam("time")==null) {
  window.location.href='/admin/customer?course_id='+course_id+'&phone='+key;
}else{
  window.location.href='/admin/customer?time='+getParam("time")+'&course_id='+course_id+'&phone='+key;
}


})

$("#jskc").click(function(){
  var course_name=$("#course_name").val();
  window.location.href='/admin/course?course_name='+course_name;


})


function getParam(paramName) { 
    paramValue = "", isFound = !1; 
    if (this.location.search.indexOf("?") == 0 && this.location.search.indexOf("=") > 1) { 
        arrSource = unescape(this.location.search).substring(1, this.location.search.length).split("&"), i = 0; 
        while (i < arrSource.length && !isFound) arrSource[i].indexOf("=") > 0 && arrSource[i].split("=")[0].toLowerCase() == paramName.toLowerCase() && (paramValue = arrSource[i].split("=")[1], isFound = !0), i++ 
    } 
    return paramValue == "" && (paramValue = null), paramValue 
} 


$('.btn-loading-submit').click(function () {
  var $btn = $(this)
  $btn.button('loading');
    setTimeout(function(){
      $btn.button('reset');
  }, 5000);
});