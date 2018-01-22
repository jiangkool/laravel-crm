@extends('layouts.admin')

@section('title','增加管理员组')

@section('content')
<div class="admin-content-body">
      <div class="am-cf am-padding am-padding-bottom-0">
        <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">增加管理员组</strong> / <small></small></div>
      </div>

      <hr/>

      <div class="am-g">
      @include('layouts.message')
        <div class="am-u-sm-12 am-u-md-8">
          <form class="am-form am-form-horizontal" action="{{ route('roles.store') }}" method="post">
          {{csrf_field()}}
            <div class="am-form-group">
              <label for="name" class="am-u-sm-3 am-form-label">角色名称：</label>
              <div class="am-u-sm-9">
                <input type="text" name="name" id="name" placeholder="角色名称" value="{{ old('name') }}">
              </div>
            </div>
            <div class="am-form-group">
              <div class="am-u-sm-9 am-u-sm-push-3">
                <button type="submit" class="am-btn am-btn-primary">保存提交</button>
              </div>
            </div>
          </form>
        </div>
      </div>
       </div>
@endsection