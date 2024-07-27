@extends('layout.index')

@section('content')

    <style>
        .button a,
        .button button {
            margin: 0 3px;
            width: 77px;
            height: 70px;
            align-content: center
        }

        .add {
            text-align: right;
        }

        .add a:hover {
            background-color: rgb(208, 221, 28);
            color: black
        }

        .search {
            display: flex;
        }

        .search input {
            width: 300px;
            height: 38px;
            margin-right: 2px;
        }
    </style>

    <div class="container mt-5">
        <h1 class="text-center">Kết quả tìm kiếm</h1>
        <form class="search" action="{{ route('admin.search') }}" method="GET">
            <input type="text" name="query" placeholder="Tìm kiếm..." class="form-control">
            <button type="submit" class="btn btn-primary">Tìm kiếm</button>
        </form> <br>
        <div class="row">
            @if ($movies->isEmpty())
                <p class="text-center">Không tìm thấy kết quả nào.</p>
            @else
                <table border="1" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tiêu đề phim</th>
                            <th>Hình ảnh áp phích</th>
                            <th>Giới thiệu phim</th>
                            <th>Ngày công chiếu</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($movies as $movie)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $movie->title }}</td>
                                <td><img src="{{ asset('/storage/' . $movie->poster) }}" alt="{{ $movie->title }}"
                                        width="50"></td>
                                <td>{{ $movie->intro }}</td>
                                <td>{{ $movie->release_date }}</td>
                                <td>{{ $movie->gennes->name }}</td>
                                <td class="button d-flex">
                                    <a href="{{ route('admin.detail', $movie->id) }}" class="btn btn-primary">Chi tiết</a>
                                    <a href="{{ route('admin.edit', $movie->id) }}" class="btn btn-warning">Sửa</a>
                                    <form action="{{ route('admin.delete', $movie->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('Bạn có muốn xóa???')">Xóa</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
            <div>
                <button class="btn btn-primary" type="submit">Thêm mới</button>
                <button class="btn btn-danger">Nhập lại</button>
                <a href="{{ route('admin.index') }}" class="btn btn-warning">Danh sách</a>
            </div>
        </div>
    </div>
@endsection
