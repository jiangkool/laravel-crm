<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Models\Disease;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Follow;
use App\Models\Order;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Customer extends Model
{
	use SoftDeletes;

	protected $dates = ['deleted_at'];

   protected $fillable = [
        'name','age','sex','first_zx_time','doctor_id','sf_num','bz_id','phone','is_married','zhiye','address','zixunren','hz_guanxi','beizhu','user_id','status'
    ];

    //关联预约
    public function order()
    {
    	return $this->hasOne(Order::class);
    }

    //关联随访
    public function follows()
    {
    	return $this->hasMany(Follow::class);
    }


 		
    public function getSexAttribute($value)
    {
        return $value==1?'男':'女';
    }

    public function setSexAttribute($value)
    {
        $this->attributes['sex']=($value=='男'? 1:0);
    }

	public function getUserIdAttribute($value)
    {
        return User::where('id',$value)->first()->name;
    }

    public function setUserIdAttribute($value)
    {   
        if (!empty($value)) {
             $this->attributes['user_id']=is_numeric($value)? $value:User::where('name',$value)->first()->id;
        }else{
            $this->attributes['user_id']=$value;
        }
       
    }

    public function getDoctorIdAttribute($value)
    {
        if (!empty($value)) {
            return Doctor::where('id',$value)->first()->doctor_name;
        }else{
            return $value;
        }
        
    }

    public function setDoctorIdAttribute($value)
    {
        if (!empty($value)) {
            $this->attributes['doctor_id']=is_numeric($value)? $value:Doctor::where('doctor_name',$value)->first()->id;
        }else{
            $this->attributes['doctor_id']=$value;
        }
        
    }

    public function getBzIdAttribute($value)
    {
        return Disease::where('id',$value)->first()->disease_name;
    }

 	public function setBzIdAttribute($value)
    {

        $this->attributes['bz_id']=is_numeric($value)? $value:Disease::where('disease_name',$value)->first()->id;
    }

    public function getPhoneAttribute($value)
    {
        return zAES_decrypt($value);
    }


    public function getStatusAttribute($value)
    {
        switch ($value) {
        	case '1':return '已到诊';break;
        	case '0':return '已预约';break;
        	case '-1':return '随访中';break;
        	case '-2':return '黑名单';break;
        }

    }

	public function setStatusAttribute($value)
    {
    	if (!is_numeric($value)) {
    		switch ($value) {
        	case '已到诊':$this->attributes['status']=1;break;
        	case '已预约':$this->attributes['status']=0;break;
        	case '随访中':$this->attributes['status']=-1;break;
        	case '黑名单':$this->attributes['status']=-2;break;
            }
    	}else {
    		$this->attributes['status']=$value;
    	}
        

    }
   //添加customer
    public static function addCustomer($request)
    {
    	 $data=[]; 
       
       if(self::where('phone',zAES_encrypt($request->phone))->first()){

    		$data=['status'=>'error','msg'=>'客户已存在！请勿重复添加！'];

    	}else if($request->status==-1 && empty($request->next_sf_time)){

            $data=['status'=>'error','msg'=>'请填写下次回访时间！'];

        }else{

        DB::beginTransaction(); 

        try{  

        	$customer=self::Create([
	    		'name'=>$request->name,
	    		'age'=>$request->age,
	    		'sex'=>$request->sex,
	    		'doctor_id'=>$request->doctor_id,
	    		'bz_id'=>$request->bz_id,
	    		'phone'=>zAES_encrypt($request->phone),
	    		'is_married'=>$request->is_married,
	    		'zhiye'=>$request->zhiye,
	    		'address'=>$request->address,
	    		'zixunren'=>$request->zixunren,
	    		'hz_guanxi'=>$request->hz_guanxi,
	    		'beizhu'=>$request->beizhu,
	    		'first_zx_time'=>$request->first_zx_time,
	    		'user_id'=>Auth::id(),
	    		'status'=>$request->status
    		]);

        	Order::addOrder($request,$customer->id);

            if ($request->status==-1) {

                $follow=Follow::create([
                    'customer_id'=>$customer->id,
                    'result_id'=>0,
                    'sf_info'=>'暂无',
                    'user_id'=>Auth::id(),
                    'next_sf_time'=>$request->next_sf_time
                    ]);
            }

            DB::commit();  

            $data['status']='success';
        	$data['msg']   ='新增成功!';


   		}catch (\Exception $e) { 

            DB::rollBack();  
            $data=['status'=>'error','msg'=>'新增失败！初诊信息不全！'.$e];
    	}  

        }
    	return $data;

    }

    //获取所属会员客户列表
    public static function getCustomers($request)
    {
        
    	$data['collection']=self::where('user_id',Auth::id())->orderBy('id','desc')->get();

    	if (isset($request->page) && isset($request->limit)) {

            $data['rs'] = $data['collection']->forPage($request->page, $request->limit);

        }

        return $data;
    }

    //获取搜索列表
    public static function searchCustomers($request)
    {
    	$customer=self::query();

    	isset($request->name) && $customer->where('name','like','%'.$request->name.'%');
    		
		isset($request->sex) && $customer->where('sex',$request->sex);

    	isset($request->phone) && $customer->where('phone',zAES_encrypt($request->phone));

    	isset($request->user_id) && $customer->where('user_id',$request->user_id);

    	isset($request->status) && $customer->where('status',$request->status);

    	isset($request->doctor_id) && $customer->where('doctor_id',$request->doctor_id);

    	isset($request->bz_id) && $customer->where('bz_id',$request->bz_id);


    	if (isset($request->first_zx_time)) {
    		$dates=explode(' - ',$request->first_zx_time);
    		$customer->whereBetween('first_zx_time',$dates);
    	}

    	/*if (isset($request->last_sf_time)) {
    		$dates=explode(' - ',$request->last_sf_time);
    		$customer->whereBetween('first_zx_time',$dates);
    	}*/

    	$data['collection']=$customer->orderBy('id','desc')->get();

    	if (isset($request->page)&&isset($request->limit)) {

    		$data['rs'] = $data['collection']->forPage($request->page, $request->limit);

    	}

    	return $data;

    	
    }


    //删除客户
    public static function delCustomer($id)
    {
    	$data=[];
        $customer=self::find($id);

        if (empty($customer)) {
            $data['status']='error';
            $data['msg'] = '删除失败！';
        }elseif(Auth::user()->name!==$customer->user_id){  //修改器导致问题 暂用
            $data['status']='error';
            $data['msg'] = '无权删除！';
        }else{
            DB::beginTransaction(); 
            try {
                 $customer->delete();
                 if ($order=order::where('customer_id',$id)->first()) {
                     $order->delete();
                 }
            
            $follows=Follow::where('customer_id',$id)->delete();
         
            $data['status']='success';
            $data['msg'] = '删除成功！';

            } catch (\Exception $e) {

                $data['status']='error';
                $data['msg'] = '删除失败！';
            }
           
        }
        return $data;
    }

    //提交修改客户信息
    public static function putCustomer($request,$id)
    {
    	$data=[];
        $customer=self::findOrFail($id);
        $customer->user_id!==Auth::user()->name && abort('403');
        $order = Order::where('customer_id',$id)->first();
        if ($request->status=='已预约' && !isset($request->yydate)) {
            $data['status']='error';
            $data['msg']   ='请填写预约时间！';
        }else {

            if($request->phone!=$customer->phone && self::where('phone',zAES_encrypt($request->phone))->first()){
    			$data['status']='error';
            	$data['msg']   ='修改失败,该手机号已存在！';

    		}else{
                
	    		$request->phone!=$customer->phone && $customer->phone=zAES_encrypt($request->phone);
	    		$request->first_zx_time!=$customer->first_zx_time && $customer->first_zx_time=$request->first_zx_time;
	            $request->name!=$customer->name && $customer->name=$request->name;
	            $request->age!=$customer->age && $customer->age=$request->age;
	            $request->sex!=$customer->sex && $customer->sex=$request->sex;
	            $request->is_married!=$customer->is_married && $customer->is_married=$request->is_married;
	            $request->zhiye!=$customer->zhiye && $customer->zhiye=$request->zhiye;
	            $request->address!=$customer->address && $customer->address=$request->address;
	            $request->zixunren!=$customer->zixunren && $customer->zixunren=$request->zixunren;
	            $request->hz_guanxi!=$customer->hz_guanxi && $customer->hz_guanxi=$request->hz_guanxi;
	            $request->status!=$customer->status && $customer->status=$request->status;
	            


	            $request->bz_id!=$order->bz_id && $order->bz_id=$request->bz_id;
	            $request->is_tel!=$order->is_tel && $order->is_tel=$request->is_tel;
	            $request->is_visit!=$order->is_visit && $order->is_visit=$request->is_visit;
	            $request->zhouqi!=$order->zhouqi && $order->zhouqi=$request->zhouqi;
	            $request->content!=$order->content && $order->content=$request->content;
	            $request->ts_require!=$order->ts_require && $order->ts_require=$request->ts_require;
	            $request->doctor_id!=$order->doctor_id && $order->doctor_id=$request->doctor_id ;
	            $request->yydate!=$order->yydate && $order->yydate=$request->yydate;

	            DB::beginTransaction(); 

	            try{  

	            	$order->save();
	            	if(!empty($request->doctor_id)){ 
                        $customer->doctor_id=$order->doctor->doctor_name;
                    }else{
                        $customer->doctor_id=null;
                    }
	                $customer->save();
	                DB::commit();  
	                $data['status']='success';
	            	$data['msg']   ='修改成功';

           		}catch (\Exception $e) { 

	                DB::rollBack();  
	                $data['status']='error';
	            	$data['msg']   ='修改失败'; 
            	}  

    	}

        }

        return $data;
    }


    //点诊
    public static function dianzhen($request)
    {
        $customer=Customer::findOrFail($request->id);

        if ($customer->user_id==Auth::user()->name || Auth::user()->id==1 ) {
            $customer->status=1;
            $customer->save();
            $data['status']='success';
            $data['msg']   ='点诊成功';
        }else{

            $data['status']='error';
            $data['msg']   ='点诊失败'; 
        }

        return $data;

    }


}
