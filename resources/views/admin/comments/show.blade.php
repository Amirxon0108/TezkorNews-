

@extends('admin.layouts.master')

@section('content')
<div class="container my-5">
    <div class="card shadow-sm">
        <div class="card-header text-center bg-primary text-white">
            <h3>Post Details</h3>
        </div>
        <div class="card-body">
            <div class="mb-3 row">
             
<div class="comments-section p-t-40">
    <h4 class="f1-l-4 cl3 p-b-12">
        Comments ({{ $comment->count() }})
    </h4>

    <div class="comments-list">
        <div class="wrap-slick3">
            <div class="slick3">
                <div class="item-slick3 p-b-70">
                    <div class="comments-list">
        <div class="comment-item flex-sb-s p-b-25">
            {{$comment->user_id}}
<br>
            <div class="comment-content p-l-15">
                <div class="flex-sb-s">
                    <span class="f1-s-3 cl8">
                        {{ $comment->user_name }}
                    </span>
                    <br>
                    <span class="f1-s-3 cl8">
                        {{ $comment->created_at->format('d M Y H:i') }}
                    </span>
                </div>
<br>
                <p class="f1-s-11 cl6 p-t-5">
                    {{ $comment->body }}
                </p>
            </div>
        </div>
    
       
</div>
            </div>
        </div>
    </div>
</div>
<hr>



@endsection
