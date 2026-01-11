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
    $moliya = Article::with(['category','author'])->where('category_id', 7)->latest()->paginate(15);
    $mostPopular = Article::orderBy('views_count', 'desc')->take(5)->get();
    return view('TezkorNews.pages.moliya', compact('moliya',  'mostPopular'));
}

    
    public function siyosat(){
    $siyosat =Article::with('category', 'author')->where('category_id', 3)->latest()->paginate(15);
    $mostPopular = Article::orderBy('views_count', 'desc')->take(5)->get();
     return view('TezkorNews.pages.siyosat' , compact('siyosat', 'mostPopular'));
 }

    
    public function talim(){
    $talim = Article::with('category', 'author')->where('category_id', 6)->latest()->paginate(15);
    $mostPopular = Article::orderBy('views_count', 'desc')->take(5)->get();
     return view('TezkorNews.pages.talim' , compact('talim', 'mostPopular'));
 }
    
    public function jahon(){
    $jahon = Article::with('category', 'author')->where('category_id', 4)->latest()->paginate(15);
    $mostPopular = Article::orderBy('views_count', 'desc')->take(5)->get();
     return view('TezkorNews.pages.jahon' , compact('jahon', 'mostPopular'));
 }
   
 
    public function jamiyat(){
        $jamiyat = Article::with('category', 'author')->where('category_id', 5)->latest()->paginate(15);
        $mostPopular = Article::orderBy('views_count', 'desc')->take(5)->get();
        return view('TezkorNews.pages.jamiyat' , compact('jamiyat', 'mostPopular'));
    }


    public function ozbekiston(){
        $ozbekiston = Article::with('category', 'author')->where('category_id', 8)->latest()->paginate(15);
        $mostPopular = Article::orderBy('views_count', 'desc')->take(5)->get();
        return view('TezkorNews.pages.ozbekiston' , compact('ozbekiston', 'mostPopular'));
    }
   
   
    public function sport(){
        $sport = Article::with('category', 'author')->where('category_id', 9)->latest()->paginate(15);
        $mostPopular = Article::orderBy('views_count', 'desc')->take(5)->get();
        return view('TezkorNews.pages.sport' , compact('sport', 'mostPopular'));
    }
    
    
    public function turizm(){
        $turizm = Article::with('category', 'author')->where('category_id', 10)->latest()->paginate(15);
        $mostPopular = Article::orderBy('views_count', 'desc')->take(5)->get();
        return view('TezkorNews.pages.turizm' , compact('turizm', 'mostPopular'));
    }


    public function biznes(){
        $biznes = Article::with('category', 'author')->where('category_id', 11)->latest()->paginate(15);
        $mostPopular = Article::orderBy('views_count', 'desc')->take(5)->get();
        return view('TezkorNews.pages.biznes' , compact('biznes', 'mostPopular'));
    }

    
    public function show($slug)
{
    $article = Article::where('slug', $slug)->firstOrFail();
    $article->increment('views_count');
     $comments = $article->comments()->where('is_approved', true)->latest()->get();
    return view('TezkorNews.blog-detail-01', compact('article', 'comments'));
}

}
