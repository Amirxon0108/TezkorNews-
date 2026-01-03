@extends('admin.layouts.master')

@section('title', 'Yangi reklama yaratish')

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-dark text-white d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold">Yangi reklama banneri</h6>
            <a href="{{ route('admin.reklama.index') }}" class="btn btn-sm btn-light">Barcha reklamalar</a>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.reklama.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-md-7">
                        <div class="form-group mb-3">
                            <label class="font-weight-bold">Reklama sarlavhasi / Nomi</label>
                            <input type="text" name="title" class="form-control" placeholder="Masalan: Yangi yil chegirmasi" required>
                        </div>

                        <div class="form-group mb-3">
                            <label class="font-weight-bold">Yo'naltiruvchi havola (Link URL)</label>
                            <input type="url" name="link_url" class="form-control" placeholder="https://t.me/kanalingiz yoki sayt manzili" required>
                        </div>

                        <div class="form-group mb-3">
                            <label class="font-weight-bold">Reklama joylashuvi</label>
                            <select name="position" class="form-control">
                                <option value="top_banner">Yuqori banner (Header)</option>
                                <option value="sidebar">Yon panel (Sidebar)</option>
                                <option value="in_article">Maqola ichida</option>
                                <option value="popup">Qalqib chiquvchi (Popup)</option>
                            </select>
                        </div>
                    </div>
                
                    <div class="col-md-5">
                        <div class="form-group mb-3">
                            <label class="font-weight-bold d-block">Reklama banneri (Rasm)</label>
                            <div id="ad_preview_box" class="border text-center mb-2 bg-light rounded d-flex align-items-center justify-content-center" style="height: 250px; overflow: hidden;">
                                <img id="selected_ad_img" src="" class="img-fluid d-none" style="max-height: 100%;">
                                <span id="ad_placeholder" class="text-muted">Banner tanlanmagan</span>
                            </div>
                            
                            
                            
                            
                        </div>
                        <label for="rekj">Rasm</label>
                        <input type="file" name="image_path" class="form-control-file" accept="image/*,video/*" id="rekj" required>
                        
                            <div class="mb-3">
    <label>Tartib (Sort Order)</label>
    <input type="number" name="sort_order" class="form-control" value="0">
</div>
                        <div class="form-group mb-3">
                            <label class="font-weight-bold text-success">Holati</label>
                            <select name="is_active" class="form-control">
                                <option value="1">Aktiv (Ko'rinadi)</option>
                                <option value="0">Noaktiv (To'xtatilgan)</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-success btn-lg btn-block mt-4">
                            <i class="fas fa-check-circle"></i> REKLAMANI JOYLASH
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>



@endsection

@section('scripts')
<script>
    function selectThisMedia(path) {
        document.getElementById('ad_image_input').value = path;
        
        const img = document.getElementById('selected_ad_img');
        const text = document.getElementById('ad_placeholder');
        
        img.src = '{{ asset("storage") }}/' + path;
        img.classList.remove('d-none');
        text.classList.add('d-none');
        
        const modalEl = document.getElementById('mediaModal');
        const modal = bootstrap.Modal.getInstance(modalEl) || new bootstrap.Modal(modalEl);
        modal.hide();
    }
</script>
@endsection