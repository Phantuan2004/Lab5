@extends('layout.index')
@section('content')
    <style>
        .chitiet {
            margin: 20px;
            display: flex;
            justify-content: space-around;
        }

        .img img {
            width: 300px;
            height: auto;
            margin-right: 50px
        }
    </style>

    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h1 class="text-center">Chi tiết sản phẩm</h1>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="chitiet">
                        <div class="img">
                            <img src="{{ asset('/storage/' . $detail->poster) }}" alt="{{ $detail->title }}">
                        </div>
                        <div class="content">
                            <h2>{{ $detail->title }}</h2>
                            <p>Giới thiệu: {{ $detail->intro }}</p>
                            <p>Ngày công chiếu: {{ $detail->release_date }}</p>
                            <p>Thể loại: {{ $detail->gennes->name }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
