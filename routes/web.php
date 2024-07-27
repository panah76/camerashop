<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



//Admin
Route::get('login-form', [AdminController::class, 'login_form'])->name('admin.login.form');
Route::post('login-functionality', [AdminController::class, 'login_admin'])->name('login.functionality');
Route::group(['middleware' => 'admin'], function () {
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('admin/update-password', [AdminController::class, 'updatePassword'])->name('update-password');
    Route::post('check-current-password', [AdminController::class, 'checkCurrentPassword'])->name('checkCurrentPassword');
    Route::get('/view_category', [AdminController::class, 'view_category'])->name('view_category');
    Route::get('logout', [AdminController::class, 'logout'])->name('logout');
});

//Route::resource('user',UserController::class);
//Route::resource('/product',ProductController::class);
Route::resource('products', ProductController::class);


Route::get('/framing', [PagesController::class, 'framing'])
    ->name('pages.framing');
Route::get('/home', [PagesController::class, 'home'])->name('home');
//Route::get('/', [PagesController::class, 'home'])->name('home');
Route::get('/in-store', [PagesController::class, 'instore']);
Route::post('/in-store/mail', [PagesController::class, 'Store_Post'])->name('store.post');

Route::get('/activities', [PagesController::class, 'activities']);
Route::get('/activities/{id}', [PagesController::class, 'SingleActivity'])->name('singleactivity');
Route::get('/printing', [PagesController::class, 'Printing'])->name('printing');
Route::get('/activities-art-fairs', [PagesController::class, 'ArtFairs'])->name('artfairs');
Route::get('/activities-festival-event', [PagesController::class, 'FestivalEvent'])->name('festival.event');
Route::get('/activities-exhibition', [PagesController::class, 'Exhibition'])->name('exhibition');

Route::get('/framingsingle', [PagesController::class, 'framingsingle']);
Route::get('/wandh', [PagesController::class, 'wandh']);
Route::get('/artworks', [PagesController::class, 'filter'])->name('artworks.filter');
Route::get('/product-details/{id}/{slug}', [PagesController::class, 'SingleProduct'])->name('singleproduct');
Route::get('/add-to-cart', [PagesController::class, 'AddToCart'])->name('addtocart');
Route::post('/add-product-to-cart{id}', [PagesController::class, 'AddProductToCart'])->name('addproducttocart');
Route::post('/checkout', [PagesController::class, 'Checkout'])->name('checkout');
