<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Setting;
use App\Models\Message;
use App\Models\Product;
use App\Models\Review;
use App\Models\Image;
use App\Models\Faq;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;

class HomeController extends Controller
{
    public static function categoryList(){
        return Category::where('parent_id', 0)->with('children')->get();
    }

    public static function getSetting(){
        return Setting::first();
    }
    
    public static function avg_review($id){
        return Review::where('product_id', $id)->average('rate');
    }

    public static function count_review($id){
        return Review::where('product_id', $id)->count();
    }

    public function index(){

        $slider = Product::select('title','image','price','id')->limit(4)->get();
        $daily = Product::select('title','image','price','id')->inRandomOrder()->limit(3)->get();
        $last = Product::select('title','image','price','id')->OrderByDesc('id')->limit(3)->get();
        $picked = Product::select('title','image','price','id')->inRandomOrder()->limit(3)->get();
        // print_Kr($last);exit();
        return view('layouts._home', ['slider' => $slider, 'daily' => $daily, 'last'=>$last, 'picked'=>$picked]);
    }

    public function aboutus(){
        return view('home.about');
    }

    public function faq(){

        $datalist = Faq::orderBy('position')->get();
        return view('home.faq',['datalist' => $datalist]);
    }

    public function references(){
        return view('home.references');
    }

    public function contact(){
        return view('home.contact');
    }

    public function logoutHome(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('homepage');
    }

    public function homeLogin(){
        return view('home.loginHome');
    }


    public function LoginCheck(Request $request){
        if($request->isMethod('post')){
            $credentials = $request->only('email','password');
    
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
    
                return redirect()->intended('home');
            }
    
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ]);
            
        }else{
            return view('home.loginHome');
        }
    }
    public function register(){
        return view('auth.register');
    }

    public function message(Request $request){
        $data = new Message;
        $data->name = $request->input('name');
        $data->email = $request->input('email');
        $data->phone = $request->input('phone');
        $data->subject = $request->input('subject');
        $data->message = $request->input('message');
        $data->status = 'New';
        $data->save();

        return redirect()->route('contact')->with('success', 'The message has been sent successfully.');
    }

    public function categoryproduct($id){
        $datalist = Product::where('category_id',$id)->get();
        $list = Category::find($id);
        //print_r($datalist);exit();
        return view('home._categoryproduct',['id'=>$id, 'datalist'=>$datalist, 'list'=>$list]);
    }

    public function add_to_cart($id){
        $data= Product::find($id);
        return view('home.add_to_cart',['id'=>$id,'data'=>$data]);
    }

    public function product_details($id){
        $data_product = Product::find($id);
        $datalist = Image::where('product_id',$id)->get();
        $total = Review::where('product_id',$id)->count();
        $rev = Review::where('product_id',$id)->get();
        
        // View::composer('home.extra_details',['data'=>$data, 'datalist'=>$datalist]);
        return view('home.product_details',['data_product'=>$data_product, 'datalist'=>$datalist, 'total'=>$total, 'rev'=>$rev]);
    }

    public function getproduct(Request $request){

        $search = $request->input('search');
        $count = Product::where('title', 'like', '%'.$search.'%')->get()->count();
    
        if($count== 1){
            $data = Product::where('title', 'like', '%'.$search.'%')->first();
            return redirect()->route('product_detail',['id'=>$data->id, 'slug'=>$data->slug]);
        }else{
            $data = Product::where('title', 'like', '%'.$search.'%')->first(); 
            $list = Product::find($data->id);
            return redirect()->route('category_products',['search'=>$search, 'id'=>$data->category_id, 'list'=>$list]);
        }
        
    }

    public function user_reviews(){
        return view('home.review_home');
    }
    
    public function save_reviews(Request $request, $id){

        return redirect()->route('product_detail',['id'=>$id])->with('success', 'The review has been sent successfully.');
    }

    


}
