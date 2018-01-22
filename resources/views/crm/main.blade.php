@extends('layouts.main')

@section('title','办公自动化系统')

@section('content')

<div class="layui-elem-quote"><p><span class="login-wh"><i class="layui-icon" style="color: red">&#xe60c;</i>  {{ Auth::user()->name }} 您好，</span> 欢迎使用办公自动化系统！ 
  @if($rs)
 您上次登陆时间：<span class="lastest-login">{{ $rs->created_at }}</span> IP: <span class="layui-badge layui-bg-blue">{{$rs->ip }}</span>
@else
  <span class="layui-badge layui-bg-blue">您当前为首次登陆！</span>
@endif
</p></div>
	<div class="blank15"></div>
	<fieldset class="layui-elem-field layui-field-title">
      <legend><a name="use">今日预约</a></legend>
    </fieldset>
    <table id="yy-today" lay-filter="today_yy" lay-data="{id:'todayYy'}"></table>
    <script type="text/html" id="toolbar">
      <!-- <div class='layui-btn-group'>
        <a class='layui-btn layui-btn-small'  lay-event="dianzhen"><i class='layui-icon'>&#xe610;</i>已到诊</a> 
        <a class='layui-btn layui-btn-normal  layui-btn-small' lay-event="addfollow"><i class='layui-icon'>&#xe654;</i>添加随访</a>
      </div> -->
       <a class="layui-btn layui-btn-mini" lay-event="detail">查看</a>
      <a class="layui-btn layui-btn-mini" lay-event="edit">编辑</a>
      <a class="layui-btn layui-btn-danger layui-btn-mini" lay-event="del">删除</a> 
    </script>
	<div class="blank30"></div>
	<fieldset class="layui-elem-field layui-field-title">
      <legend><a name="use">今日随访</a></legend>
    </fieldset>
    <table id="suifang-today" lay-filter="suifang" lay-data="{id:'sfsearchList'}"></table>
    <script type="text/html" id="sftoolbar">
      <div class='layui-btn-group'>
        <!-- <a class="layui-btn layui-btn-mini" lay-event="detail">查看</a> -->
        <a class='layui-btn layui-btn-normal  layui-btn-small' lay-event="addfollow"><i class='layui-icon'>&#xe654;</i>添加随访</a>
      </div>
    </script>
	<div class="blank30"></div>
<script type="text/html" id="sexTpl">
  @{{# if(d.sex === 1){ }}
    <span style="color: #1E9FFF;">男</span>
  @{{#  } else { }}
    <span style="color: #F581B1;">女</span>
  @{{#  } }}
</script>
<script type="text/html" id="phoneTpl">
  <b>@{{d.phone}}</b>
</script>
<script>
  var user_id='{!!Auth::id()!!}';
</script>
@endsection