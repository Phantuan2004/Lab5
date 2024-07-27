@extends('layout.index');
@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h1 class="text-center">Cập nhật phim</h1>
            </div>

            <div>
                @if (session('message'))
                    <div class="alert alert-success mt-2">
                        {{ session('message') }}
                    </div>
                @endif
            </div>

            <div class="card-body">
                <form action="{{ route('admin.edit', $id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="">Tiêu đề phim</label>
                        <input type="text" name="title" class="form-control" id="title"
                            value="{{ $id->title }}">
                    </div>

                    <div class="form-group">
                        <label for="">Hình ảnh áp phích</label>
                        <input type="file" name="poster" class="form-control" id="filePoster">
                        <img id="img" src="{{ asset('storage/' . $id->poster) }}" alt="{{ $id->title }}"
                            width="60">
                    </div>

                    <div class="form-group">
                        <label for="">Giới thiệu phim</label>
                        <input type="text" name="intro" class="form-control" id="intro"
                            value="{{ $id->intro }}">
                    </div>

                    <div class="form-group">
                        <label for="">Ngày công chiếu</label>
                        <input type="date" name="release_date" class="form-control" id="release_date"
                            value="{{ $id->release_date }}">
                    </div>

                    <div class="form-group">
                        <label for="">Thể loại</label>
                        <select class="form-control" name="genre_id" id="genre_id">
                            @foreach ($genes as $gen)
                                <option value="{{ $gen->id }}" @if ($gen->id == $gen->genre_id) selected @endif>
                                    {{ $gen->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <button class="btn btn-primary" type="submit">Cập nhật</button>
                        <button class="btn btn-danger">Nhập lại</button>
                        <a href="{{ route('admin.index') }}" class="btn btn-warning">Danh sách</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        var file_img = document.querySelector('#filePoster');
        var img = document.querySelector('#img');

        //Khi thay đổi file
        file_img.addEventListener('change', function(event) {
            // console.log(URL.createObjectURL(this.files[0]))
            event.preventDefault()
            img.src = URL.createObjectURL(this.files[0])
        })
    </script>
@endsection
