@extends('layouts.main')

@section('title','已到诊列表')

@section('content')
<div class="search-box sf-box">
				<div class="blank30"></div>
				<form class="layui-form layui-form-pane3" action="">
					<div class="layui-form-item">
					<div class="layui-inline">
					<label class="layui-form-label">归属</label>
					<div class="layui-input-inline"  style="width: 100px;">
					<select name="user_id" @if(Auth::id()!=1) disabled @endif>
					@foreach($users as $user)
					<option value="{{ $user->id }}" @if($user->id==Auth::id()) selected @endif>{{ $user->name }}</option>
					@endforeach
					</select>
					</div>
					</div>
					<div class="layui-inline">
					<label class="layui-form-label">上次随访时间</label>
					<div class="layui-input-inline"  style="width: 200px;">
  						<input type="text" name="last_sf_date"  class="layui-input" id="select-time">
					</div>
					</div>
					<div class="layui-inline">
					<label class="layui-form-label">首次咨询时间</label>
					<div class="layui-input-inline"  style="width: 200px;">
  						<input type="text" name="first_zx_time"  class="layui-input" id="first-zx-time">
					</div>
					</div>
					</div>
					<div class="layui-form-item">
					<div class="layui-inline">
					<label class="layui-form-label">姓名</label>
					<div class="layui-input-inline" style="width: 100px;">
					<input type="text" name="name" placeholder="张三" autocomplete="off" class="layui-input">
					</div>
					</div>
					<div class="layui-inline">
					<label class="layui-form-label">性别</label>
					<div class="layui-input-inline"  style="width: 100px;">
					<select name="sex">
					<option value="">请选择</option>
					<option value="1">男</option>
					<option value="0">女</option>
					</select>
					</div>
					</div>
					<div class="layui-inline">
					<label class="layui-form-label">手机号</label>
					<div class="layui-input-inline" style="width: 120px;">
					<input type="text" name="phone" placeholder=""  autocomplete="off" class="layui-input">
					</div>
					</div>
					<div class="layui-inline">
						<label class="layui-form-label">预约医生</label>
						<div class="layui-input-inline" style="width: 100px;">
						<select name="doctor_id">
							<option value="">请选择</option>
						@foreach($doctors as $doctor)
						<option value="{{ $doctor->id }}">{{ $doctor->doctor_name }}</option>
						@endforeach
						</select>
						</div>
						</div>
						<div class="layui-inline">
					<label class="layui-form-label">就诊病种</label>
					<div class="layui-input-inline"  style="width: 160px;">
					<select name="bz_id">
						<option value="">请选择</option>
						@foreach($diseases as $disease)
						<option value="{{ $disease->id }}">{{ $disease->disease_name }}</option>
						@endforeach
					</select>
					</div>
					</div>
					</div>
					<div class="layui-form-item">
					<div class="layui-input-block text-center">
						<input type="hidden" name="status" value="1">
					<button class="layui-btn" lay-submit lay-filter="search-dz-br">搜索</button>
					</div>
					</div>
  			</form>
			</div> <!--/ search -->
			<div class="blank30"></div>
			<table id="dz-search-result" lay-filter="searchResult" lay-data="{id:'searchDzList'}"></table>
			<div class="blank30"></div>
			<script type="text/html" id="toolbar">
			<a class="layui-btn layui-btn-mini" lay-event="detail">查看</a>
			<a class="layui-btn layui-btn-mini" lay-event="edit">编辑</a>
			<a class="layui-btn layui-btn-danger layui-btn-mini" lay-event="del">删除</a>
			</script>
@endsection