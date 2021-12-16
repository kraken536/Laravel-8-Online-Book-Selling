<?php

namespace App\Http\Controllers\admin;

use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datalist = DB::table('categories')->get();
        return view('admin.category',['datalist'=> $datalist]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function create(Request $request)
    {
        DB::table('categories')->insert([
            'parent_id' => $request->input('parent_id'),
            'title' => $request->input('title'),
            'keywords' => $request->input('keywords'),
            'description' => $request->input('description'),
            'slug' => $request->input('slug'),
            'status' => $request->input('status')
        ]);
        return redirect()->route('admin_category');
    }

    public function add(){
        $datalist = DB::table('categories')->get()->where('parent_id',0);
        return view('admin.category_add',['datalist'=> $datalist]);
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update()//Request $request, $id
    {
        echo "There is nothing for the moment";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('categories')->where('id', $id)->delete();
        return redirect()->route('admin_category');
    }
}
