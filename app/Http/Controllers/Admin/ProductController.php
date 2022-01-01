<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\File;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datalist = Product::all();
        //$data = Category::all();
        return view('admin.product', ['datalist'=> $datalist]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datalist = Category::with('children')->get();
        //Category::where('parent_id',0)->get();
        return view('admin.product_add',['datalist'=> $datalist]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Product;

        $data->title = $request->input('title');
        $data->keywords = $request->input('keywords');
        $data->description = $request->input('description');
        $data->category_id = $request->input('parent_id');
        $data->details = $request->input('details');
        $data->price = $request->input('price');
        $data->quantity = $request->input('quantity');
        $data->user_id = Auth::id();
        $data->status = $request->input('status');
        $data->tax = $request->input('tax');
        $data->slug = $request->input('slug');
        if($request->hasFile('image')){
            $data->image = Storage::putFile('images', $request->file('image'));
        }
        $data->save();

        return redirect()->route('admin_product');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        echo "Tous les memes";
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product, $id)
    {
        $data = Product::find($id);
        $datalist = Category::with('children')->get();
        //Category::where('parent_id', 0)->get();
        return view('admin.product_update',['datalist'=>$datalist, 'data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product, $id)
    {
        $data = Product::find($id);

        $data->title = $request->input('title');
        $data->keywords = $request->input('keywords');
        $data->description = $request->input('description');
        $data->category_id = $request->input('parent_id');
        $data->details = $request->input('details');
        $data->price = $request->input('price');
        $data->quantity = $request->input('quantity');
        $data->user_id = Auth::id();
        $data->status = $request->input('status');
        $data->tax = $request->input('tax');
        $data->slug = $request->input('slug');
        if($request->hasFile('image')){
            $data->image = Storage::putFile('images', $request->file('image'));
        }
        
        $data->save();    

        return redirect()->route('admin_product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product, $id)
    {
        $data = Product::find($id);
        $data->delete();

        return redirect()->route('admin_product');
    }
}