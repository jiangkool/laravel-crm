@extends('layouts.admin')

@section('title','清除缓存！')

@section('content')
<div class="admin-content-body">
      <div class="am-cf am-padding am-padding-bottom-0">
        <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">清除缓存</strong></div>
      </div>

      <hr/>

      <div class="am-g">
        <div class="am-clear"></div>
      <div class="am-u-sm-12">
          <div class="am-alert am-alert-success" data-am-alert>
          <button type="button" class="am-close">&times;</button>
           <p><span class="am-icon-check-circle"></span> <b>缓存已更新！</b></p>
          </div>
     </div>
     <div class="am-clear"></div>
        
      </div>
       </div>
@endsection