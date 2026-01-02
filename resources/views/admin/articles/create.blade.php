@extends('admin.layouts.master')
@section('content')
<form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
        <label>Maqola sarlavhasi</label>
        <input type="text" name="title" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Kategoriya</label>
        <select name="category_id" class="form-control">
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Qisqa tavsif (Excerpt)</label>
        <textarea name="excerpt" class="form-control"></textarea>
    </div>

    <div class="mb-3">
        <label>Maqola matni</label>
        <textarea name="body" id="editor" class="form-control" rows="10"></textarea>
    </div>

    <div class="mb-3">
        <label>Asosiy rasm (Thumbnail)</label>
        <input type="file" name="thumbnail" class="form-control">
    </div>

    <div class="mb-3">
        <label>Holati</label>
        <select name="status" class="form-control">
            <option value="draft">Qoralama (Draft)</option>
            <option value="published">Chop etish (Publish)</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Saqlash</button>
</form>
@endsection