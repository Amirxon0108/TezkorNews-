@extends('admin.layouts.master')

@section('title', 'Reklamani tahrirlash')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Reklamani tahrirlash</h4>
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.reklama.update', $reklama->id) }}"
                          method="POST"
                          enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Title -->
                        <div class="mb-3">
                            <label class="form-label fw-bold">Reklama nomi</label>
                            <input type="text"
                                   name="title"
                                   class="form-control"
                                   value="{{ old('title', $reklama->title) }}"
                                   required>
                        </div>

                        <!-- Link URL -->
                        <div class="mb-3">
                            <label class="form-label fw-bold">Yo‘naltiruvchi link</label>
                            <input type="url"
                                   name="link_url"
                                   class="form-control"
                                   value="{{ old('link_url', $reklama->link_url) }}">
                        </div>

                        <!-- Position -->
                        <div class="mb-3">
                            <label class="form-label fw-bold">Joylashuvi</label>
                            <select name="position" class="form-select">
                                <option value="top_banner" {{ $reklama->position == 'top_banner' ? 'selected' : '' }}>Top Banner</option>
                                <option value="sidebar" {{ $reklama->position == 'sidebar' ? 'selected' : '' }}>Sidebar</option>
                                <option value="in_article" {{ $reklama->position == 'in_article' ? 'selected' : '' }}>Article ichida</option>
                                <option value="popup" {{ $reklama->position == 'popup' ? 'selected' : '' }}>Popup</option>
                            </select>
                        </div>

                        <!-- Sort Order -->
                        <div class="mb-3">
                            <label class="form-label fw-bold">Tartib (Sort Order)</label>
                            <input type="number"
                                   name="sort_order"
                                   class="form-control"
                                   value="{{ old('sort_order', $reklama->sort_order) }}">
                        </div>

                        <!-- Image -->
                        <div class="mb-3">
                            <label class="form-label fw-bold">Banner (Rasm / Video)</label><br>

                            @if($reklama->image_path)
                                <div class="mb-2">
                                    <img src="{{ asset('storage/'.$reklama->image_path) }}"
                                         class="img-thumbnail"
                                         width="200">
                                </div>
                            @endif

                            <input type="file"
                                   name="image_path"
                                   class="form-control"
                                   accept="image/*,video/*">
                        </div>

                        <!-- Active -->
                        <div class="mb-4">
                            <label class="form-label fw-bold">Holati</label>
                            <select name="is_active" class="form-select">
                                <option value="1" {{ $reklama->is_active ? 'selected' : '' }}>Aktiv</option>
                                <option value="0" {{ !$reklama->is_active ? 'selected' : '' }}>Noaktiv</option>
                            </select>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-success btn-lg">
                                Yangilash
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
