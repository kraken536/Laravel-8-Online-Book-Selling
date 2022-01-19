<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Review;
use App\Models\Product;
use App\Models\OrderProduct;
use App\Models\ShopCart;
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
        return view('home.placeorder');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('home.placeorder',['total'=> $request->input('total')]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //Get Credit card information to check its credentials if everything is ok...
        $data = new Order;

        $data->name = $request->input('name');
        $data->address = $request->input('address');
        $data->email = $request->input('email');
        $data->phone = $request->input('phone');
        $data->total = $request->input('prix');
        $data->user_id = Auth::id();
        $data->IP = $_SERVER['REMOTE_ADDR'];

        $data->save();

        //We will store the bought products in the orderProduct DB
        $datalist = ShopCart::where('user_id',Auth::id())->get();
        foreach($datalist as $rs){
            $data2 = new OrderProduct;
            
            $data2->user_id = Auth::id();
            $data2->product_id = $rs->product_id;
            $data2->order_id = $data->id;
            $data2->price = $rs->product->price;
            $data2->quantity = $rs->quantity;
            $data2->amount = $rs->quantity * $rs->product->price;

            $data2->save();
        }
        //Now we need to empty the shopcart:
        $data3 = ShopCart::where('user_id',Auth::id());
        $data3->delete();

        return redirect()->route('user_order_show')->with('success','Order Sent And Waiting For Validation.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        $datalist = Review::where('user_id',Auth::id())->get();
        $productlist = Product::where('user_id',Auth::id())->get();
        $cartlist = ShopCart::where('user_id', Auth::id())->get();
        $orderlist = Order::where('user_id', Auth::id())->get();
        return view('home.orderlist',[
            'datalist' => $datalist, 
            'productlist' => $productlist,
            'cartlist' => $cartlist,
            'orderlist' => $orderlist
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order, $id)
    {
        $datalist = Review::where('user_id',Auth::id())->get();
        $productlist = Product::where('user_id',Auth::id())->get();
        $cartlist = ShopCart::where('user_id', Auth::id())->get();
        $orderlist = OrderProduct::where('user_id', Auth::id())->where('order_id', $id)->get();
        return view('home.order_report',[
            'datalist' => $datalist, 
            'productlist' => $productlist,
            'cartlist' => $cartlist,
            'orderlist' => $orderlist
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
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
}
