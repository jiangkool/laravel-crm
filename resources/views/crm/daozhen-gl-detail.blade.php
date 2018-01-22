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
<title>已到诊管理-展示页</title>
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
			<a href="" >随访管理</a>
			<a href="" class="layui-btn layui-btn-normal layui-btn-small">已到诊管理</a>
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
					<label class="layui-form-label">归属</label>
					<div class="layui-input-inline"  style="width: 100px;">
					<select name="sf-result">
					<option value="1">归属</option>
					<option value="0">归属</option>
					</select>
					</div>
					</div>
					<div class="layui-inline">
					<label class="layui-form-label">上次随访时间</label>
					<div class="layui-input-inline"  style="width: 200px;">
  						<input type="text" name=""  class="layui-input" id="select-time">
					</div>
					</div>
					<div class="layui-inline">
					<label class="layui-form-label">首次咨询时间</label>
					<div class="layui-input-inline"  style="width: 200px;">
  						<input type="text" name=""  class="layui-input" id="first-zx-time">
					</div>
					</div>
					</div>
					<div class="layui-form-item">
					<div class="layui-inline">
					<label class="layui-form-label">姓名</label>
					<div class="layui-input-inline" style="width: 100px;">
					<input type="text" name="name" placeholder="张三" autocomplete="off" class="layui-input">
					</div>
					</div>
					<div class="layui-inline">
					<label class="layui-form-label">性别</label>
					<div class="layui-input-inline"  style="width: 100px;">
					<select name="sf-result">
					<option value="1">男</option>
					<option value="0">女</option>
					</select>
					</div>
					</div>
					<div class="layui-inline">
					<label class="layui-form-label">手机号</label>
					<div class="layui-input-inline" style="width: 120px;">
					<input type="text" name="phone" placeholder="13240533525" lay-verify="required|phone|number" autocomplete="off" class="layui-input">
					</div>
					</div>
					<div class="layui-inline">
						<label class="layui-form-label">预约医生</label>
						<div class="layui-input-inline" style="width: 100px;">
						<select name="sex">
						<option value="1">肖强</option>
						<option value="0">张二二</option>
						</select>
						</div>
						</div>
						<div class="layui-inline">
					<label class="layui-form-label">就诊病种</label>
					<div class="layui-input-inline"  style="width: 160px;">
					<select name="sf-result">
					<option value="1">睡眠障碍</option>
					<option value="0">睡眠障碍</option>
					</select>
					</div>
					</div>
					</div>
					<div class="layui-form-item">
					<div class="layui-input-block text-center">
					<button class="layui-btn" lay-submit lay-filter="search-dz-br">搜索</button>
					</div>
					</div>
  			</form>
			</div> <!--/ search -->
			<div class="blank20"></div>
			<table id="ydz-search-result" lay-filter="sf-search"></table>
			<div class="blank30"></div>
	</div>
<script src="ui/layui.js"></script>
<script src="js/app.js"></script>
</body>
</html>