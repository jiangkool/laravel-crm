<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Article;
use App\Models\System;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*// get news data
       $news=Article::where('status','1')->orderBy('created_at','desc')->paginate(10);

       //get banner data
       $banners=Article::where('status','1')->where('attr','1')->orderBy('created_at','desc')->get();

       //热门文章top5
       $hot_arts=Article::getHotArticles();

       //推荐文章top5
       $tj_arts=Article::getArticlesByAttr('',1,5);

       //头条文章
       $head_arts=Article::getArticlesByAttr('',2,1);

       //get tdk
        $tdk=System::find(1);

        return view('home.home',compact('news','banners','hot_arts','tj_arts','tdk','head_arts'));*/

    }


    public function searchList(Request $request)
    {
        //热门文章top5
       $hot_arts=Article::getHotArticles();

       //推荐文章top5
       $tj_arts=Article::getArticlesByAttr('',1,5);

       //头条文章
       $head_arts=Article::getArticlesByAttr('',2,1);

       //get tdk
        $tdk=System::find(1);

      $lists=Article::where('title','like','%'.$request->q.'%')->orWhere('meta_keywords','like','%'.$request->q.'%')->paginate(10);

      //dd($lists);
      return view('home.search',compact('hot_arts','tj_arts','tdk','lists'));
    }
}
