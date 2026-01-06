<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 

class CommentsController extends Controller
{
    
    public function index()
    {
        $comments = Comment::with('article', 'webUser')->latest()->get(); // 'user' bog'lanishini ham qo'shdik
        return view('admin.comments.index', compact('comments'));
    }

    public function store(Request $request)
    {

        if (!Auth::guard('web_user')->check()) {
            return back()->with('error', 'Izoh qoldirish uchun tizimga kiring yoki ro\'yxatdan oting.');
        }

        
        $request->validate([
            'article_id' => 'required|exists:articles,id',
            'body'       => 'required|string|max:1000',
            'parent_id'  => 'nullable|exists:comments,id',
        ]);

     
        Comment::create([
            'article_id' => $request->article_id,
            'web_user_id'    => Auth::guard('web_user')->id(), // WebUser ID sini olamiz
            'parent_id'  => $request->parent_id,
            'body'       => $request->body,
            'is_approved'=> false, // Admin tasdiqlashi uchun
        ]);

        return back()->with('success', 'Izoh yuborildi. Admin tasdiqlaganidan so\'ng ko\'rinadi.');
    }

    
    public function approve($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->update(['is_approved' => true]);
        return back()->with('success', 'Izoh saytda ko\'rinadigan bo\'ldi.');
    }

    public function show($id)
    {
        $comment = Comment::with('article', 'webUser')->findOrFail($id);
        return view('admin.comments.show', compact('comment'));
    }

    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();
        return back()->with('success', 'Izoh o\'chirildi.');
    }
}