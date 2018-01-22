@extends('layouts.admin')

@section('title','编辑管理员组')

@section('content')
<div class="admin-content-body">
      <div class="am-cf am-padding am-padding-bottom-0">
        <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">编辑管理员组</strong> / <small></small></div>
      </div>

      <hr/>

      <div class="am-g">
      @include('layouts.message')
        <div class="am-u-sm-12 am-u-md-8">
          <form class="am-form am-form-horizontal" action="{{ route('roles.update',$role->id) }}" method="post">
          <input type="hidden" name="_method" value="PUT">
          {{csrf_field()}}
            <div class="am-form-group">
              <label for="name" class="am-u-sm-3 am-form-label">角色名称：</label>
              <div class="am-u-sm-9">
                <input type="text" name="name" id="name" placeholder="角色名称" value="{{ $role->name }}">
              </div>
            </div>
            <div class="am-form-group">
              <label for="permissions" class="am-u-sm-3 am-form-label">权限列表：</label>
              <div class="am-u-sm-9">
              @foreach($permissions as $permission)
              <div class="am-u-sm-4">
                  <label class=" am-checkbox  am-success">
                <input type="checkbox" name="permissions[]" data-am-ucheck value="{{ $permission->slug }}" @if(in_array($permission->slug,$perms)) checked="checked" @endif> <span title="{{ $permission->slug }}">{{ $permission->name }}</span>
                </label> 
              </div>
              @endforeach
              </div>
            </div>
            <div class="am-form-group">
              <div class="am-u-sm-9 am-u-sm-push-3">
                <button type="submit" class="am-btn am-btn-primary">保存提交</button>
                <button type="button" class="am-btn am-btn-secondary am-radius" onclick="javascript:window.open('{{ route('roles.index') }}','_self')"><i class="am-icon-mail-reply"></i> 返回列表</button>
              </div>
            </div>
          </form>
        </div>
      </div>
       </div>
@endsection