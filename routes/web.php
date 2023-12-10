<?php

use App\Http\Controllers\ProfileController;

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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
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
