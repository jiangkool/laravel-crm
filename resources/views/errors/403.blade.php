<!doctype html>
<html class="no-js">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>403</title>
  <meta name="description" content="">
  <meta name="keywords" content="403">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="renderer" content="webkit">
  <meta http-equiv="Cache-Control" content="no-siteapp" />
  <link rel="stylesheet" href="/assets/css/amazeui.min.css"/>
  <link rel="stylesheet" href="/assets/css/admin.css">
  <script src="/js/vue.js"></script>
</head>
<body>
<div class="am-cf">
  <div class="admin-content">
    <div class="admin-content-body">
      <hr>

      <div class="am-g">
        <div class="am-u-sm-12" id = "intro">
          <h2 class="am-text-center am-text-xxxl am-margin-top-lg">@{{ message }}</h2>
          <p class="am-text-center">@{{ mydetails() }}</p>
        <pre class="page-404">
          .----.
       _.'__    `.
   .--($)($$)---/#\
 .' @          /###\
 :         ,   #####
  `-..__.-' _.-\###/
        `;_:    `"'
      .'"""""`.
     /,  ya ,\\
    //  403!  \\
    `-._______.-'
    ___`. | .'___
   (______|______)
        </pre>
        </div>
      </div>
    </div>
  </div>
  <!-- content end -->

</div>

<!--[if (gte IE 9)|!(IE)]><!-->
<script src="/assets/js/jquery.min.js"></script>
<!--<![endif]-->
<script src="/assets/js/amazeui.min.js"></script>
<script>
  var vue_det = new Vue({
   el: '#intro',
   data: {
      message: 'OOP! Not Found!!! '
   }, 
   methods: {
      mydetails : function() {
         return "没有找到你要的页面";
      }
   }
})


</script>
</body>
</html>
