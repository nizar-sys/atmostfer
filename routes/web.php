<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\DataTableController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\MerkController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RouteController;

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

# ------ Unauthenticated routes ------ #
Route::name('landing.')->group(function(){
    Route::get('/', [LandingController::class, 'index'])->name('home');
    Route::get('/shop', [LandingController::class, 'shop'])->name('shop');
});
require __DIR__.'/auth.php';


# ------ Authenticated routes ------ #
Route::middleware('auth')->prefix('dashboard')->group(function() {
    Route::get('/', [RouteController::class, 'dashboard'])->name('home'); # dashboard

    Route::prefix('profile')->group(function(){
        Route::get('/', [ProfileController::class, 'myProfile'])->name('profile');
        Route::put('/change-ava', [ProfileController::class, 'changeFotoProfile'])->name('change-ava');
        Route::put('/change-profile', [ProfileController::class, 'changeProfile'])->name('change-profile');
    }); # profile group

    Route::get('/datatable/users', [UserController::class, 'userDataTable'])->name('users.datatables');
    Route::resource('users', UserController::class);
    Route::resource('merks', MerkController::class);

    Route::prefix('products')->group(function(){
        Route::get('/products/{product}/add-photos', [ProductController::class, 'addPhotos'])->name('products.add-photos');
        Route::post('/products/{product}/add-photos', [ProductController::class, 'storePhotos'])->name('products.store-photos');
    }); # products group
    Route::resource('products', ProductController::class);
});


# ------ DataTables (APIs) routes ------ #
Route::prefix('api')->name('datatable.')->group(function(){
    Route::get('/users', [DataTableController::class, 'getUsers'])->name('users');
    Route::get('/merks', [DataTableController::class, 'getMerks'])->name('merks');
    Route::get('/products', [DataTableController::class, 'getProducts'])->name('products');
});