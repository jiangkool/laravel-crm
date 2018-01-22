@extends('layouts.admin')

@section('title','编辑权限')

@section('content')
<div class="admin-content-body">
      <div class="am-cf am-padding am-padding-bottom-0">
        <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg"><i class="am-icon-pencil-square-o"></i> 编辑权限</strong>  <small></small></div>
      </div>

      <hr/>

      <div class="am-g">
         @include('layouts.message')
        <div class="am-u-sm-12 am-u-md-8">
          <form class="am-form am-form-horizontal" action="{{ route('permission.update',$permission->id) }}" method="post">
          <input type="hidden" name="_method" value="PUT">
          {{csrf_field()}}
            <div class="am-form-group">
              <label for="slug" class="am-u-sm-3 am-form-label">操作名称slug：</label>
              <div class="am-u-sm-9">
                <input type="text" name="slug" id="slug" placeholder="操作名称slug" value="{{ $permission->slug }}">
              </div>
            </div>
            <div class="am-form-group">
              <label for="name" class="am-u-sm-3 am-form-label">权限名称：</label>
              <div class="am-u-sm-9">
                <input type="text" name="name" id="name" placeholder="权限名称" value="{{ $permission->name }}">
              </div>
            </div>
            <div class="am-form-group">
              <div class="am-u-sm-9 am-u-sm-push-3">
                <button type="submit" class="am-btn am-btn-primary am-radius">保存提交</button>
                <button type="button" class="am-btn am-btn-secondary am-radius" onclick="javascript:history.go('-1');"><i class="am-icon-mail-reply"></i> 返回列表</button>
              </div>
            </div>
          </form>
        </div>
      </div>
       </div>
@endsection