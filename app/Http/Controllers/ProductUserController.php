<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        
        $datalist = Review::where('user_id',Auth::user()->id)->get();
        $productlist = Product::where('user_id',Auth::user()->id)->get();
        return redirect()->route('profile',['datalist' => $datalist, 'productlist' => $productlist])->with('success', 'Product Added successfully.');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $datalist = Review::where('user_id',Auth::user()->id)->get();
        $productlist = Category::with('children')->get();
        return view('home.user_add_product',['datalist'=> $datalist, 'productlist'=>$productlist]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product, $id)
    {
        $datalist = Review::where('user_id',Auth::user()->id)->get();
        $productlist = Category::with('children')->get();
        $object = Product::find($id); 
        return view('home.user_product_update',['datalist'=>$datalist, 'productlist'=>$productlist, 'object'=>$object]);
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
        
        $datalist = Review::where('user_id',Auth::user()->id)->get();
        $productlist = Category::with('children')->get();
        $object = Product::find($id);

        return redirect()->route('user_product_edit',['id'=>$id,'datalist'=>$datalist, 'productlist'=>$productlist, 'object'=>$object])->with('success','Record Update Successfully.');

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

        $datalist = Review::where('user_id',Auth::user()->id)->get();
        $productlist = Product::where('user_id',Auth::user()->id)->get();

        return redirect()->route('profile',['datalist' => $datalist, 'productlist' => $productlist])->with('success', 'Record deleted successfully.');
    
    }
}
