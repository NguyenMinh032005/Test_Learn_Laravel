@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2>Sửa User</h2>
        <form method="POST" action="{{ route('list_user.update', $user->id) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>Tên</label>
                <input type="text" name="name" value="{{ $user->name }}" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" value="{{ $user->username }}" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Mật khẩu (để trống nếu không đổi)</label>
                <input type="password" name="password" class="form-control">
            </div>

            <button class="btn btn-success">Cập nhật</button>
            <a href="{{ route('list_user.index') }}" class="btn btn-secondary">Quay lại</a>
        </form>
    </div>
@endsection
