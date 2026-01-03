@extends('admin.layouts.master')

@section('title', 'Yangi maqola yaratish')

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-primary text-white d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold">Yangi maqola yozish</h6>
            <a href="{{ route('admin.articles.index') }}" class="btn btn-sm btn-light">Orqaga</a>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.articles.store') }}" method="POST">
                @csrf

                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group mb-3">
                            <label class="font-weight-bold">Sarlavha (Title)</label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" required>
                            @error('title') <span class="text-danger small">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label class="font-weight-bold">Qisqa tavsif (Excerpt)</label>
                            <textarea name="excerpt" class="form-control" rows="3">{{ old('excerpt') }}</textarea>
                        </div>

                        <div class="form-group mb-3">
                            <label class="font-weight-bold">Maqola matni (Body)</label>
                            <textarea name="body" id="editor" class="form-control @error('body') is-invalid @enderror" rows="15">{{ old('body') }}</textarea>
                            @error('body') <span class="text-danger small">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group mb-3">
                            <label class="font-weight-bold">Kategoriya</label>
                            <select name="category_id" class="form-control" required>
                                <option value="">Tanlang...</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label class="font-weight-bold">Holati</label>
                            <select name="status" class="form-control">
                                <option value="draft">Qoralama (Draft)</option>
                                <option value="published">Chop etish (Publish)</option>
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label class="font-weight-bold d-block">Asosiy rasm (Thumbnail)</label>
                            <div id="preview_box" class="border text-center mb-2 bg-light rounded" style="height: 200px; display: flex; align-items: center; justify-content: center; overflow: hidden;">
                                <img id="selected_img" src="" class="img-fluid d-none" style="max-height: 100%;">
                                <span id="placeholder_text" class="text-muted small">Rasm tanlanmagan</span>
                            </div>
                            
                            <input type="hidden" name="thumbnail" id="thumbnail_path">
                            
                            <button type="button" class="btn btn-info btn-block btn-sm shadow-sm" data-bs-toggle="modal" data-bs-target="#mediaModal">
                                <i class="fas fa-images"></i> Kutubxonadan tanlash
                            </button>
                        </div>

                        <div class="form-group custom-control custom-checkbox">
                            <input type="checkbox" name="is_featured" class="custom-control-input" id="is_featured">
                            <label class="custom-control-label" for="is_featured">Muhim maqola (Featured)</label>
                        </div>

                        <hr>
                        <button type="submit" class="btn btn-success btn-block py-2 shadow">
                            <i class="fas fa-save"></i> MAQOLANI SAQLASH
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="mediaModal" tabindex="-1" aria-labelledby="mediaModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header bg-dark text-white">
                <h5 class="modal-title" id="mediaModalLabel">Media Kutubxonasi</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body bg-light">
                <div class="row">
                    @php $mediaFiles = \App\Models\Media::latest()->get(); @endphp
                    @forelse($mediaFiles as $media)
                        <div class="col-md-2 col-6 mb-3">
                            <div class="card h-100 shadow-sm media-card border-0" onclick="selectThisMedia('{{ $media->file_path }}')" style="cursor:pointer; transition: 0.2s;">
                                <div class="position-relative">
                                    @if(Str::contains($media->file_type, 'image'))
                                        <img src="{{ asset('storage/' . $media->file_path) }}" class="card-img-top rounded-top" style="height: 120px; object-fit: cover;">
                                    @else
                                        <div class="bg-secondary text-white d-flex align-items-center justify-content-center" style="height: 120px;">
                                            <i class="fas fa-video fa-2x"></i>
                                        </div>
                                    @endif
                                </div>
                                <div class="card-body p-2 text-center bg-white rounded-bottom">
                                    <small class="d-block text-truncate text-muted" style="font-size: 11px;">{{ $media->file_name }}</small>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12 text-center mt-5">
                            <p class="text-muted">Kutubxona bo'sh. Avval <a href="{{ route('media.create') }}">media yuklang</a>.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    // CKEditor-ni ishga tushirish
    if (document.getElementById('editor')) {
        CKEDITOR.replace('editor');
    }

    function selectThisMedia(path) {
        // 1. Yashirin inputga yo'lni yozish
        const input = document.getElementById('thumbnail_path');
        if (input) input.value = path;
        
        // 2. Preview-ni yangilash
        const img = document.getElementById('selected_img');
        const text = document.getElementById('placeholder_text');
        
        if (img && text) {
            img.src = '{{ asset("storage") }}/' + path;
            img.classList.remove('d-none');
            text.classList.add('d-none');
        }
        
        // 3. Modalni yopish (Bootstrap 5 usuli)
        const modalEl = document.getElementById('mediaModal');
        const modal = bootstrap.Modal.getInstance(modalEl) || new bootstrap.Modal(modalEl);
        modal.hide();
    }
</script>

<style>
    .media-card:hover { 
        transform: translateY(-5px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.2) !important;
        outline: 2px solid #4e73df;
    }
</style>
@endsection