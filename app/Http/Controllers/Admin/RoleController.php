<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class RoleController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth','isAdmin']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles=Role::orderBy('created_at','desc')->simplePaginate('10');
        return view('admin.roles',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('admin.create_roles');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|unique:roles'
            ]);

        if(!Role::create(['name'=>$request->name,'slug'=>$request->name])){
            return Redirect::back()->withErrors('提交角色失败！');
        }else{
            return Redirect::back()->with('message','保存成功！');
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role=Role::find($id);
        $permissions=Permission::all();
        $perms=explode(',',$role->permissions);
        return view('admin.role_edit',compact('role','permissions','perms'));
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
        $role=Role::find($id);
        if ($role->name!=$request->name) {
            $role->name=$request->name;
        }
        if (!empty($request->permissions)) {
            $pers=implode(',',$request->permissions);
            $roleArr=array_flip(array_unique(explode(',',$pers)));
            //Session::flush('admin_permissions',$roleArr);
             if ($role->permissions!=$pers) {
            $role->permissions=$pers;
        }
            
        }
        
        if($role->save()){
            return redirect()->back()->with('message','保存成功！');
        }else{
            return redirect()->back()->withErrors($role);
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
        if($id==1){
             return redirect()->back()->withErrors('该角色【禁止删除】！');
        }
         if(Role::destroy($id)){
            return redirect()->back()->with('message','删除成功！');
        }else{
            return redirect()->back()->withErrors('删除失败！');
        }
    }
    
}
