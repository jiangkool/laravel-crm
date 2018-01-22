@extends('layouts.main')

@section('title','管理员设置')

@section('content')
<div class="layui-row layui-col-space10">
			 <div class="layui-col-sm3">
			 	<div class="user-ma">
			 		<div class="add-item-bt"><b>用户管理</b></div>
			 		<form  class="layui-form userform">
			 		<div class="layui-form-item">
					<div class="layui-inline">
					<label class="layui-form-label">用户名</label>
					<div class="layui-input-block">
					<input type="text" name="name" lay-verify="required" placeholder="长度不少于2" autocomplete="off" class="layui-input">
					</div>
					</div>
					<div class="layui-inline">
					<label class="layui-form-label">密码</label>
					<div class="layui-input-block">
					<input type="password" name="password" lay-verify="password" placeholder="" autocomplete="off" class="layui-input">
					</div>
					</div>
					<div class="layui-inline">	
						<label class="layui-form-label">类别</label>
						<div class="layui-input-block">
						<select name="roles">
						@foreach($roles as $role)
						<option value="{{ $role->id }}">{{ $role->name }}</option>
						@endforeach
						</select>
						</div>
						</div>
					</div>
					<div class="layui-form-item text-center">
					<button class="layui-btn" lay-submit lay-filter="add-user">新增用户</button>
					</div>
			 		</form>
			 		<table id="users-list" lay-filter="users-list" lay-data="{id:'usersList'}"></table>
			 		<script type="text/html" id="usertoolbar">
					<a lay-event="del" class='layui-btn layui-btn-danger layui-btn-small '><i class='layui-icon'>&#xe640;</i>删除</a>
					</script>
			 	</div>
			 	
			 </div>
			 <div class="layui-col-sm9">
			 	<div class="layui-row shezhi">
			 		<div class="layui-col-sm6" style="border-right: 1px solid #ddd">
			 		<div class="sz-bt"><b>随访结果设置</b></div>
			 		<div class="blank15"></div>
			 		<form  class="layui-form userform2">
						<div class="layui-form-item">
							<div class="layui-inline">
							<label class="layui-form-label">随访结果</label>
							<div class="layui-input-inline"  style="width: 120px">
							<input type="text" name="result_name" lay-verify="required" placeholder="" autocomplete="off" class="layui-input">
							</div>
							</div>
							<div class="layui-inline">
							<label class="layui-form-label">随访周期</label>
							<div class="layui-input-inline" style="width: 50px">
							<input type="text" name="result_zq"  placeholder="5" lay-verify="required|number"  autocomplete="off" class="layui-input">
							</div>
							</div>
							<div class="layui-inline">
								<button class="layui-btn " lay-submit lay-filter="add-result">新增</button>
							</div>
						</div>
					</form>
						<div class="layui-col-sm12">
						<table id="results" lay-filter="results" lay-data="{id: 'resultId'}"></table>
						<script type="text/html" id="resultsToolbar">
						<a lay-event="del" class='layui-btn layui-btn-danger layui-btn-small '><i class='layui-icon'>&#xe640;</i>删除</a>
						</script>

						</div>
					</div>
			 		<div class="layui-col-sm6" >
			 		<div class="sz-bt"><b>网络预约病种</b></div>
			 		<div class="blank15"></div>
			 		<form  class="layui-form userform2">
						<div class="layui-form-item">
							<div class="layui-inline">
							<label class="layui-form-label">病种名称</label>
							<div class="layui-input-inline"  style="width: 120px">
							<input type="text" name="disease_name" lay-verify="required" placeholder="" autocomplete="off" class="layui-input">
							</div>
							</div>
							<div class="layui-inline">
								<button class="layui-btn " lay-submit lay-filter="add-disease">新增</button>
							</div>
						</div>
					</form>
						<div class="layui-col-sm12">
						<table id="diseases" lay-filter="diseases" lay-data="{id: 'diseaseId'}"></table>
						<script type="text/html" id="diseasesToolbar">
						<a lay-event="del" class='layui-btn layui-btn-danger layui-btn-small '><i class='layui-icon'>&#xe640;</i>删除</a>
						</script>

						</div>
					</div>
			 		<div class="clear"></div>
					<div class="layui-col-sm6 border-right" style="border-top: 1px solid #ddd">
			 		<div class="sz-bt"><b>医生设置</b></div>
			 		<div class="blank15"></div>
			 		<form  class="layui-form userform2">
						<div class="layui-form-item">
							<div class="layui-inline">
							<label class="layui-form-label">医生名称</label>
							<div class="layui-input-inline"  style="width: 120px">
							<input type="text" name="doctor_name" lay-verify="required" placeholder="" autocomplete="off" class="layui-input">
							</div>
							</div>
							<div class="layui-inline">
								<button class="layui-btn " lay-submit lay-filter="add-doctor">新增</button>
							</div>
						</div>
					</form>
						<div class="layui-col-sm12">
						<table id="doctors" lay-filter="doctors" lay-data="{id: 'doctorId'}"></table>
						<script type="text/html" id="doctorsToolbar">
						<a lay-event="del" class='layui-btn layui-btn-danger layui-btn-small '><i class='layui-icon'>&#xe640;</i>删除</a>
						</script>

						</div>
					</div>
			 	<div class="layui-col-sm6" style="border-top: 1px solid #ddd">
			 		<div class="sz-bt"><b>其他设置</b></div>
			 		<div class="blank15"></div>
			 		<form  class="layui-form userform2">
						<div class="layui-form-item">
							<div class="layui-inline">
							<label class="layui-form-label">名称</label>
							<div class="layui-input-inline"  style="width: 120px">
							<input type="text" name="name" lay-verify="required" placeholder="" autocomplete="off" class="layui-input">
							</div>
							</div>
							<div class="layui-inline">
								<button class="layui-btn " lay-submit lay-filter="add-other">新增</button>
							</div>
						</div>
					</form>
						<div class="layui-col-sm12">
						<table id="other" lay-filter="other" lay-data="{id: 'otherId'}"></table>
						<script type="text/html" id="otherToolbar">
						<a lay-event="del" class='layui-btn layui-btn-danger layui-btn-small '><i class='layui-icon'>&#xe640;</i>删除</a>
						</script>

						</div>
					</div>
			 	</div>
			 	
			 </div>
		</div>
		<div class="blank30"></div>
@endsection