@extends('layouts.main')

@section('title','随访管理')

@section('content')
<div class="search-box sf-box">
				<div class="blank30"></div>
				<form class="layui-form layui-form-pane3" action="">
					<div class="layui-form-item">
					<div class="layui-inline">
					<label class="layui-form-label">上次随访时间</label>
					<div class="layui-input-inline"  style="width: 150px;">
  						<input type="text" name="last_sf_time"  class="layui-input" id="select-time">
					</div>
					</div>
					<div class="layui-inline">
					<label class="layui-form-label">上次随访结果</label>
					<div class="layui-input-block"  style="width: 160px;">
					<select name="result_id" >
					<option value="">请选择</option>
					@foreach($results as $result)
						<option value="{{ $result->id }}">{{ $result->result_name }}</option>
					@endforeach
					</select>
					</div>
					</div>
					<div class="layui-inline">
					<label class="layui-form-label">网络初诊病种</label>
					<div class="layui-input-block"  style="width: 160px;">
					<select name="bz_id">
					<option value="">请选择</option>
					@foreach($diseases as $disease)
						<option value="{{ $disease->id }}">{{ $disease->disease_name }}</option>
					@endforeach
					</select>
					</div>
					</div>
					<div class="layui-inline">
					<label class="layui-form-label">随访次数</label>
					<div class="layui-input-inline" style="width: 80px;">
					<input type="text" name="sf_num" placeholder="" autocomplete="off" class="layui-input">
					</div>
					</div>
					<div class="blank15"></div>
					<div class="layui-inline">
					<label class="layui-form-label">姓名</label>
					<div class="layui-input-inline" style="width: 100px;">
					<input type="text" name="name" placeholder="张三" autocomplete="off" class="layui-input">
					</div>
					</div>
					<div class="layui-inline">
					<div class="layui-input-inline">
					  <input type="checkbox"  name="status" value="-2" title="黑名单">
					</div>
					</div>
					</div>
					<div class="layui-form-item">
					<div class="layui-input-block text-center">
					<button class="layui-btn" lay-submit lay-filter="search-sf">搜索病人</button>
					</div>
					</div>
  			</form>
			</div> <!--/ search -->
			<div class="blank20"></div>
			<table id="sf-search-result" lay-filter="sf-search" lay-data="{id:'sfSearch'}"></table>
			<div class="blank30"></div>
			<script type="text/html" id="toolbar">
			<a class="layui-btn layui-btn-mini" lay-event="detail">查看</a>
			<a class="layui-btn layui-btn-mini" lay-event="addfollow">添加随访</a>
			</script>
@endsection