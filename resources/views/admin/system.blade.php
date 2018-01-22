@extends('layouts.admin')

@section('title','系统设置')

@section('content')
<div class="admin-content-body">
      <div class="am-cf am-padding am-padding-bottom-0">
        <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">系统设置</strong> / <small>System information</small></div>
      </div>

      <hr/>

      <div class="am-g">
      @include('layouts.message')
        <div class="am-u-sm-12 am-u-md-8">
          <form class="am-form am-form-horizontal" action="{{ route('system_update') }}" method="post">
          {{csrf_field()}}
            <div class="am-form-group">
              <label for="domain" class="am-u-sm-3 am-form-label">域名：</label>
              <div class="am-u-sm-9">
                <input type="text" name="domain" id="domain" placeholder="域名 / Domain" value="{{ $systems->domain or '' }}">
              </div>
            </div>

            <div class="am-form-group">
              <label for="site_title" class="am-u-sm-3 am-form-label">站点标题：</label>
              <div class="am-u-sm-9">
                <input type="text" name="site_title" id="site_title" placeholder="站点标题" value="{{ $systems->site_title or '' }}">
              </div>
            </div>
          <div class="am-form-group">
              <label for="seo_title" class="am-u-sm-3 am-form-label">SEO标题：</label>
              <div class="am-u-sm-9">
                <input type="text" name="seo_title" id="seo_title" placeholder="SEO标题" value="{{ $systems->seo_title or '' }}">
              </div>
            </div>
            <div class="am-form-group">
              <label for="site_keywords" class="am-u-sm-3 am-form-label">关键字：</label>
              <div class="am-u-sm-9">
                <input type="text" name="site_keywords" id="site_keywords" placeholder="关键字" value="{{ $systems->site_keywords or '' }}">
              </div>
            </div>

            <div class="am-form-group">
              <label for="site_description" class="am-u-sm-3 am-form-label">描述：</label>
              <div class="am-u-sm-9">
                <textarea  name="site_description" id="site_description" placeholder="描述">{{ $systems->site_description or '' }}</textarea> 
              </div>
            </div>


            <div class="am-form-group">
              <div class="am-u-sm-9 am-u-sm-push-3">
                <button type="submit" class="am-btn am-btn-primary">保存修改</button>
              </div>
            </div>
          </form>
        </div>
      </div>
       </div>
@endsection