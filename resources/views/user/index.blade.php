@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2>Danh sách User</h2>
        <a href="{{ route('list_user.create') }}" class="btn btn-primary mb-3">Thêm User</a>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Username</th>
                <th>Hành động</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->username }}</td>
                    <td>
                        <a href="{{ route('list_user.edit', $user->id) }}" class="btn btn-warning btn-sm">Sửa</a>

                        <form action="{{ route('list_user.destroy', $user->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Bạn có chắc muốn xóa?')" class="btn btn-danger btn-sm">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
