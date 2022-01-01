<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Setting;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public static function categoryList(){
        return Category::where('parent_id', 0)->with('children')->get();
    }

    public static function getSetting(){
        return Setting::first();
    }

    public function index(){

        return view('layouts._home');
    }

    public function aboutus(){
        return view('home.about');
    }

    public function faq(){
        return view('home.faq');
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
        $data = new Message();
        $data->name = $request->input('name');
        $data->email = $request->input('email');
        $data->phone = $request->input('phone');
        $data->subject = $request->input('subject');
        $data->message = $request->input('message');
        $data->status = 'New';
        $data->save();

        return redirect()->route('contact')->with('success', 'The message has been sent successfully.');
    }

}
