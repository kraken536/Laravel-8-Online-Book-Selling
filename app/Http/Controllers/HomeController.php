<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class HomeController extends Controller
{
    public static function categoryList(){
        return Category::where('parent_id', 0)->with('children')->get();
    }

    public function index(){
        return view('layouts.home');
    }
}
