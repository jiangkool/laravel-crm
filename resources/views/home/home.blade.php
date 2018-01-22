@extends('layouts.home')

@section('title',$tdk->seo_title)

@section('keywords',$tdk->site_keywords)

@section('description',$tdk->site_description)

@section('header')
	@include('home.header')
@endsection

@section('banner')
	@include('home.banner',$banners)
@endsection

@section('leftcon')
	@include('home.leftcon',[$news,$head_arts])
@endsection

@section('sider')
	@include('home.sider',[$hot_arts,$tj_arts])
@endsection

@section('footer')
	@include('home.footer')
@endsection