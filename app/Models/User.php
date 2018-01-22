<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Role;
use App\Models\Role_users;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use Notifiable;

    protected $canBeRated = true;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','active'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token'
    ];

    /*
    * role linked with user model
    */
    public function role()
    {
        return $this->belongsToMany(Role::class,'role_users')->withTimestamps();
    }

    public static function getAll()
    {
        return self::where('id','>',1)->where('active',1)->get();
    }

    public static function getAllUsers($request)
    {
        $data['collection']=self::where('id','>',1)->where('active',1)->orderBy('id','desc')->get();

        $data['collection']=$data['collection']->map(function ($items, $key) {        
                        $arr=get_object_vars($items);
                        $arr['id']=$items->id;
                        $arr['name']=$items->name;
                        $rs=Role_users::where('user_id',$items->id)->first();
                        $rs2=Role::where('id',$rs->role_id)->first();
                        $arr['role'] = $rs2->name;

                        return $arr;
            });

        if (isset($request->page)&&isset($request->limit)) {

            $data['rs'] = $data['collection']->forPage($request->page, $request->limit); 

        }

        return $data;

    }

    //修复软删除bug 
    public static function delUsers($id)
    {
        if ($id==1) {
            return false;
            }else{
            $user=self::find($id);
            if ($user) {
                $user->active=-1;
                $user->save();
                
                return true;
            }else{
                return false;
            }
        }
    }

    //数据交接
    public static function dataCopy($request)
    {
        $user=self::where('name',$request->username)->first();
        $olduser=self::where('id',$request->ysuserid)->first();
        if ($user && $olduser) {
            
            DB::beginTransaction(); 
            try {

                DB::table('customers')
                ->where('user_id', $request->ysuserid)
                ->update(['user_id' => $user->id]);

                DB::table('follows')
                ->where('user_id', $request->ysuserid)
                ->update(['user_id' => $user->id]);

                DB::table('orders')
                ->where('user_id', $request->ysuserid)
                ->update(['user_id' => $user->id]);

                $olduser->active=-1;
                $olduser->save();
         
            $data['status']='success';
            $data['msg'] = '转移成功！';

            } catch (\Exception $e) {

                $data['status']='error';
                $data['msg'] = '转移失败！'.$e;
            }

        }else{
            $data['status']='error';
                $data['msg'] = '转移失败！';
        }

        return $data;
    }

}
