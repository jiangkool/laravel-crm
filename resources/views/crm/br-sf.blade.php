<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="apple-mobile-web-app-status-bar-style" content="black"> 
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="format-detection" content="telephone=no">
<title>病人随访</title>
<link rel="stylesheet" href="ui/css/layui.css">
<link rel="stylesheet" href="css/style.css">
<!--[if lt IE 9]>
  <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
  <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body>
	<div class="top">
		<div class="layui-container">
		<div class="top-head">
			<div class="member-info fr">
				<p>
				欢迎您！<span class="color-white">admin</span>  <a href="" class="layui-btn layui-btn-normal layui-btn-small"> 退出 </a><br><span id="show-time"></span>
				</p>
			</div>
		</div>
		</div>
	</div><!-- /top -->
	<div class="menu">
		<div class="layui-container">
			<div class="blank10"></div>
			<a href="">首页</a>
			<a href="">病人管理</a>
			<a href="" class="layui-btn layui-btn-normal layui-btn-small">随访管理</a>
			<a href="">已到诊管理</a>
			<a href="">管理员设置</a>
		</div>
	</div><!-- /menu -->
	<div class="blank30"></div>
	<div class="layui-container">
			<div class="search-box sf-box">
				<div class="blank30"></div>
				<form class="layui-form layui-form-pane3" action="">
					<div class="layui-form-item">
					<div class="layui-inline">
					<label class="layui-form-label">上次随访时间</label>
					<div class="layui-input-inline"  style="width: 150px;">
  						<input type="text" name=""  class="layui-input" id="select-time">
					</div>
					</div>
					<div class="layui-inline">
					<label class="layui-form-label">上次随访结果</label>
					<div class="layui-input-block"  style="width: 160px;">
					<select name="sf-result">
					<option value="1">急性发作，需住院</option>
					<option value="0">急性发作，需住院</option>
					</select>
					</div>
					</div>
					<div class="layui-inline">
					<label class="layui-form-label">网络初诊病种</label>
					<div class="layui-input-block"  style="width: 160px;">
					<select name="sf-result">
					<option value="1">急性发作，需住院</option>
					<option value="0">急性发作，需住院</option>
					</select>
					</div>
					</div>
					<div class="layui-inline">
					<label class="layui-form-label">随访次数</label>
					<div class="layui-input-inline" style="width: 80px;">
					<input type="text" name="phone" placeholder="56" autocomplete="off" class="layui-input">
					</div>
					</div>
					<div class="blank15"></div>
					<div class="layui-inline">
					<label class="layui-form-label">姓名</label>
					<div class="layui-input-inline" style="width: 100px;">
					<input type="text" name="name" placeholder="张三" autocomplete="off" class="layui-input">
					</div>
					</div>
					<div class="layui-inline">
					<div class="layui-input-inline">
					  <input type="checkbox"  name="block-user" value="0" title="黑名单">
					</div>
					</div>
					</div>
					<div class="layui-form-item">
					<div class="layui-input-block text-center">
					<button class="layui-btn" lay-submit lay-filter="search-br">搜索病人</button>
					</div>
					</div>
  			</form>
			</div> <!--/ search -->
			<div class="blank20"></div>
			<!-- <table id="search-result" lay-filter="result"></table> -->
			<div class="blank30"></div>
	</div>
<script src="ui/layui.js"></script>
<script src="js/app.js"></script>
</body>
</html>