<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');


//Admin routes
Route::get('/admin',[App\Http\Controllers\admin\AdminController::class,'index'])->name('admin_home')->middleware('auth');

Route::middleware(['auth:sanctum','verified'])->get('/admin',function(){
    return view('admin.index');
})->name('admin_checker');

//Admin Login routes
Route::get('/admin/login',[App\Http\Controllers\admin\AdminController::class,'adminLogin'])->name('admin_login');

//Logincheck routes
Route::post('/admin/logincheck',[App\Http\Controllers\admin\AdminController::class,'AdminCheck'])->name('admin_logincheck');

//Logout routes
Route::get('/admin/logout',[App\Http\Controllers\admin\AdminController::class,'logout'])->name('admin_logout');


//Home routes
Route::get('/home',[HomeController::class,'index'])->name('homepage');