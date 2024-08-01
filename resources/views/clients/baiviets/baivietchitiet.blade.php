@extends('layouts.client')

@section('title')
    Bài viết Chi Tiết
@endsection

@section('content')
    <main>
        <!-- breadcrumb area start -->
        <div class="breadcrumb-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-wrap">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="route('home.index')"><i class="fa fa-home"></i></a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="{{ route('home.baiviet') }}">Bài viết</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Bài viết chi tiết</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb area end -->

        <!-- blog main wrapper start -->
        <div class="blog-main-wrapper section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 order-2">
                        <aside class="blog-sidebar-wrapper">
                            <!-- single sidebar end -->
                            <div class="blog-sidebar">
                                <h5 class="title">Danh Mục</h5>
                                <ul class="blog-archive blog-category">
                                    @foreach ($danhMuc as $item)
                                        <li><a href="{{ route('home.baivietdanhmuc', $item->id) }}">{{ $item->ten_danh_muc }}
                                                ({{ count($item->baiViet) }})</a></li>
                                    @endforeach
                                </ul>
                            </div> <!-- single sidebar end -->
                        </aside>
                    </div>
                    <div class="col-lg-9 order-1">
                        {!! $baiViet->noi_dung !!}
                    </div>
                </div>
            </div>
        </div>
        <!-- blog main wrapper end -->
    </main>
@endsection
