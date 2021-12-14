<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index(){
        return view('admin.index');
    }

    public function adminLogin(){
        return view('admin.login');
    }

    public function AdminCheck(Request $request){
        if($request->isMethod('post')){
            $credentials = $request->only('email','password');
    
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
    
                return redirect()->intended('admin');
            }
    
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ]);
            
        }else{
            return view('admin.login');
        }
    }

    public function reset(){



        return view('admin.reset_password');
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('admin/login');
    }
}
