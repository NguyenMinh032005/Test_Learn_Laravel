@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2>Danh sách User</h2>
        <a href="{{ route('list-user.create') }}" class="btn btn-primary mb-3">Thêm User</a>

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

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Email</th>
                <th>Hành động</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td><a href="{{ route('list-user.show', $user->id) }}">
                            {{ $user->name }}
                        </a></td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <a href="{{ route('list-user.edit', $user->id) }}" class="btn btn-warning btn-sm">Sửa</a>

                        <button class="btn btn-danger btn-sm delete-user-btn"
                                data-id="{{ $user->id }}">
                            Xóa
                        </button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
@section('js')
    <script>
        $(document).ready(function () {
            $('.delete-user-btn').click(function (e) {
                e.preventDefault();
                if (!confirm('Bạn có chắc muốn xóa?')) {
                    return;
                }

                let userId = $(this).data('id');
                let button = $(this);

                $.ajax({
                    url: "{{route('list-user.index')}}/" + userId,
                    type: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function (response) {
                        // Có thể xử lý bằng cách reload lại trang hoặc xoá dòng khỏi table
                        button.closest('tr').remove();
                        alert('Xóa user thành công!');
                    },
                    error: function (xhr) {
                        alert('Xóa thất bại!');
                    }
                });
            });
        });
    </script>
@endsection
