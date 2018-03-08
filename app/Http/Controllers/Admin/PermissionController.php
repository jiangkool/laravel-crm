<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Permission;

class PermissionController extends Controller
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
       $permissions=Permission::orderBy('id','desc')->paginate('15'); 
       return view('admin.permissions',compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create_permission');
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
                'name'=>'required|unique:permissions',
                'slug'=>'required|unique:permissions'
            ]);
        if (Permission::create(request(['name','slug']))) {
            return redirect()->back()->with('message','新增权限成功！');
        }else{
            return redirect()->back()->withErrors('添加失败！')->withInput();
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
        $permission=Permission::find($id);
        return view('admin.permission_edit',compact('permission'));
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
        $permission=Permission::find($id);
        if ($permission->name!=$request->name) {
            $permission->name=$request->name;
        }

        if ($permission->slug!=$request->slug) {
            $permission->slug=$request->slug;
        }
        if($permission->save()){
            return redirect()->back()->with('message','保存成功！');
        }else{
            return redirect()->back()->withErrors($permission);
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
        if(Permission::destroy($id)){
            return redirect()->back()->with('message','删除成功！');
        }else{
            return redirect()->back()->withErrors('删除失败！');
        }
    }
}
