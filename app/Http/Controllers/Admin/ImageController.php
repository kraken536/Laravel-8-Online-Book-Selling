<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        echo("Index page");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($product_id)
    {
        $data= Product::find($product_id);
        $image_list = Image::where('product_id', $product_id)->get();
        
        return view('admin.image_add',['data'=>$data, 'image_list'=>$image_list]);
    }


    public function create2($product_id)
    {
        $data= Product::find($product_id);
        $image_list = Image::where('product_id', $product_id)->get();
        
        return view('home.product_gallery',['data'=>$data, 'image_list'=>$image_list]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $product_id)
    {
        $data = new Image;

        $data->title = $request->input('title');
        $data->product_id = $product_id;
        if($request->hasFile('image')){
            $data->image = Storage::putFile('images', $request->file('image'));
        }
        $data->save();

        return redirect()->route('admin_image_add',['product_id'=>$product_id])->with('success', 'Image Added Successfully.');
    }

    public function store2(Request $request, $product_id)
    {
        $data = new Image;

        $data->title = $request->input('title');
        $data->product_id = $product_id;
        if($request->hasFile('image')){
            $data->image = Storage::putFile('images', $request->file('image'));
        }
        $data->save();

        return redirect()->route('user_image_add',['product_id'=>$product_id])->with('success', 'Image Added Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show(Image $image)
    {
        echo("Post Blade");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit(Image $image)
    {
        echo("Edit Blade");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Image $image, $id)
    {
        $data = Image::find($id);

        $data->title = $request->input('slug');
        if($request->hasFile('image')){
            $data->image = Storage::putFile('images', $request->file('image'));
        }
        
        $data->save();    

        return redirect()->route('admin_image_add',['id'=>$id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy(Image $image, $id, $product_id)
    {
        $data = Image::find($id);
        $data->delete();

        return redirect()->route('admin_image_add', ['product_id'=>$product_id])->with('success', 'Image Removed Successfully.');
    }

    public function destroy2(Image $image, $id, $product_id)
    {
        $data = Image::find($id);
        $data->delete();

        return redirect()->route('user_image_add', ['product_id'=>$product_id])->with('success', 'Image Removed Successfully.');
    }
}
