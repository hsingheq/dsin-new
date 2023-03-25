<?php
use App\Http\Controllers\Admin\API\AdminApiController;
use App\Http\Controllers\Admin\API\HomeApiController;
use App\Http\Controllers\Admin\API\AuthController;
use App\Http\Controllers\Admin\API\CategoryApiController;
use App\Http\Controllers\Admin\API\ProductApiController;
use App\Http\Controllers\Admin\API\UserApiController;
use App\Http\Controllers\Admin\API\BlogApiController;
use App\Http\Controllers\Admin\API\DealerRegistrationApiController;
use App\Http\Controllers\Admin\API\PasswordResetApiController;
use App\Http\Controllers\Admin\API\OrderController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*  Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});  */

Route::controller(AdminApiController::class)->group(function () {
    Route::post('addAdmin', 'addAdmin');
});

Route::controller(AdminApiController::class)->group(function () {
    Route::get('alluserapi', 'alluserapi');
});


Route::controller(AdminApiController::class)->group(function () {
    Route::post('addCategoryApi', 'addCategoryApi');
});



Route::controller(AdminApiController::class)->group(function () {
    Route::post('siteSettingApi', 'siteSettingApi');
});

Route::controller(AdminApiController::class)->group(function () {
    Route::post('subCategoryApi', 'subCategoryApi');
});


Route::controller(AdminApiController::class)->group(function () {
    Route::post('addFaqCategoryApi', 'addFaqCategoryApi');
});



Route::controller(HomeApiController::class)->group(function () {
   /*  Route::get('facebook_enable', 'facebook_enable');
    Route::get('google_enable', 'google_enable'); */
   Route::get('social_settings','social_settings');
    Route::post('loginUser', 'loginUser');
    Route::get('edit_customer/{email}', 'edit_customer');
   
    Route::get('get_setting_data', 'get_setting_data');
	
});


Route::controller(UserApiController::class)->group(function(){
    Route::post('create_user', 'create_user');
    Route::post('update_customer', 'update_customer');
    Route::post('changePassword', 'changePassword');
    Route::post('get_user_data','get_user_data');
    Route::post('google_auth_login','google_auth_login');
    Route::get('google_avatar','google_avatar');
    Route::post('user_info','user_info');
    Route::post('user_info_detail','user_info_detail');
    Route::post('user_data','user_data');
    Route::get('/checkEmail/{email}','checkEmail'); 
    Route::post('billing_detail','billing_detail');

});

Route::controller(AuthController::class)->group(function () {
   Route::post('register','register');
   Route::post('login','login');
      /* Verify Email Added Routes */   
      Route::get('/verify/{email}','verifyAccount'); 
      Route::post('/verifyMail','verficationMail');
});

Route::group(['middleware'=>'jwt.verify'],function(){
    Route::get('user','App\Http\Controllers\Admin\API\AuthController@getUser');
	Route::apiResources(['transact' => 'App\Http\Controllers\Admin\API\WalletTransactionController']);
});
// Route::controller(OrderController::class)->group(function(){
//     Route::post('order_place_detail','App\Http\Controllers\Admin\API\OrderController@order_place_detail');
// });



Route::controller(CategoryApiController::class)->group(function(){
    Route::get('get_top_categories','get_top_categories');
    Route::post('get_category','get_category');
    
});


Route::controller(ProductApiController::class)->group(function(){
    Route::get('our_products','our_products');
    Route::get('best_selling_products','best_selling_products');
    Route::get('get_product/{slug}','get_product');
    Route::get('get_brand','get_brand');
    Route::post('addToCart','addToCart');
    Route::post('getCartItemsCount','getCartItemsCount');
    Route::post('getCartItems','getCartItems');
    Route::get('getAtribute','getAtribute');
    Route::get('new_arriaval_products','new_arriaval_products');
    Route::get('products/{pid}','products');
    Route::post('order_place_detail','order_place_detail');
    
});


Route::controller(BlogApiController::class)->group(function(){
    Route::post('get_post','get_post');
    Route::get('blogs','blogs');
    Route::get('blog_categories','blog_categories');
});

Route::controller(DealerRegistrationApiController::class)->group(function(){
    Route::post('dealer-register','store');
});

//Route::post('password/reset', [PasswordResetApiController::class, 'resetPasswordSendLink']);

//Route::controller(PasswordResetApiController::class)->group(function(){
  //  Route::post('password/reset-request','resetPasswordSendLink')->middleware('guest');
    //Route::post('reset-password','update')->middleware('guest')->name('password.reset');
//});
Route::post('forgot-password', 'App\Http\Controllers\PasswordResetRequestController@sendEmail');
Route::post('reset-password', 'App\Http\Controllers\ChangePasswordController@passwordResetProcess');