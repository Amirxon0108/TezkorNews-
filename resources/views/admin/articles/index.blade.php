@extends('admin.layouts.master')
@section('title', 'Articles Table')
@section('content')
<div class="container-fluid">

 @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    
    @endif
    <!-- Page Heading -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 text-gray-800">Articles</h1>
            
            <p class="mb-0 text-muted">Manage all your articles from the table below. 
            For more info about DataTables, visit <a href="https://textopia.42web.io" target="_blank">Textopia</a>.</p>
        </div>
        <a href="{{ route('admin.articles.create') }}" class="btn btn-success btn-sm">+ Add Article</a>
   
    </div>
   
    <!-- DataTables Example -->
    <div class="card shadow-sm mb-4">
        <div class="card-header py-3 bg-primary">
            <h6 class="m-0 font-weight-bold text-white">Articles List</h6>
            
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead class="table-light">
                        <tr>
                            <th>Title</th>
                            <th>Image</th>
                            <th>Excerpt</th>
                            <th>Status</th>
                            <th>Category</th>
                            <th>Body</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tfoot class="table-light">
                        <tr>
                            <th>Title</th>
                            <th>Image</th>
                            <th>Excerpt</th>
                            <th>Status</th>
                            <th> Category</th>
                            <th>Body</th>
                            <th>Actions</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($articles as $article)
                        <tr>
                            <td>{{ $article->title }}</td>
                            <td>
                                @if($article->thumbnail)
                                    <img src="{{ asset('storage/'.$article->thumbnail) }}" 
                                         class="img-thumbnail" width="80" alt="Thumbnail">
                                @else
                                    <span class="text-muted">No image</span>
                                @endif
                            </td>
                            <td>{{ \Illuminate\Support\Str::limit($article->excerpt, 50) }}</td>
                            <td>
                                <span class="badge {{ $article->status == 'published' ? 'bg-success' : 'bg-secondary' }}">
                                    {{ ucfirst($article->status) }}
                                </span>
                            </td>
                            <td>{{ $article->category->name }}</td>
                            <!-- <td>{{ \Carbon\Carbon::parse($article->published_at)->format('Y-m-d') }}</td> -->
                            <td>{{ \Illuminate\Support\Str::limit(strip_tags($article->body), 50) }}</td>
                            <td class="d-flex gap-1">
                                <a href="{{ route('admin.articles.edit', $article->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                <a href="{{ route('admin.articles.show', $article->id) }}" class="btn btn-sm btn-info text-white">Show</a>
                                <form action="{{ route('admin.articles.destroy', $article->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
