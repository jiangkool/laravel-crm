	<div class="am-clear"></div>
	<div class="am-u-sm-12">
	 @if(Session::has('message'))
          <div class="am-alert am-alert-success" data-am-alert>
          <button type="button" class="am-close">&times;</button>
           <p><span class="am-icon-check-circle"></span> {{ Session::get('message') }}</p>
          </div>
        @else
          @include('layouts.errors')
        @endif
     </div>
     <div class="am-clear"></div>