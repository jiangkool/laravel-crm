@extends('layouts.main')

@section('title','新增病人')

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
					<input type="text" name="phone"  placeholder="请填写完整" lay-filter="phone" autocomplete="off" class="layui-input">
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
					<button class="layui-btn" lay-submit lay-filter="search-add-br">搜索病人</button>
					</div>
					</div>
  			</form>
			<script type="text/html" id="toolbar">
			<a class="layui-btn layui-btn-mini" lay-event="detail">查看</a>
			<a class="layui-btn layui-btn-mini" lay-event="edit">编辑</a>
			<a class="layui-btn layui-btn-danger layui-btn-mini" lay-event="del">删除</a>
			</script>
			</div> <!--/ search -->
			<div class="blank20"></div>
			<table id="add-search-result" lay-filter="searchResult" lay-data="{id:'addsearchList'}"></table>
			<div class="blank20"></div>
			<div class="add-box">
				<div class="add-item-bt"><b>+ 新增病人</b></div>
				<form class="layui-form layui-form-pane2" action="">
				<table class="layui-table my-table">
				<tr>
					<td style="width: 100px;border-right: 1px solid #ddd;text-align: right">基本信息：</td>
					<td style="padding-top: 20px">
					<div class="layui-form-item">
						<div class="layui-inline">
						<label class="layui-form-label">归属</label>
						<div class="layui-input-inline"  style="width: 100px;">
							<input type="text" name=""  value="{{ Auth::user()->name }}" class="layui-input" disabled>
						</div>
						</div>
						<div class="layui-inline">
						<label class="layui-form-label">咨询时间</label>
						<div class="layui-input-inline">
  						<input type="text" name="first_zx_time" placeholder="请选择" lay-verify="required" class="layui-input" id="select-time2">
						</div>
					</div>
					</div>	
					<div class="layui-form-item">
						<div class="layui-inline">	
						<label class="layui-form-label">名字</label>
						<div class="layui-input-inline" style="width: 100px">
						<input type="text" name="name" placeholder="李四" lay-verify="required|username"  autocomplete="off" class="layui-input">
						</div>
						</div>
						<div class="layui-inline">	
						<label class="layui-form-label">年龄</label>
						<div class="layui-input-inline" style="width: 100px">
						<input type="text" name="age" placeholder="40" lay-verify="number"  autocomplete="off" class="layui-input">
						</div>
						</div>
						<div class="layui-inline">	
						<label class="layui-form-label">性别</label>
						<div class="layui-input-block" style="width: 100px;">
						<select name="sex" lay-verify="required">
						<option value="">请选择</option>
						<option value="1">男性</option>
						<option value="0">女性</option>
						</select>
						</div>
						</div>
						<div class="layui-inline">
						<label class="layui-form-label">手机号</label>
						<div class="layui-input-inline" style="width: 120px;">
						<input type="text" name="phone" placeholder="18827619095" lay-verify="required|phone|number"  autocomplete="off" class="layui-input">
						</div>
						</div>
					<div class="layui-inline">	
						<label class="layui-form-label">婚姻状况</label>
						<div class="layui-input-block" style="width: 100px;">
						<select name="is_married">
						<option value="">请选择</option>
						<option value="1">未婚</option>
						<option value="0">已婚</option>
						</select>
						</div>
						</div>
						<div class="layui-inline">
						<label class="layui-form-label">职业</label>
						<div class="layui-input-inline" style="width: 100px;">
						<input type="text" name="zhiye" placeholder="办公室职员" autocomplete="off" class="layui-input">
						</div>
						</div>
						<div class="layui-inline">
						<label class="layui-form-label">家庭住址</label>
						<div class="layui-input-inline" >
						<input type="text" name="address" placeholder="湖北省武汉市小胡同3号" autocomplete="off" class="layui-input">
						</div>
						</div>
						<div class="layui-inline">
						<label class="layui-form-label">咨询人</label>
						<div class="layui-input-inline" style="width: 100px;">
						<input type="text" name="zixunren" placeholder="王女士" autocomplete="off" class="layui-input">
						</div>
						</div>
						<div class="layui-inline">
						<label class="layui-form-label">与患者关系</label>
						<div class="layui-input-block" style="width: 100px;">
						<select name="hz_guanxi">
						<option value="">请选择</option>
						<option value="0">母子</option>
						<option value="1">父子</option>
						<option value="2">亲戚</option>
						<option value="3">朋友</option>
						</select>
						</div>
						</div>
					</div>
					</td>
				</tr>
				<tr>
					<td style="border-right: 1px solid #ddd;text-align: right">网络初诊：</td>
					<td  style="padding-top: 20px">
						<div class="layui-form-item">
						<div class="layui-inline">
						<label class="layui-form-label">初步诊断</label>
						<div class="layui-input-block"  style="width: 100px;">
						<select name="bz_id" lay-verify="required">
						<option value="">请选择</option>
						@foreach($diseases as $disease)
						<option value="{{ $disease->id }}">{{ $disease->disease_name }}</option>
						@endforeach
						</select>
						</div>
						</div>
						<div class="layui-inline">
						<label class="layui-form-label">电话咨询</label>
						<div class="layui-input-block"  style="width: 100px;">
						<select name="is_tel">
						<option value="">请选择</option>
						<option value="1">有</option>
						<option value="0">无</option>
						</select>
						</div>
						</div>
						<div class="layui-inline">
						<label class="layui-form-label">是否就诊过</label>
						<div class="layui-input-block"  style="width: 100px;">
						<select name="is_visit">
						<option value="">请选择</option>
						<option value="1">有</option>
						<option value="0">无</option>
						</select>
						</div>
						</div>
						<div class="layui-inline">
						<label class="layui-form-label">患病周期</label>
						<div class="layui-input-inline"  style="width: 100px;">
						<input type="text" name="zhouqi" placeholder="1个月" autocomplete="off" class="layui-input">
						</div>
						</div>
						</div>
						<div class="layui-form-item layui-form-text">
						<div class="layui-inline">
						<label class="layui-form-label">病人主诉</label>
						<div class="layui-input-block" style="width: 200%;">
						 <textarea name="content"  lay-verify="required" placeholder="请输入内容" class="layui-textarea"></textarea>
						</div>
						</div>
						</div>
						<div class="layui-form-item">
							<div class="layui-inline">
						<label class="layui-form-label">特殊要求</label>
						<div class="layui-input-inline"  style="width: 100px;">
						<input type="text" name="ts_require" placeholder="" autocomplete="off" class="layui-input">
						</div>
						</div>
						<div class="layui-inline">
						<label class="layui-form-label">是否预约</label>
						<div class="layui-input-block" style="width: 100px;">
						<select name="status"  lay-verify="required">
						<option value="">请选择</option>
						<option value="0">已预约</option>
						<option value="-1">未预约</option>
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
						<label class="layui-form-label">预约到诊</label>
						<div class="layui-input-inline"  style="width: 120px;">
  						<input type="text" name="yydate" placeholder="请选择" class="layui-input" id="yydz-time">
						</div>
						</div>
						<div class="layui-inline">
						<label class="layui-form-label">随访时间</label>
						<div class="layui-input-inline"  style="width: 150px;">
  						<input type="text" name="next_sf_time" placeholder="请选择" class="layui-input" id="sf-time">
						</div>
					</div>
						</div>
					</td>
				</tr>
				</table>
				<div class="blank10"></div>
					<div class="layui-form-item text-center">
					<button class="layui-btn" lay-submit lay-filter="add-customer">新增病人</button>
					</div>
				</form>
				<div class="blank15"></div>
			</div>
			<div class="blank30"></div>
@endsection