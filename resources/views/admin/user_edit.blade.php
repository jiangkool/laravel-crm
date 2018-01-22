@extends('layouts.admin')

@section('title','管理员信息修改')

@section('content')
<div class="admin-content-body">
      <div class="am-cf am-padding am-padding-bottom-0">
        <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">管理员信息修改</strong> / <small></small></div>
      </div>

      <hr/>

      <div class="am-g">
       @if(Session::has('message'))
          <div class="am-alert am-alert-success" data-am-alert>
          <button type="button" class="am-close">&times;</button>
           <p> {{ Session::get('message') }}</p>
            </div>
        @else
          @include('layouts.errors')
        @endif
        <div class="am-u-sm-12 am-u-md-8">
          <form class="am-form am-form-horizontal" action="{{ route('users.update',$user->id) }}" method="post">
          <input type="hidden" name="_method" value="PUT">
          {{csrf_field()}}
            <div class="am-form-group">
              <label for="name" class="am-u-sm-3 am-form-label">用户名：</label>
              <div class="am-u-sm-9">
                <input type="text" name="name" id="name" placeholder="用户名" value="{{ $user->name }}">
              </div>
            </div>

            <div class="am-form-group">
              <label for="password" class="am-u-sm-3 am-form-label">密码：</label>
              <div class="am-u-sm-9">
                <input type="password" name="password" id="password" placeholder="不改请留空" >
              </div>
            </div>

            <div class="am-form-group">
              <label for="password_confirmation" class="am-u-sm-3 am-form-label">确认密码：</label>
              <div class="am-u-sm-9">
                <input type="password" name="password_confirmation" id="password_confirmation" placeholder="不改请留空" >
              </div>
            </div>

            <div class="am-form-group">
              <label for="email" class="am-u-sm-3 am-form-label">Email：</label>
              <div class="am-u-sm-9">
                <input type="text" name="email" id="email" placeholder="Email" value="{{ $user->email }}">
              </div>
            </div>

            <div class="am-form-group">
              <label for="site_description" class="am-u-sm-3 am-form-label">角色：</label>
              <div class="am-u-sm-9">
               @foreach($perms as $perm)
                <div class="am-checkbox">
                  <label>
                    <input type="checkbox" value="{{ $perm->id }}" name="roles[]" @if(in_array($perm->id,$roles)) checked="checked" @endif>{{ $perm->name }}
                  </label>
                </div>
                 @endforeach
              </div>
            </div>


            <div class="am-form-group">
              <div class="am-u-sm-9 am-u-sm-push-3">
                <button type="submit" class="am-btn am-btn-primary">保存提交</button>
                <button type="button" class="am-btn am-btn-secondary am-radius" onclick="javascript:window.open('{{ route('users.index') }}','_self')"><i class="am-icon-mail-reply"></i> 返回列表</button>
              </div>
            </div>
          </form>
        </div>
      </div>
       </div>
@endsection