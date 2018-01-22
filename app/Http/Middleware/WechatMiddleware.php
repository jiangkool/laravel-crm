<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Wechat;

class WechatMiddleware
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
        //判断微信授权
        if (Wechat::isWechat()) {
            
           return $next($request);

        }else{

            return Wechat::goAuthUrl();
        }
        
    }
}
