@extends('layouts.client')

@section('title')
    Bài viết
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
                                    <li class="breadcrumb-item"><a href="{{ route('home.index') }}"><i
                                                class="fa fa-home"></i></a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Bài viết</li>
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
                                        <li><a href="{{ route('home.baivietdanhmuc', $item->id) }}">{{ $item->ten_danh_muc }} ({{ count($item->baiViet) }})</a></li>
                                    @endforeach
                                </ul>
                            </div> <!-- single sidebar end -->
                        </aside>
                    </div>
                    <div class="col-lg-9 order-1">
                        <div class="blog-item-wrapper">
                            <!-- blog item wrapper end -->
                            <div class="row mbn-30">
                                @foreach ($baiViets as $item)
                                    <div class="col-md-6">
                                        <!-- blog post item start -->
                                        <div class="blog-post-item mb-30">
                                            <div class="blog-content">
                                                <h4 class="blog-title">
                                                    <a href="{{ route('home.baivietchitiet', $item->id) }}">{{ $item->tieu_de }}</a>
                                                </h4><small>{{ $item->created_at }}</small>
                                            </div>
                                        </div>
                                        <!-- blog post item end -->
                                    </div>
                                @endforeach

                            </div>
                            <!-- blog item wrapper end -->

                            <!-- start pagination area -->
                            <div class="paginatoin-area text-center">
                                {{ $baiViets->links() }}
                            </div>
                            <!-- end pagination area -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- blog main wrapper end -->
    </main>
@endsection
