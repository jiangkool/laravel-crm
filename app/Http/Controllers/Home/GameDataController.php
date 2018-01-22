<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Gameshlwdata;
use Illuminate\Support\Facades\Session;

class GameDataController extends Controller
{
    public function __construct()
    {
        $this->middleware(['isWechat']);
    }

     public function store(Request $request)
    {
    	if ($request->ajax()) {

    		$openid=Session::get('openid')? Session::get('openid'):'ooXAzwp0SZXmr3d_tgfDmNTp07jg';

 			if (Gameshlwdata::updateOrCreate(['openid'=>$openid],['openid'=>$openid,'username'=>$request->username,'mobile'=>$request->mobile])) {
    			return response()->json(['code'=>'0']);	
    		}
    		
    	}
    	
    }

}
