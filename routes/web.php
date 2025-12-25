<?php

use App\Http\Controllers\ProfileController;
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
    return view('index');
});


Route::prefix("dashboard")->name('admin.')->middleware('auth')->group(function(){
   Route::get('/', function() { return view('admin.index'); })->name('index');
    Route::get('/charts', function() { return view('admin.charts'); })->name('charts');
    Route::get('/404', function() { return view('admin.404'); })->name('404');
    Route::get('/login', function() {return view('admin.login');})->name('login');
    Route::get('/blank', function() {return view('admin.blank');})->name('blank');
    Route::get('/register', function() { return view('admin.register');})->name('register');
    Route::get('/forgot-password', function() { return view('admin.forgot-password');})->name('forgot-password');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('products', ProductsController::class);
    Route::resource('ads', AdsController::class);
});

require __DIR__.'/auth.php';
