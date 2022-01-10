<?php

namespace App\Http\Controllers;

use App\Models\ShopCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShopCartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $productlist = ShopCart::where('user_id', Auth::id())->get();
        return view('home.shop_cart',['productlist' => $productlist]);
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
    public function store(Request $request, $id)
    {
        
        $data = ShopCart::where('product_id', $id)->where('user_id',Auth::id())->first();
        if($data){
            $data->quantity += $request->input('quantity');
            $data->save();
            return redirect()->route('product_detail',['id'=>$id])->with('success','Product Updated In ShopCart.');
        }else{
            $data = new ShopCart;
            $data->user_id = Auth::id();
            $data->product_id = $id;
            $data->quantity = $request->input('quantity');
            $data->save();
            return redirect()->route('product_detail',['id'=>$id])->with('success','Product Added To ShopCart.');
        }

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ShopCart  $shopCart
     * @return \Illuminate\Http\Response
     */
    public function show(ShopCart $shopCart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ShopCart  $shopCart
     * @return \Illuminate\Http\Response
     */
    public function edit(ShopCart $shopCart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ShopCart  $shopCart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ShopCart $shopCart, $id)
    {
        $data = ShopCart::find($id);
        $data->quantity = $request->input('quantity');
        $data->save();
        return redirect()->back()->with('success', 'Product Updated To ShopCart.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ShopCart  $shopCart
     * @return \Illuminate\Http\Response
     */
    public function destroy(ShopCart $shopCart, $id)
    {
        $data = ShopCart::find($id);
        $data->delete();
        return redirect()->route('user_shopcart')->with('success','Product Removed From ShopCart.');
    }
}
