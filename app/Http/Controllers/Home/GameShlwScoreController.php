<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Gameshlw;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Db;

class GameShlwScoreController extends Controller
{
    public function __construct()
    {
        $this->middleware(['isWechat']);
    }

    public function store(Request $request)
    {
    	if ($request->ajax()) {
    		$openid=Session::get('openid')?Session::get('openid'):'ooXAzwp0SZXmr3d_tgfDmNTp07jg';

 			if ($res=Gameshlw::where('openid',$openid)->first()) {

 				//dd($res->score);
 				if ($res->score < $request->score) {
 					$res->score=$request->score;
 					//dd($res->save());
 					if ($res->save()) {
    					return response()->json(['code'=>'0']);	
    				}

 				}else{

 					return response()->json(['code'=>'0']);	
 				}

 			}elseif (Gameshlw::create(['openid'=>$openid,'score'=>$request->score])) {
    			return response()->json(['code'=>'0']);	
    		}
    		
    	}
    	
    }

    public function show(Request $request)
    {
    	//get model
    	$allres=DB::table('gameshlws')
					->join('wechats', 'gameshlws.openid', '=', 'wechats.openid')
					->select('gameshlws.score', 'wechats.nickname', 'wechats.headimgurl')
					->orderBy('gameshlws.score','desc')
					->get();
		//获取用户排行
		$userfs=Gameshlw::where('openid','ooXAzwp0SZXmr3d_tgfDmNTp07jg')->first();
		$fs=$userfs->score;
		$userbank=Gameshlw::where('score','>=',$fs)->count();

    	$start=$request->page;
    	$size=$request->pageSize;

    	$res=$allres->slice(($start-1)*$size,$size);
        $res=$res->values();//修复json_encode 键值非0开始导致bug
    	$data=$res->all();
        return response()->json(['data'=>$data,'exrta'=>$userbank]);

    }

}
