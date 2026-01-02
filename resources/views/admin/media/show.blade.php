@extends('admin.layouts.master')

@section('content')

    <h1>{{ $article->title }}</h1>
    <p><strong>Kategoriya:</strong> {{ $article->category->name ?? 'No category' }}</p>
    <p>{{ $article->description }}</p>
    <a href="{{ route('articles.index') }}">Back to Articles</a>
@endsection
