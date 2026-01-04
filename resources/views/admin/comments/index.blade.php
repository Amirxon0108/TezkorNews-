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
                             <table class="table table-bordered shadow">
    <thead class="bg-primary text-white">
        <tr>
            <th>Ism</th>
            <th>Maqola</th>
            <th>Izoh</th>
            <th>Vaqti</th>
            <th>Status</th>
            <th>Amallar</th>
        </tr>
    </thead>
    <tbody>
        @foreach($comments as $comment)
        <tr>
            <td>{{ $comment->user_id }}</td>
            <td><a href="#">{{ $comment->article->title }}</a></td>
            <td>{{ Str::limit($comment->body, 50) }}</td>
            <td>{{ $comment->created_at->format('d.m.Y H:i') }}</td>
            <td>
                <span class="badge {{ $comment->is_approved ? 'badge-success' : 'badge-warning' }}">
                    {{ $comment->is_approved ? 'Tasdiqlangan' : 'Kutilmoqda' }}
                </span>
            </td>
            <td>
                @if(!$comment->is_approved)
                    <form action="{{ route('admin.comments.approve', $comment->id) }}" method="POST" class="d-inline">
                        @csrf @method('PATCH')
                        <button class="btn btn-sm btn-success">Tasdiqlash</button>
                    </form>
                @endif
                <form action="{{ route('admin.comments.destroy', $comment->id) }}" method="POST" class="d-inline">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-danger">O'chirish</button>
                </form>
                <a href="{{route('admin.comments.show', $comment->id)}}" class="btn btn-sm btn-info">Ko'rish</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            @endsection