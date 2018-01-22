<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Follow;
use App\Models\Result;
use App\Models\Disease;
use App\Models\Customer;
use App\Models\Doctor;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreFollowRequest;

class FollowController extends Controller
{
    private $allresults;
    private $alldiseases;
    private $alldoctors;

    public function __construct()
    {
        $this->middleware(['auth','isAdmin']);
        $this->allresults=Result::where('id','>',0)->get();
        $this->alldiseases=Disease::all();
        $this->alldoctors=Doctor::all();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $results=$this->allresults;
        $diseases=$this->alldiseases;
        return view('crm.sf-list',compact('results','diseases'));
    }

    /**
     * Search a listing of the resource.
     *
     * @return json {code: 0, msg: "", count: 1000, data: [] }
     */

    public function search(Request $request)
    {
        $rs=Follow::searchFollows($request);
        $data['code']=0;
        $data['msg'] = '';
        $data['count']=count($rs['collection']);
        $data['data']=isset($rs['rs'])?$rs['rs']:$rs['collection'];
        return response()->json($data);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFollowRequest $request)
    {
        $data=Follow::addFollow($request);
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $follow=Customer::where('id',$id)->where('user_id',Auth::id())->first();
        if (empty($follow)) {
            abort('404');
        }else{

        $doctors=$this->alldoctors;
        $results=$this->allresults;
        $diseases=$this->alldiseases;
        $follows=Follow::getFollows($id);
        $customer_id=$id;
        //dd($follows);
        return view('crm.sf-detail',compact('results','diseases','doctors','follows','customer_id'));
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
