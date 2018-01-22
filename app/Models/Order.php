<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use App\Models\Disease;
use App\Models\User;
use App\Models\Doctor;

class Order extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
       'customer_id','bz_id','is_tel','is_visit','zhouqi','content','ts_require','doctor_id','yydate','user_id'
    ];

    public function customer()
    {
    	return $this->belongsTo(Customer::class);
    }


    //关联医生
    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    //新增预约
    public static function addOrder($request,$customer_id)
    {	
    	if (empty($request->bz_id)||empty($request->content)) {
    		return false;
    	}

    	if (self::create([
    		'customer_id'=>$customer_id,
    		'bz_id'=>$request->bz_id,
    		'is_tel'=>$request->is_tel,
    		'is_visit'=>$request->is_visit,
    		'zhouqi'=>$request->zhouqi,
    		'content'=>$request->content,
    		'ts_require'=>$request->ts_require,
    		'doctor_id'=>$request->doctor_id,
    		'yydate'=>$request->yydate,
    		'user_id'=>Auth::id()
    		])) {
    		return true;
    	}else{
    		return false;
    	}
    }

    //搜索预约列表
    public static function searchOrders($request)
    {
        $data['collection']=DB::table('orders')
                           ->leftJoin('customers','orders.customer_id','=','customers.id')
                           ->leftJoin('diseases','orders.bz_id','=','diseases.id')
                           ->leftJoin('doctors','orders.doctor_id','=','doctors.id')
                           ->where('customers.status','=',0)
                           ->whereDate('orders.created_at',date("Y-m-d",time()))
                           ->where('orders.user_id','=',Auth::id())
                           ->select('customers.id as id','customers.name','customers.sex','orders.yydate','doctors.doctor_name','diseases.disease_name','customers.phone','orders.ts_require','orders.user_id')
                           ->get();

             $data['collection']=$data['collection']->map(function ($items, $key) {        
                        $arr=get_object_vars($items);
                        $arr['phone']=zAES_decrypt($items->phone);
                        return $arr;
            });

        if (isset($request->page)&&isset($request->limit)) {

            $data['rs'] = $data['collection']->forPage($request->page, $request->limit);

        }

        return $data;

        
    }
}
