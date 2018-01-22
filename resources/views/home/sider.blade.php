<aside class="sidebar">
    <section class="widget" id="divSearchPanel">
      <h3><i class="icon-th-list"></i> 搜索</h3>
      <div>
        <form  name="formsearch" action="{{ route('search') }}" method="post">
          {{ csrf_field() }}
          <input type="text" name="q" size="11" />
          <input type="submit" value="搜索" />
        </form>
      </div>
    </section>
    <section class="widget" id="scroll">
      <h3><i class="icon-th-list"></i> 热门文章</h3>
      <ul class="hot-post">
        @foreach($hot_arts as $hot_art)
        <li>
          <div class="thumb"><a href="{{ route('show',$hot_art->id) }}" title="{{ $hot_art->title }}"><img src="
            @if(empty($hot_art->thumb))
            /images/1-1ffq20zb11-lp.jpg
            @else
            {{ $hot_art->thumb }}
            @endif
            " alt="{{ $hot_art->title }}"/></a></div>
          <div class="hot-title"><a href="{{ route('show',$hot_art->id) }}" title="{{ $hot_art->title }}">{{ msubstr($hot_art->title,0,20) }}</a></div>
          <div class="hot-time"><i class="icon-time"></i> {{ date('Y-m-d',strtotime($hot_art->created_at)) }}</div>
        </li>
        @endforeach


      </ul>
    </section>
    <section class="widget">
      <h3><i class="icon-th-list"></i> 推荐文章</h3>
      <ul class="hot-post">
        @foreach($tj_arts as $tj_art)
        <li>
          <div class="thumb"><a href="{{ route('show',$tj_art->id) }}" title="{{ $tj_art->title }}"><img src="
            @if(empty($tj_art->thumb))
            /images/1-1ffq20zb11-lp.jpg
            @else
            {{ $tj_art->thumb }}
            @endif
            " alt="{{ $tj_art->title }}"/></a></div>
          <div class="hot-title"><a href="{{ route('show',$tj_art->id) }}" title="{{ $tj_art->title }}">{{ msubstr($tj_art->title,0,20) }}</a></div>
          <div class="hot-time"><i class="icon-time"></i> {{ date('Y-m-d',strtotime($tj_art->created_at)) }}</div>
        </li>
        @endforeach

      </ul>
    </section>
    
  </aside>