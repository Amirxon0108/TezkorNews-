<?php

namespace App\Http\Controllers;

use App\Models\Media;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class MediaController extends Controller
{
    // Barcha yuklangan fayllarni ko'rish
    public function index()
    {
        $media = media::latest()->paginate(20);
        return view('admin.media.index', compact('media'));
    }

    // Fayl yuklash formasi
    public function create()
    {
          $categories = Category::all();
        return view('admin.media.create', compact('categories'));
    }

    // Faylni saqlash
   public function store(Request $request)
{
    $request->validate([
       'file' => 'required|file|mimes:jpg,jpeg,png,webp,mp4,mov,avi,wmv|max:20480',
    ]);

    if ($request->hasFile('file')) {
        $file = $request->file('file');
        
        $fileName = time() . '_' . $file->getClientOriginalName();
        $path = $file->storeAs('uploads/media', $fileName, 'public');

        // Ma'lumotni saqlash
        \App\Models\media::create([
            'user_id'   => auth()->id() ?? 1,
            'file_name' => $fileName,
            'file_path' => $path,
            'file_type' => $file->getClientMimeType(),
            'file_size' => $file->getSize(),
            // Yangi qo'shilgan qism:
            'file_ext'  => $file->getClientOriginalExtension(), // masalan: jpg
        ]);

        return redirect()->route('admin.media.index')->with('success', 'Fayl yuklandi!');
    }
}

    // Faylni o'chirish
    public function destroy(Media $medium) // Media model binding
    {
        // Serverdan (storage) o'chirish
        if (Storage::disk('public')->exists($medium->file_path)) {
            Storage::disk('public')->delete($medium->file_path);
        }

        // Bazadan o'chirish
        $medium->delete();

        return back()->with('success', 'Fayl o\'chirildi!');
    }
}