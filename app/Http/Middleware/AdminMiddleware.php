<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use App\Models\Permission;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {   
        //Auth middleware
        if (Auth::check()) {
            
            if (Session::has('admin_permissions')) {
            
            //get route name
            @$routeName=$request->route()->getName();
            //dd();
            if(!$routeName){
                return $next($request);
            }else{
                if (array_key_exists($routeName,Session::get('admin_permissions'))) {

                    $username=Auth::user()->name;
                    $permission=Permission::where('slug',$routeName)->first();

                    return $next($request);
                }else{
                   abort(403, '无权限访问！');
                }
            }
        }else{
            return redirect()->route('login')->withErrors('会话已过期！请重新登录！');
        }
            
    }

        return $next($request);
        }
}
