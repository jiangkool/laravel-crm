@if(Auth::check()&& Session::has('admin_permissions') )
<frameset cols="100,*">
<div class="admin-sidebar am-offcanvas" id="admin-offcanvas">
    <div class="am-offcanvas-bar admin-offcanvas-bar">
      <ul class="am-list admin-sidebar-list">
        <li><a href="{{ route('login')}}"><span class="am-icon-home"></span> 系统首页</a></li>
        @if(array_key_exists('users.index',Session::get('admin_permissions')) || array_key_exists('roles.index',Session::get('admin_permissions')) || array_key_exists('permission.index',Session::get('admin_permissions')))
        <li class="admin-parent">
          <a class="am-cf" data-am-collapse="{target: '#collapse-qx'}"><span class="am-icon-users"></span> 权限管理 <span class="am-icon-angle-right am-fr am-margin-right"></span></a>
          <ul class="am-list am-collapse admin-sidebar-sub 
          @if(request()->is('admin/users')||request()->is('admin/roles')||request()->is('admin/permission'))
          am-in on
          @endif
          " id="collapse-qx">
            @if(array_key_exists('users.index',Session::get('admin_permissions')))
            <li><a href="{{ route('users.index') }}" class="am-cf"><span class="am-icon-users"></span> 会员管理</a></li>
            @endif
            @if(array_key_exists('roles.index',Session::get('admin_permissions')))
            <li><a href="{{ route('roles.index') }}"><span class="am-icon-user"></span> 角色管理</a></li>
             @endif
             @if(array_key_exists('permission.index',Session::get('admin_permissions')))
            <li><a href="{{ route('permission.index') }}" ><span class="am-icon-sitemap"></span> 权限配置</a></li>
             @endif
          </ul>
        </li>
        @endif
        @if(array_key_exists('system',Session::get('admin_permissions')))
        <li class="admin-parent">
        <a class="am-cf" data-am-collapse="{target: '#collapse-sys'}"><span class="am-icon-cog"></span> 系统信息 <span class="am-icon-angle-right am-fr am-margin-right"></span></a>
        <ul class="am-list am-collapse admin-sidebar-sub
        @if(request()->is('admin/setting')||request()->is('admin/system/log')||request()->is('admin/setting/clear-cache'))
          am-in on
          @endif
        " id="collapse-sys">
            <li><a href="{{route('system')}}" ><span class="am-icon-cogs"></span> 系统配置</a></li>
            <li><a href="{{route('user.log')}}" ><span class="am-icon-calendar"></span> 系统日志</a></li>
            <li><a href="{{route('system.clear-cache')}}"><span class="am-icon-calendar"></span> 清除缓存</a></li>
        </ul>
        </li>
         @endif
        <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><span class="am-icon-sign-out"></span> 注销</a></li>
      </ul>
      <div class="am-panel am-panel-default admin-sidebar-panel">
        <div class="am-panel-bd">
          <p><span class="am-icon-bookmark"></span> 公告</p>
          <p>时光静好，与君语；细水流年，与君同。</p>
        </div>
      </div>
    </div>
  </div>
  @endif