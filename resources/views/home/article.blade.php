@section('title',$article->title.'-'.$tdk->site_title)
@section('keywords',$article->keywords)
@section('description',$article->meta_description)
@extends('layouts.home')

@section('header')
 @include('home.header')
@endsection

@section('leftcon')
<link rel="stylesheet" href="/highlight/styles/routeros.css">
<script type="text/javascript" src="/highlight/highlight.pack.js"></script> 
<div class="breadcrumb"> <i class="icon-home"></i> <a href='/'>主页</a> @if(isset($category['pcat']))  > <a href="{{ route('categoryShow',$category['pcat']['0']) }}">{{ $category['pcat']['2'] }}</a>  @endif > <a href="{{ route('categoryShow',$category['fcat']['0']) }}">{{ $category['fcat']['2'] }}</a> >  </div>
    <div class="clear"></div>
    <article class="post cate1  auth1">
      <h1>{{$article->title}}</h1>
      <div class="postmeta article-meta"> <span><i class="icon-calendar"></i> 日期：{{$article->created_at}} </span> <span><i class="icon-book"></i> 栏目：<a href="" title="资源分享" target="_blank">{{ $category['fcat']['2'] }}</a></span> <span><i class="icon-fire"></i> 浏览：{{$article->click}}次 </span> </div>
      <div class="entry">
       {!! $article->body !!}
      </div>
      <div class="post-nav">
@if($prevArt)
<div class="nav-left"><a href="{{ route('show',$prevArt->id) }}">上一篇：{{ msubstr($prevArt->title,0,20)}}</a></div>
@else
<div class="nav-left"><a class="am-disabled">上一篇：没有了</a> </div>
@endif
@if($nextArt)
<div class="nav-right"><a href="{{ route('show',$nextArt->id) }}">下一篇：{{msubstr($nextArt->title,0,20)}}</a></div>
@else
<div class="nav-right"><a class="am-disabled">下一篇：没有了</a> </div>
@endif
      </div>
      <div class="post-copyright">
        
        <p>内容版权声明：除非注明，否则皆为本站原创文章。</p>
        <p>转载注明出处：<a href="{{  request()->url() }}" title="{{$article->title}}" target="_blank">{{  request()->url() }}</a></p>
      </div>
     <!--  <div class="comments">
       <form action="{{ route('addComment',$article->id) }}" method="post">
          {{ csrf_field() }}
         <textarea name="comment" >
           
         </textarea>
         <input type="submit" value="提交留言">
       </form>
     </div> -->
      <section class="related">
        <h3>相关文章</h3>
        <ul>
          @php
          $i=1;
          @endphp
          @foreach($likearts as $likeart)
         <li><i>{{ date('Y-m-d',strtotime($likeart->created_at)) }}</i><span class="top">{{ $i++ }}</span><a href="{{ route('show',$likeart->id) }}" target="_blank" title="{{$likeart->title}}">{{ msubstr($likeart->title,0,40)}}</a></li>
          @endforeach
        </ul>
      </section>
      
<script>$('pre').each(function(i, block) {hljs.highlightBlock(block); });</script> 

</article>

@endsection


@section('sider')
  @include('home.sider')
@endsection

@section('footer')
  @include('home.footer')
@endsection