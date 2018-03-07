<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<title>登录</title>
<link rel="stylesheet" href="/crm/ui/css/layui.css">
<link rel="stylesheet" href="/crm/css/style.css">
<!--[if lt IE 9]>
  <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
  <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body class="body-with-bg">
	<div class="login-box">
		<div class="layui-form-item">
		<div class="layui-inline">
		<div class="layui-input-inline my-length">
		<input type="text" name="name" placeholder="请输入帐号" autocomplete="off" class="layui-input ">
		</div>
		<div class="layui-input-inline my-length">
		<input type="password" name="password" lay-verify="pass" placeholder="请输入密码" autocomplete="off" class="layui-input">
		</div>
		<button class="layui-btn my-submit" lay-submit="" lay-filter="*">登录</button>
		</div>
		</div>
	</div>
	<div class="clear"></div>
	<div class="footer"><p>Copyright ©2013-2017 版权所有</p></div>
</body>
</html>
