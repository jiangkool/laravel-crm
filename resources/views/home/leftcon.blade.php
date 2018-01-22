@if(count($head_arts))
<div class="post istop cate1 auth1">
    @foreach($head_arts as $head_art)
      <h2><span>置顶头条</span> <a href="{{ route('show',$head_art->id)}}" title="{{$head_art->title}}">{{ msubstr($head_art->title,0,40)}}</a></h2>
    @endforeach
</div>
@endif
  @if(count($news))
    @foreach($news as $new)
     <article class="post cate1 auth1">
      <div class="thumb"> <a href="{{ route('show',$new->id) }}" title="{{ $new->title }}" target="_blank"> <img alt="{{ $new->title }}" src="{{ $new->thumb or '/images/1-1ffq20zb11-lp.jpg' }}"/> </a> </div>
      <span class="post-cat"><a href="{{ route('categoryShow',$new->category_id) }}" title="{{ $new->category->category_name }}" target="_blank">{{ $new->category->category_name }}</a></span>
      <h2><a href="{{ route('show',$new->id) }}" title="{{ $new->title }}" target="_blank">{{ msubstr($new->title,0,40) }}</a></h2>
      <div class="entry loop-entry">
        <p>{{ msubstr($new->meta_description,0,100) }}</p>
      </div>
      <div class="postmeta"> <span><i class="icon-calendar"></i> 日期：{{ date('Y-m-d',strToTime($new->created_at)) }}</span> <span><i class="icon-fire"></i> 浏览：{{ $new->click }}次</span></div>
      </article>
    @endforeach
  @endif
<div class="am-cf">
{{ $news->links() }}  
</div>

<a href="http://app.027baijia.com/guahao">120挂号</a>
