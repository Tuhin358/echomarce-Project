<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SslCommerzPaymentController;




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
//     return view('frontend.welcome');
// });


// backend

Route::get('/admin',[AdminController::class,'index'] );
Route::post('//admin-dashbord',[AdminController::class,'show_dashbord'] );

Route::get('/dashbord',[SuperAdminController::class,'dashbord'] );
Route::get('/logout',[SuperAdminController::class,'logout'] );

// Category
Route::resource(name:'/categories',controller:CategoryController::class);
Route::get('/cat-status{category}',[CategoryController::class,'change_status'] );


//All Sub-Category
Route::resource(name:'/sub-categories',controller:SubCategoryController::class);
Route::get('/subcat-status{subcategory}',[SubCategoryController::class,'change_status'] );




//All Brand Route
Route::resource(name:'/brands',controller:BrandController::class);

Route::get('/brand-status{brand}',[BrandController::class,'change_status'] );


//All Unit Route
Route::resource(name:'/units',controller:UnitController::class);

Route::get('/unit-status{unit}',[UnitController::class,'change_status'] );



//All Size Route
Route::resource(name:'/sizes',controller:SizeController::class);

Route::get('/sizes-status{size}',[SizeController::class,'change_status'] );


//All Colors Route
Route::resource(name:'/colors',controller:ColorController::class);
Route::get('/color-status{color}',[ColorController::class,'change_status'] );



//All Products Route
Route::resource(name:'/products',controller:ProductController::class);

Route::get('/products-status{product}',[ProductController::class,'change_status'] );





// frontend

Route::get('/',[HomeController::class,'index'] );


Route::get('/view_details{id}',[HomeController::class,'view_details'] );

Route::get('/product_by_cat/{id}',[HomeController::class,'product_by_cat'] );


Route::get('/product_by_subcat/{id}',[HomeController::class,'product_by_subcat'] );

// searchbar
Route::get('/search',[HomeController::class,'search'] );





// Add To Cart Route
Route::post('/add-to-cart',[CartController::class,'add_to_cart'] );

// delete cart
Route::get('/delete-cart/{id}',[CartController::class,'delete'] );






// checkout route

// Route::get('/checkout',[CheckoutController::class,'index'] );

// login form
Route::get('/login-check',[CheckoutController::class,'login_check'] );


// customer login & registration & Logout
Route::post('/customer-login',[CustomerController::class,'login'] );

Route::post('/customer-registration',[CustomerController::class,'registration'] );


Route::get('/customer-logout',[CustomerController::class,'logout'] );

// Route::post('/save-shipping-address',[CheckoutController::class,'save_shipping_address'] );

// Route::get('/payment',[CheckoutController::class,'payment'] );

// Route::post('/order-place',[CheckoutController::class,'order_place'] );

// order releted route here



Route::get('/manage-order',[OrderController::class,'manage_order'] );

Route::get('/view-order/{id}',[OrderController::class,'view_order'] );




// SSLCOMMERZ Start
Route::get('/checkout', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
// Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END

