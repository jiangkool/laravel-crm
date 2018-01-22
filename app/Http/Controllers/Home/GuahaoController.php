<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Url;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use App\Models\Guahao;

class GuahaoController extends Controller
{
    public function show()
    {
    	if (Session::has('url')) {
    		$url=Session::get('url');
    	}else{
    		$url=URL::previous() ? URL::previous():'未知';
    		Session::put('url',$url);
    	}
    	return view('home.guahao',compact('url'));

    }

    public function store(Request $request)
    {
    	$this->validate($request,[
    			'name'=>'required|min:2',
    			'phone'=>'required|numeric',
    			'desc'=>'required'

    		]);	
    	
    	if (Guahao::create(['name'=>$request->name,'phone'=>$request->phone,'desc'=>$request->desc,'from_url'=>$request->from,'status'=>'-1'])) {
    		return redirect()->back()->with('message','提交成功！');
    	}else{
    		return redirect()->back()->with('message','提交失败！');
    	}

    }

}
