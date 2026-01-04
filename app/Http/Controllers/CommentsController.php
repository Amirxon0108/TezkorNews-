<?php

namespace App\Http\Controllers;

use App\Models\Comment; // To'g'ri model nomi
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    /**
     * Admin panelda barcha izohlarni ko'rish
     */
    public function index()
    {
        // Model nomi Comment bo'lishi kerak
        $comments = Comment::with('article')->latest()->get();
        return view('admin.comments.index', compact('comments'));
    }

    /**
     * Foydalanuvchi tomondan izoh qoldirish
     */
    public function store(Request $request)
    {
        $request->validate([
            
        'article_id' => 'required|exists:articles,id',
            'user_name' => 'required|max:100',
            'body' => 'required|max:1000',
        ]);

        Comment::create([
            'user_id' => auth()->id() ?? null,
            'article_id' => $request->article_id,
            'user_name' => $request->user_name,
            'body' => $request->body,
            'is_active' => false, 
        ]);

        return back()->with('success', 'Izoh yuborildi. Admin tasdiqlaganidan so\'ng ko\'rinadi.');
    }

    /**
     * Admin izohni tasdiqlashi uchun (Maxsus metod)
     */
    public function approve($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->update(['is_approved' => true]);
        
        return back()->with('success', 'Izoh saytda ko\'rinadigan bo\'ldi.');
    }
    public function show($id)
    {
        $comment = Comment::findOrFail($id);
        return view('admin.comments.show', compact('comment'));
    }


    /**
     * Izohni o'chirish
     */
    public function destroy($id) // ID orqali o'chirish osonroq
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();
        
        return back()->with('success', 'Izoh o\'chirildi.');
    }
}