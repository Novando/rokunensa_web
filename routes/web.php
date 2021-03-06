<?php

use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\ShopComponent;
use App\Http\Livewire\CartComponent;
use App\Http\Livewire\CheckoutComponent;
use App\Http\Livewire\DetailsComponent;
use App\Http\Livewire\User\UserDashboardComponent;
use App\Http\Livewire\User\UserDetailsComponent;
use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\Admin\AdminProductComponent;
use App\Http\Livewire\Admin\AdminAddProductComponent;
use App\Http\Livewire\Admin\AdminRestockProductComponent;
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

Route::get('/', HomeComponent::class);

Route::get('/shop', ShopComponent::class);

Route::get('/cart', CartComponent::class)->name('product.cart');

Route::get('/checkout', CheckoutComponent::class)->name('checkout');

Route::get('/product/{slug}', DetailsComponent::class)->name('products.details');

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

// FOR NORMAL USER
Route::middleware(['auth:sanctum', 'verified'])->group(function(){
	Route::get('/user/profile', UserDetailsComponent::class)->name('user.details');
	Route::get('/user/orders', UserDashboardComponent::class)->name('user.order');
});

//FOR ADMINISTRATOR
Route::middleware(['auth:sanctum', 'verified', 'auth.admin'])->group(function(){
	Route::get('/admin/dashboard', AdminDashboardComponent::class)->name('admin.dashboard');
	Route::get('/admin/product', AdminProductComponent::class)->name('admin.product');
	Route::get('/admin/product/add', AdminAddProductComponent::class)->name('admin.addproduct');
	Route::get('/admin/product/restock/{slug}', AdminRestockProductComponent::class)->name('admin.restock');
});