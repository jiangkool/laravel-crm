<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Models\Wechat;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cookie;

class GameController extends Controller
{
	public function __construct()
    {
       $this->middleware(['isWechat'])->except('getCode');
        $this->appid=Config::get('app.appid'); 
       	$this->appsecret=Config::get('app.appsecret'); 
    }

    public function home()
    {
  
    	return view('shlw.index');
    }

    public function main()
    {
    	return view('shlw.main');
    }

    public function bottom()
    {
    	return view('shlw.load-bottom');
    }

    public function biaodan()
    {
    	return view('shlw.biaodan');
    }

    //获取授权码code
    public function getCode(Request $request)
    {
    	$access_url='https://api.weixin.qq.com/sns/oauth2/access_token?appid='.$this->appid.'&secret='.$this->appsecret.'&code='.$request->code.'&grant_type=authorization_code';
    	$result=doCurl($access_url);
    	$result_arr=json_decode($result,true);

		if (!isset($result_arr['errcode'])) {

		//缓存access_token openid
    	Session::put('access_token', $result_arr['access_token']);
    	Session::put('openid', $result_arr['openid']);


    	//拉取用户信息
    	$userinfo=getUserInfo($result_arr['access_token'],$result_arr['openid']);

    	$unionid=isset($userinfo['unionid'])?$userinfo['unionid']:'0';

    	//新增或更新会员信息
    	if(Wechat::updateOrCreate(['openid' => $result_arr['openid']],['openid'=>$result_arr['openid'],'access_token'=>$result_arr['access_token'],'sex'=>$userinfo['sex'],'headimgurl'=>$userinfo['headimgurl'],'unionid'=>$unionid,'expires_in'=>$result_arr['expires_in'],'refresh_token'=>$result_arr['refresh_token'],'nickname'=>$userinfo['nickname']])){

    		return redirect()->route('show_game_swlw');

    	}else{

    		return false;
    	}

    	}else{

    		return false;
    	}
    	
    }



    //获取jssdk相关数据
    public function getJssdk(Request $request)
    {
        $signPackage = $this->getSignPackage($request->shareurl);

        return  response()->json(['data'=>$signPackage]);
    }


    public function getSignPackage($url) {

    if(Cookie::get('accessToken') && Cookie::get('jsapiTicket')){
        
         $jsapiTicket = Cookie::get('jsapiTicket');

    }else{

    //获取基础access_token
    $url2 = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=$this->appid&secret=$this->appsecret";
    $res2 = json_decode(doCurl($url2));
    $accessToken = $res2->access_token;
    //save accessToken
    Cookie::queue('accessToken', $accessToken, 7000);

    //获取ticket
    $ticket_url = "https://api.weixin.qq.com/cgi-bin/ticket/getticket?type=jsapi&access_token=$accessToken";
    $res = json_decode(doCurl($ticket_url));
    $jsapiTicket = $res->ticket;
     //save ticket
    Cookie::queue('jsapiTicket', $jsapiTicket, 7000);
    }

    $timestamp = time();
    $nonceStr = createNonceStr();

    // 这里参数的顺序要按照 key 值 ASCII 码升序排序
    $string = "jsapi_ticket=$jsapiTicket&noncestr=$nonceStr&timestamp=$timestamp&url=$url";

    $signature = sha1($string);

    $signPackage = array(
      "appId"     => $this->appid,
      "nonceStr"  => $nonceStr,
      "timestamp" => $timestamp,
      "url"       => $url,
      "signature" => $signature,
      "rawString" => $string
    );
    return $signPackage; 
  }




}
