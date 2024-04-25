<?php

use App\Http\Controllers\BesteldController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KoffieproductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\WinkelmandController;

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


// Route::get('/', [ShopController::class, 'index']);
Route::get('/', [ShopController::class, 'index']);

Route::post("/addcart", [CartController::class, 'add']);
Route::get("/addcart", [CartController::class, 'add']);
Route::get("/deletecart", [CartController::class, 'delete']);

Route::get("/winkelmand", [WinkelmandController::class, 'index']);

Route::post('contact', [ContactController::class, 'store'])->name('contact.store');

Route::get('/koffieproduct', [KoffieproductController::class, 'index']);


Route::get('/besteld', [BesteldController::class, 'index'])->name('besteld.form');

Route::get('/contact', [ContactController::class, 'showForm'])->name('contact.form');
Route::post('/submit', [ContactController::class, 'submit'])->name('contact.submit');

Route::get('/Shop', [ShopController::class, 'index']);

Route::post('/toggle_gram', 'ProductController@toggleGram')->name('toggle_gram');
Route::get('/Home', [HomeController::class, 'index']);



require __DIR__ . '/auth.php';
