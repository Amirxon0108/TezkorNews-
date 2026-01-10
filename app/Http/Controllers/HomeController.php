<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $articles = Article::with(['category', 'author'])->latest()->take(10)->get();
      $siyosat = Article::with(['category', 'author'])->where('category_id', 3)->latest()->take(5)->get();
      $talim = Article::with(['category', 'author'])->where('category_id', 6)->latest()->take(4)->get();
      $moliya = Article::with(['category','author'])->where('category_id', 7)->latest()->take(4)->get();

      $mostPopular = Article::orderBy('views_count', 'desc')->take(5)->get();
        return view('index', compact('articles', 'siyosat','talim','moliya', 'mostPopular'));
    }
    public function moliya()
{
    $moliya = Article::with(['category','author'])
        ->where('category_id', 7)
        ->latest()
        ->take(5)
        ->get();
    $moliyaForeach = Article::with(['category','author'])
        ->where('category_id', 7)
        ->latest()
        ->take(10)->skip(5) // Birinchi 5 tasini o'tkazib yuboradi
        ->get();
    $mostPopular = Article::orderBy('views_count', 'desc')->take(5)->get();
    return view('TezkorNews.pages.moliya', compact('moliya', 'moliyaForeach', 'mostPopular'));
}
    public function show($slug)
{
    $article = Article::where('slug', $slug)->firstOrFail();
    $article->increment('views_count');
     $comments = $article->comments()->where('is_approved', true)->latest()->get();
    return view('TezkorNews.blog-detail-01', compact('article', 'comments'));
}

}
