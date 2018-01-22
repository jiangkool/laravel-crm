<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Germey\Geetest\GeetestCaptcha;
use Illuminate\Notifications\Notifiable;
use App\Models\Log;
use App\Models\Role;


class HomeController extends Controller
{
	use GeetestCaptcha;
	//__construct
	public function __construct()
	{
		$this->middleware('auth')->except(['index','login','getGeetest']);
	}

    //display login form
	public function index()
	{
		if (Auth::check()) {

			//获取通知消息
			$user=Auth::user();
			$notifications = $user->notifications()->get()->take(3)->toArray();

			//获取上次登录时间
            $rs=Log::getLastLoginTime($user->name);
           
			return view('crm.main',compact('rs'));
		}else{
		    return view('admin.login');
		}
	}

	//validator login if error return 
	public function login(Request $request)
	{

		//validator login form
		$validation=$this->validate($request,[
				'name'=>'required|min:5',
				'password'=>'required',
			]);

		// validator success then attempt
		if (Auth::attempt(['name'=>$request->name,'password'=>$request->password,'active'=>1])) {
			
			//get user model
            $user=User::findOrFail(Auth::user()->id);
            $roles=$user->role()->get()->pluck('permissions')->toArray();

            //array to string
            $rolestr=implode(',',$roles);
            //explode to arr
            $roleArr=array_flip(array_unique(explode(',',$rolestr)));
            Session::put('admin_permissions',$roleArr);
           if (session('is_loged')!==1) {
            	
            	//记录本次登录
            	Log::addlog($user->name,'login');
           		session(['is_loged'=>1]);

            }
            
			return Redirect::route('login');
		}else{
			return Redirect::route('login')->withErrors('用户名 或者 密码错误 或者 帐号被禁用!');
		}

	}

	//login out

	public function loginOut()
	{
		Auth::logout();
		Session::flush();
		return Redirect::route('login')->withErrors('您已经退出登录!');
	}

	//show admin config
	public function config()
	{
		$roles=Role::getAllRoles();
		return view('crm.admin-config',compact('roles'));
	}


}
