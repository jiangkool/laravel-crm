<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="UTF-8"/>
<meta http-equiv="Cache-Control" content="no-transform"/>
<meta http-equiv="Cache-Control" content="no-siteapp"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
<meta http-equiv="Content-Language" content="zh-CN" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
<title>@yield('title')</title>
<meta name="description" content="@yield('description')" />
<meta name="keywords" content="@yield('keywords')" />
<link rel="stylesheet" type="text/css" href="/css/style.css" media="screen"/>
<link rel="stylesheet" type="text/css" href="/css/font-awesome.min.css" media="screen"/>
<script src="/js/jquery.min.js" type="text/javascript"></script>
<script src="/js/zblogphp.js" type="text/javascript"></script>
<!--[if lt IE 9]>
<script type="text/javascript" src="/js/html5-css3.js"></script>
<![endif]-->
</head>
<body>
@yield('header')
<div class="container">
  <main class="main" role="main">
    @yield('banner')
    <div class="clear"></div>
    @yield('leftcon')
  </main>
  @yield('sider')
</div>
@yield('footer')
</body>
</html>