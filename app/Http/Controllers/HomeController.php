<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $articles = Article::published()->with('category')->latest()->get();
        return view('index', compact('articles'));
    }
    public function show($slug)
{
    $article = Article::where('slug', $slug)->firstOrFail();
     $comments = $article->comments()->where('is_approved', true)->latest()->get();
    return view('TezkorNews.blog-detail-01', compact('article', 'comments'));
}

}
