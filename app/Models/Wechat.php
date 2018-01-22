<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;

class Wechat extends Model
{
	
     protected $fillable = [
        'openid','nickname','sex','headimgurl','unionid','access_token', 'expires_in', 'refresh_token',
    ];

    //判断微信授权
    public static function isWechat()
    {

       	if (Session::has('access_token') && Session::has('openid')) {

       		$access_token=Session::get('access_token');
       		$openid=Session::get('openid');

       		return self::checkAccessToken($access_token,$openid);

       	}else{

       		return false;
       	}
		
    }

    protected static function checkAccessToken($access_token,$openid)
    {
    	$url='https://api.weixin.qq.com/sns/auth?access_token='.$access_token.'&openid='.$openid;

    	$result=self::doCurl($url);
		  $result_arr=json_decode($result,true);
    	if ($result_arr['errcode']===0) {
    		return true;
    	}else{
    		return false;
    	}

    }

    protected static function doCurl($url)
    {
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($ch, CURLOPT_HEADER, false);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_REFERER, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		$result = curl_exec($ch);
		curl_close($ch);
		return $result;
    }

    public static function goAuthUrl()
    {
    	return redirect()->to('https://open.weixin.qq.com/connect/oauth2/authorize?appid='.Config::get('app.appid').'&redirect_uri=http%3A%2F%2Fapp.027baijia.com%2Fget_code&response_type=code&scope=snsapi_userinfo&state='.time().'#wechat_redirect');
    }

}
