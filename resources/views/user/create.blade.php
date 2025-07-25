@extends('layouts.app')
@section('content')
    <div class="container mt-5">
        <h2>Thêm User</h2>
        <form method="POST" action="{{ route('list_user.store') }}">
            @csrf
            <div class="form-group">
                <label>Tên</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Mật khẩu</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <button class="btn btn-success">Lưu</button>
            <a href="{{ route('list_user.index') }}" class="btn btn-secondary">Quay lại</a>
        </form>
    </div>
@endsection
