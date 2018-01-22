<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
class Log extends Model
{
    protected $fillable = [
        'username','action','ip'
    ];

    public static function addlog($username,$action)
    {
    	return self::create(['username'=>$username,'action'=>$action,'ip'=>request()->ip()]);
    }

    public static function getLastLoginTime($username)
    {
    	return self::where('username',$username)->where('action','login')->orderBy('created_at','desc')->first();
    }

}
