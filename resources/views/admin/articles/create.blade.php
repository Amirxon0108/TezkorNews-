@extends('admin.layouts.master')

@section('title', 'Yangi Maqola Yaratish')

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h5 class="m-0 font-weight-bold">Yangi maqola yaratish</h5>
            <a href="{{ route('admin.articles.index') }}" class="btn btn-light btn-sm">Orqaga</a>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.articles.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <!-- LEFT COLUMN -->
                    <div class="col-md-8">
                        <div class="mb-3">
                            <label class="form-label font-weight-bold">Maqola sarlavhasi</label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" required>
                            @error('title') <span class="text-danger small">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label font-weight-bold">Qisqa tavsif (Excerpt)</label>
                            <textarea name="excerpt" class="form-control" rows="3">{{ old('excerpt') }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label font-weight-bold">Maqola matni</label>
                            <textarea name="body" id="editor" class="form-control @error('body') is-invalid @enderror" rows="10">{{ old('body') }}</textarea>
                            @error('body') <span class="text-danger small">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <!-- RIGHT COLUMN -->
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label font-weight-bold">Kategoriya</label>
                            <select name="category_id" class="form-control" required>
                                <option value="">Tanlang...</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label font-weight-bold">Holati</label>
                            <select name="status" class="form-control">
                                <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Qoralama (Draft)</option>
                                <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>Chop etish (Publish)</option>
                            </select>
                        </div>

     <div class="mb-3">
    

    <input type="file" name="thumbnail" class="form-control" accept="image/*,video/*" onchange="previewMedia(event)">
</div>

                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="is_featured" name="is_featured" {{ old('is_featured') ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_featured" >Muhim maqola (Featured)</label>
                        </div>

                        <button type="submit" class="btn btn-success btn-block py-2 shadow">
                            <i class="fas fa-save"></i> Maqolani saqlash
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection


