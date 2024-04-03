<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\ContactpaginaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Products;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ShowController;
use App\Http\Controllers\testcontactController;
use Illuminate\Support\Facades\Mail;

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



Route::get('/', [ProductController::class, 'index']);
Route::get('/',[ProductController::class, 'index'], function () {
    return view('welcome',);
});

     
//Mail::to('bilal.essalhi2004@gmail.com')->send(testmail());

//Route::get('/contact', [ContactController::class, 'index'], function(){
//    return view('contact');
//

//Route::get('/contactpagina', [contactpaginaController::class, 'showForm'])->name('contact.form');
//Route::post('/contactpagina', [contactpaginaController::class, 'submitForm'])->name('contact.submit');

Route::get('/contactpagina', [contactpaginaController::class, 'index'], function(){
    return view('/contactpagina');
});

Route::get('/Shop', [ShopController::class, 'index'], function(){
    return view('/Shop');
});

//Route::get('/testcontact', [testcontactController::class, 'show'])->name('testcontact.show');
//Route::post('/testcontact', [testcontactController::class, 'submit'])->name('testcontact.submit');

Route::get('/Home', [HomeController::class, 'index'], function(){
    return view('Home');
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

