layui.use(['util','form','laydate','table','layer'], function(){
  var util = layui.util 
  ,$ = layui.$
  ,form = layui.form
  ,laydate = layui.laydate
  ,table=layui.table
  ,layer=layui.layer


  util.fixbar({
     bar1: false 
    ,bar2: true 
    ,click: function(type){
      if (type=='bar2') {
      layer.alert('操作成功提示！', {
        icon: 1,
        skin: 'layer-ext-moon' 
      }, function(){
    layer.alert('错误提示！', {
    icon: 2,
    skin: 'layui-layer-lan'
    ,closeBtn: 0
    ,anim: 4 //动画类型
    });
    })
      }
    }
  });
  var date = new Date();
  var year=date.getFullYear(),month=date.getMonth(),day=date.getDate(), w=date.getDay(),H=date.getHours(),M=date.getMinutes(); 
  var weekarr=['日','一','二','三','四','五','六'];
  function checkTime(i) {if (i<10) {i="0" + i} return i } 
  setInterval(function(){
    $('#show-time').html(year+'-'+checkTime(month)+'-'+checkTime(day)+' 星期'+weekarr[w]+' '+checkTime(H)+':'+checkTime(M));
  }, 1000);

  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


  //通用提示信息
  function showSuccess(msg) {
      layer.alert(msg, {icon: 1, skin: 'layer-ext-moon'} )
  }
  function showError(msg) {
      layer.alert(msg, {icon: 2, skin: 'layui-layer-lan',closeBtn: 0 ,anim: 4 });
  }


  //新增患者
  form.on('submit(add-customer)', function(data){
        var load1
         $.ajax({
             type: "post",
             url: "/admin/customer",
             data: data.field,
             dataType: "json",
             beforeSend:function(XMLHttpRequest){
               load1=layer.load()
             },
             success: function(data){
              layer.close(load1)
              console.log(data)
              if(data.status=='success'){
              showSuccess(data.msg);
             }else{
              showError(data.msg);
              }
              
            },
            error:function(){
               layer.close(load1)
               console.log('error')
               showError('请求失败！')
               
             }
         });


      return false;
  });


//自定义验证规则
  form.verify({
    username: function(value, item){ 
    if(!new RegExp("^[a-zA-Z0-9_\u4e00-\u9fa5\\s·]+$").test(value)){
      return '用户名不能有特殊字符';
    }
    if(/(^\_)|(\__)|(\_+$)/.test(value)){
      return '用户名首尾不能出现下划线\'_\'';
    }
    if(/^\d+\d+\d$/.test(value)){
      return '用户名不能全为数字';
    }
    if (value.indexOf(" ") >=0){
      return '用户名不能含有空格';
      }
  }
    ,pass: [/(.+){6,12}$/, '密码必须6到12位']
  });

  //时间选择器
	laydate.render({elem: '#select-time',type: 'date',theme: 'molv',trigger: 'click',range: true});
  laydate.render({elem: '#select-time2',type: 'datetime',theme: 'molv',trigger: 'click'});  
  laydate.render({elem: '#yydz-time',type: 'datetime',theme: 'molv',trigger: 'click'});  
  laydate.render({elem: '#this-sf-time',type: 'datetime',theme: 'molv',trigger: 'click'}); 
  laydate.render({elem: '#yy-time',type: 'datetime',theme: 'molv',trigger: 'click'});  
  laydate.render({elem: '#first-zx-time',type: 'date',theme: 'molv',trigger: 'click',range: true});
  laydate.render({elem: '#sf-time',type: 'datetime',theme: 'molv',trigger: 'click'}); 



  //首页今日预约table渲染
  //序号 患者姓名 性别 预约时间 预约医生 就诊病种 手机 特殊要求 操作
  table.render({
    elem: '#yy-today',
    height: 350,
    page:true,
    cols:  [[ 
       {field: 'id', title: '序号', width: 80}
      ,{field: 'name', title: '患者姓名', width: 120}
      ,{field: 'sex', title: '性别',templet:'#sexTpl',width: 80}
      ,{field: 'yydate', title: '预约时间', width: 120}
      ,{field: 'doctor_name', title: '预约医生', width: 100}
      ,{field: 'disease_name', title: '就诊病种', width: 100}
      ,{field: 'phone', title: '手机', templet:'#phoneTpl',width: 120}
      ,{field: 'ts_require', title: '特殊要求', width: 200}
      ,{fixed: 'right',title: '操作', width:210, align:'center', toolbar: '#toolbar'}
    ]],
    url:'/admin/order-search' ,
    id:'todayYy',
    method:'post',
    where:{sign:'today_yy'}
});

//监听今日预约工具条事件
table.on('tool(today_yy)', function(obj){ 
  var data = obj.data;
  var layEvent = obj.event; 
  var tr = obj.tr; 
 
  if(layEvent === 'detail'){ //查看

    console.log(data)
    //do somehing
  } else if(layEvent === 'del'){ //删除
    layer.confirm('确定删除该客户么？', {icon: 3, title:'提示信息'}, function(index){
    layer.close(index);
    $.ajax({
             type: "DELETE",
             url: "/admin/customer/"+data.id,
             success: function(data){
              console.log(data)
              if (data.status=='error') {
                showError(data.msg);
              }else{
                obj.del(); 
                showSuccess(data.msg);
              }
            },
            error:function(){
               showError('删除失败！请联系管理员！');
             }
         });
    });
  } else if(layEvent === 'edit'){ //编辑

      if (data.user_id==user_id) {
      window.location.href="/admin/customer/"+data.id+"/edit"
      }else{
        showError('您无权修改该客户！');
      }

  }
});

  
  //首页今日随访table渲染
  //序号 患者姓名 性别 随访次数 上次随访时间 上次随访结果 操作  
  table.render({
    elem: '#suifang-today',
    height: 350,
    page:true,
    cols:  [[ 
         {field: 'id', title: '序号', align:'center',width: 100}
        ,{field: 'name', title: '患者姓名',align:'center', width: 120}
        ,{field: 'sex', title: '性别',templet:'#sexTpl',align:'center', width: 100}
        ,{field: 'sf_num', title: '随访次数', align:'center',width: 100}
        ,{field: 'created_at', title: '上次随访日期', align:'center',width: 200}
        ,{field: 'result_id', title: '上次随访结果',align:'center', width: 200}        
        ,{fixed: 'right',title: '操作', width:320, align:'center', toolbar: '#sftoolbar'}
    ]],
    url:'/admin/follow-search',
    id:'sfsearchList',
    method:'post',
    where:{sign:'sf_today'}

});

//监听主页工具条事件
table.on('tool(suifang)', function(obj){ 
  var data = obj.data;
  var layEvent = obj.event; 
  var tr = obj.tr; 
 
  if(layEvent === 'detail'){ //查看

    console.log(data)
    //do somehing
  } else if(layEvent === 'del'){ //删除
    layer.confirm('确定删除该客户么？', {icon: 3, title:'提示信息'}, function(index){
    layer.close(index);
    $.ajax({
             type: "DELETE",
             url: "/admin/customer/"+data.id,
             success: function(data){
              console.log(data)
              if (data.status=='error') {
                showError(data.msg);
              }else{
                obj.del(); 
                showSuccess(data.msg);
              }
            },
            error:function(){
               showError('删除失败！请联系管理员！');
             }
         });
    });
  } else if(layEvent === 'addfollow'){ //编辑

      if (data.user_id==user_id) {
      window.location.href="/admin/follow/"+data.customer_id
      }else{
        showError('您无权随访该客户！');
      }

  }
});




  //列表table渲染
  //序号 患者姓名 性别 归属  手机 网络初诊病种 首次咨询时间
  table.render({
    elem: '#search-result',
    height: 400,
    page:true,
    cols:  [[ 
       {field: 'id', title: '序号', width: 60}
      ,{field: 'name', title: '患者姓名', width: 120}
      ,{field: 'sex', title: '性别', width: 80}
      ,{field: 'user_id', title: '归属', width: 100}
      ,{field: 'bz_id', title: '初诊病种', width: 100}
      ,{field: 'phone', title: '手机', width: 200,style:'font-weight:700'}
      ,{field: 'created_at', title: '首次咨询时间', width: 200}
      ,{field: 'status', title: '状态', width: 100,style:'color:#FF5722'}
      ,{fixed: 'right',title: '操作', width:150, align:'center', toolbar: '#toolbar'}
    ]],
    url:'/admin/customer-list' ,
    id:'searchList',
    limit:10 
});

//监听工具条事件
table.on('tool(searchResult)', function(obj){ 
  var data = obj.data;
  var layEvent = obj.event; 
  var tr = obj.tr; 
 
  if(layEvent === 'dianzhen'){
    if (data.status!='已预约') {
      showError('点诊失败！该客户未预约！');
    }else{
    layer.confirm('确定该客户已到诊？', {icon: 3, title:'提示信息'}, function(index){
    layer.close(index);
    $.ajax({
             type: "post",
             url: "/admin/customer-dz",
             data:{'id':data.id},
             dataType: "json",
             success: function(data){
              console.log(data)
              if (data.status=='error') {
                showError(data.msg);
              }else{
                //obj.del(); 
                showSuccess(data.msg);
              }
            },
            error:function(){
               showError('点诊失败！请联系管理员！');
             }
         });
    });

    }


  } else if(layEvent === 'del'){ //删除
    layer.confirm('确定删除该客户么？', {icon: 3, title:'提示信息'}, function(index){
    layer.close(index);
    $.ajax({
             type: "DELETE",
             url: "/admin/customer/"+data.id,
             success: function(data){
              console.log(data)
              if (data.status=='error') {
                showError(data.msg);
              }else{
                obj.del(); 
                showSuccess(data.msg);
              }
            },
            error:function(){
               showError('删除失败！请联系管理员！');
             }
         });
    });
  } else if(layEvent === 'edit'){ //编辑

      if (data.user_id==admin_id) {
      window.location.href="/admin/customer/"+data.id+"/edit"
      }else{
        showError('您无权修改该客户！');
      }

  }
});


  //搜索重载表格数据
  form.on('submit(search-br)', function(data){
        table.reload('searchList', {
        url: '/admin/customer-search'
        ,where:data.field
        ,method:'post'
        ,height: 400
        });
      return false;
  });

  //搜索数据渲染表格
  form.on('submit(search-add-br)', function(data){
        table.render({
          elem: '#add-search-result',
          height: 400,
          page:true,
          cols:  [[ 
          {field: 'id', title: '序号', width: 60}
          ,{field: 'name', title: '患者姓名', width: 120}
          ,{field: 'sex', title: '性别', width: 80}
          ,{field: 'user_id', title: '归属', width: 100}
          ,{field: 'bz_id', title: '初诊病种', width: 100}
          ,{field: 'phone', title: '手机', width: 200,style:'font-weight:700'}
          ,{field: 'created_at', title: '首次咨询时间', width: 200}
          ,{field: 'status', title: '状态', width: 100,style:'color:#FF5722'}
          ,{fixed: 'right',title: '操作', width:150, align:'center', toolbar: '#toolbar'}
          ]],
          url:'/admin/customer-search' ,
          id:'addsearchList',
          method:'post',
          where:data.field
        });
      return false;
  });


  //提交修改信息数据
  form.on('submit(edit-br)', function(data){
     var load2
         $.ajax({
             type: "PUT",
             url: "/admin/customer/"+data.field.id,
             data: data.field,
             dataType: "json",
             beforeSend:function(XMLHttpRequest){
               load2=layer.load()
             },
             success: function(data){
              layer.close(load2)
              console.log(data)
              if(data.status=='success'){
              showSuccess(data.msg);
             }else{
              showError(data.msg);
              }
              
            },
            error:function(){
               layer.close(load2)
               console.log('error')
               showError('请求失败！')
               
             }
         });


      return false;
  });

  //**************************
  //随访搜索结果table渲染
  //患者id 患者姓名 上次随访日期 上次随访结果 下次随访日期 网络初诊病种 随访次数
  form.on('submit(search-sf)', function(data){
        table.render({
          elem: '#sf-search-result',
          height: 400,
          page:true,
          cols:  [[ 
             {field: 'id', title: 'id', width: 100}
            ,{field: 'name', title: '患者姓名', width: 120}
            ,{field: 'created_at', title: '上次随访日期', width: 200}
            ,{field: 'result_id', title: '上次随访结果', width: 200}
            ,{field: 'next_sf_time', title: '下次随访日期', width: 150}
            ,{field: 'bz_id', title: '网络初诊病种', width: 200}
            ,{field: 'sf_num', title: '随访次数', width: 100}
            ,{fixed: 'right', title: '操作',width:150, align:'center', toolbar: '#toolbar'}
          ]],
          url:'/admin/follow-search' ,
          id:'sfSearch',
          method:'post',
          where:data.field
          });

  return false;

  });

//监听随访工具条事件
table.on('tool(sf-search)', function(obj){ 
  var data = obj.data;
  var layEvent = obj.event; 
  var tr = obj.tr; 
 
  if(layEvent === 'detail'){ //查看

    console.log(data)
    //do somehing
  } else if(layEvent === 'del'){ //删除
    layer.confirm('确定删除该客户么？', {icon: 3, title:'提示信息'}, function(index){
    layer.close(index);
    $.ajax({
             type: "DELETE",
             url: "/admin/customer/"+data.id,
             success: function(data){
              console.log(data)
              if (data.status=='error') {
                showError(data.msg);
              }else{
                obj.del(); 
                showSuccess(data.msg);
              }
            },
            error:function(){
               showError('删除失败！请联系管理员！');
             }
         });
    });
  } else if(layEvent === 'addfollow'){ //编辑

      if (data.user_id==user_id) {
      window.location.href="/admin/follow/"+data.customer_id
      }else{
        showError('您无权随访该客户！');
      }

  }
});


  $(".see-details").click(function(){
    layer.tips($(this).attr('data-attr'), this, {tips: 2});
  })

  //已到诊搜索结果table渲染
  //id 患者姓名 性别 预约医生 就诊病种 手机 归属 到诊日期 首次咨询时间
  form.on('submit(search-dz-br)', function(data){
        table.render({
          elem: '#dz-search-result',
          height: 400,
          page:true,
          cols:  [[ 
          {field: 'id', title: '序号', width: 60}
          ,{field: 'name', title: '患者姓名', width: 120}
          ,{field: 'sex', title: '性别', width: 80}
          ,{field: 'doctor_id', title: '预约医生', width: 100}
          ,{field: 'bz_id', title: '初诊病种', width: 100}
          ,{field: 'phone', title: '手机', width: 150,style:'font-weight:700'}
          ,{field: 'user_id', title: '归属', width: 100}
          ,{field: 'updated_at', title: '到诊日期', width: 150,style:'color:#FF5722'}
          ,{field: 'created_at', title: '首次咨询时间', width: 150}
          ,{fixed: 'right',title: '操作', width:150, align:'center', toolbar: '#toolbar'}
          ]],
          url:'/admin/customer-search' ,
          id:'searchDzList',
          method:'post',
          where:data.field
        });
      return false;
  });


  //添加随访数据
  form.on('submit(add-sf)', function(data){
     var load3
         $.ajax({
             type: "POST",
             url: "/admin/follow",
             data: data.field,
             dataType: "json",
             beforeSend:function(XMLHttpRequest){
               load3=layer.load()
             },
             success: function(data){
              layer.close(load3)
              console.log(data)
              if(data.status=='success'){
              showSuccess(data.msg);
             }else{
              showError(data.msg);
              }
              
            },
            error:function(){
               layer.close(load3)
               console.log('error')
               showError('请求失败！')
               
             }
         });


      return false;
  });

/*************************************************************************
** 系统设置 部分
**
**************************************************************************
*/

 //添加用户
  form.on('submit(add-user)', function(data){
     var load3
         $.ajax({
             type: "POST",
             url: "/admin/user/add",
             data: data.field,
             dataType: "json",
             beforeSend:function(XMLHttpRequest){
               load3=layer.load()
             },
             success: function(data){
              layer.close(load3)
              console.log(data)
              if(data.status=='success'){
                table.reload('usersList', {
                url: '/admin/users-list'
                ,height: 300
                ,skin:'row'
                ,even: true
                });

              showSuccess(data.msg);
             }else{
              showError(data.msg);
              }
              
            },
            error:function(){
               layer.close(load3)
               console.log('error')
               showError('请求失败！')
               
             }
         });


      return false;
  });



  //用户列表table渲染
  //id 用户名 类别 预约医生 就诊病种 手机 归属 到诊日期 首次咨询时间
  table.render({
    elem: '#users-list',
    height: 300,
    page:true,
    skin: 'line',
    cols:  [[ 
       {field: 'name', title: '用户名',width:92}
      ,{field: 'role', title: '类别',width:80}
      ,{fixed: 'right',title: '操作', width:102, align:'center', toolbar: '#usertoolbar'}
    ]],
    url:'/admin/users-list' ,
    id:'usersList',
    limit:6 
  });

//监听usertoolbar工具条事件
table.on('tool(users-list)', function(obj){ 
  var data = obj.data;
  var layEvent = obj.event; 
  var tr = obj.tr; 
 
  if(layEvent === 'detail'){ //查看

    console.log(data)
    //do somehing
  } else if(layEvent === 'del'){ //删除
    layer.confirm('确定删除该用户么？', {icon: 3, title:'提示信息'}, function(index){
    layer.close(index);
    $.ajax({
             type: "DELETE",
             url: "/admin/user/"+data.id,
             success: function(data){
              console.log(data)
              if (data.status=='hasCustomers') {
                var uid=data.uid;
              layer.prompt({title: '该账户下存在客户，请输入接收帐号！', formType: 0}, function(name,index){
 
        //转移数据
        $.ajax({
             type: "post",
             url: "/admin/data-copy",
             data: {username:name,ysuserid:uid},
             dataType: "json",
             beforeSend:function(XMLHttpRequest){
               load1=layer.load()
             },
             success: function(rs){
              layer.close(load1)
              console.log(rs)
              if(rs.status=='success'){
                table.reload('usersList', {
                url: '/admin/users-list'
                ,height: 300
                ,skin:'row'
                ,even: true
                });
              showSuccess(rs.msg);
             }else{
              showError(rs.msg);
              }
              
            },
            error:function(){
               layer.close(load1)
               console.log('error')
               showError('请求失败！')
               
             }
         });
        //end 转移
              layer.close(index);
                
              });
                
              }else if (data.status=='error') {
                showError(data.msg);
              }else{
                obj.del(); 
                showSuccess(data.msg);
              }
            },
            error:function(){
               showError('删除失败！请联系管理员！');
             }
         });
    });
  } else if(layEvent === 'addfollow'){ //编辑

      if (data.user_id==user_id) {
      window.location.href="/admin/follow/"+data.customer_id
      }else{
        showError('您无权随访该用户！');
      }

  }
});


 //添加随访结果
  form.on('submit(add-result)', function(data){
     var load3
         $.ajax({
             type: "POST",
             url: "/admin/result",
             data: data.field,
             dataType: "json",
             beforeSend:function(XMLHttpRequest){
               load3=layer.load()
             },
             success: function(data){
              layer.close(load3)
              console.log(data)
              if(data.status=='success'){
              showSuccess(data.msg);
                table.reload('resultId', {
                url: '/admin/result'
                ,height: 200
                ,skin:'row'
                ,even: true
                });
             }else{
              showError(data.msg);
              }
              
            },
            error:function(){
               layer.close(load3)
               console.log('error')
               showError('请求失败！')
               
             }
         });


      return false;
  });


table.render({
    elem: '#results'
    ,height: 200
    ,url: '/admin/result'
    ,skin:'row'
    ,even: true
    //,page: true
    ,cols: [[
      {field: 'result_name', title: '随访结果', width:200}
      ,{field: 'result_zq', title: '随访周期', width:100}
      ,{fixed: 'right',title: '操作', width:100, align:'center', toolbar: '#resultsToolbar'}
    ]],
    id:'resultId'
  });
  
//监听resultsToolbar工具条事件
table.on('tool(results)', function(obj){ 
  var data = obj.data;
  var layEvent = obj.event; 
  var tr = obj.tr; 
 
 if(layEvent === 'del'){ //删除
    layer.confirm('确定删除该随访结果么？', {icon: 3, title:'提示信息'}, function(index){
    layer.close(index);
    $.ajax({
             type: "DELETE",
             url: "/admin/result/"+data.id,
             success: function(data){
              console.log(data)
              if (data.status=='error') {
                showError(data.msg);
              }else{
                obj.del(); 
                showSuccess(data.msg);
              }
            },
            error:function(){
               showError('删除失败！请联系管理员！');
             }
         });
    });
  } 
});



//添加病种
  form.on('submit(add-disease)', function(data){
     var load3
         $.ajax({
             type: "POST",
             url: "/admin/disease",
             data: data.field,
             dataType: "json",
             beforeSend:function(XMLHttpRequest){
               load3=layer.load()
             },
             success: function(data){
              layer.close(load3)
              console.log(data)
              if(data.status=='success'){
              showSuccess(data.msg);
                table.reload('diseaseId', {
                url: '/admin/disease'
                ,height: 200
                ,skin:'row'
                ,even: true
                });
             }else{
              showError(data.msg);
              }
              
            },
            error:function(){
               layer.close(load3)
               console.log('error')
               showError('请求失败！')
               
             }
         });


      return false;
  });


table.render({
    elem: '#diseases'
    ,height: 200
    ,url: '/admin/disease'
    ,skin:'row'
    ,even: true
    //,page: true
    ,cols: [[
      {field: 'disease_name', title: '病种名称', width:300}
      ,{fixed: 'right',title: '操作', width:100, align:'center', toolbar: '#diseasesToolbar'}
    ]],
    id:'diseaseId'
  });
  
//监听diseasesToolbar工具条事件
table.on('tool(diseases)', function(obj){ 
  var data = obj.data;
  var layEvent = obj.event; 
  var tr = obj.tr; 
 
 if(layEvent === 'del'){ //删除
    layer.confirm('确定删除该病种么？', {icon: 3, title:'提示信息'}, function(index){
    layer.close(index);
    $.ajax({
             type: "DELETE",
             url: "/admin/disease/"+data.id,
             success: function(data){
              console.log(data)
              if (data.status=='error') {
                showError(data.msg);
              }else{
                obj.del(); 
                showSuccess(data.msg);
              }
            },
            error:function(){
               showError('删除失败！请联系管理员！');
             }
         });
    });
  } 
});

/*
* #####################################################################################################
*  医生设置
*###############################################################################################
*/

//添加医生
  form.on('submit(add-doctor)', function(data){
     var load3
         $.ajax({
             type: "POST",
             url: "/admin/doctor",
             data: data.field,
             dataType: "json",
             beforeSend:function(XMLHttpRequest){
               load3=layer.load()
             },
             success: function(data){
              layer.close(load3)
              console.log(data)
              if(data.status=='success'){
              showSuccess(data.msg);
                table.reload('doctorId', {
                url: '/admin/doctor'
                ,height: 200
                ,skin:'row'
                ,even: true
                });
             }else{
              showError(data.msg);
              }
              
            },
            error:function(){
               layer.close(load3)
               console.log('error')
               showError('请求失败！')
               
             }
         });


      return false;
  });


table.render({
    elem: '#doctors'
    ,height: 200
    ,url: '/admin/doctor'
    ,skin:'row'
    ,even: true
    //,page: true
    ,cols: [[
      {field: 'doctor_name', title: '病种名称', width:300}
      ,{fixed: 'right',title: '操作', width:100, align:'center', toolbar: '#doctorsToolbar'}
    ]],
    id:'doctorId'
  });
  
//监听doctorsToolbar工具条事件
table.on('tool(doctors)', function(obj){ 
  var data = obj.data;
  var layEvent = obj.event; 
  var tr = obj.tr; 
 
 if(layEvent === 'del'){ //删除
    layer.confirm('确定删除该医生么？', {icon: 3, title:'提示信息'}, function(index){
    layer.close(index);
    $.ajax({
             type: "DELETE",
             url: "/admin/doctor/"+data.id,
             success: function(data){
              console.log(data)
              if (data.status=='error') {
                showError(data.msg);
              }else{
                obj.del(); 
                showSuccess(data.msg);
              }
            },
            error:function(){
               showError('删除失败！请联系管理员！');
             }
         });
    });
  } 
});


});//end app
