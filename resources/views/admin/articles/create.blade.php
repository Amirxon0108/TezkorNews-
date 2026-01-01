@extends('admin.layouts.master')
@section('content')
<div class="box">
    <h2>Create Post</h2>

    <form method="POST" enctype="multipart/form-data">
        <label>Title</label>
        <input type="text" placeholder="Title kiriting">

        <label>Description</label>
        <textarea placeholder="Description yozing"></textarea>

        <label>Status</label>
        <select>
            <option>Active</option>
            <option>Inactive</option>
        </select>

        <label>Image</label>
        <input type="file">

        <button class="btn-create">Create</button>
    </form>
</div>
@endsection