<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreCustomerPost;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Follow;
use App\Models\Order;
use App\Models\Disease;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    private $allusers;
    private $alldoctors;
    private $alldiseases;

    public function __construct()
    {
        $this->middleware(['auth','isAdmin']);
        $this->allusers=User::getAll();
        $this->alldoctors=Doctor::all();
        $this->alldiseases=Disease::all();
    }
    /**
     * Display a listing of the resource.
     *  
     * @return {code: 0, msg: "", count: 1000, data: [] }
      */
    public function lists(Request $request)
    {   
        $rs=Customer::getCustomers($request);
        $data['code']=0;
        $data['msg'] = '';
        $data['count']=count($rs['collection']);
        $data['data']=isset($rs['rs'])? $rs['rs']:$rs['collection'];
        //dd(response()->json($data));
        return response()->json($data);
    }
    /**
     * Display a listing of the resource.
     *  
     * @return {code: 0, msg: "", count: 1000, data: [] }
      */
    public function search(Request $request)
    {   
        $rs=Customer::searchCustomers($request);
        $data['code']=0;
        $data['msg'] = '';
        $data['count']=count($rs['collection']);
        $data['data']=isset($rs['rs'])? $rs['rs']:$rs['collection'];

        return response()->json($data);
    }

    public function index()
    {   
        $users=$this->allusers;
        return view('crm.br-list',compact('users'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $doctors=$this->alldoctors;

        $diseases=$this->alldiseases;
        $users=$this->allusers;

        return view('crm.br-add',compact('doctors','diseases','users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCustomerPost $request)
    {

        $data=Customer::addCustomer($request);

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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer=Customer::find($id);
        if (!$customer) {
            abort('404');
        }elseif ($customer->user_id!==Auth::user()->name) {
            abort('403');
        }
        $doctors=$this->alldoctors;
        $diseases=$this->alldiseases;
        $users=$this->allusers;

        return view('crm.br-edit',compact('doctors','diseases','customer','users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCustomerPost $request, $id)
    {
       $data=Customer::putCustomer($request,$id);
       return response()->json($data);

    }

    public function dianzhen(Request $request)
    {
       $data=Customer::dianzhen($request);
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
        $data=Customer::delCustomer($id);

        return response()->json($data);
    }



    public function dzlist()
    {
        $doctors=$this->alldoctors;
        $diseases=$this->alldiseases;
        $users=$this->allusers;

        return view('crm.daozhen-gl',compact('doctors','diseases','users'));
    }
}
