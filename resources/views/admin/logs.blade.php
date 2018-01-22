@extends('layouts.admin')

@section('title','系统日志列表')

@section('content')
  <div class="admin-content-body">
      <div class="am-cf am-padding am-padding-bottom-0">
        <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg"><span class="am-icon-calendar"></span> 系统日志列表</strong> </div>
      </div>
  <div class="am-g">
        <div class="am-u-sm-5 am-u-sm-offset-7 am-u-md-3 am-u-md-offset-9">
          <div class="am-btn-toolbar">
            <div class="am-btn-group am-btn-group-sm am-text-right">
              <button type="button" class="am-btn am-btn-success am-round"  onclick="window.open('{{ route('user.logdel') }}','_self')"><span class="am-icon-trash"></span> 清除日志列表</button>
            </div>
          </div>
        </div>
      </div>
      <hr>
     @include('layouts.message')

      <div class="am-g">
        <div class="am-u-sm-12">
          <form class="am-form">
            <table class="am-table am-table-striped am-table-hover table-main">
              <thead>
              <tr>
                <th class="table-id">ID</th><th class="table-title">用户名</th><th class="table-author">操作记录</th><th class="table-title am-hide-sm-only">记录时间</th>
              </tr>
              </thead>
              <tbody>
              @if(count($logs)>0)
                @foreach($logs as $log)
                <tr>
                <td>{{ $log->id }}</td>
                <td>{{ $log->username }}</td>
                <td>{{ $log->action }}</td>
                <td class="am-hide-sm-only">{{ $log->created_at }}</td>
                </tr>
                @endforeach
             @endif
              </tbody>
            </table>
            <div class="am-cf">
            {{ $logs->links() }}
            </div>
            <hr />
            <p>注：.....</p>
          </form>
        </div>

      </div>
    </div>
@endsection