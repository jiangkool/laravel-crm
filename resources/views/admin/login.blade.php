<!DOCTYPE html>
<html>
<head lang="en">
  <meta charset="UTF-8">
  <title>Login</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="format-detection" content="telephone=no">
  <meta name="renderer" content="webkit">
  <meta http-equiv="Cache-Control" content="no-siteapp" />
  <link rel="alternate icon" type="image/png" href="assets/i/favicon.png">
  <link rel="stylesheet" href="assets/css/amazeui.min.css"/>
  <style>
    .header {
      text-align: center;
    }
    .header h1 {
      font-size: 2.4rem;
      color: #FFF;
      padding: 50px 0;
      letter-spacing: 2px
    }
    .header p {
      font-size: 14px;
      
    }
    .canvas-wrap h3{margin-top: 20px}
    #canvas{width:100%;height:100%;overflow:hidden;position:absolute;top:0;left:0;background-color:#009688}.canvas-content,.canvas-wrap{position:relative}.canvas-content{z-index:9;height:100%;}#particles-js{width:100%;height:100%;background-color:#009688;position:absolute;right:0;top:0}.index-content .indms1{border-right:1px solid #f9f9f9;padding:5pc 75pt 5pc 50px}.index-content .indms2{border-left:1px solid #f9f9f9;padding:5pc 50px 5pc 75pt}.index-content .center{float:left;width:20%}.index-content .line{width:3px;margin:0 auto;background:#f9f9f9;height:50pc}.index-content h2{font-size:18px;margin-bottom:20px}.index-content h2,.index-content h3{font-weight:100;color:#555;line-height:30px}.index-content h3{font-size:1pc;margin-bottom:30px}.index-content span{font-size:1pc;font-weight:100;color:#555;line-height:36px}.index-content span i{font-size:18px;color:#999;margin-right:9pt;position:relative;top:1px}.index-content p{font-size:14px;font-weight:100;color:#999;line-height:30px;margin-bottom:30px}.index-content .layui-btn{padding:0 28px}body{background:#fff}.cl{zoom:1}.cl:after{content:'\20';display:block;height:0;clear:both;visibility:hidden}.z{float:left}.y{float:right}.tpt-mab-40{margin-bottom:40px}.tpt-pat-75{padding-top:75px}.tpt-pab-75{padding-bottom:75px}.tpt-pat-20{padding-top:30px}.tpt-pab-20{padding-bottom:30px}.tpt-mat-30{margin-top:30px}@media only screen and (max-width:767px){.index-banner h2{font-size:30px;padding-top:90pt}.index-banner h3{font-size:14px;margin-top:20px;line-height:25px;padding:0 10px}.index-banner{height:25pc}.index-banner h4 a{padding:0 30px 0 40px;height:50px;line-height:46px}.index-content .indms1{border-bottom:1px solid #e8e8e8}.index-content .indms1,.index-content .indms2{border-right:0 solid #f9f9f9;padding:30px 10px 40px}#particles-js{height:25pc}.index-hda{height:20pc}.canvas-content{height:25pc}.index-content .layui-btn{padding:0 18px}}
  </style>
</head>
<body>
<section class="canvas-wrap">
<div class="canvas-content">
<div class="header">
  <div class="am-g">
    <h1><span class="am-icon-paper-plane"></span> 后台管理系统</h1>
  </div>
</div>
<div class="am-g" style="background: #FFF">
  <div class="am-u-lg-6 am-u-md-8 am-u-sm-centered">
    @include('layouts.errors')
    <h3><span class="am-icon-user-secret"></span> 管理登录</h3>
    <hr>
    <form method="POST" action="{{ route('checklogin') }}" class="am-form">
     {{ csrf_field() }}
      <label for="name">帐号:</label>
       <input id="name" type="text"  name="name" value="{{ old('name') }}"  autofocus required>
      <br>
      <label for="password">密码:</label>
     <input id="password" type="password"  name="password" required>
      <br>
      {!! Geetest::render() !!}
      <br />
      <div class="am-cf">
        <input type="submit" name="" value="点击登录" class="am-btn am-btn-secondary am-round">
       <!--  <input type="submit" name="" value="忘记密码 ^_^? " class="am-btn am-btn-default am-btn-sm am-fr"> -->
      </div>
    </form>
  </div>
  <hr>
<footer class="am-text-center"><p>© 2017 Kream license.</p></footer>
</div>
</div>
<div id="particles-js"></div>
</section>
<script src="/js/particles.min.js"></script>
<script src="/js/login.js"></script>
</body>
</html>
