<?php

use App\Http\Controller\HomeController;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReklamalarController;

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

// Asosiy sahifalar guruhi
Route::name('site.')->group(function () {
    
  Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');

    // Batafsil ko'rish sahifasi (Slug bo'yicha)
    Route::get('/article/{slug}', [App\Http\Controllers\HomeController::class, 'show'])->name('article.show');
    Route::get('/news', function () { 
        return view('TezkorNews.news'); 
    })->name('news');
    Route::post('/comment/store', [CommentsController::class, 'store'])
    ->name('comment.store');

    Route::get('/entertainment', function () { 
        return view('TezkorNews.entertainment'); 
    })->name('entertainment');

    Route::get('/business', function () { 
        return view('TezkorNews.news'); 
    })->name('business');

    Route::get('/travel', function () { 
        return view('TezkorNews.news'); 
    })->name('travel');

    Route::get('/lifestyle', function () { 
        return view('TezkorNews.news'); 
    })->name('lifestyle');

    Route::get('/video', function () { 
        return view('TezkorNews.news'); 
    })->name('video');

    
    Route::get('/about', function () { 
        return view('TezkorNews.about'); 
    })->name('about');
    Route::get('/contact', function() {
        return view('TezkorNews.contact');
    })->name('contact');
    Route::get('/blog-grid', function() {
        return view('TezkorNews.blog-grid');
    })->name('blog-grid');
    Route::get('/blog-list-01', function() {
        return view('TezkorNews.blog-list-01');
    })->name('blog-list-01');
    Route::get('/blog-list-02', function() {
        return view('TezkorNews.blog-list-02');
    })->name('blog-list-02');
    Route::get('/blog-detail-01', function() {      
        return view('TezkorNews.blog-detail-01');
    })->name('blog-detail-01');
    Route::get('/blog-detail-02', function() {      
        return view('TezkorNews.blog-detail-02');
    })->name('blog-detail-02'); 
});


Route::prefix("dashboard")->name('admin.')->middleware('auth')->group(function(){
   Route::get('/', function() { return view('admin.index'); })->name('index');
    Route::get('/charts', function() { return view('admin.charts'); })->name('charts');
    Route::get('/404', function() { return view('admin.404'); })->name('404');
    Route::get('/login', function() {return view('admin.login');})->name('login');
    Route::get('/blank', function() {return view('admin.blank');})->name('blank');
    
    
        Route::get('/tables', function() {return view('admin.tables');})->name('tables');
    Route::get('/register', function() { return view('admin.register');})->name('register');
    Route::get('/forgot-password', function() { return view('admin.forgot-password');})->name('forgot-password');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('products', ProductsController::class);
    Route::patch('comments/{id}/approved', [CommentsController::class, 'approve'])->name('comments.approve');

Route::resource('comments', CommentsController::class)->only(['index', 'destroy', 'show', 'store']);
Route::resource('articles', ArticlesController::class); 
Route::resource('media', MediaController::class);
Route::resource('reklama', ReklamalarController::class);
});

require __DIR__.'/auth.php';
