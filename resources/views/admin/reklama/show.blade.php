@extends('admin.layouts.master')

@section('content')
<div class="container my-5">
    <div class="card shadow-sm">
        <div class="card-header text-center bg-primary text-white">
            <h3>Reklama tafsilotlari</h3>
        </div>

        <div class="card-body">

            <!-- Title -->
            <div class="mb-3 row">
                <label class="col-sm-3 fw-bold">Sarlavha:</label>
                <div class="col-sm-9">
                    {{ $reklama->title }}
                </div>
            </div>

            <!-- URL -->
            <div class="mb-3 row">
                <label class="col-sm-3 fw-bold">Havola:</label>
                <div class="col-sm-9">
                    <a href="{{ $reklama->link_url }}" target="_blank">
                        {{ $reklama->link_url }}
                    </a>
                </div>
            </div>

            <!-- Position -->
            <div class="mb-3 row">
                <label class="col-sm-3 fw-bold">Joylashuvi:</label>
                <div class="col-sm-9">
                    <span class="badge bg-info">{{ $reklama->position }}</span>
                </div>
            </div>

            <!-- Status -->
            <div class="mb-3 row">
                <label class="col-sm-3 fw-bold">Holati:</label>
                <div class="col-sm-9">
                    @if($reklama->is_active)
                        <span class="badge bg-success">Aktiv</span>
                    @else
                        <span class="badge bg-secondary">Noaktiv</span>
                    @endif
                </div>
            </div>

            <!-- Media -->
            <div class="mb-3 row">
                <label class="col-sm-3 fw-bold">Media:</label>
                <div class="col-sm-9">

                    @if($reklama->image_path)

                        @php
                            $ext = pathinfo($reklama->image_path, PATHINFO_EXTENSION);
                        @endphp

                        @if(in_array($ext, ['mp4','mov','avi','wmv']))
                            <video controls class="w-100 rounded shadow">
                                <source src="{{ asset('storage/'.$reklama->image_path) }}">
                            </video>
                        @else
                            <img src="{{ asset('storage/'.$reklama->image_path) }}"
                                 class="img-fluid rounded shadow">
                        @endif

                    @else
                        <p class="text-muted">Media mavjud emas</p>
                    @endif

                </div>
            </div>

        </div>
    </div>
</div>
@endsection
