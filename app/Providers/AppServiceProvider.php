<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Category;
use App\Models\Article;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
     View::composer('TezkorNews.layouts.header', function($view){
        $categories = category::all();
       
         $categories->each(function($category){
        $category->setRelation('articles',
        $category->articles()->latest()->take(4)->get()
        );
     });
      $view->with('header_categories', $categories);
     });
        View::share('categories', Category::all());
        View::share('popularArticles', Article::orderBy('views_count', 'desc')->take(3)->get());
    }
}
