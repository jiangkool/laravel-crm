@section('title',$cate->category_name.'-'.$tdk->site_title)

@extends('layouts.home')

@section('header')
 @include('home.header')
@endsection

@section('leftcon')
<div class="breadcrumb"> <i class="icon-home"></i> <a href='/'>主页</a> @if(isset($category['pcat']))  > <a href="{{ route('categoryShow',$category['pcat']['0']) }}">{{ $category['pcat']['2'] }}</a>  @endif > <a href="{{ route('categoryShow',$category['fcat']['0']) }}">{{ $category['fcat']['2'] }}</a> >  </div>
    <div class="clear"></div>
  @if(count($lists))
    @foreach($lists as $list)
     <article class="post cate1 auth1">
      <div class="thumb"> <a href="{{ route('show',$list->id) }}" title="{{ $list->title }}" target="_blank"> <img alt="{{ $list->title }}" src="{{ $list->thumb or '/images/1-1ffq20zb11-lp.jpg' }}"/> </a> </div>
      <span class="post-cat"><a href="{{ route('categoryShow',$list->category_id) }}" title="{{ $list->category->category_name }}" target="_blank">{{ $list->category->category_name }}</a></span>
      <h2><a href="{{ route('show',$list->id) }}" title="{{ $list->title }}" target="_blank">{{ msubstr($list->title,0,40) }}</a></h2>
      <div class="entry loop-entry">
        <p>{{ msubstr($list->meta_description,0,100) }}</p>
      </div>
      <div class="postmeta"> <span><i class="icon-calendar"></i> 日期：{{ date('Y-m-d',strToTime($list->created_at)) }}</span> <span><i class="icon-fire"></i> 浏览：{{ $list->click }}次</span></div>
      </article>
    @endforeach
  @endif
<div class="am-cf">
{{ $lists->links() }}  
</div>

@endsection


@section('sider')
  @include('home.sider')
@endsection

@section('footer')
  @include('home.footer')
@endsection