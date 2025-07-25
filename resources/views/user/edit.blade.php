@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2>Sửa User</h2>
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
        <form method="POST" action="{{ route('list-user.update', $user->id) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>Tên</label>
                <input type="text" name="name" class="form-control" value="{{old('name',$user->name)}}" required>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="{{old('email',$user->email)}}" required>
            </div>
            <div class="form-group">
                <label>Mật khẩu</label>
                <input type="password" name="password" class="form-control" >
            </div>

            <button class="btn btn-success">Cập nhật</button>
            <a href="{{ route('list-user.index') }}" class="btn btn-secondary">Quay lại</a>
        </form>
    </div>
@endsection
