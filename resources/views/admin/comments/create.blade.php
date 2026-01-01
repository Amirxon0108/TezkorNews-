@extends('admin.layouts.master') {{-- agar layout bo‘lsa --}}

@section('title', 'Create Comment')

@section('content')
<div class="box">
    <h2>Create Comment</h2>

    <form action="" method="POST" enctype="multipart/form-data">
        @csrf

        <label>Title</label>
        <input type="text" name="title" placeholder="Title kiriting">

        <label>Description</label>
        <textarea name="description" placeholder="Description yozing"></textarea>

        <label>Status</label>
        <select name="status">
            <option value="active">Active</option>
            <option value="inactive">Inactive</option>
        </select>

        <label>Image</label>
        <input type="file" name="image">

        <button class="btn-create">Create</button>
    </form>
</div>
@endsection
