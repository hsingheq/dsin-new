<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\BlogsController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ImageUploadController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\EcommerceController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\Product_reviews;
use App\Http\Controllers\Admin\AttributeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\BrandController;


use App\Http\Controllers\Admin\SalesPersonController;
use App\Http\Controllers\Admin\DealerController;
use App\Http\Controllers\Admin\PaymentMethodsController;
use App\Http\Controllers\Admin\AizUploadController;

use RealRashid\SweetAlert\Facades\Alert;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
// use App\Http\livewire\Registeration;
//use App\Http\livewire\Admin\Users\Users;
//use App\Http\livewire\Admin\Users\AddUser;

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

/* Route::get('/', function () {
    return view('welcome');
}); */


//Route::get('/', [AdminController::class, 'login']);
Route::get('/admin/login', [AdminController::class, 'login'])->middleware('alreadyLoggedIn');
//Route::get('/register',[AdminController::class,'login'])->middleware('alreadyLoggedIn');

Route::get('logout', [DashboardController::class, 'logout']);

Route::post('/admin/loginuser', [AdminController::class, 'loginuser'])->middleware('alreadyLoggedIn');
Route::post('/admin-register', [AdminController::class, 'admin_register']);
Route::get('/admin', [DashboardController::class, 'index'])->middleware('isLoggedIn');


//MIDDLEWARE FOR CHECKING LOGGEDIN OR NOT
Route::group(['middleware' => 'isLoggedIn'], function () {

    







Route::post('/admin/users/add-user/', [DashboardController::class, 'add_user'])->name('admin.add_user');
Route::post('/admin/users/change-password/', [DashboardController::class, 'change_password'])->name('admin.change_password');
//user
Route::get('/admin/users/', [DashboardController::class, 'users'])->name('admin.users');
Route::get('/admin/users/get-change-password/{id}', [DashboardController::class, 'get_change_password']);
Route::get('/admin/users/delete-user/{id}', [DashboardController::class, 'delete_user']);
Route::get('/admin/users/delete-bulk-user/{ids}', [DashboardController::class, 'delete_multiple_user']);
Route::get('/admin/users/edit-user/{id}', [DashboardController::class, 'edit_user']);
Route::post('/admin/users/update-user/', [DashboardController::class, 'update_user']);


//customer 

Route::controller(App\Http\Controllers\Admin\CustomerController::class)->prefix('/admin/customers/')->group(function () {

    Route::get('all-customer/',  'users')->name('admin.customers');
    Route::post('/add-user/', 'add_user')->name('customer.add_user');
    Route::post('/change-password/', 'change_password')->name('customer.change_password');
    /* Route::get('/admin/customer/', [CustomerController::class, 'users'])->name('admin.customer'); */
    Route::get('/get-change-password/{id}',  'get_change_password');
    Route::get('/delete-user/{id}', 'delete_user');
    Route::get('/delete-bulk-user/{ids}',  'delete_multiple_user');
    Route::get('/edit-user/{id}', 'edit_user');
    Route::post('/update-user/',  'update_user');
});

//sales person
Route::post('/admin/salesperson/add-user/', [SalesPersonController::class, 'add_user'])->name('salesperson.add_user');
Route::post('/admin/salesperson/change-password/', [SalesPersonController::class, 'change_password'])->name('salesperson.change_password');
Route::get('/admin/salesperson/', [SalesPersonController::class, 'users'])->name('admin.salesperson');
Route::get('/admin/salesperson/get-change-password/{id}', [SalesPersonController::class, 'get_change_password']);
Route::get('/admin/salesperson/delete-user/{id}', [SalesPersonController::class, 'delete_user']);
Route::get('/admin/salesperson/delete-bulk-user/{ids}', [SalesPersonController::class, 'delete_multiple_user']);
Route::get('/admin/salesperson/edit-user/{id}', [SalesPersonController::class, 'edit_user']);
Route::post('/admin/salesperson/update-user/', [SalesPersonController::class, 'update_user']);



//dealer
Route::post('/admin/dealer/add-user/', [DealerController::class, 'add_user'])->name('dealer.add_user');
Route::post('/admin/dealer/change-password/', [DealerController::class, 'change_password'])->name('dealer.change_password');
Route::get('/admin/dealer/', [DealerController::class, 'users'])->name('admin.dealer');
Route::get('/admin/dealer/get-change-password/{id}', [DealerController::class, 'get_change_password']);
Route::get('/admin/dealer/delete-user/{id}', [DealerController::class, 'delete_user']);
Route::get('/admin/dealer/delete-bulk-user/{ids}', [DealerController::class, 'delete_multiple_user']);
Route::get('/admin/dealer/edit-user/{id}', [DealerController::class, 'edit_user']);
Route::post('/admin/dealer/update-user/', [DealerController::class, 'update_user']);


// attribute 
Route::get('/admin/products/attribute/', [AttributeController::class, 'attribute'])->name('admin.attribute');
Route::get('/admin/products/delete-attribute/{id}', [AttributeController::class, 'delete_attribute'])->name('admin.delete_attribute');
Route::get('/admin/products/delete-attribute-option/{id}', [AttributeController::class, 'delete_attribute_option'])->name('admin.delete_attribute_option');
Route::post('/admin/products/add-attribute', [AttributeController::class, 'add_attribute']);
Route::get('/admin/products/attribute-options/{id}', [AttributeController::class, 'attribute_options']);
Route::post('/admin/products/add-attribute-options/', [AttributeController::class, 'add_attribute_options']);
Route::get('/admin/products/attribute-options-edit/{id}', [AttributeController::class, 'edit_attribute_options']);
Route::post('/admin/products/attribute-options-update/', [AttributeController::class, 'update_attribute_options'])->name('admin.update_attribute_options');
Route::get('/admin/products/attribute-edit/{id}', [AttributeController::class, 'edit_attribute']);
Route::post('/admin/products/attribute-update/', [AttributeController::class, 'update_attribute'])->name('admin.update_attribute');









/***********************************************************/
/****R O U T I N G   G R O U P   F O R   P R O D U C T S ***************/
Route::group(['prefix' => 'admin/products'], function () {

    // P R O D U C T S
    Route::get('/add-product/', [ProductController::class, 'add_product'])->name('admin.add_product');;
    Route::post('/store-product/', [ProductController::class, 'store_product']);
    Route::get('/all-products/', [ProductController::class, 'all_products'])->name('admin.all_products');
    Route::get('/edit-product/{id}', [ProductController::class, 'edit_product']);
    Route::post('/update-product/', [ProductController::class, 'update_product'])->name('admin.update_product');
    Route::get('/delete-product/{id}', [ProductController::class, 'delete_product'])->name('admin.delete_product');

    Route::get('/view-product/{id}', [ProductController::class, 'view_product'])->name('admin.view_product');

    // C A T E G O R I E S
    Route::get('/product-categories', [CategoryController::class, 'productCategories'])->name('admin.productCategories');
    Route::post('/add-product-category', [CategoryController::class, 'addProductCategory'])->name('admin.addProductCategory');
    Route::get('/delete-bulk-categories/{ids}', [CategoryController::class, 'delete_bulk_categories']);
    Route::get('/delete-category/{id}', [CategoryController::class, 'delete_category']);
    Route::get('/edit-product-category/{id}', [CategoryController::class, 'edit_Product_Category']);
    Route::post('/update-product-category', [CategoryController::class, 'update_Product_Category'])->name('admin.update_Product_Category');
    Route::get('/edit-product-image-delete/{id}', [ProductController::class, 'edit_product_image_delete']);


    /*B R A N D S*/
    Route::get('/brands/', [BrandController::class, 'brands'])->name('admin.brands');
    Route::post('add-product-brand', [BrandController::class, 'add_product_brand'])->name('admin.add_product_brand');
    Route::post('update-product-brand', [BrandController::class, 'update_product_brand'])->name('admin.update_product_brand');
    Route::get('edit-product-brand/{id}', [BrandController::class, 'edit_product_brand'])->name('admin.edit_product_brand');
    Route::get('delete-brand/{id}', [BrandController::class, 'delete_brand'])->name('admin.delete_brand');
    Route::get('delete-bulk-brands/{ids}', [BrandController::class, 'delete_multiple_brand'])->name('admin.delete_multiple_brand');

    Route::get('/product-excel/', [ProductController::class, 'product_excel_export'])->name('admin.product_excel_export');
    Route::get('/product-export/', [ProductController::class, 'product_export'])->name('admin.product_export');

    Route::post('/product-import/', [ProductController::class, 'product_import'])->name('admin.product_import');
});


Route::group(['prefix' => '/admin/settings'], function () {
    Route::get('/social/', [SettingController::class, 'social'])->name('admin.setting.social');
    Route::post('/social-update/', [SettingController::class, 'social_update']);
});
//for settings

Route::post('/admin/products/add-more-choice-option/', [ProductController::class, 'add_more_choice_option'])->name('admin.add_more_choice_option');

Route::post('/admin/products/sku_combination', [ProductController::class, 'sku_combination']);
Route::post('/admin/products/sku_combination_edit', [ProductController::class, 'sku_combination_edit']);


//basic system setting

Route::get('/admin/settings/system/', [SettingController::class, 'system_settings'])->name('admin.setting.system');
Route::post('/admin/settings/system-update/', [SettingController::class, 'system_setting_update']);

//email
Route::get('/admin/settings/emails/', [SettingController::class, 'system_email']);
Route::post('/admin/settings/email-update/', [SettingController::class, 'system_email_update']);



Route::controller(App\Http\Controllers\Admin\SettingController::class)
    ->prefix('/admin/settings/')
    ->group(function () {
        Route::get('all-permission/', 'all_permission')->name('admin.all_permission');
        Route::get('add-permission/', 'add_permission')->name('admin.add_permission');
        Route::get('delete-permission/{id}',  'delete_permission');
        Route::get('delete-multiple-permission/{id}', 'delete_multiple_permission');
        Route::get('edit-permission/{id}', 'edit_permission');
        Route::post('store-permission/', 'store_permission')->name('admin.store_permission');
        Route::post('update-permission/', 'update_permission')->name('admin.update_permission');
    });



//coupan
Route::controller(App\Http\Controllers\Admin\CouponController::class)
    ->prefix('/admin/ecommerce')
    ->group(function () {
        Route::get('/coupons/', 'coupons')->name('admin.coupons');
        Route::get('/coupons/create_coupon', 'create_coupon')->name('admin.create_coupon');
        Route::post('/add-coupon/',  'add_coupon')->name('admin.add_coupon');
        Route::get('/coupons/edit-coupon/{id}',  'edit_coupon');
        Route::post('/update-coupon/', 'update_coupon')->name('admin.update_coupon');
        Route::get('/delete-coupon/{id}',  'delete_coupon');
        Route::get('/delete-multiple-coupon/{id}',  'delete_multiple_coupon');
        Route::post('/coupons/get_form', 'get_coupon_form')->name('admin.get_coupon_form');
        Route::post('/coupons/get_form_edit', 'get_coupon_form_edit')->name('admin.get_coupon_form_edit');
    });





Route::get('/admin/orders/', [OrderController::class, 'orders'])->name('admin.order');

Route::get('/admin/reviews/', [Product_reviews::class, 'reviews'])->name('admin.reviews');
Route::get('/admin/delete-reviews/{id}', [Product_reviews::class, 'delete_review'])->name('admin.delete_review');
Route::get('/admin/delete-bulk-reviews/{ids}', [Product_reviews::class, 'delete_multiple_review'])->name('admin.delete_multiple_review');

Route::get('/admin/image/upload', [ImageUploadController::class, 'fileCreate']);
Route::post('/admin/image/upload/store', [ImageUploadController::class, 'fileStore']);
Route::post('/admin/image/delete', [ImageUploadController::class, 'fileDestroy']);

//Blogs
/* Route::get('/admin/blogs/', [BlogsController::class, 'index'])->name('admin.blogs');
Route::get('/admin/blogs-list', [BlogsController::class, 'lists'])->name('admin.blogs-list');
Route::get('/admin/blogs/add-post', [BlogsController::class, 'add_post'])->name('admin.add-post');
Route::get('/admin/blogs/edit-post/{id}', [BlogsController::class, "edit_post"]);
Route::post('/admin/blogs/save-post', [BlogsController::class, 'update']);
Route::delete("/admin/blogs/delete-post/{id}", [BlogsController::class, "delete"])->where("id", "[0-9]+"); */

//Blogs

Route::group(['prefix' => 'admin'], function () {
    Route::any('uploaded-files/file-info', 'App\Http\Controllers\Admin\AizUploadController@file_info')->name('uploaded-files.info');

    //  Route::get('uploaded-files/destroy/{id}', 'App\Http\Controllers\Admin\AizUploadController@destroy')->name('uploaded-files.destroy');

    Route::get('uploaded-files/destroy/{id}', 'App\Http\Controllers\Admin\AizUploadController@destroy');
    Route::resource('uploaded-files', 'App\Http\Controllers\Admin\AizUploadController');
});
//Route::post('aiz-uploader/upload', [AizUploadController::class, 'upload']);


Route::post('/aiz-uploader', 'App\Http\Controllers\Admin\AizUploadController@show_uploader');
Route::post('/aiz-uploader/upload', 'App\Http\Controllers\Admin\AizUploadController@upload');
Route::get('/aiz-uploader/get_uploaded_files', 'App\Http\Controllers\Admin\AizUploadController@get_uploaded_files');
Route::post('/aiz-uploader/get_file_by_ids', 'App\Http\Controllers\Admin\AizUploadController@get_preview_files');
Route::get('/aiz-uploader/download/{id}', 'App\Http\Controllers\Admin\AizUploadController@attachment_download')->name('download_attachment');


//payment methods
Route::get('/admin/ecommerce/payment-methods', [PaymentMethodsController::class, 'index'])->name('admin.paymentmethods');
Route::post('/admin/ecommerce/payment-methods-update', [PaymentMethodsController::class, 'payment_method_update'])->name('admin.payment_method_update');


Route::controller(App\Http\Controllers\Admin\ProductTagController::class)
    ->prefix('/admin/products/')
    ->group(function () {
        Route::get('tag/', 'tag')->name('admin.product.tag');
        Route::post('add-tag/', 'add_tag')->name('admin.product.add_tag');
        Route::get('delete-tag/{id}',  'delete_tag');
        Route::get('delete-bulk-tag/{ids}', 'delete_bulk_tag');
        Route::get('edit-tag/{id}', 'edit_tag');
        Route::post('update-tag/', 'update_tag')->name('admin.product.update_tag');
    });




Route::controller(App\Http\Controllers\Admin\BlogTagController::class)
    ->prefix('/admin/blog/')
    ->group(function () {
        Route::get('tag/', 'tag')->name('admin.blog.tag');
        Route::post('add-tag/', 'add_tag')->name('admin.blog.add_tag');
        Route::get('delete-tag/{id}',  'delete_tag');
        Route::get('delete-bulk-tag/{ids}', 'delete_bulk_tag');
        Route::get('edit-tag/{id}', 'edit_tag');
        Route::post('update-tag/', 'update_tag')->name('admin.blog.update_tag');
    });


Route::controller(App\Http\Controllers\Admin\BlogCategoryController::class)
    ->prefix('/admin/blog/')
    ->group(function () {
        Route::get('category/', 'category')->name('admin.blog.category');
        Route::post('add-category/', 'add_category')->name('admin.blog.add_category');
        Route::get('delete-category/{id}',  'delete_category');
        Route::get('delete-bulk-category/{ids}', 'delete_bulk_category');
        Route::get('edit-category/{id}', 'edit_category');
        Route::post('update-category/', 'update_category')->name('admin.blog.update_category');
    });


Route::controller(App\Http\Controllers\Admin\BlogController::class)
    ->prefix('/admin/blog/')
    ->group(function () {
        Route::get('all-post/', 'blog')->name('admin.blog.post');
        Route::get('add-post/', 'add_post')->name('admin.blog.add_post');
        Route::post('create-post/', 'create_post')->name('admin.blog.create_post');
        Route::get('delete-post/{id}',  'delete_post');
        Route::get('delete-bulk-posts/{ids}', 'delete_bulk_posts');
        Route::get('edit-post/{id}', 'edit_post');
        Route::post('update-post/', 'update_post')->name('admin.blog.update_post');
    });



Route::controller(App\Http\Controllers\Admin\CmsController::class)
    ->prefix('/admin/cms/')
    ->group(function () {
        Route::get('all-page/', 'cms')->name('admin.cms.page');
        Route::get('add-page/', 'add_page')->name('admin.cms.add_page');
        Route::post('create-page/', 'create_page')->name('admin.cms.create_page');
        Route::get('delete-page/{id}',  'delete_page');
        Route::get('delete-bulk-pages/{ids}', 'delete_bulk_pages');
        Route::get('edit-page/{id}', 'edit_page');
        Route::post('update-page/', 'update_page')->name('admin.cms.update_page');
    });

});
//Route::post('password/reset','resetPassword')->middleware('guest')->name('password.reset');
//Route::get('');
//Route::get('/dashboard/',[DashboardController::class,'index'])->middleware('isLoggedIn');
//Route::get('/dashboard/{any}',[DashboardController::class,'index'])->where('any','.*')->middleware('isLoggedIn');
/*Route::get('/dashboard/{any}',function(){
    return view('admin/dashboard');
})->where('any','.*');*/
