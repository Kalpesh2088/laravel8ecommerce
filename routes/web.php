<?php

use App\Http\Livewire\Admin\AdminCategoryComponent;
use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\Admin\AdminAddCategoryComponent;
use App\Http\Livewire\Admin\AdminEditCategoryComponent;
use App\Http\Livewire\Admin\AdminProductComponent;
use App\Http\Livewire\Admin\AdminAddProductComponent;
use App\Http\Livewire\Admin\AdminEditProductComponent;
use App\Http\Livewire\Admin\AdminEditHomeSliderComponent;
use App\Http\Livewire\Admin\AdminAddHomeSliderComponent;
use App\Http\Livewire\Admin\AdminHomeSliderComponent;
use App\Http\Livewire\Admin\AdminHomeCategoryComponent;
use App\Http\Livewire\Admin\AdminSaleComponent;
use App\Http\Livewire\CartComponet;
use App\Http\Livewire\Categorycomponent;
use App\Http\Livewire\CheckoutComponet;
use App\Http\Livewire\DetailsComponent;
use App\Http\Livewire\HomeComponet;
use App\Http\Livewire\SearchComponent;
use App\Http\Livewire\ShopComponet;
use App\Http\Livewire\User\UserDashboardComponent;
use Illuminate\Support\Facades\Route;

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
//     return view('welcome');
// });

Route::get('/', HomeComponet::class);
Route::get('/shop', ShopComponet::class);
Route::get('/cart', CartComponet::class)->name('product.cart');
Route::get('/checkout', CheckoutComponet::class);
Route::get('/product/{slug}', DetailsComponent::class)->name('product.details');
Route::get('/product-Category/{Category_slug}', Categorycomponent::class)->name('product.Category');
Route::get('/search', SearchComponent::class)->name('product.search');

Route::get('/logout', function () {
    Auth::logout();
    Session::flush();
    return Redirect::to('/login');
});
// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified'
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });

//Admin
Route::middleware(['auth:sanctum', 'verified', 'authadmin'])->group(function () {
    Route::get('/admin/dashboard', AdminDashboardComponent::class)->name('admin.dashboard');
    Route::get('/admin/categories', AdminCategoryComponent::class)->name('admin.categories');
    Route::get('/admin/category/add',AdminAddCategoryComponent::class)->name('admin.addcategory');
    Route::get('/admin/category/edit/{category_slug}',AdminEditCategoryComponent::class)->name('admin.editcategory');
    Route::get('/admin/product',AdminProductComponent::class)->name('admin.product');
    Route::get('/admin/product/add',AdminAddProductComponent::class)->name('admin.addproduct');
    Route::get('/admin/product/edit/{product_slug}',AdminEditProductComponent::class)->name('admin.editproduct');
    Route::get('/admin/slider',AdminHomeSliderComponent::class)->name('admin.homeslider');
    Route::get('/admin/slider/add',AdminAddHomeSliderComponent::class)->name('admin.addhomeslider');
    Route::get('/admin/slider/edit/{slider_id}',AdminEditHomeSliderComponent::class)->name('admin.edithomeslider');
    Route::get('admin/home_categorise',AdminHomeCategoryComponent::class)->name('admin.home_categorise');
    Route::get('/admin/sale',AdminSaleComponent::class)->name('admin.sale');
});

//User
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/user/dashboard', UserDashboardComponent::class)->name('user.dashboard');

});
