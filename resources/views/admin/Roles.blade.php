@extends('layouts.admin')

@section('title','角色管理列表')

@section('content')
	<div class="admin-content-body">
      <div class="am-cf am-padding am-padding-bottom-0">
        <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg"><span class="am-icon-user"></span> 角色管理列表</strong> / <small>Roles</small></div>
      </div>

      <hr>
      @include('layouts.message')

      <div class="am-g">
        <div class="am-u-sm-12 am-u-md-6">
          <div class="am-btn-toolbar">
            <div class="am-btn-group am-btn-group-sm">
              <button type="button" class="am-btn am-btn-success am-round"  onclick="window.open('{{ route('roles.create') }}','_self')"><span class="am-icon-plus"></span> 新增角色</button>
            </div>
          </div>
        </div>
      </div>

      <div class="am-g">
        <div class="am-u-sm-12">
          <form class="am-form">
            <table class="am-table am-table-striped am-table-hover table-main">
              <thead>
              <tr>
                <th class="table-id">ID</th><th class="table-title">角色</th><th class="table-date am-hide-sm-only">修改日期</th><th class="table-set">操作</th>
              </tr>
              </thead>
              <tbody>
              @if(count($roles)>0)
              	@foreach($roles as $role)
              	<tr>
                <td>{{ $role->id }}</td>
                <td><a href="{{ URL::route('roles.edit',$role->id) }}">{{ $role->name }}</a></td>
                <td class="am-hide-sm-only">{{ $role->updated_at }}</td>
                <td>
                  <div class="am-btn-toolbar">
                    <div class="am-btn-group am-btn-group-xs">
                      <a class="am-btn am-btn-primary am-btn-xs" onclick="window.open('{{ route('roles.edit',$role->id) }}','_self')"><span class="am-icon-pencil-square-o"></span> 编辑</a>
                      <a class="am-btn am-btn-danger am-btn-xs" onclick="window.open('{{ route('roles.delete',['id'=>$role->id]) }} ','_self')"><span class="am-icon-trash-o"></span> 删除</a>
                    </div>
                  </div>
                </td>
              	</tr>
              	@endforeach
             @endif
              </tbody>
            </table>
            <div class="am-cf">
            {{ $roles->links() }}
            </div>
            <hr />
            <p>注：.....</p>
          </form>
        </div>

      </div>
    </div>
@endsection
