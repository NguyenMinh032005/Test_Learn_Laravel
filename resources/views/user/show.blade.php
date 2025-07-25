@extends('layouts.app')
@section('content')
    <div class="container mt-5">
        <h2>Thông tin User</h2>
        <div class="card p-3">
            <p><strong>ID:</strong> {{ $user->id }}</p>
            <p><strong>Tên:</strong> {{ $user->name }}</p>
            <p><strong>Username:</strong> {{ $user->username }}</p>
            <p><strong>Ngày tạo:</strong> {{ $user->created_at->format('d/m/Y H:i') }}</p>
        </div>

        <a href="{{ route('list_user.index') }}" class="btn btn-secondary mt-3">Quay lại danh sách</a>
        <a href="{{ route('list_user.edit', $user->id) }}" class="btn btn-primary mt-3">Chỉnh sửa</a>
    </div>
@endsection
