<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\ProductController;
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

//Admin Login routes
Route::get('/admin/reset',[App\Http\Controllers\admin\AdminController::class,'reset'])->name('admin_reset');

//Home routes
Route::get('/home',[HomeController::class,'index'])->name('homepage');

//Categories routes:
Route::middleware('auth')->prefix('admin')->group(function(){
    Route::get('/',[App\Http\Controllers\admin\AdminController::class,'index'])->name('admin_home');

    Route::get('category',[App\Http\Controllers\admin\CategoryController::class,'index'])->name('admin_category');
    Route::get('category/add', [App\Http\Controllers\admin\CategoryController::class,'add'])->name('admin_category_add');
    Route::post('category/create', [App\Http\Controllers\admin\CategoryController::class,'create'])->name('admin_category_create');
    Route::post('category/update/{id}',[App\Http\Controllers\admin\CategoryController::class,'update'])->name('admin_category_update');
    Route::get('category/edit/{id}',[App\Http\Controllers\admin\CategoryController::class,'edit'])->name('admin_category_edit');
    Route::get('category/delete/{id}',[App\Http\Controllers\admin\CategoryController::class,'destroy'])->name('admin_category_delete');
    Route::get('category/show',[App\Http\Controllers\admin\CategoryController::class,'show'])->name('admin_category_show');

});

//Product Route
Route::prefix('product')->group(function(){

    Route::get('/',[App\Http\Controllers\admin\ProductController::class,'index'])->name('admin_product');
    Route::get('add', [App\Http\Controllers\admin\ProductController::class,'create'])->name('admin_product_add');
    Route::post('store', [App\Http\Controllers\admin\ProductController::class,'store'])->name('admin_product_store');
    Route::get('edit/{id}', [App\Http\Controllers\admin\ProductController::class,'edit'])->name('admin_product_edit');
    Route::post('update/{id}', [App\Http\Controllers\admin\ProductController::class,'update'])->name('admin_product_update');
    Route::get('delete/{id}', [App\Http\Controllers\admin\ProductController::class,'destroy'])->name('admin_product_delete');
});

//Image Route Controller/Product Route
Route::prefix('image')->group(function(){

    Route::get('create/{product_id}', [App\Http\Controllers\admin\ImageController::class,'create'])->name('admin_image_add');
    Route::post('store/{product_id}', [App\Http\Controllers\admin\ImageController::class,'store'])->name('admin_image_store');
    Route::get('delete/{id}/{product_id}', [App\Http\Controllers\admin\ImageController::class,'destroy'])->name('admin_image_delete');
});


//Setting routes
Route::get('setting',[App\Http\Controllers\admin\SettingController::class,'index'])->name('admin_setting');
Route::post('setting/update',[App\Http\Controllers\admin\SettingController::class,'update'])->name('admin_setting_update');