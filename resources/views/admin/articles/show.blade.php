@extends('admin.layouts.master')

@section('content')
<div class="container my-5">
    <div class="card shadow-sm">
        <div class="card-header text-center bg-primary text-white">
            <h3>Post Details</h3>
        </div>
        <div class="card-body">
            <div class="mb-3 row">
                <label class="col-sm-3 col-form-label fw-bold">Title:</label>
                <div class="col-sm-9">
                    <p class="form-control-plaintext">{{ $article->title }}</p>
                </div>
            </div>

            <div class="mb-3 row">
                <label class="col-sm-3 col-form-label fw-bold">Description:</label>
                <div class="col-sm-9">
                    <p class="form-control-plaintext">{{ $article->excerpt }}</p>
                </div>
            </div>

            <div class="mb-3 row">
                <label class="col-sm-3 col-form-label fw-bold">Status:</label>
                <div class="col-sm-9">
                    <p class="form-control-plaintext text-capitalize btn btn-success">{{ $article->status }}</p>
                </div>
            </div>

            <div class="mb-3 row">
                <label class="col-sm-3 col-form-label fw-bold">Image:</label>
                <div class="col-sm-9">
                    @if($article->thumbnail)
                        <img src="{{ asset('storage/'.$article->thumbnail) }}" alt="image" class="img-fluid rounded shadow-sm">
                    @else
                        <img src="{{ asset('example.jpg') }}" alt="image" class="img-fluid rounded shadow-sm">
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<hr>

@foreach($article->comments as $comment)
    <div class="media mb-4 border-bottom pb-2">
        <div class="media-body">
            <h6 class="mt-0"><strong>{{ $comment->user_name }}</strong> <small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small></h6>
            {{ $comment->body }}
        </div>
    </div>
@endforeach
@endsection
