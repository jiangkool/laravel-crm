<!DOCTYPE html>
<html>
<head lang="en">
  <meta charset="UTF-8">
  <title>【{{ date('m')-1 }}月份食堂满意度调查】-武汉百佳妇产医院</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="format-detection" content="telephone=no">
  <meta name="renderer" content="webkit">
  <meta http-equiv="Cache-Control" content="no-siteapp" />
  <script src="/assets/js/jquery.min.js"></script>
  <link rel="stylesheet" href="/assets/css/amazeui.min.css"/>
  <script src="/assets/js/amazeui.min.js"></script>
  <script>
    var cookie=$.AMUI.utils.cookie;
    var appVersion=window.navigator.appVersion;
    var codeName = window.navigator.appCodeName;
    var battery = navigator.battery;
    var logicalProcessors = window.navigator.hardwareConcurrency;
    var ua = window.navigator.userAgent;
    console.log(appVersion+'---'+codeName+'---'+battery+'---'+logicalProcessors+'---'+ua)
  </script>
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
.tlt{ background:#CCC; color:#FFF; width:100%; text-indent:2%; display:block; padding:2% 2%; line-height:180%;}

.pay_list_c1,.pay_list_c2,.pay_list_c3,.pay_list_c4,.pay_list_c5,.pay_list_c6,.pay_list_c7,.pay_list_c8,.pay_list_c9,.pay_list_c10,.pay_list_c11,.pay_list_c12,.pay_list_c13,.pay_list_c14,.pay_list_c15,.pay_list_c16,.pay_list_c17,.pay_list_c18,.pay_list_c19,.pay_list_c20 {width: 20%;height: 40px;float: left;padding-top: 7px;cursor: pointer;text-align: center;margin:5px -1px;background-color:#fff; padding-right:12px;border-radius:0; border:#CCC solid 1px;font-size: 1.8rem;font-weight: 800}
.radioclass {opacity: 0;cursor: pointer;-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";filter: alpha(opacity=0); background:#FFF; border:-radius=25px; text-align:center; overflow:hidden;}
.on {background-position: 0 0; background-color:#FF5722; color:#FFF;}

.doc-gradient-1 {background-image: linear-gradient(to right, #5b485e 0px, #315575 100%);}
  </style>
</head>
<body style="background:#f5f5f5">
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
<script>
cookie.set('ischecked', {!! date('m') !!}, 3600); 
console.log(cookie);</script>
@endif
<div class="header">
  <div class="am-g">
    <h1>食堂满意度调查问卷</h1>
    <p><span class="am-badge am-badge-success">{{ date('m')-1 }}月份</span><br/>武汉百佳妇产医院</p>
  </div>
  <hr />
</div>
<div class="am-g">
  <div class="am-u-lg-6 am-u-md-8 am-u-sm-centered">
    <form method="post" class="am-form" action="{{ route('addQa') }}">
    {{ csrf_field() }}
     <label class="tlt doc-gradient-1">1.您经常在医院食堂就餐吗？</label>
      <div class="am-form-group">
      <div class="bl10"></div>
<span>从不</span><span style=" float:right;">每餐都在</span>
<div class="bl10"></div>

<span class="pay_list_c1">
<input type="radio" name="paylist1"  value="1" class="radioclass">1
</span>
<span class="pay_list_c1">
<input type="radio" name="paylist1" value="2" class="radioclass">2
</span>
                                                            
    <span class="pay_list_c1">
<input type="radio" name="paylist1" value="3" class="radioclass">3
</span>
<span class="pay_list_c1">
<input type="radio" name="paylist1" value="4" class="radioclass">4
</span>
<span class="pay_list_c1">
<input type="radio" name="paylist1" value="5" class="radioclass">5
</span>
    </div>
    <div class="bl10"></div>
    <br>
     <label class="tlt doc-gradient-1">2.您对食堂工作人员个人卫生是否满意？</label>


      <div class="am-form-group">
      <div class="bl10"></div>
<span>非常不满意</span><span style=" float:right;">非常满意</span>
<div class="bl10"></div>

<span class="pay_list_c2">
<input type="radio" name="paylist2"  value="1" class="radioclass">1
</span>
<span class="pay_list_c2">
<input type="radio" name="paylist2" value="2" class="radioclass">2
</span>
                                                            
    <span class="pay_list_c2">
<input type="radio" name="paylist2" value="3" class="radioclass">3
</span>
<span class="pay_list_c2">
<input type="radio" name="paylist2" value="4" class="radioclass">4
</span>
<span class="pay_list_c2">
<input type="radio" name="paylist2" value="5" class="radioclass">5
</span>
    </div>
    <div class="bl10"></div><br>
     <label class="tlt doc-gradient-1">3.您对食堂饭菜卫生是否满意？</label>


      <div class="am-form-group">
      <div class="bl10"></div>
<span>非常不满意</span><span style=" float:right;">非常满意</span>
<div class="bl10"></div>

<span class="pay_list_c3">
<input type="radio" name="paylist3"  value="1" class="radioclass">1
</span>
<span class="pay_list_c3">
<input type="radio" name="paylist3" value="2" class="radioclass">2
</span>
                                                            
    <span class="pay_list_c3">
<input type="radio" name="paylist3" value="3" class="radioclass">3
</span>
<span class="pay_list_c3">
<input type="radio" name="paylist3" value="4" class="radioclass">4
</span>
<span class="pay_list_c3">
<input type="radio" name="paylist3" value="5" class="radioclass">5
</span>
    </div>
    <div class="bl10"></div><br>
     <label class="tlt doc-gradient-1">4.您对食堂餐具的卫生消毒情况是否满意？</label>


      <div class="am-form-group">
      <div class="bl10"></div>
<span>非常不满意</span><span style=" float:right;">非常满意</span>
<div class="bl10"></div>

<span class="pay_list_c4">
<input type="radio" name="paylist4"  value="1" class="radioclass">1
</span>
<span class="pay_list_c4">
<input type="radio" name="paylist4" value="2" class="radioclass">2
</span>
                                                            
    <span class="pay_list_c4">
<input type="radio" name="paylist4" value="3" class="radioclass">3
</span>
<span class="pay_list_c4">
<input type="radio" name="paylist4" value="4" class="radioclass">4
</span>
<span class="pay_list_c4">
<input type="radio" name="paylist4" value="5" class="radioclass">5
</span>
    </div>
    <div class="bl10"></div><br>
     <label class="tlt doc-gradient-1">5.您对食堂的菜类更新是否满意？</label>


      <div class="am-form-group">
      <div class="bl10"></div>
<span>非常不满意</span><span style=" float:right;">非常满意</span>
<div class="bl10"></div>

<span class="pay_list_c5">
<input type="radio" name="paylist5"  value="1" class="radioclass">1
</span>
<span class="pay_list_c5">
<input type="radio" name="paylist5" value="2" class="radioclass">2
</span>
                                                            
    <span class="pay_list_c5">
<input type="radio" name="paylist5" value="3" class="radioclass">3
</span>
<span class="pay_list_c5">
<input type="radio" name="paylist5" value="4" class="radioclass">4
</span>
<span class="pay_list_c5">
<input type="radio" name="paylist5" value="5" class="radioclass">5
</span>
    </div>
    <div class="bl10"></div><br>
     <label class="tlt doc-gradient-1">6.您对食堂供应的早餐样式是否满意？</label>


      <div class="am-form-group">
      <div class="bl10"></div>
<span>非常不满意</span><span style=" float:right;">非常满意</span>
<div class="bl10"></div>

<span class="pay_list_c6">
<input type="radio" name="paylist6"  value="1" class="radioclass">1
</span>
<span class="pay_list_c6">
<input type="radio" name="paylist6" value="2" class="radioclass">2
</span>
                                                            
    <span class="pay_list_c6">
<input type="radio" name="paylist6" value="3" class="radioclass">3
</span>
<span class="pay_list_c6">
<input type="radio" name="paylist6" value="4" class="radioclass">4
</span>
<span class="pay_list_c6">
<input type="radio" name="paylist6" value="5" class="radioclass">5
</span>
    </div>
    <div class="bl10"></div><br>
     <label class="tlt doc-gradient-1">7.您对饭菜品种、荤素搭配是否满意？</label>


      <div class="am-form-group">
      <div class="bl10"></div>
<span>非常不满意</span><span style=" float:right;">非常满意</span>
<div class="bl10"></div>

<span class="pay_list_c7">
<input type="radio" name="paylist7"  value="1" class="radioclass">1
</span>
<span class="pay_list_c7">
<input type="radio" name="paylist7" value="2" class="radioclass">2
</span>
                                                            
    <span class="pay_list_c7">
<input type="radio" name="paylist7" value="3" class="radioclass">3
</span>
<span class="pay_list_c7">
<input type="radio" name="paylist7" value="4" class="radioclass">4
</span>
<span class="pay_list_c7">
<input type="radio" name="paylist7" value="5" class="radioclass">5
</span>
    </div>
    <div class="bl10"></div><br>
     <label class="tlt doc-gradient-1">8.您对食堂的饭菜口味是否满意？</label>


      <div class="am-form-group">
      <div class="bl10"></div>
<span>非常不满意</span><span style=" float:right;">非常满意</span>
<div class="bl10"></div>

<span class="pay_list_c8">
<input type="radio" name="paylist8"  value="1" class="radioclass">1
</span>
<span class="pay_list_c8">
<input type="radio" name="paylist8" value="2" class="radioclass">2
</span>
                                                            
    <span class="pay_list_c8">
<input type="radio" name="paylist8" value="3" class="radioclass">3
</span>
<span class="pay_list_c8">
<input type="radio" name="paylist8" value="4" class="radioclass">4
</span>
<span class="pay_list_c8">
<input type="radio" name="paylist8" value="5" class="radioclass">5
</span>
    </div>
    <div class="bl10"></div><br>
     <label class="tlt doc-gradient-1">9.您对食堂供应的米饭是否满意？</label>


      <div class="am-form-group">
      <div class="bl10"></div>
<span>非常不满意</span><span style=" float:right;">非常满意</span>
<div class="bl10"></div>

<span class="pay_list_c9">
<input type="radio" name="paylist9"  value="1" class="radioclass">1
</span>
<span class="pay_list_c9">
<input type="radio" name="paylist9" value="2" class="radioclass">2
</span>
                                                            
    <span class="pay_list_c9">
<input type="radio" name="paylist9" value="3" class="radioclass">3
</span>
<span class="pay_list_c9">
<input type="radio" name="paylist9" value="4" class="radioclass">4
</span>
<span class="pay_list_c9">
<input type="radio" name="paylist9" value="5" class="radioclass">5
</span>
    </div>
    <div class="bl10"></div><br>
     <label class="tlt doc-gradient-1">10.您对食堂集体供应的汤是否满意？</label>


      <div class="am-form-group">
      <div class="bl10"></div>
<span>非常不满意</span><span style=" float:right;">非常满意</span>
<div class="bl10"></div>

<span class="pay_list_c10">
<input type="radio" name="paylist10"  value="1" class="radioclass">1
</span>
<span class="pay_list_c10">
<input type="radio" name="paylist10" value="2" class="radioclass">2
</span>
                                                            
    <span class="pay_list_c10">
<input type="radio" name="paylist10" value="3" class="radioclass">3
</span>
<span class="pay_list_c10">
<input type="radio" name="paylist10" value="4" class="radioclass">4
</span>
<span class="pay_list_c10">
<input type="radio" name="paylist10" value="5" class="radioclass">5
</span>
    </div>
    <div class="bl10"></div><br>
     <label class="tlt doc-gradient-1">11.您对食堂饭菜的新鲜程度是否满意？</label>


      <div class="am-form-group">
      <div class="bl10"></div>
<span>非常不满意</span><span style=" float:right;">非常满意</span>
<div class="bl10"></div>

<span class="pay_list_c11">
<input type="radio" name="paylist11"  value="1" class="radioclass">1
</span>
<span class="pay_list_c11">
<input type="radio" name="paylist11" value="2" class="radioclass">2
</span>
                                                            
    <span class="pay_list_c11">
<input type="radio" name="paylist11" value="3" class="radioclass">3
</span>
<span class="pay_list_c11">
<input type="radio" name="paylist11" value="4" class="radioclass">4
</span>
<span class="pay_list_c11">
<input type="radio" name="paylist11" value="5" class="radioclass">5
</span>
    </div>
    <div class="bl10"></div><br>
     <label class="tlt doc-gradient-1">12.您在食堂就餐时饭菜份量是否充足？</label>


      <div class="am-form-group">
      <div class="bl10"></div>
<span>不足</span><span style=" float:right;">非常充足</span>
<div class="bl10"></div>

<span class="pay_list_c12">
<input type="radio" name="paylist12"  value="1" class="radioclass">1
</span>
<span class="pay_list_c12">
<input type="radio" name="paylist12" value="2" class="radioclass">2
</span>
                                                            
    <span class="pay_list_c12">
<input type="radio" name="paylist12" value="3" class="radioclass">3
</span>
<span class="pay_list_c12">
<input type="radio" name="paylist12" value="4" class="radioclass">4
</span>
<span class="pay_list_c12">
<input type="radio" name="paylist12" value="5" class="radioclass">5
</span>
    </div>
    <div class="bl10"></div><br>
     <label class="tlt doc-gradient-1">13.您在食堂用餐是否碰到过排队轮到自己时已经没有菜的情况？</label>


      <div class="am-form-group">
      <div class="bl10"></div>
<span>经常有</span><span style=" float:right;">从来没有</span>
<div class="bl10"></div>

<span class="pay_list_c13">
<input type="radio" name="paylist13"  value="1" class="radioclass">1
</span>
<span class="pay_list_c13">
<input type="radio" name="paylist13" value="2" class="radioclass">2
</span>
                                                            
    <span class="pay_list_c13">
<input type="radio" name="paylist13" value="3" class="radioclass">3
</span>
<span class="pay_list_c13">
<input type="radio" name="paylist13" value="4" class="radioclass">4
</span>
<span class="pay_list_c13">
<input type="radio" name="paylist13" value="5" class="radioclass">5
</span>
    </div>
    <div class="bl10"></div><br>
     <label class="tlt doc-gradient-1">14.您在食堂就餐时饭菜里有无异物出现？</label>


      <div class="am-form-group">
      <div class="bl10"></div>
<span>经常有</span><span style=" float:right;">从来没有</span>
<div class="bl10"></div>

<span class="pay_list_c14">
<input type="radio" name="paylist14"  value="1" class="radioclass">1
</span>
<span class="pay_list_c14">
<input type="radio" name="paylist14" value="2" class="radioclass">2
</span>
                                                            
    <span class="pay_list_c14">
<input type="radio" name="paylist14" value="3" class="radioclass">3
</span>
<span class="pay_list_c14">
<input type="radio" name="paylist14" value="4" class="radioclass">4
</span>
<span class="pay_list_c14">
<input type="radio" name="paylist14" value="5" class="radioclass">5
</span>
    </div>
    <div class="bl10"></div><br>
     <label class="tlt doc-gradient-1">15.您对食堂工作人员服务态度是否满意？</label>


      <div class="am-form-group">
      <div class="bl10"></div>
<span>非常不满意</span><span style=" float:right;">非常满意</span>
<div class="bl10"></div>

<span class="pay_list_c15">
<input type="radio" name="paylist15"  value="1" class="radioclass">1
</span>
<span class="pay_list_c15">
<input type="radio" name="paylist15" value="2" class="radioclass">2
</span>
                                                            
    <span class="pay_list_c15">
<input type="radio" name="paylist15" value="3" class="radioclass">3
</span>
<span class="pay_list_c15">
<input type="radio" name="paylist15" value="4" class="radioclass">4
</span>
<span class="pay_list_c15">
<input type="radio" name="paylist15" value="5" class="radioclass">5
</span>
    </div>
    <div class="bl10"></div><br>
     <label class="tlt doc-gradient-1">16.您觉得食堂服务员打菜是否一视同仁？</label>


      <div class="am-form-group">
      <div class="bl10"></div>
<span>非常不满意</span><span style=" float:right;">非常满意</span>
<div class="bl10"></div>

<span class="pay_list_c16">
<input type="radio" name="paylist16"  value="1" class="radioclass">1
</span>
<span class="pay_list_c16">
<input type="radio" name="paylist16" value="2" class="radioclass">2
</span>
                                                            
    <span class="pay_list_c16">
<input type="radio" name="paylist16" value="3" class="radioclass">3
</span>
<span class="pay_list_c16">
<input type="radio" name="paylist16" value="4" class="radioclass">4
</span>
<span class="pay_list_c16">
<input type="radio" name="paylist16" value="5" class="radioclass">5
</span>
    </div>
    <div class="bl10"></div><br>
     <label class="tlt doc-gradient-1">17.您对食堂服务人员打菜速度、责任心是否满意？</label>


      <div class="am-form-group">
      <div class="bl10"></div>
<span>非常不满意</span><span style=" float:right;">非常满意</span>
<div class="bl10"></div>

<span class="pay_list_c17">
<input type="radio" name="paylist17"  value="1" class="radioclass">1
</span>
<span class="pay_list_c17">
<input type="radio" name="paylist17" value="2" class="radioclass">2
</span>
                                                            
    <span class="pay_list_c17">
<input type="radio" name="paylist17" value="3" class="radioclass">3
</span>
<span class="pay_list_c17">
<input type="radio" name="paylist17" value="4" class="radioclass">4
</span>
<span class="pay_list_c17">
<input type="radio" name="paylist17" value="5" class="radioclass">5
</span>
    </div>
    <div class="bl10"></div><br>
     <label class="tlt doc-gradient-1">18.您对食堂集体打饭的价格是否满意？</label>


      <div class="am-form-group">
      <div class="bl10"></div>
<span>非常不满意</span><span style=" float:right;">非常满意</span>
<div class="bl10"></div>

<span class="pay_list_c18">
<input type="radio" name="paylist18"  value="1" class="radioclass">1
</span>
<span class="pay_list_c18">
<input type="radio" name="paylist18" value="2" class="radioclass">2
</span>
                                                            
    <span class="pay_list_c18">
<input type="radio" name="paylist18" value="3" class="radioclass">3
</span>
<span class="pay_list_c18">
<input type="radio" name="paylist18" value="4" class="radioclass">4
</span>
<span class="pay_list_c18">
<input type="radio" name="paylist18" value="5" class="radioclass">5
</span>
    </div>
    <div class="bl10"></div><br>
     <label class="tlt doc-gradient-1">19.您对食堂的炒菜价格是否满意？</label>


      <div class="am-form-group">
      <div class="bl10"></div>
<span>非常不满意</span><span style=" float:right;">非常满意</span>
<div class="bl10"></div>

<span class="pay_list_c19">
<input type="radio" name="paylist19"  value="1" class="radioclass">1
</span>
<span class="pay_list_c19">
<input type="radio" name="paylist19" value="2" class="radioclass">2
</span>
                                                            
    <span class="pay_list_c19">
<input type="radio" name="paylist19" value="3" class="radioclass">3
</span>
<span class="pay_list_c19">
<input type="radio" name="paylist19" value="4" class="radioclass">4
</span>
<span class="pay_list_c19">
<input type="radio" name="paylist19" value="5" class="radioclass">5
</span>
    </div>
    <div class="bl10"></div><br>
     <label class="tlt doc-gradient-1">20.您对食堂的就餐秩序是否满意？</label>


      <div class="am-form-group">
      <div class="bl10"></div>
<span>非常不满意</span><span style=" float:right;">非常满意</span>
<div class="bl10"></div>

<span class="pay_list_c20">
<input type="radio" name="paylist20" id="paylist20_1"  value="1" class="radioclass">1
</span>
<span class="pay_list_c20">
<input type="radio" name="paylist20" id="paylist20_2" value="2" class="radioclass">2
</span>
                                                            
<span class="pay_list_c20">
<input type="radio" name="paylist20" id="paylist20_3" value="3" class="radioclass">3
</span>
<span class="pay_list_c20">
<input name="paylist20" type="radio" class="radioclass" id="paylist20_4" value="4" >4
</span>
<span class="pay_list_c20">
<input type="radio" name="paylist20" id="paylist20_5" value="5" class="radioclass">5
</span>
    </div>
    <div class="bl10"></div>
    
    

    <br>
    <div class="am-form-group">
      <label for="doc-ta-1" class="tlt doc-gradient-1">问题：除此之外您认为我院食堂还有哪些地方需要改进，请提出您宝贵的意见和建议。</label>
       <div class="bl10"></div>
      <textarea class="" name="comment" rows="5" id="doc-ta-1"></textarea>
    </div>
 
      <br />
      <div class="am-cf">
        <input type="submit" name="" value="提 交" onclick="return checkInfo();" class="am-btn am-btn-primary am-btn-lg am-btn-block am-round">
    
      </div>
    </form>
    <div class="bl10"></div><div class="bl10"></div>
    <footer class="am-text-center"><p> &copy; 武汉百佳妇产医院</p></footer>
  </div>
</div>
<div class="am-modal am-modal-alert" tabindex="-1" id="my-check">
  <div class="am-modal-dialog">
    <div class="am-modal-hd">温馨提示！</div>
    <div class="am-modal-bd">
     您还有题目未完成！请仔细检查后再提交！
    </div>
    <div class="am-modal-footer">
      <span class="am-modal-btn">确定</span>
    </div>
  </div>
</div>
<div class="am-modal am-modal-alert" tabindex="-1" id="is-checked">
  <div class="am-modal-dialog">
    <div class="am-modal-hd">温馨提示！</div>
    <div class="am-modal-bd">
     你已经提交过问卷！请不要重复提交！
    </div>
    <div class="am-modal-footer">
      <span class="am-modal-btn">确定</span>
    </div>
  </div>
</div>
</body>
</html>
<script language="javascript">
<!--
var $browsers1 = $("input[name=paylist1]"); 
var $browsers2 = $("input[name=paylist2]"); 
var $browsers3 = $("input[name=paylist3]"); 
var $browsers4 = $("input[name=paylist4]"); 
var $browsers5 = $("input[name=paylist5]"); 
var $browsers6 = $("input[name=paylist6]"); 
var $browsers7 = $("input[name=paylist7]"); 
var $browsers8 = $("input[name=paylist8]");
var $browsers9 = $("input[name=paylist9]"); 
var $browsers10 = $("input[name=paylist10]");
var $browsers11 = $("input[name=paylist11]"); 
var $browsers12 = $("input[name=paylist12]"); 
var $browsers13 = $("input[name=paylist13]"); 
var $browsers14 = $("input[name=paylist14]"); 
var $browsers15 = $("input[name=paylist15]");
var $browsers16 = $("input[name=paylist16]");
var $browsers17 = $("input[name=paylist17]"); 
var $browsers18 = $("input[name=paylist18]"); 
var $browsers19 = $("input[name=paylist19]"); 
var $browsers20 = $("input[name=paylist20]"); 

$(".pay_list_c1").on("click",function(){
  $(this).addClass("on").siblings().removeClass("on");

  $browsers1.attr("checked"); 
$(this).find("input[type=radio]").attr("checked","checked"); 
})
$(".pay_list_c2").on("click",function(){
  $(this).addClass("on").siblings().removeClass("on");
  $browsers2.attr("checked"); 
$(this).find("input[type=radio]").attr("checked","checked"); 
})
$(".pay_list_c3").on("click",function(){
  $(this).addClass("on").siblings().removeClass("on");

  $browsers3.attr("checked"); 
$(this).find("input[type=radio]").attr("checked","checked"); 
})
$(".pay_list_c4").on("click",function(){
  $(this).addClass("on").siblings().removeClass("on");

  $browsers4.attr("checked"); 
$(this).find("input[type=radio]").attr("checked","checked"); 
})
$(".pay_list_c5").on("click",function(){
  $(this).addClass("on").siblings().removeClass("on");

  $browsers5.attr("checked"); 
$(this).find("input[type=radio]").attr("checked","checked"); 
})
$(".pay_list_c6").on("click",function(){
  $(this).addClass("on").siblings().removeClass("on");
 
  $browsers6.attr("checked"); 
$(this).find("input[type=radio]").attr("checked","checked"); 
})
$(".pay_list_c7").on("click",function(){
  $(this).addClass("on").siblings().removeClass("on");
  
  $browsers7.attr("checked"); 
$(this).find("input[type=radio]").attr("checked","checked"); 
})
$(".pay_list_c8").on("click",function(){
  $(this).addClass("on").siblings().removeClass("on");
   
  $browsers8.attr("checked"); 
$(this).find("input[type=radio]").attr("checked","checked"); 
})
$(".pay_list_c9").on("click",function(){
  $(this).addClass("on").siblings().removeClass("on");
  
  $browsers9.attr("checked"); 
$(this).find("input[type=radio]").attr("checked","checked"); 
})
$(".pay_list_c10").on("click",function(){
  $(this).addClass("on").siblings().removeClass("on");
   
  $browsers10.attr("checked"); 
$(this).find("input[type=radio]").attr("checked","checked"); 
})
$(".pay_list_c11").on("click",function(){
  $(this).addClass("on").siblings().removeClass("on");
  
  $browsers11.attr("checked"); 
$(this).find("input[type=radio]").attr("checked","checked"); 
})
$(".pay_list_c12").on("click",function(){
  $(this).addClass("on").siblings().removeClass("on");
  
  $browsers12.attr("checked"); 
$(this).find("input[type=radio]").attr("checked","checked"); 
})
$(".pay_list_c13").on("click",function(){
  $(this).addClass("on").siblings().removeClass("on");
  
  $browsers13.attr("checked"); 
$(this).find("input[type=radio]").attr("checked","checked"); 
})
$(".pay_list_c14").on("click",function(){
  $(this).addClass("on").siblings().removeClass("on");
  
  $browsers14.attr("checked"); 
$(this).find("input[type=radio]").attr("checked","checked"); 
})
$(".pay_list_c15").on("click",function(){
  $(this).addClass("on").siblings().removeClass("on");
   
  $browsers15.attr("checked"); 
$(this).find("input[type=radio]").attr("checked","checked"); 
})
$(".pay_list_c16").on("click",function(){
  $(this).addClass("on").siblings().removeClass("on");
  
  $browsers16.attr("checked"); 
$(this).find("input[type=radio]").attr("checked","checked"); 
})
$(".pay_list_c17").on("click",function(){
  $(this).addClass("on").siblings().removeClass("on");
  
  $browsers17.attr("checked"); 
$(this).find("input[type=radio]").attr("checked","checked"); 
})
$(".pay_list_c18").on("click",function(){
  $(this).addClass("on").siblings().removeClass("on");
  
  $browsers18.attr("checked"); 
$(this).find("input[type=radio]").attr("checked","checked"); 
})
$(".pay_list_c19").on("click",function(){
  $(this).addClass("on").siblings().removeClass("on");
  
  $browsers19.attr("checked"); 
$(this).find("input[type=radio]").attr("checked","checked"); 
})

$(".pay_list_c20").on("click",function(){
	$browsers20.attr("checked"); 
  $(this).addClass("on").siblings().removeClass("on");
    
$(this).find("input[type=radio]").attr("checked","checked"); 
})

 function checkInfo(){
  if (cookie.get('ischecked')=={!! date('m') !!}) {var $modal = $('#is-checked');$modal.modal('toggle'); return false}
    var num=0;
  $(".am-form :checked").each(function(){
      num++;
  })
  if (num!=20) { var $modal = $('#my-check');$modal.modal('toggle'); return false}
 }
//-->
</script>
<script>
var $modal = $('#my-alert');$modal.modal('toggle');
</script>