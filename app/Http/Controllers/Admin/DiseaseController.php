<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Disease;
use App\Http\Requests\StoreDiseasePost;

class DiseaseController extends Controller
{
    
    public function __construct()
    {
        $this->middleware(['auth','isAdmin']);
        
    }

    /**
     * Display a listing of diseases.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $rs=Disease::orderBy('id','desc')->get();

        $data['code']=0;
        $data['msg'] = '';
        $data['count']=count($rs);
        $data['data']=$rs;

        return response()->json($data);
    }


    /**
     * Store a newly created disease.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDiseasePost $request)
    {
        $data=Disease::addDisease($request);

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
         $result=Disease::find($id);
        if ($result) {
            $result->delete();
            $data=['status'=>'success','msg'=>'删除成功！'];
        }else{
            $data=['status'=>'error','msg'=>'删除失败！'];
        }

        return response()->json($data);
    }

}
