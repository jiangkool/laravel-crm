<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Customer;
use App\Models\Result;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class Follow extends Model
{
    use SoftDeletes;

	protected $dates = ['deleted_at'];


	protected $fillable = [
        'customer_id','result_id','sf_info','next_sf_time','user_id'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
    //搜索随访
    public static function searchFollows($request)
    {
    	$last_sf_time=$request->last_sf_time;
    	$result_id=$request->result_id;
        $sf_num=$request->sf_num;
        $name=$request->name;
        $status=$request->status;
        $sign=$request->sign;


        $sub = DB::table('follows')->select(['*'])->orderBy('id','desc')->limit(1);

    	$data['collection']=DB::table('customers')
    					   ->leftJoin(DB::raw("({$sub->toSql()}) as b"),'customers.id','=','b.customer_id')
    					   ->when($last_sf_time, function ($query) use ($last_sf_time) {
    					   			$dates=explode(' - ',$last_sf_time);
                    				return $query->whereBetween('b.created_at',$dates);
                		   })
                		   ->when($result_id, function ($query) use ($result_id) {

                    				return $query->where('b.result_id',$result_id);
                		   })
                		   ->when($sf_num, function ($query) use ($sf_num) {

                    				return $query->where('customers.sf_num',$sf_num);
                		   })
                		   ->when($name, function ($query) use ($name) {

                    				return $query->where('customers.name','like','%'.$name.'%');
                		   })
                		   ->when($sign, function ($query) use ($sign) {

                                    return $query->whereDate('b.next_sf_time','=',date("Y-m-d"));
                           })
                           ->when($status, function ($query) use ($status){

                                    return $query->whereNotNull('customers.deleted_at');
                           })
                           ->where('customers.status','-1')
                		   ->where('b.user_id',Auth::id())
                		   ->select('b.*','customers.bz_id','customers.name','customers.sex','customers.sf_num') 
                		   ->get();
                       

              
           $data['collection']=$data['collection']->map(function ($items, $key) {        
                        $arr=get_object_vars($items);
                        $arr['result_id'] = Result::where('id',$items->result_id)->first()->result_name;
                        $arr['bz_id'] = Disease::where('id',$items->bz_id)->first()->disease_name;

                        return $arr;
            });

    	if (isset($request->page)&&isset($request->limit)) {

    		$data['rs'] = $data['collection']->forPage($request->page, $request->limit);

    	}

    	return $data;

    }


    /*
    * @ Get all follows by customer_id
    * @ param $customer_id
    * @ return $data collection  
    */
    public static function getFollows($id)
    {
        if (Follow::where('customer_id',$id)->first()) {
              $follows=DB::table('follows')
                ->leftJoin('customers','follows.customer_id','=','customers.id')
                ->where('follows.customer_id',$id)
                ->where('follows.user_id',Auth::id())
                ->select('follows.customer_id','customers.name','follows.created_at','follows.result_id','follows.next_sf_time','customers.bz_id','follows.sf_info')
                ->orderBy('follows.created_at','asc')
                ->get();

                  $data=$follows->map(function ($items, $key) {        
                        $arr=get_object_vars($items);
                        $arr['result_id'] = Result::where('id',$items->result_id)->first()->result_name;
                        $arr['bz_id'] = Disease::where('id',$items->bz_id)->first()->disease_name;

                        return $arr;
            });
        }else{

            $data='';
        }
      

        return $data;
    }

    /*
    * @ Add follows
    * @ param $request
    * @ return json $data   
    * 'customer_id','result_id','sf_info','next_sf_time','user_id'
    */
    public static function addFollow($request)
    {   
        $customer=Customer::where('id',$request->id)->where('user_id',Auth::id())->first(); 
        $order=Order::where('customer_id',$request->id)->where('user_id',Auth::id())->first(); 
        $result=Result::where('id',$request->result_id)->first();  
        $next_sf_time=date('Y-m-d H:i:s',strtotime('+'.$result->result_zq.' day'));
        //dd($order);
        DB::beginTransaction();  

        try {


            if ($request->status==-2) {

                $customer->status!=$request->status && $customer->status=$request->status;

            }else if(isset($request->isyy)){

                $customer->status=$request->isyy;
            }
            $customer->doctor_id=$request->doctor_id;
            $customer->sf_num=$customer->sf_num+1;
            $customer->save();

            if ($request->status!=-2 && $request->isyy==0) {
                $order->doctor_id=$request->doctor_id;
                $order->yydate=$request->yydate;
                $order->ts_require=$request->ts_require;
                $order->save();
            }

            $follow=self::updateOrCreate(['customer_id'=>$request->id,'result_id'=>0],['customer_id'=>$request->id,'result_id'=>$request->result_id,'sf_info'=>$request->sf_info,'user_id'=>Auth::id(),'next_sf_time'=>$next_sf_time]);

            DB::commit();  

            $data['status']='success';
            $data['msg']   ='新增成功!';

        } catch (\Exception $e) {

            DB::rollBack();
            $data=['status'=>'error','msg'=>'新增失败！'];
        }

        return $data;

    }

}
