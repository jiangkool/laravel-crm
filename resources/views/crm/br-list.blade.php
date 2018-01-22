@extends('layouts.main')

@section('title','病人管理')

@section('content')
<div class="search-box">
				<div class="blank15"></div>
				<form class="layui-form layui-form-pane1">
					<div class="layui-form-item">
					<div class="layui-inline">
					<label class="layui-form-label">姓名</label>
					<div class="layui-input-inline" style="width: 100px;">
					<input type="text" name="name" placeholder="张三" autocomplete="off" class="layui-input">
					</div>
					</div>
					<div class="layui-inline">
					<label class="layui-form-label">性别</label>
					<div class="layui-input-block" style="width: 80px;">
					<select name="sex">
					<option value="">请选择</option>
					<option value="1">男性</option>
					<option value="0">女性</option>
					</select>
					</div>
					</div>
					<div class="layui-inline">
					<label class="layui-form-label">手机号</label>
					<div class="layui-input-inline" style="width: 110px;">
					<input type="text" name="phone" placeholder="请填写完整" lay-filter="phone" autocomplete="off" class="layui-input">
					</div>
					</div>
					<div class="layui-inline">
					<label class="layui-form-label">归属</label>
					<div class="layui-input-block"  style="width: 100px;">
					<select name="user_id">
					@foreach($users as $user)
					<option value="{{ $user->id }}" @if($user->id==Auth::id()) selected @endif>{{ $user->name }}</option>
					@endforeach
					</select>
					</div>
					</div>
					<div class="layui-inline">
					<label class="layui-form-label">首次咨询时间</label>
					<div class="layui-input-inline">
  						<input type="text" name="first_zx_time" placeholder="2017-09-05 12:30:22" class="layui-input" id="select-time">
					</div>
					</div>
					</div>
					<div class="layui-form-item">
					<div class="layui-input-block text-center">
					<button class="layui-btn" lay-submit lay-filter="search-br">搜索病人</button>
					</div>
					</div>
  			</form>
			<script type="text/html" id="toolbar">
			<a class="layui-btn layui-btn-normal layui-btn-mini" lay-event="dianzhen">点诊</a>
			<a class="layui-btn layui-btn-mini" lay-event="edit">编辑</a>
			<a class="layui-btn layui-btn-danger layui-btn-mini" lay-event="del">删除</a>
			</script>
			</div> <!--/ search -->
			<div class="blank20"></div>
			<table id="search-result" lay-data="{id:'searchList'}" lay-filter="searchResult"></table>
			<div class="blank30"></div>
@endsection