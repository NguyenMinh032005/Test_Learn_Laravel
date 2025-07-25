@extends('layouts.app')
@section('content')
    <div class="container mt-5">
        <h2>Thêm User</h2>
        <!-- Hiển thị thông báo -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="{{ route('list-user.store') }}">
            @csrf
            <div class="form-group">
                <label>Tên</label>
                <input type="text" name="name" class="form-control" value="{{old('name')}}" required>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="{{old('email')}}" required>
            </div>
            <div class="form-group">
                <label>Mật khẩu</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <button class="btn btn-success">Lưu</button>
            <a href="{{ route('list-user.index') }}" class="btn btn-secondary">Quay lại</a>
        </form>
    </div>
@endsection
