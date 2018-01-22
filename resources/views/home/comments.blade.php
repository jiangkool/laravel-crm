<!DOCTYPE html>
<html>
<head lang="en">
  <meta charset="UTF-8">
  <title>【{{ date('m')-1 }}月份食堂建议】-武汉百佳妇产医院</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="format-detection" content="telephone=no">
  <meta name="renderer" content="webkit">
  <meta http-equiv="Cache-Control" content="no-siteapp" />
  <script src="/assets/js/jquery.min.js"></script>
  <link rel="stylesheet" href="/assets/css/amazeui.min.css"/>
  <style>
.header {
text-align: center;
}
.header h1 {
font-size: 150%;
color: #333;
margin-top: 30px;
}
.header p {
font-size: 1.6rem;
}
.bl10{width:100%; display:block; clear:both; height:10px;}
.tlt{ color:#333; width:100%; text-indent:2%; display:block; padding:2% 2%; line-height:180%;font-weight: 300}

.pay_list_c1,.pay_list_c2,.pay_list_c3,.pay_list_c4,.pay_list_c5,.pay_list_c6,.pay_list_c7,.pay_list_c8,.pay_list_c9,.pay_list_c10,.pay_list_c11,.pay_list_c12,.pay_list_c13,.pay_list_c14,.pay_list_c15,.pay_list_c16,.pay_list_c17,.pay_list_c18,.pay_list_c19,.pay_list_c20 {width: 20%;height: 40px;float: left;padding-top: 7px;cursor: pointer;text-align: center;margin:5px -1px;background-color:#fff; padding-right:12px;border-radius:0; border:#CCC solid 1px;font-size: 1.8rem;font-weight: 800}
.radioclass {opacity: 0;cursor: pointer;-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";filter: alpha(opacity=0); background:#FFF; border:-radius=25px; text-align:center; overflow:hidden;}
.on {background-position: 0 0; background-color:#FF5722; color:#FFF;}

.doc-gradient-1 {background-image: linear-gradient(to right, #F0F0F0 0px, #dddddd 100%);}
blockquote{background: #FFF}
.am-progress{height: 4rem;}
.am-progress-bar{line-height: 4rem;font-size: 1.4rem;font-weight: 600;}
.am-comment-bd{background: #FFF}
.pagination{display:inline-block;padding-left:0;margin:20px 0;border-radius:4px}.pagination>li{display:inline}.pagination>li>a,.pagination>li>span{position:relative;float:left;padding:6px 12px;margin-left:-1px;line-height:1.42857143;color:#337ab7;text-decoration:none;background-color:#fff;border:1px solid #ddd}.pagination>li:first-child>a,.pagination>li:first-child>span{margin-left:0;border-top-left-radius:4px;border-bottom-left-radius:4px}.pagination>li:last-child>a,.pagination>li:last-child>span{border-top-right-radius:4px;border-bottom-right-radius:4px}.pagination>li>a:focus,.pagination>li>a:hover,.pagination>li>span:focus,.pagination>li>span:hover{z-index:2;color:#23527c;background-color:#eee;border-color:#ddd}.pagination>.active>a,.pagination>.active>a:focus,.pagination>.active>a:hover,.pagination>.active>span,.pagination>.active>span:focus,.pagination>.active>span:hover{z-index:3;color:#fff;cursor:default;background-color:#337ab7;border-color:#337ab7}.pagination>.disabled>a,.pagination>.disabled>a:focus,.pagination>.disabled>a:hover,.pagination>.disabled>span,.pagination>.disabled>span:focus,.pagination>.disabled>span:hover{color:#777;cursor:not-allowed;background-color:#fff;border-color:#ddd}.pagination-lg>li>a,.pagination-lg>li>span{padding:10px 16px;font-size:18px;line-height:1.3333333}.pagination-lg>li:first-child>a,.pagination-lg>li:first-child>span{border-top-left-radius:6px;border-bottom-left-radius:6px}.pagination-lg>li:last-child>a,.pagination-lg>li:last-child>span{border-top-right-radius:6px;border-bottom-right-radius:6px}.pagination-sm>li>a,.pagination-sm>li>span{padding:5px 10px;font-size:12px;line-height:1.5}.pagination-sm>li:first-child>a,.pagination-sm>li:first-child>span{border-top-left-radius:3px;border-bottom-left-radius:3px}.pagination-sm>li:last-child>a,.pagination-sm>li:last-child>span{border-top-right-radius:3px;border-bottom-right-radius:3px}
</style>
</head>
<body style="background:#f5f5f5">
<div class="header">
  <div class="am-g">
    <h1>食堂满意度调查问卷【建议】</h1>
    <p><span class="am-badge am-badge-success">{{ date('m')-1 }}月份</span><br/>武汉百佳妇产医院</p>
  </div>
  <hr />
</div>
<div class="am-g">
  <div class="am-u-lg-6 am-u-md-8 am-u-sm-centered">
  <blockquote>
  <p>{{ date('m')-1 }}月总建议数量：<b>{{$comments_num}}</b></p>
  <small><i>截至 {{ date("Y-m-d H:i") }} </i>&nbsp;&nbsp;</small>
</blockquote>
  <h3><i class="am-icon-comments"></i> 建议列表：</h3><hr>
   @if(count($comments))
  <ul class="am-comments-list">
    @foreach($comments as $comment)
  <li class="am-comment">
    <a href="#link-to-user-home"><img src="/assets/images/userimg.jpg" alt="" class="am-comment-avatar" width="48" height="48"></a>
    <div class="am-comment-main">
    <header class="am-comment-hd">
    <div class="am-comment-meta"><a class="am-comment-author">百佳同仁</a> 提交于 <time >{{ $comment->created_at }}</time></div></header>
    <div class="am-comment-bd"><p>{{ $comment->comment_content }}</p></div></div>
  </li>
    @endforeach
</ul>
<div class="am-fr">
{{ $comments->links() }}
</div>
@endif
    <div class="bl10"></div>
    <hr>
    <div class="bl10"></div>
    <footer class="am-text-center"><p> &copy; 武汉百佳妇产医院</p></footer>
  </div>
</div>
<script src="/assets/js/amazeui.min.js"></script>
</body>
</html>

