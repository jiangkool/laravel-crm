@extends('layouts.admin')

@section('title','权限配置列表')

@section('content')
	<div class="admin-content-body">
      <div class="am-cf am-padding am-padding-bottom-0">
        <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg"><span class="am-icon-sitemap"></span> 权限配置列表</strong> </div>
      </div>

      <hr>
      @include('layouts.message')

      <div class="am-g">
        <div class="am-u-sm-12 am-u-md-6">
          <div class="am-btn-toolbar">
            <div class="am-btn-group am-btn-group-sm">
              <button type="button" class="am-btn am-btn-success"  onclick="window.open('{{ route('permission.create') }}','_self')"><span class="am-icon-plus"></span> 新增</button>
              <button type="button" class="am-btn am-btn-danger"><span class="am-icon-trash-o"></span> 删除</button>
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
                <th class="table-check"><input type="checkbox" /></th><th class="table-id">ID</th><th class="table-title">权限操作slug</th><th class="table-type">权限名称</th><th class="table-date am-hide-sm-only">修改日期</th><th class="table-set">操作</th>
              </tr>
              </thead>
              <tbody>
              @if(count($permissions)>0)
              	@foreach($permissions as $permission)
              	<tr>
                <td><input type="checkbox"  name="ids[]" value="{{ $permission->id }}" /></td>
                <td>{{ $permission->id }}</td>
                <td><a href="{{ route('permission.edit',$permission->id) }}">{{ $permission->slug }}</a></td>
                <td>{{ $permission->name }}</td>
                <td class="am-hide-sm-only">{{ $permission->updated_at }}</td>
                <td>
                  <div class="am-btn-toolbar">
                    <div class="am-btn-group am-btn-group-xs">
                      <a class="am-btn am-btn-primary am-btn-xs" onclick="window.open('{{ route('permission.edit',$permission->id) }}','_self')"><span class="am-icon-pencil-square-o"></span> 编辑</a>
                      <a class="am-btn am-btn-danger am-btn-xs" onclick="window.open('{{ route('permission.delete',['id'=>$permission->id]) }} ','_self')"><span class="am-icon-trash-o"></span> 删除</a>
                    </div>
                  </div>
                </td>
              	</tr>
              	@endforeach
             @endif
              </tbody>
            </table>
            <div class="am-cf">
            {{ $permissions->links() }}
            </div>
            <hr />
            <p>注：.....</p>
          </form>
        </div>

      </div>
    </div>
@endsection
