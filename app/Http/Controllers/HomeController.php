<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Models\category;

class HomeController extends Controller
{
   public function index()
    {
        return view('index', [
            'articles'    => Article::with(['category', 'author'])->latest()->take(12)->get(),
            'ozbekison'   => Article::with('category')->where('category_id', 1)->latest()->take(4)->get(),
            'jahon'       => Article::with('category')->where('category_id', 2)->latest()->take(4)->get(),
            'siyosat'     => Article::with('category')->where('category_id', 3)->latest()->take(4)->get(),
            'sport'       => Article::with('category')->where('category_id', 4)->latest()->take(4)->get(),
            'jamiyat'     => Article::with('category')->where('category_id', 5)->latest()->take(4)->get(),
            'talim'       => Article::with('category')->where('category_id', 6)->latest()->take(4)->get(),
            'moliya'      => Article::with('category')->where('category_id', 7)->latest()->take(4)->get(),
            'turizm'      => Article::with('category')->where('category_id', 8)->latest()->take(4)->get(),
            'biznes'      => Article::with('category')->where('category_id', 9)->latest()->take(4)->get(),
            'mostPopular' => Article::orderBy('views_count', 'desc')->take(5)->get(),
        ]);
    }
    
   public function categoryPage($slug)
    {
        // Slug orqali kategoriyani topamiz (masalan: 'moliya')
        $category = category::where('slug', $slug)->firstOrFail();
        
        // Shu kategoriyaga tegishli maqolalar
        $articles = Article::with(['category', 'author'])
            ->where('category_id', $category->id)
            ->latest()
            ->paginate(15);

        // Yon panel uchun mashhur maqolalar
        $mostPopular = Article::orderBy('views_count', 'desc')->take(5)->get();

        return view('TezkorNews.pages.category_show', compact('articles', 'category', 'mostPopular'));
    }

    
    public function show($slug)
    {
        $article = Article::with(['category', 'author', 'comments'])->where('slug', $slug)->firstOrFail();
        
        // Ko'rishlar sonini oshirish
        $article->increment('views_count');
        
        $comments = $article->comments()->where('is_approved', true)->latest()->get();
        $mostPopular = Article::orderBy('views_count', 'desc')->take(5)->get();

        return view('TezkorNews.blog-detail-01', compact('article', 'comments', 'mostPopular'));
    }



//Header return view('TezkorNews.layouts.header', compact('moliya'));

 

}
