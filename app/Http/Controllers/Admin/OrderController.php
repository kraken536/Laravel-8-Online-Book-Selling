<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datalist = Order::where('user_id', Auth::id())->get();
        return view('admin.all_orders',['datalist' => $datalist]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order, $id)
    {
        $datalist = Order::find($id);
        $orderlist = OrderProduct::where('order_id', $id)->get();
        return view('admin.order_update',[
            'datalist' => $datalist,
            'orderlist' => $orderlist,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Order $order, $id)
    {
        $datalist = Order::find($id);

        $datalist->status = $request->input('status');         ;    
        $datalist->notes = $request->input('notes');
        $datalist->save();

        return redirect()->back()->with('success','Order Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }

    public function item_update(Request $request, $id){
        $data = OrderProduct::find($id);

        $data->status = $request->input('status');    
        $data->notes = $request->input('notes');

        $data->save();

        return redirect()->back()->with('success','Order Updated Successfully.');
    }

    public function list_new($status){
        $datalist = Order::where('status','New')->get();
        return view('admin.new_orders',['datalist'=> $datalist]);
    }

    public function list_cancelled($status){
        $datalist = Order::where('status','Cancelled')->get();
        return view('admin.cancelled_orders',['datalist'=> $datalist]);
    }

    public function list_shipping($status){
        $datalist = Order::where('status','Shipping')->get();
        return view('admin.shipping_orders',['datalist'=> $datalist]);
    }

    public function list_accepted($status){
        $datalist = Order::where('status','Accepted')->get();
        return view('admin.accepted_orders',['datalist'=> $datalist]);
    }

    public function list_completed($status){
        $datalist = Order::where('status','Completed')->get();
        return view('admin.completed_orders',['datalist'=> $datalist]);
    }
}
