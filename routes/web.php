<?php

use App\Http\Controllers\Auth\WebController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReklamalarController;
use App\Http\Controllers\AdminController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/require __DIR__.'/auth.php';

// Web User Auth (Bularni guruhdan tashqariga yoki alohida nom bilan qo'ygan ma'qul)
// Foydalanuvchilar (WebUser) uchun
// Foydalanuvchilar (WebUser) uchun - FAQAT kirmaganlar kirishi mumkin
Route::middleware(['guest:web_user'])->group(function () {
    Route::get('/user-login', [WebController::class, 'showLogin'])->name('user.login');
    Route::post('/user-login', [WebController::class, 'user_login']); // Controllerdagi nomga e'tibor bering
    Route::get('/user-register', [WebController::class, 'showRegister'])->name('user.register');
    Route::post('/user-register', [WebController::class, 'user_register']);
});

// Logout faqat kirganlar uchun
Route::post('/user-logout', [WebController::class, 'user_logout'])->name('user.logout')->middleware('auth:web_user');
Route::name('site.')->group(function () {
    
   Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');

    // Batafsil ko'rish sahifasi (Slug bo'yicha)
    Route::get('/article/{slug}', [App\Http\Controllers\HomeController::class, 'show'])->name('article.show');  
    Route::post('/comment/store', [CommentsController::class, 'store'])->name('comment.store');


    Route::get('/moliya', [App\Http\Controllers\HomeController::class, 'moliya'])->name('moliya');
    Route::get('/talim', function () {  return view('TezkorNews.pages.talim'); })->name('talim');
    Route::get('/siyosat', function () { return view('TezkorNews.pages.siyosat'); })->name('siyosat');
    Route::get('/jahon', function () { return view('TezkorNews.pages.jahon'); })->name('jahon');
    Route::get('/jamiyat', function () { return view('TezkorNews.pages.jamiyat'); })->name('jamiyat');
    Route::get('/ozbekiston', function () { return view('TezkorNews.pages.ozbekiston'); })->name('ozbekiston');
    Route::get('/sport', function () { return view('TezkorNews.pages.sport'); })->name('sport');
    Route::get('/turizm', function () { return view('TezkorNews.pages.turizm'); })->name('turizm');
    Route::get('/biznes', function () { return view('TezkorNews.pages.biznes'); })->name('biznes');
  

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
    Route::get('/blog-detail-02', function() {return view('TezkorNews.blog-detail-02');})->name('blog-detail-02'); 
});


Route::prefix("dashboard")->name('admin.')->middleware(['auth:web', 'verified'])->group(function(){
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
    Route::patch('comments/{id}/approved', [CommentsController::class, 'approve'])->name('comments.approve');
    Route::resource('comments', CommentsController::class)->only(['index', 'destroy', 'show']);
    Route::resource('articles', ArticlesController::class); 
    Route::resource('media', MediaController::class);
    Route::resource('reklama', ReklamalarController::class);
    Route::get('/tables', [AdminController::class, 'showTables'])->name('tables');
    Route::get('/users', [AdminController::class, 'showUsers'])->name('users.Users');
    Route::get('/users/{id}/edit', [AdminController::class, 'editUser'])->name('user.edit');
    Route::put('/users/{id}', [AdminController::class, 'updateUser'])->name('user.update');
});
// ADMIN LOGIN
Route::get('/dashboard/login', function() {
    return view('admin.login');
})->name('admin.login');

Route::post('/dashboard/login', [\App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'store']);

// ADMIN LOGOUT
Route::post('/dashboard/logout', [\App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'destroy'])->name('admin.logout');


