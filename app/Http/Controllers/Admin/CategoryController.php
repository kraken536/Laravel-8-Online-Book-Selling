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
     * 
     */

    protected $appends=[
        'getParentsTree',
    ];

    public static function getParentsTree($category, $title){
        if($category->parent_id == 0){
            return $title; 
        }
        $parent = Category::find($category->parent_id);
        $title = $parent->title. ' > ' .$title;

        return CategoryController::getParentsTree($parent, $title);
    }

    public function index()
    {
        $datalist = Category::with('children')->get();  
        //DB::table('categories')->get();
        return view('admin.category',['datalist'=> $datalist]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function create(Request $request)
    {

        $data = new Category;

        $data->parent_id = $request->input('parent_id');
        $data->title = $request->input('title');
        $data->keywords = $request->input('keywords');
        $data->description = $request->input('description');
        $data->slug = $request->input('slug');
        $data->status = $request->input('status');
        $data->save();

        return redirect()->route('admin_category')->with('success', 'Category Added Successfully.');
    }

    public function add(){
        $datalist = Category::with('children')->get();
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
        $data = Category::find($id);
        $datalist = Category::with('children')->get();
        //DB::table('categories')->get()->where('parent_id', 0);
        return view('admin.category_edit',['data'=> $data, 'datalist'=>$datalist]);
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

        $data = Category::find($id);

        $data->parent_id = $request->input('parent_id');
        $data->title = $request->input('title');
        $data->keywords = $request->input('keywords');
        $data->description = $request->input('description');
        $data->slug = $request->input('slug');
        $data->status = $request->input('status');
        $data->save();

        return redirect()->route('admin_category')->with('success', 'Record Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $data = Category::find($id);
        $data->delete();

        return redirect()->route('admin_category')->with('success', 'Record deleted successfully.');;
    }
}
