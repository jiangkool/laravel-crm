<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	 <link rel="stylesheet" href="/assets/css/amazeui.min.css">
</head>
<body>
@if(Session::has('message'))
<div class="am-modal am-modal-alert" tabindex="-1" id="my-alert">
  <div class="am-modal-dialog">
    <div class="am-modal-hd">温馨提示！</div>
    <div class="am-modal-bd">
     {{ Session::get('message') }}
    </div>
    <div class="am-modal-footer">
      <span class="am-modal-btn">确定</span>
    </div>
  </div>
</div>
 @else
          @include('layouts.errors')

@endif
<div class="am-container">	
<p></p>	
<form action="{{ route('store_guahao') }}" method="post" class="am-form">
<fieldset>
<legend>在线留言咨询</legend>
	{{ csrf_field() }}
	<div class="am-form-group">
      <label for="name">姓名</label>
      <input type="text" name="name" id="name" minlength="2" placeholder="输入姓名" required="required">
    </div>
	<div class="am-form-group">
      <label for="phone">电话</label>
      <input type="text" name="phone" minlength="11" maxlength="11" pattern="^\d{11}$" id="phone"  placeholder="输入电话" required="required">
    </div>
    <div class="am-form-group">
      <label for="desc">病情</label>
      <textarea name="desc" rows="5" id="desc" required="required"></textarea>
    </div>
    <input type="hidden" name="from" value="{{ $url }}">
	<button type="submit" class="am-btn am-btn-default">提交</button>	
	<hr>	
	<blockquote>
  <p>无论走到哪里，都应该记住，过去都是假的，回忆是一条没有尽头的路，一切以往的春天都不复存在，就连那最坚韧而又狂乱的爱情归根结底也不过是一种转瞬即逝的现实。</p>
  <small>马尔克斯 ——《百年孤独》</small>
</blockquote>
</fieldset>
</form>
	</div>
<script src="/assets/js/jquery.min.js"></script>
<script src="/assets/js/amazeui.min.js"></script>
<script>
var $modal = $('#my-alert');$modal.modal('toggle');
</script>
</body>
</html>