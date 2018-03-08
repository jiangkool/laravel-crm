<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Result;
use App\Http\Requests\StoreResultPost;

class ResultController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','isAdmin']);
    }

     /**
     * Display a listing of the resource.
     *  
     * @return {code: 0, msg: "", count: 1000, data: [] }
      */
    public function index()
    {
        $rs=Result::where('id','>',0)->orderBy('id','desc')->get();

        $data['code']=0;
        $data['msg'] = '';
        $data['count']=count($rs);
        $data['data']=$rs;
       
        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreResultPost $request)
    {
        $data=Result::addResult($request);

         return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result=Result::find($id);
        if ($result) {
            $result->delete();
            $data=['status'=>'success','msg'=>'删除成功！'];
        }else{
            $data=['status'=>'error','msg'=>'删除失败！'];
        }

        return response()->json($data);
    }


}
