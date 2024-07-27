@extends('layout.index');
@section('content')
    <div>
        @if (session('message'))
            <div class="alert alert-success mt-2">
                {{ session('message') }}
            </div>
        @endif
    </div>

    <style>
        input,
        select {
            margin-bottom: 20px
        }
    </style>

    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h1 class="text-center">Thêm mới phim</h1>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.add') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">Tiêu đề phim</label>
                        <input type="text" name="title" class="form-control" id="title">
                    </div>

                    <div class="form-group">
                        <label for="">Hình ảnh áp phích</label>
                        <input type="file" name="poster" class="form-control" id="poster">
                    </div>

                    <div class="form-group">
                        <label for="">Giới thiệu phim</label>
                        <input type="text" name="intro" class="form-control" id="intro">
                    </div>

                    <div class="form-group">
                        <label for="">Ngày công chiếu</label>
                        <input type="date" name="release_date" class="form-control" id="release_date">
                    </div>

                    <div class="form-group">
                        <label for="">Thể loại</label>
                        <select name="genre_id" id="genre_id">
                            @foreach ($gennes as $gen)
                                <option value="{{ $gen->id }}">{{ $gen->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <button class="btn btn-primary" type="submit">Thêm mới</button>
                        <button class="btn btn-danger">Nhập lại</button>
                        <a href="{{ route('admin.index') }}" class="btn btn-warning">Danh sách</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
