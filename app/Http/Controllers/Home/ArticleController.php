<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\System;
use App\Models\Category;
use App\Http\Controllers\Controller;
use DB;
use App\Events\BlogView;

class ArticleController extends Controller
{
    public function show($id)
    {
    	// find or fail with id
    	$article=Article::where('status',1)->findOrfail($id);

        event(new BlogView($article));

    	//get next & prev article
    	$nextArt=Article::where('id','>',$id)->where('status',1)->first();
    	$prevArt=Article::where('id','<',$id)->where('status',1)->orderBy('id','desc')->first();

        //get tdk
        $tdk=System::find(1);
        //update click
        //$article->click=$article->click+1;
        //$article->save();

        //获取相关文档
        $keywords=explode(',',$article->meta_keywords);
        $results = DB::table('articles')
                        ->where('status',1)
                        ->where('title','like','%'.$keywords['0'].'%')
                        ->where('id','!=',$article->id)
                        ->get();

        $likearts=$results->take(8);

        //如果没数据 则获取当前栏目文档
        if ($likearts->count()==0) {
            $likearts=Article::where('status',1)->where('id','!=',$article->id)->where('category_id',$article->category_id)->get()->take(8);
        }
        
        //获取栏目信息
        $category=Category::get_position_links($article->category_id);

        //热门文章top5
       $hot_arts=Article::getHotArticles($article->category_id);

       //推荐文章top5
       $tj_arts=Article::getArticlesByAttr($article->category_id,1,5);

       //获取文章评论
       //$comments=$article->comment();
       //dd($comments);
    	//show in blade
    	return view('home.article',compact(['article','nextArt','prevArt','tdk','likearts','category','hot_arts','tj_arts']));
    }

    //获取栏目列表信息
    public function categoryShow($id)
    {
        $cate=Category::find($id);

        if ($cate->count()==0) {

            abort(404);

        }elseif($cate->parent_id==0){

            $cates=Category::where('parent_id',$id)->get()->pluck('id')->toArray();
            array_push($cates,$id);
            $lists=Article::whereIn('category_id',$cates)->paginate(10);

        }else{

            $lists=Article::where('category_id',$id)->paginate(10);
        }

        //get tdk
        $tdk=System::find(1);

         //获取栏目信息
        $category=Category::get_position_links($id);

        //热门文章top5
       $hot_arts=Article::getHotArticles($id);

       //推荐文章top5
       $tj_arts=Article::getArticlesByAttr($id,1,5);

        return view('home.category',compact('cate','category','lists','tdk','hot_arts','tj_arts'));
    }

    //add comments comment($commentable, $commentText = '', $rate = 0)
    public function addComment(Request $request,$id)
    {   
        $user=\Auth::user();
        $article=Article::find($id);
        $comment=$user->comment($article, $commentText = $request->comment, 0);
        if ($comment) {
            return redirect()->back()->with('message','提交成功！');
        }
    }

}
