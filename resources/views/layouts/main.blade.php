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
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>@yield('title')</title>
<link rel="stylesheet" href="/crm/ui/css/layui.css">
<link rel="stylesheet" href="/crm/css/style.css">
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
				欢迎您！<span class="color-white">{{ Auth::user()->name }}</span>  <a href="{{ route('logout') }}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="layui-btn layui-btn-normal layui-btn-small"> 退出 </a><br><span id="show-time"></span>
				</p>
			</div>
		</div>
		<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
                </form>
		</div>
	</div><!-- /top -->
	<div class="menu">
		<div class="layui-container">
			<div class="blank10"></div>
			<a href="{{ route('login') }}" @if(request()->is('admin/login')) class="layui-btn layui-btn-normal layui-btn-small" @endif>首页</a>
			<a href="{{ route('customer.index') }}" @if(request()->is('admin/customer')) class="layui-btn layui-btn-normal layui-btn-small" @endif>病人管理</a>
			<a href="{{ route('customer.create') }}" @if(request()->is('admin/customer/create')) class="layui-btn layui-btn-normal layui-btn-small" @endif>新增病人</a>
			<a href="{{ route('follow.index') }}" @if(request()->is('admin/follow')) class="layui-btn layui-btn-normal layui-btn-small" @endif>随访管理</a>
			<a href="{{ route('customer.daozhen') }}" @if(request()->is('admin/customer-daozhen')) class="layui-btn layui-btn-normal layui-btn-small" @endif>已到诊管理</a>
			@if(array_key_exists('admin.config',Session::get('admin_permissions')))
			<a href="{{ route('admin.config') }}" @if(request()->is('admin/config')) class="layui-btn layui-btn-normal layui-btn-small" @endif>管理员设置</a>
			@endif
		</div>
	</div><!-- /menu -->
	<div class="blank30"></div>
	<div class="layui-container">
			@yield('content')
	</div>
<script>
	var user_id='{!!Auth::id()!!}';
	var admin_id='{!!Auth::user()->name!!}';
</script>
<script src="/crm/ui/layui.js"></script>
<script src="/crm/js/app.js"></script>
</body>
</html>