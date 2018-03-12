<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Artisan;
use App\Models\User;
use App\Models\System;

class SystemController extends Controller
{
    
    public function __construct()
    {
    	$this->middleware(['auth','isAdmin']);
    }


    /**
     * Show systems.
     * 
     * @return view
     */
    public function index()
    {
    	//get system
    	$systems=System::find(1);

    	return view('admin.system',compact('systems'));
    }


    /**
     * Update system setting.
     * 
     * @param  Request $request
     * @return Redirect
     */
    public function update(Request $request)
    {
    	if(System::updateOrCreate(['id'=>1],request()->all())){
    		return Redirect::route('system')->with('message','系统设置已更新！');
    	}
    }


    /*
    * Clear cache.
    *
    */
    public function clearCache()
    {
         Artisan::call('config:clear');
         Artisan::call('route:clear');
         Artisan::call('view:clear');
         return view('admin.clear_cache');
    }


}
