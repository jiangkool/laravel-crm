<div class="rslides_container">
      <ul class="rslides" id="slider">
      	@foreach($banners as $banner)
        <li><a href="{{ route('show',$banner->id) }}" target="_blank" title="{{$banner->title}}"><img src="{{$banner->thumb}}" alt="{{$banner->title}}"/></a></li>
		@endforeach
      </ul>
    </div>