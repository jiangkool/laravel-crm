<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Role;
use App\Models\Log;
use App\Models\Customer;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth','isAdmin'])->except(['show']);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //users list view
        $users=User::simplePaginate(10);

        return view('admin.users',compact('users'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $perms=Role::all();

        //show create user view
        return view('admin.create_user',compact('perms'));

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator=$this->validate($request,[
            'name'=>'required|unique:users|min:2',
            'email'=>'required|email|unique:users',
            'password'=>'required|Confirmed'
            ]);
   
        if($user = User::create(['name'=>$request->name,'email'=>$request->email,'password'=>bcrypt($request->password),'active'=>1,'roles' => $request->roles])){

            //add to belongToMany table
            if (isset($request->roles)) {
                $user->role()->attach($request->roles);
            }

            return Redirect::route('users.create')->with('message','新增用户成功！')->withInput();
        }else{
            return Redirect::route('users.create')->withErrors($validator);
        }
    }


    /**
     * add a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request)
    {
        if (User::where('name',$request->name)->first()) {

            $data['status']='error';$data['msg']='添加失败！用户名称已存在！';
        }else{

        $validator=$this->validate($request,[
            'name'=>'required|unique:users|min:2',
            'roles'=>'required',
            'password'=>'required'
            ]);
            

         if($user = User::create(['name'=>$request->name,'email'=>$request->email,'password'=>bcrypt($request->password),'active'=>1,'roles' => $request->roles])){

            //add to belongToMany table
            if (isset($request->roles)) {
                $user->role()->attach($request->roles);
            }

           $data['status']='success';$data['msg']='添加成功！';
         }else{
            $data['status']='error';$data['msg']='添加失败！';
            }
        }

        return response()->json($data);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $user=User::find($id);
        $perms=Role::all();
        $roles=$user->role()->get()->pluck('pivot')->pluck('role_id')->toArray();
      // dd($roles);
        return view('admin.user_edit',compact('user','perms','roles'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user=User::find($id);
        if (!empty($request->password)) {
                $this->validate($request,['password'=>'Confirmed']);
               $user->password=bcrypt($request->password);
        }
        if ($user->name!==$request->name) {
                 $this->validate($request,['name'=>'unique:users']);
                 $user->name=$request->name;
        }
        
        if ($user->email!==$request->email) {
                 $this->validate($request,['email'=>'email|unique:users']);
                 $user->email=$request->email;
        }
         $user->role()->detach();
         $user->role()->attach($request->roles);
         $user->save();
         return Redirect::back()->with('message','管理员修改成功！');
    
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function active(Request $request,$id)
    {
        $user=User::find($id);

        if ($request->active==-1 && $user->id==1) {
            return Redirect::back()->withErrors('此帐号无法被禁用！');
        }

        if($request->active==-1 && $user->active==-1){
            return Redirect::back()->withErrors('此会员已禁用！');

        }elseif($request->active!=$user->active){

            $user->active=$request->active;

            if($user->save()){
                return Redirect::back()->with('message','状态更新成功！');
            }else{
                return Redirect::back()->withErrors('状态更新失败！');
            }
        }
    
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        if ($id==1) {
            return Redirect::back()->withErrors('此管理员无法删除！');
            }else{
            $user=User::find($id);
            
            //删除所有身份
            $user->role()->detach();
            //销毁
            User::destroy($id);
            return Redirect::back()->with('message','删除成功！');
            }
        
    }


    /**
     * System logs.
     * 
     * @return \Illuminate\Http\Response
     */
    public function log()
    {

        $logs=Log::orderBy('created_at','desc')->paginate(10);
        
        return view('admin.logs',compact('logs'));
    }


    /**
     * System logs clear.
     * 
     * @return \Illuminate\Http\Response
     */
    public function logdel()
    {
        if (DB::table('logs')->delete()) {
            
            return Redirect::back()->with('message','删除成功！');
        }
        
    }
    
    /**
     * Display users use json.
     *  
     * @return {code: 0, msg: "", count: 1000, data: [] }
     */
    public function lists(Request $request)
    {
        $rs=User::getAllUsers($request);

        $data['code']=0;
        $data['msg'] = '';
        $data['count']=count($rs['collection']);
        $data['data']=isset($rs['rs'])? $rs['rs']:$rs['collection'];

        return response()->json($data);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {   
        $data=[];
        if ($id==1) {
           $data['status']='error';$data['msg']='该用户无法删除！';
            
            }else{

            $user=User::find($id);
            
            //查询是否有下属客户
            $customers=Customer::where('user_id',$id)->get();

            if ($customers->count()>0) {

                $data['status']='hasCustomers';$data['msg']='该用户有下属客户，无法删除！';
                $data['uid']=$id;

            }else{

              //删除所有身份
              $user->role()->detach();

              //销毁
              User::delUsers($id);

             $data['status']='success';$data['msg']='删除成功！';

             }
            }
        return response()->json($data);
    }


    /**
    * 会员之间数据交接转移.
    * 
    * @param int $ysuserid
    * @param str $username
    * @return json $data
    */
    public function dataCopy(Request $request)
    {
        $data=User::dataCopy($request);

        return response()->json($data);
    }
    

}
