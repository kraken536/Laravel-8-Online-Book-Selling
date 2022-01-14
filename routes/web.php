<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\ImageController;
use App\Http\Controllers\admin\SettingController;
use App\Http\Controllers\admin\ReviewController;
use App\Http\Controllers\admin\MessageController;
use App\Http\Controllers\admin\FaqController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ShopCartController;
use App\Http\Controllers\ProductUserController;



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

// Route::get('/', function () {
//     // return view('welcome');
//     return view('layouts._home');
// });
Route::get('/', [HomeController::class,'index']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');



//USER routes
Route::middleware('auth')->prefix('myaccount')->group(function(){
    Route::get('/',[UserController::class,'index'])->name('profile');
});

Route::middleware('auth')->prefix('myreviews')->group(function(){
    Route::get('/',[UserController::class,'myreviews'])->name('myReviews');
    Route::get('/delete/{id}',[UserController::class,'destroy_review'])->name('delete_reviews');
});



//Register in routes 
Route::get('/register',[HomeController::class,'register'])->name('register');


//Admin routes
Route::get('/admin',[AdminController::class,'index'])->name('admin_home')->middleware('auth');

Route::middleware(['auth:sanctum','verified'])->get('/admin',function(){
    return view('admin.index');
})->name('admin_checker');


//Admin Login routes
Route::get('/admin/login',[AdminController::class,'adminLogin'])->name('admin_login');

//Logincheck routes
Route::post('/admin/logincheck',[AdminController::class,'AdminCheck'])->name('admin_logincheck');

//Logout routes
Route::get('/admin/logout',[AdminController::class,'logout'])->name('admin_logout');

//Admin Login routes
Route::get('/admin/reset',[AdminController::class,'reset'])->name('admin_reset');

//Home routes
Route::get('/home',[HomeController::class,'index'])->name('homepage');
Route::get('/aboutus',[HomeController::class,'aboutus'])->name('aboutus');
Route::get('/faq',[HomeController::class,'faq'])->name('faq');
Route::get('/contact',[HomeController::class,'contact'])->name('contact');
Route::get('/references',[HomeController::class,'references'])->name('references');
Route::get('home/logoutHome',[HomeController::class,'logoutHome'])->name('logout_home');
Route::get('loginHome',[HomeController::class, 'homeLogin'])->name('loginHome');
Route::post('home/loginHome',[HomeController::class, 'loginCheck'])->name('loginHomeCheck');
Route::post('/sendmessage',[HomeController::class,'message'])->name('send_message');
Route::get('/categoryproducts/{id}',[HomeController::class,'categoryproduct'])->name('category_products');
Route::get('/products/{id}',[HomeController::class,'product_details'])->name('product_detail');
Route::get('/addtoCart/{id}',[HomeController::class, 'add_to_cart'])->name('addToCart');
Route::post('/getproduct', [HomeController::class, 'getproduct'])->name('getproduct');

//////////////////////////////////////////////////////Admin Routes///////////////////////////////////////////////////////////////////////////
//Categories routes:
Route::middleware('auth')->prefix('admin')->group(function(){

    Route::middleware('admin')->group(function() {
    Route::get('/',[AdminController::class,'index'])->name('admin_home');

    Route::get('category',[CategoryController::class,'index'])->name('admin_category');
    Route::get('category/add', [CategoryController::class,'add'])->name('admin_category_add');
    Route::post('category/create', [CategoryController::class,'create'])->name('admin_category_create');
    Route::post('category/update/{id}',[CategoryController::class,'update'])->name('admin_category_update');
    Route::get('category/edit/{id}',[CategoryController::class,'edit'])->name('admin_category_edit');
    Route::get('category/delete/{id}',[CategoryController::class,'destroy'])->name('admin_category_delete');
    Route::get('category/show',[CategoryController::class,'show'])->name('admin_category_show');

    //Product Route
    Route::prefix('product')->group(function(){

    Route::get('/',[ProductController::class,'index'])->name('admin_product');
    Route::get('add', [ProductController::class,'create'])->name('admin_product_add');
    Route::post('store', [ProductController::class,'store'])->name('admin_product_store');
    Route::get('edit/{id}', [ProductController::class,'edit'])->name('admin_product_edit');
    Route::post('update/{id}', [ProductController::class,'update'])->name('admin_product_update');
    Route::get('delete/{id}', [ProductController::class,'destroy'])->name('admin_product_delete');
    });

//Admin message Route
    Route::prefix('messages')->group(function(){

    Route::get('/',[MessageController::class,'index'])->name('admin_message');
    Route::get('edit/{id}', [MessageController::class,'edit'])->name('admin_message_edit');
    Route::post('update/{id}', [MessageController::class,'update'])->name('admin_message_update');
    Route::get('delete/{id}', [MessageController::class,'destroy'])->name('admin_message_delete');
});

//Image Route Controller
Route::prefix('image')->group(function(){

    Route::get('create/{product_id}', [ImageController::class,'create'])->name('admin_image_add');
    Route::post('store/{product_id}', [ImageController::class,'store'])->name('admin_image_store');
    Route::get('delete/{id}/{product_id}', [ImageController::class,'destroy'])->name('admin_image_delete');
});

//Setting routes
Route::get('setting',[SettingController::class,'index'])->name('admin_setting');
Route::post('setting/update',[SettingController::class,'update'])->name('admin_setting_update');

//Reviews Route::
Route::prefix('reviews')->group(function(){
    Route::get('/',[ReviewController::class,'index'])->name('admin_review');
    Route::post('update/{id}',[ReviewController::class,'update'])->name('admin_review_update');
    Route::get('delete/{id}',[ReviewController::class,'destroy'])->name('admin_review_destroy');
    Route::get('show/{id}',[ReviewController::class,'show'])->name('admin_review_show');

    });


    //FAQ Route
    Route::prefix('faq')->group(function(){

        Route::get('/',[FaqController::class,'index'])->name('admin_faq');
        Route::get('add', [FaqController::class,'create'])->name('admin_faq_add');
        Route::post('store', [FaqController::class,'store'])->name('admin_faq_store');
        Route::get('edit/{id}', [FaqController::class,'edit'])->name('admin_faq_edit');
        Route::post('update/{id}', [FaqController::class,'update'])->name('admin_faq_update');
        Route::get('delete/{id}', [FaqController::class,'destroy'])->name('admin_faq_destroy');
        });

        //Admin Order Route
    Route::prefix('order')->group(function(){

        Route::get('/',[App\Http\Controllers\admin\OrderController::class,'index'])->name('admin_order');
        Route::get('/show',[App\Http\Controllers\admin\OrderController::class,'show'])->name('admin_order_show');
        Route::get('/list-new/{status}',[App\Http\Controllers\admin\OrderController::class,'list_new'])->name('admin_order_list_new');
        Route::get('/list-Cancelled/{status}',[App\Http\Controllers\admin\OrderController::class,'list_cancelled'])->name('admin_order_list_cancelled');
        Route::get('/list-shipping/{status}',[App\Http\Controllers\admin\OrderController::class,'list_shipping'])->name('admin_order_list_shipping');
        Route::get('/list-accepted/{status}',[App\Http\Controllers\admin\OrderController::class,'list_accepted'])->name('admin_order_list_accepted');
        Route::get('/list-completed/{status}',[App\Http\Controllers\admin\OrderController::class,'list_completed'])->name('admin_order_list_completed');
        Route::post('add', [App\Http\Controllers\admin\OrderController::class,'create'])->name('admin_order_add');
        Route::post('store', [App\Http\Controllers\admin\OrderController::class,'store'])->name('admin_order_store');
        Route::get('edit/{id}', [App\Http\Controllers\admin\OrderController::class,'edit'])->name('admin_order_edit');
        Route::post('item-update/{id}', [App\Http\Controllers\admin\OrderController::class,'item_update'])->name('admin_order_item_update');
        Route::post('update/{id}', [App\Http\Controllers\admin\OrderController::class,'update'])->name('admin_order_update');
        Route::get('delete/{id}', [App\Http\Controllers\admin\OrderController::class,'destroy'])->name('admin_order_delete');
        });

        //Users Route
    Route::prefix('users')->group(function(){

        Route::get('/',[App\Http\Controllers\admin\UserController::class,'index'])->name('admin_users_list');
        Route::get('add/{id}', [App\Http\Controllers\admin\UserController::class,'create'])->name('admin_user_role');
        Route::post('store', [App\Http\Controllers\admin\UserController::class,'store'])->name('admin_faq_store');
        Route::get('edit/{id}', [App\Http\Controllers\admin\UserController::class,'edit'])->name('admin_user_edit');
        Route::post('update/{id}', [App\Http\Controllers\admin\UserController::class,'update'])->name('admin_faq_update');
        Route::get('delete/{id}', [App\Http\Controllers\admin\UserController::class,'destroy'])->name('admin_user_delete');
        });
    });

});



Route::middleware('auth')->prefix('user')->group(function(){
    Route::get('profile',[UserController::class,'index'])->name('profile.show');
    //ShopCart routes
    Route::prefix('shopcart')->group(function(){

        Route::get('/',[ShopCartController::class,'index'])->name('user_shopcart');
        // Route::get('add', [ShopCartController::class,'show'])->name('user_shopcart_add');
        Route::post('store/{id}', [ShopCartController::class,'store'])->name('user_shopcart_add');
        // Route::get('edit/{id}', [ShopCartController::class,'edit'])->name('user_shopcart_edit');
        Route::post('update/{id}', [ShopCartController::class,'update'])->name('user_shopcart_update');
        Route::get('delete/{id}', [ShopCartController::class,'destroy'])->name('user_shopcart_delete');
    });
});

 //User Product Route
Route::middleware('auth')->prefix('user-product')->group(function(){

    Route::get('/',[ProductUserController::class,'index'])->name('user_product');
    Route::get('add', [ProductUserController::class,'show'])->name('user_product_add');
    Route::post('store', [ProductUserController::class,'store'])->name('user_product_store');
    Route::get('edit/{id}', [ProductUserController::class,'edit'])->name('user_product_edit');
    Route::post('update/{id}', [ProductUserController::class,'update'])->name('user_product_update');
    Route::get('delete/{id}', [ProductUserController::class,'destroy'])->name('user_product_delete');
    
    Route::get('image/create/{product_id}', [ImageController::class,'create2'])->name('user_image_add');
    Route::post('image/store/{product_id}', [ImageController::class,'store2'])->name('user_image_store');
    Route::get('image/delete/{id}/{product_id}', [ImageController::class,'destroy2'])->name('user_image_delete');

     //Order Route
     Route::prefix('order')->group(function(){

        Route::get('/',[OrderController::class,'index'])->name('user_order');
        Route::get('/show',[OrderController::class,'show'])->name('user_order_show');
        Route::post('add', [OrderController::class,'create'])->name('user_order_add');
        Route::post('store', [OrderController::class,'store'])->name('user_order_store');
        Route::get('edit/{id}', [OrderController::class,'edit'])->name('user_order_edit');
        Route::post('update/{id}', [OrderController::class,'update'])->name('user_order_update');
        Route::get('delete/{id}', [OrderController::class,'destroy'])->name('user_order_delete');
        });
    
    });
