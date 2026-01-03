@extends('admin.layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Edit Article</h4>
                </div>
                <div class="card-body">
                    <!-- Form bu yerda -->
               

            <form action="{{ route('admin.articles.update', $article->id) }}"
                  method="POST"
                  enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Title -->
                <div class="mb-3">
                    <label for="title" class="form-label fw-bold">Maqola sarlavhasi</label>
                    <input type="text"
                           id="title"
                           name="title"
                           class="form-control"
                           value="{{ old('title', $article->title) }}"
                           required>
                </div>

                <!-- Category -->
                <div class="mb-3">
                    <label for="category" class="form-label fw-bold">Kategoriya</label>
                    <select id="category" name="category_id" class="form-select">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ old('category_id', $article->category_id) == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Excerpt -->
                <div class="mb-3">
                    <label for="excerpt" class="form-label fw-bold">Qisqa tavsif (Excerpt)</label>
                    <textarea id="excerpt"
                              name="excerpt"
                              class="form-control"
                              rows="3">{{ old('excerpt', $article->excerpt) }}</textarea>
                </div>

                <!-- Body -->
                <div class="mb-3">
                    <label for="editor" class="form-label fw-bold">Maqola matni</label>
                    <textarea id="editor"
                              name="body"
                              class="form-control"
                              rows="10">{{ old('body', $article->body) }}</textarea>
                </div>

                <!-- Thumbnail -->
                <div class="mb-3">
                    <label for="thumbnail" class="form-label fw-bold">Asosiy rasm (Thumbnail)</label><br>
                    @if($article->thumbnail)
                        <img src="{{ asset('storage/'.$article->thumbnail) }}"
                             width="150"
                             class="img-thumbnail mb-2" alt="Thumbnail">
                    @endif
                    <input type="file" id="thumbnail" name="thumbnail" class="form-control">
                </div>

                <!-- Status -->
                <div class="mb-4">
                    <label for="status" class="form-label fw-bold">Holati</label>
                    <select id="status" name="status" class="form-select">
                        <option value="draft"
                            {{ old('status', $article->status) == 'draft' ? 'selected' : '' }}>
                            Qoralama (Draft)
                        </option>
                        <option value="published"
                            {{ old('status', $article->status) == 'published' ? 'selected' : '' }}>
                            Chop etish (Publish)
                        </option>
                    </select>
                </div>

                <!-- Submit Button -->
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary btn-lg">Yangilash</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
@endsection
