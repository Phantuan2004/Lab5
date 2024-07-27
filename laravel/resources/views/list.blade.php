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
        margin-right: 5px;
    }
</style>

@extends('layout.index')
@section('content')
    <div class="container mt-5">
        <h1 class="text-center">Danh sách movies</h1>
        <form class="search" action="{{ route('admin.search') }}" method="GET">
            <input type="text" name="query" placeholder="Tìm kiếm..." class="form-control">
            <button type="submit" class="btn btn-primary">Tìm kiếm</button>
        </form>

        <div class="add">
            <a href="{{ route('admin.add') }}" class="btn btn-success">Thêm mới</a>
        </div>

        {{ $ListMovies->links('pagination::bootstrap-4') }}

        <div>
            @if (session('message'))
                <div class="alert alert-success mt-2">
                    {{ session('message') }}
                </div>
            @endif
        </div>

        <table border="1" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tiêu đề phim</th>
                    <th>Hình ảnh áp phích</th>
                    <th>Giới thiệu phim</th>
                    <th>Ngày công chiếu</th>
                    <th>Danh mục phim</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ListMovies as $movie)
                    <tr>
                        <td>{{ $movie->id }}</td>
                        <td>{{ $movie->title }}</td>
                        <td>
                            <img src="{{ asset('/storage/' . $movie->poster) }}" alt="{{ $movie->title }}" width="60">
                        </td>
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
    </div>
@endsection
