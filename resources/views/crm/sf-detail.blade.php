@extends('layouts.main')

@section('title','增加随访')

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
			<table id="sf-search-result" lay-filter="sf-search" lay-data="{id:'sfSearch'}"></table>
			<script type="text/html" id="toolbar">
			<a class="layui-btn layui-btn-mini" lay-event="detail">查看</a>
			<a class="layui-btn layui-btn-mini"  lay-event="addfollow">添加随访</a>
			<a class="layui-btn layui-btn-danger layui-btn-mini" lay-event="del">删除</a>
			</script>
			<div class="blank20"></div>
			<table id="sf-details" lay-filter="sf-details" class="layui-table" lay-skin="line" lay-even>
				<thead>
				<tr>
				<th lay-data="{field: 'id', width:100}">患者id</th>
				<th lay-data="{field: 'name', width: 120}">患者姓名</th>
				<th lay-data="{field: 'created_at', width: 200}">上次随访日期</th>
				<th lay-data="{field: 'result_id', width: 200}">上次随访结果</th>
				<th lay-data="{field: 'next_sf_time', width: 200}">下次随访日期</th>
				<th lay-data="{field: 'bz_id', width: 200}">网络初诊病种</th>
				<th lay-data="{field: 'sf_info', width: 167}">随访详细</th>
				</tr> 
				</thead> 
				<tbody>
					@php
					 $index=0;
					@endphp
					@if(!empty($follows))
					@foreach($follows as $follow)
					@if($index==0)
					<tr>
						<td>{{ $follow['customer_id'] }}</td>
						<td>{{ $follow['name'] }}</td>
						<td>{{ $follow['created_at'] }}</td>
						<td>{{ $follow['result_id'] }}</td>
						<td>{{ $follow['next_sf_time'] }}</td>
						<td>{{ $follow['bz_id'] }}</td>
						<td><a data-attr="{{{$follow['sf_info'] or '暂无'}}}" class='see-details'><i class='layui-icon'>&#xe615;</i> 查看</a></td>
					</tr>
					@else
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>{{ $follow['created_at'] }}</td>
						<td>{{ $follow['result_id'] }}</td>
						<td>{{ $follow['next_sf_time'] }}</td>
						<td>{{ $follow['bz_id'] }}</td>
							<td><a data-attr="{{{$follow['sf_info'] or '暂无'}}}" class='see-details'><i class='layui-icon'>&#xe615;</i> 查看</a></td>
					</tr>
					@endif
					@php
					 $index++;
					@endphp
					@endforeach
					@endif
				</tbody>
			</table>

			<div class="add-box">
				<div class="add-item-bt"><b>+ 添加随访</b></div>
				<form class="layui-form layui-form-pane-add-sf" action="">
				<table class="layui-table my-table">
				<tr>
					<td style="width: 50px;"></td>
					<td style="padding-top: 20px">
					<div class="layui-form-item">
					<div class="layui-inline">
						<label class="layui-form-label" style="width: 85px;">本次随访时间</label>
						<div class="layui-input-inline">
  						<input type="text" name="sf_time" lay-verify="required" placeholder="" class="layui-input" id="this-sf-time">
						</div>
					</div>
						<div class="layui-inline">
						<label class="layui-form-label" style="width: 85px;">本次随访结果</label>
						<div class="layui-input-inline">
						<select name="result_id" lay-verify="required">
						<option value="">请选择</option>
						@foreach($results as $result)
						<option value="{{ $result->id }}">{{ $result->result_name }}</option>
						@endforeach
						</select>
						</div>
						</div>
						<div class="layui-inline">
					<div class="layui-input-inline">
					  <input type="checkbox"  name="status" value="-2" title="黑名单">
					</div>
					</div>
					</div>	
					<div class="layui-form-item">
						<label class="layui-form-label">随访详细</label>
						<div class="layui-input-block">
						<input type="text" name="sf_info"  lay-verify="required" placeholder="家属说咋样咋样..." autocomplete="off" class="layui-input">
						</div>
						</div>
						<div class="layui-form-item">
						<div class="layui-inline">	
						<label class="layui-form-label" >是否预约</label>
						<div class="layui-input-block" style="width: 100px;">
						<select name="isyy">
						<option value="">请选择</option>
						<option value="0">是</option>
						<option value="-1">否</option>
						</select>
						</div>
						</div>
						<div class="layui-inline">
						<label class="layui-form-label">预约医生</label>
						<div class="layui-input-block" style="width: 100px;">
						<select name="doctor_id">
						<option value="">请选择</option>
						@foreach($doctors as $doctor)
						<option value="{{ $doctor->id }}">{{ $doctor->doctor_name }}</option>
						@endforeach
						</select>
						</div>
						</div>
						<div class="layui-inline">
						<label class="layui-form-label" style="width: 85px;">预约到诊时间</label>
						<div class="layui-input-inline">
  						<input type="text" name="yydate" placeholder="请选择" class="layui-input" id="yy-time">
						</div>
					</div>
						<div class="layui-inline">
						<label class="layui-form-label">特殊要求</label>
						<div class="layui-input-inline" style="width: 120px;">
						<input type="text" name="ts_require" placeholder="" autocomplete="off" class="layui-input">
						</div>
						</div>
						
					</div>
					</td>
				</tr>
				</table>
				<div class="blank10"></div>
					<input type="hidden" name="id" value="{{ $customer_id }}">
					<div class="layui-form-item text-center">
					<button class="layui-btn" lay-submit lay-filter="add-sf">新增随访</button>
					</div>
				</form>
				<div class="blank15"></div>
			</div>
			<div class="blank30"></div>
@endsection