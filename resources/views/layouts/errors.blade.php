@if(count($errors))
	<div  class="am-alert am-alert-danger" data-am-alert>
	<button type="button" class="am-close">&times;</button>
		<ul style="list-style: none">
		@foreach($errors->all() as $error)
			<li><span class="am-icon-times-circle"></span> {{ $error }}</li>
		@endforeach
		</ul>
	</div>
@endif