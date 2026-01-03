<?php

namespace App\Http\Controllers;
use App\Models\Reklama;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class ReklamalarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reklamalar = Reklama::all();
        return view('admin.reklama.index', compact('reklamalar'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.reklama.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $request->validate([
        'title' => 'required|max:255',
        'image_path' =>'required|file|mimes:jpg,jpeg,png,webp,mp4,mov,avi,wmv|max:20480',
        'link_url' => 'nullable|url',
        'position' => 'required|string',
        'is_active' => 'boolean',
        'sort_order' => 'integer'
       ]);

       $path = null;
       if($request->hasfile('image_path')){
        $path = $request->file('image_path')->store('reklamalar', 'public');
       }

       Reklama::create([
        'title' => $request->title,
        'image_path' => $path,
        'link_url' => $request->link_url,
        'position' => $request->position,
        'is_active' => $request->is_active ?? 1,
        'sort_order' => $request->sort_order
       ]);
         return redirect()->route('admin.reklama.index')->with('success', 'Reklama muvaffaqiyatli yaratildi.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Reklama $reklama)
    {
        return view('admin.reklama.show', compact('reklama'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reklama $reklama)
    {
        return view('admin.reklama.edit', compact('reklama'));
    }

    /**
     * Update the specified resource in storage.
     */
 public function update(Request $request, string $id)
{
    $request->validate([
        'title' => 'required|max:255',
        'image_path' => 'nullable|file|mimes:jpg,jpeg,png,webp,mp4,mov,avi,wmv|max:20480',
        'link_url' => 'nullable|url',
        'position' => 'required|string',
        'is_active' => 'required|boolean',
        'sort_order' => 'nullable|integer',
    ]);

    $reklama = Reklama::findOrFail($id);

    if ($request->hasFile('image_path')) {
        if ($reklama->image_path) {
            Storage::disk('public')->delete($reklama->image_path);
        }
        $reklama->image_path = $request->file('image_path')->store('reklamalar', 'public');
    }

    $reklama->title = $request->title;
    $reklama->link_url = $request->link_url;
    $reklama->position = $request->position;
    $reklama->is_active = $request->is_active;
    $reklama->sort_order = $request->sort_order ?? 0;

    $reklama->save(); // 🔥 MUHIM

    return redirect()
        ->route('admin.reklama.index')
        ->with('success', 'Reklama muvaffaqiyatli yangilandi.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reklama $reklama)
    {
        if($reklama->image_path){
            Storage::disk('public')->delete($reklama->image_path);
        }
        $reklama->delete();
        return redirect()->route('admin.reklama.index')->with('success', 'Reklama o\'chirildi.');
    }
}
