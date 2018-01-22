<!DOCTYPE html>
<html>
<head lang="en">
  <meta charset="UTF-8">
  <title>【{{ date('m')-1 }}月份食堂满意度调查结果】-武汉百佳妇产医院</title>
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
</style>
</head>
<body style="background:#f5f5f5">
<div class="header">
  <div class="am-g">
    <h1>食堂满意度调查问卷【结果】</h1>
    <p><span class="am-badge am-badge-success">{{ date('m')-1 }}月份</span><br/>武汉百佳妇产医院</p>
  </div>
  <hr />
</div>
<div class="am-g">
  <div class="am-u-lg-6 am-u-md-8 am-u-sm-centered">
  <blockquote>
  <p>问卷调查总人数：<b>{{ $ppnum }}</b>人</p>
  <small><i>截至 {{ date("Y-m-d H:i") }} </i>&nbsp;&nbsp;</small>
</blockquote>
    
  <h3><i class="am-icon-percent"></i> 总体满意度：</h3><hr>
  <div class="am-progress am-progress-striped am-active">
  <div class="am-progress-bar am-progress-bar-secondary am-progress-bar-success"  style="width: {{$pleased_percentage}}%">{{$pleased_percentage}}% 满意</div>
  <div class="am-progress-bar am-progress-bar-warning"  style="width: {{100-$pleased_percentage}}%">{{100-$pleased_percentage}}% 不满意</div>
</div>
<hr>
<h3><i class="am-icon-percent"></i> 满意人数占比：</h3><hr>
  <div class="am-progress am-progress-striped am-active">
  <div class="am-progress-bar am-progress-bar-secondary am-progress-bar-success"  style="width: {{$pleased_pp_percentage}}%">{{$pleased_pp_percentage}}% 满意</div>
  <div class="am-progress-bar am-progress-bar-warning"  style="width: {{100-$pleased_pp_percentage}}%">{{100-$pleased_pp_percentage}}% 不满意</div>
</div>
<hr>
<h3><i class="am-icon-search-plus"></i> 各题目调查结果：</h3><hr>
    <form method="post" class="am-form">
     <label class="tlt doc-gradient-1">1.您经常在医院食堂就餐吗？</label>
     <blockquote><p>总分：<b>{{$total_score['t1']}}</b> &nbsp;&nbsp;均分：<b>{{ round($total_score['avg1'],2)}}</b></p></blockquote>
     <label class="tlt doc-gradient-1">2.您对食堂工作人员个人卫生是否满意？</label>
     <blockquote><p>总分：<b>{{$total_score['t2']}}</b> &nbsp;&nbsp;均分：<b>{{ round($total_score['avg2'],2)}}</b></p></blockquote>
     <label class="tlt doc-gradient-1">3.您对食堂饭菜卫生是否满意？</label>
     <blockquote><p>总分：<b>{{$total_score['t3']}}</b> &nbsp;&nbsp;均分：<b>{{ round($total_score['avg3'],2)}}</b></p></blockquote>
     <label class="tlt doc-gradient-1">4.您对食堂餐具的卫生消毒情况是否满意？</label>
     <blockquote><p>总分：<b>{{$total_score['t4']}}</b> &nbsp;&nbsp;均分：<b>{{ round($total_score['avg4'],2)}}</b></p></blockquote>
     <label class="tlt doc-gradient-1">5.您对食堂的菜类更新是否满意？</label>
     <blockquote><p>总分：<b>{{$total_score['t5']}}</b> &nbsp;&nbsp;均分：<b>{{ round($total_score['avg5'],2)}}</b></p></blockquote>
     <label class="tlt doc-gradient-1">6.您对食堂供应的早餐样式是否满意？</label>
     <blockquote><p>总分：<b>{{$total_score['t6']}}</b> &nbsp;&nbsp;均分：<b>{{ round($total_score['avg6'],2)}}</b></p></blockquote>
     <label class="tlt doc-gradient-1">7.您对饭菜品种、荤素搭配是否满意？</label>
     <blockquote><p>总分：<b>{{$total_score['t7']}}</b> &nbsp;&nbsp;均分：<b>{{ round($total_score['avg7'],2)}}</b></p></blockquote>
     <label class="tlt doc-gradient-1">8.您对食堂的饭菜口味是否满意？</label>
     <blockquote><p>总分：<b>{{$total_score['t8']}}</b> &nbsp;&nbsp;均分：<b>{{ round($total_score['avg8'],2)}}</b></p></blockquote>
     <label class="tlt doc-gradient-1">9.您对食堂供应的米饭是否满意？</label>
     <blockquote><p>总分：<b>{{$total_score['t9']}}</b> &nbsp;&nbsp;均分：<b>{{ round($total_score['avg9'],2)}}</b></p></blockquote>
     <label class="tlt doc-gradient-1">10.您对食堂集体供应的汤是否满意？</label>
     <blockquote><p>总分：<b>{{$total_score['t10']}}</b> &nbsp;&nbsp;均分：<b>{{ round($total_score['avg10'],2)}}</b></p></blockquote>
     <label class="tlt doc-gradient-1">11.您对食堂饭菜的新鲜程度是否满意？</label>
     <blockquote><p>总分：<b>{{$total_score['t11']}}</b> &nbsp;&nbsp;均分：<b>{{ round($total_score['avg11'],2)}}</b></p></blockquote>
     <label class="tlt doc-gradient-1">12.您在食堂就餐时饭菜份量是否充足？</label>
     <blockquote><p>总分：<b>{{$total_score['t12']}}</b> &nbsp;&nbsp;均分：<b>{{ round($total_score['avg12'],2)}}</b></p></blockquote>
     <label class="tlt doc-gradient-1">13.您在食堂用餐是否碰到过排队轮到自己时已经没有菜的情况？</label>
     <blockquote><p>总分：<b>{{$total_score['t13']}}</b> &nbsp;&nbsp;均分：<b>{{ round($total_score['avg13'],2)}}</b></p></blockquote>
     <label class="tlt doc-gradient-1">14.您在食堂就餐时饭菜里有无异物出现？</label>
     <blockquote><p>总分：<b>{{$total_score['t14']}}</b> &nbsp;&nbsp;均分：<b>{{ round($total_score['avg14'],2)}}</b></p></blockquote>
     <label class="tlt doc-gradient-1">15.您对食堂工作人员服务态度是否满意？</label>
     <blockquote><p>总分：<b>{{$total_score['t15']}}</b> &nbsp;&nbsp;均分：<b>{{ round($total_score['avg15'],2)}}</b></p></blockquote>
     <label class="tlt doc-gradient-1">16.您觉得食堂服务员打菜是否一视同仁？</label>
     <blockquote><p>总分：<b>{{$total_score['t16']}}</b> &nbsp;&nbsp;均分：<b>{{ round($total_score['avg16'],2)}}</b></p></blockquote>
     <label class="tlt doc-gradient-1">17.您对食堂服务人员打菜速度、责任心是否满意？</label>
     <blockquote><p>总分：<b>{{$total_score['t17']}}</b> &nbsp;&nbsp;均分：<b>{{ round($total_score['avg17'],2)}}</b></p></blockquote>
     <label class="tlt doc-gradient-1">18.您对食堂集体打饭的价格是否满意？</label>
     <blockquote><p>总分：<b>{{$total_score['t18']}}</b> &nbsp;&nbsp;均分：<b>{{ round($total_score['avg18'],2)}}</b></p></blockquote>
     <label class="tlt doc-gradient-1">19.您对食堂的炒菜价格是否满意？</label>
     <blockquote><p>总分：<b>{{$total_score['t19']}}</b> &nbsp;&nbsp;均分：<b>{{ round($total_score['avg19'],2)}}</b></p></blockquote>
     <label class="tlt doc-gradient-1">20.您对食堂的就餐秩序是否满意？</label>
     <blockquote><p>总分：<b>{{$total_score['t20']}}</b> &nbsp;&nbsp;均分：<b>{{ round($total_score['avg20'],2)}}</b></p></blockquote>
   <hr>
  <h3><i class="am-icon-comments"></i> 建议专区：</h3><hr>
  <blockquote><p>由于数量较多，请点击链接查阅：</p><a href="{{ route('comments') }}" class="am-btn am-btn-warning am-round "><i class="am-icon-external-link"></i> 查看建议</a></blockquote>
    </form>
    <div class="bl10"></div><div class="bl10"></div>
    <footer class="am-text-center"><p> &copy; 武汉百佳妇产医院</p></footer>
  </div>
</div>
<script src="/assets/js/amazeui.min.js"></script>
</body>
</html>

