@extends('admin.layouts.master')

@section('title', 'Create Comment')

@section('content')
<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">Create Comment</h1>

    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">

            <div class="card shadow">
                <div class="card-body">

                    <form action="" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control" placeholder="Title kiriting">
                        </div>

                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="description" class="form-control" rows="4" placeholder="Description yozing"></textarea>
                        </div>

                        <div class="form-group">
                            <label>Status</label>
                            <select name="status" class="form-control">
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" name="image" class="form-control-file">
                        </div>

                        <button class="btn btn-primary">
                            Create Comment
                        </button>

                    </form>

                </div>
            </div>

        </div>
    </div>

</div>
@endsection
