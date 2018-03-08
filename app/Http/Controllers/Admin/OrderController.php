<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;

class OrderController extends Controller
{
    public function __construct()
    {

        $this->middleware(['auth','isAdmin']);

    }

    /**
     * Orders search.
     * 
     * @param  Request $request
     * @return response()->json()
     */
    public function search(Request $request)
    {
        $rs=Order::searchOrders($request);

        $data['code']=0;
        $data['msg'] = '';
        $data['count']=count($rs['collection']);
        $data['data']=isset($rs['rs'])?$rs['rs']:$rs['collection'];

        return response()->json($data);
    }
}
