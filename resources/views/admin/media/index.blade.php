@extends('admin.layouts.master')
@section('title', 'Tables')
@section('content')
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
                    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                        For more information about DataTables, please visit the <a target="_blank"
                            href="https://datatables.net">official DataTables documentation</a>.</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                              
<div class="container-fluid">
    <div class="d-flex justify-content-between mb-4">
        <h3>Media Kutubxonasi</h3>
        <a href="{{ route('admin.media.create') }}" class="btn btn-primary">Yangi yuklash</a>
    </div>

    <div class="row">
       @foreach($media as $item)
    <div class="col-md-2 mb-4">
        <div class="card shadow-sm">
            {{-- Agar fayl rasm bo'lsa --}}
            @if(Str::contains($item->file_type, 'image'))
                <img src="{{ asset('storage/' . $item->file_path) }}" class="card-img-top" style="height: 150px; object-fit: cover;">
            {{-- Agar fayl video bo'lsa --}}
            @elseif(Str::contains($item->file_type, 'video'))
                <video src="{{ asset('storage/' . $item->file_path) }}" class="card-img-top" style="height: 150px; object-fit: cover;" muted></video>
                <div class="position-absolute top-0 start-0 m-1">
                    <span class="badge bg-dark">VIDEO</span>
                </div>
            @endif
            
            <div class="card-body p-2 text-center">
                <small class="d-block mb-2 text-truncate">{{ $item->file_name }}</small>
                <form action="{{ route('admin.media.destroy', $item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger w-100" onclick="return confirm('O\'chirilsinmi?')">O'chirish</button>
                        </form>
                </div>
        </div>
    </div>
@endforeach
    </div>
    {{ $media->links() }}
</div>

                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            @endsection