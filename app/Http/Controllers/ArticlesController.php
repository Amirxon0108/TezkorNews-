<?php

namespace App\Http\Controllers;

use App\Models\articles;
use Illuminate\Http\Request;
use Illuminate\Support\Str; // Slug yasash uchun
use Illuminate\Support\Facades\Storage; // Rasmni saqlash uchun
use App\Models\Category; // Kategoriya modeli
class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = articles::with('category')->where('status', 'published')->orderBy('published_at', 'desc')->paginate(10);
        return view('admin.article', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.articles.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
  public function store(Request $request)
{
    // 1. Ma'lumotlarni tekshirish (Validation)
    $request->validate([
        'title' => 'required|max:255',
        'category_id' => 'required|exists:categories,id',
        'body' => 'required',
        'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048', // max 2MB
        'status' => 'required|in:draft,published',
    ]);

    // 2. Rasmni yuklash (Agar rasm tanlangan bo'lsa)
    $path = null;
    if ($request->hasFile('thumbnail')) {
        $path = $request->file('thumbnail')->store('articles', 'public');
    }

    // 3. Ma'lumotlarni bazaga saqlash
    articles::create([
        'category_id' => $request->category_id,
        'author_id' => auth()->id() ?? 1, // Agar auth bo'lsa ID-si, yo'qsa 1
        'title' => $request->title,
        'slug' => Str::slug($request->title), // "Salom Dunyo" -> "salom-dunyo"
        'excerpt' => $request->excerpt,
        'body' => $request->body,
        'thumbnail' => $path,
        'status' => $request->status,
        'is_featured' => $request->has('is_featured'), // checkbox bo'lsa true/false
        'published_at' => $request->status == 'published' ? now() : null,
    ]);

    // 4. Orqaga qaytarish
    return redirect()->route('articles.index')->with('success', 'Maqola muvaffaqiyatli qo\'shildi!');
}
    /**
     * Display the specified resource.
     */
  public function show($id)
{
    // Maqolani slug orqali qidiramiz va uning kategoriyasini ham qo'shib olamiz
    $article = articles::findOrFail($id);
    
    // Maqola ko'rilgan sayin sanoqni 1 taga oshiramiz
    $article->increment('views_count');

    return view('admin.articles.show', compact('article'));
}
    /**
     * Show the form for editing the specified resource.
     */
 public function edit(articles $article)  // singular va katta harf
{
    $categories = Category::all();
    return view('admin.articles.edit', compact('article', 'categories'));
}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, articles $article)
    {
        $request->validate([
            'title' => 'required|max:255',
            'category_id' => 'required|exists:categories,id',
            'body' => 'required',
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048', // max 2MB
            'status' => 'required|in:draft,published',
        ]);
        $data = $request->all();

        if($request->hasFile('thumbnail')){
            if($article->thumbnail){
                Storage::disk('public')->delete($article->thumbnail);
            }
            $data['thumbnail'] = $request->file('thumbnail')->store('articles', 'public');
        }
        $data['slug'] = Str::slug($request->title) . '-' . $article->id;
    
    // 5. Checkbox (is_featured) qiymatini tekshirish
    $data['is_featured'] = $request->has('is_featured');

    // 6. Bazada yangilash
    $article->update($data);

    return redirect()->route('articles.index')->with('success', 'Maqola muvaffaqiyatli yangilandi!');}  

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(articles $article)
    {
        if($article->thumbnail){
            Storage::disk('public')->delete($article->thumbnail);

            $article->delete();
            return redirect()->route('admin.article')->with('success', 'Maqola muvaffaqiyatli o\'chirildi!');
        }
        }
    }
