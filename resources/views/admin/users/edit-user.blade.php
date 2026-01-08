@extends('admin.layouts.master')
@section('content')

<form action="{{ route('admin.user.update', $user->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label>Foydalanuvchi: <strong>{{ $user->name }}</strong></label>
    </div>

    <div class="form-group">
        <label for="role_id">Rolni tanlang:</label>
        <select name="role_id" class="form-control">
            @foreach($allRoles as $role)
                <option value="{{ $role->id }}" {{ $user->role_id == $role->id ? 'selected' : '' }}>
                    {{ $role->name }} ({{ $role->role }})
                </option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Saqlash</button>
</form>

@endsection