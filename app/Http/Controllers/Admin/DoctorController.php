<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Http\Requests\StoreDoctorPost;

class DoctorController extends Controller
{

    public function __construct()
    {

        $this->middleware(['auth','isAdmin']);

    }

    /**
     * Display a listing of the doctors.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rs=Doctor::orderBy('id','desc')->get();

        $data['code']=0;
        $data['msg'] = '';
        $data['count']=count($rs);
        $data['data']=$rs;

        return response()->json($data);
    }

    /**
     * Store a newly created doctor in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDoctorPost $request)
    {
        $data=Doctor::addDoctor($request);

         return response()->json($data);
    }

    /**
     * Remove a doctor.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result=Doctor::find($id);
        if ($result) {
            $result->delete();
            $data=['status'=>'success','msg'=>'删除成功！'];
        }else{
            $data=['status'=>'error','msg'=>'删除失败！'];
        }

        return response()->json($data);
    }

}
