@extends('layouts.client')

@section('title')
    Chi tiết sản phẩm
@endsection
@section('content')
    <main>
        <div class="breadcrumb-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-wrap">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('home.index') }}"><i
                                                class="fa fa-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('home.product') }}">Sản phẩm</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Sản phẩm chi tiết</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- page main wrapper start -->
        <div class="shop-main-wrapper section-padding pb-0">
            <div class="container">
                <div class="row">
                    <!-- product details wrapper start -->
                    <div class="col-lg-12 order-1 order-lg-2">
                        <!-- product details inner end -->
                        <div class="product-details-inner">
                            <div class="row">
                                <div class="col-lg-5">
                                    <div class="product-large-slider">
                                        <div class="pro-large-img img-zoom">
                                            <img src="{{ Storage::url($sanPham->hinh_anh) }}"
                                                alt="product-details" />
                                        </div>
                                    </div>
                                    <div class="pro-nav slick-row-10 slick-arrow-style">
                                        @foreach ($sanPham->hinhAnhSanPham as $item)
                                            <div class="pro-nav-thumb">
                                                <img src="{{ Storage::url($item->link_hinh_anh) }}"
                                                    alt="product-details" />
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="product-details-des">
                                        <h3 class="product-name">{{ $sanPham->ten_san_pham }}</h3>
                                        <div class="ratings d-flex">
                                            <span><i class="fa fa-star-o"></i></span>
                                            <span><i class="fa fa-star-o"></i></span>
                                            <span><i class="fa fa-star-o"></i></span>
                                            <span><i class="fa fa-star-o"></i></span>
                                            <span><i class="fa fa-star-o"></i></span>
                                            <div class="pro-review">
                                                <span>{{ $sanPham->luot_xem }} lượt xem</span>
                                            </div>
                                        </div>
                                        <div class="price-box">
                                            <span
                                                class="price-regular">{{ $sanPham->gia_khuyen_mai ? number_format($sanPham->gia_khuyen_mai, 0, '', '.') : '' }}<sup>đ</sup></span>
                                            <span
                                                class="price-old"><del>{{ number_format($sanPham->gia_san_pham, 0, '', '.') }}<sup>đ</sup></del></span>
                                        </div>
                                        <div class="availability">
                                            <i class="fa fa-check-circle"></i>
                                            <span>{{ $sanPham->so_luong }} sản phẩm</span>
                                        </div>
                                        <p class="pro-desc">{{ $sanPham->mo_ta }}</p>
                                        <div class="quantity-cart-box d-flex align-items-center">
                                            <h6 class="option-title">Số lượng:</h6>
                                            <div class="quantity">
                                                <div class="pro-qty"><input type="text" value="1"></div>
                                            </div>
                                            <div class="action_link">
                                                <a class="btn btn-cart2" href="#">Thêm vào giỏ hàng</a>
                                            </div>
                                        </div>
                                        <div class="like-icon">
                                            <a class="facebook" href="#"><i class="fa fa-facebook"></i>like</a>
                                            <a class="twitter" href="#"><i class="fa fa-twitter"></i>tweet</a>
                                            <a class="pinterest" href="#"><i class="fa fa-pinterest"></i>save</a>
                                            <a class="google" href="#"><i class="fa fa-google-plus"></i>share</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- product details inner end -->

                        <!-- product details reviews start -->
                        <div class="product-details-reviews section-padding pb-0">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="product-review-info">
                                        <ul class="nav review-tab">
                                            <li>
                                                <a class="active" data-bs-toggle="tab" href="#tab_one">Mô tả sản phẩm</a>
                                            </li>
                                            <li>
                                                <a data-bs-toggle="tab" href="#tab_two">Bình luận</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content reviews-tab">
                                            <div class="tab-pane fade show active" id="tab_one">
                                                <div class="tab-one">
                                                    <p>{{ $sanPham->mo_ta }}</p>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="tab_two">
                                                <div class="row">
                                                    <div class="col-4 border-end">
                                                        @if (auth()->check())
                                                            <form action="{{ route('home.comment', $sanPham->id) }}"
                                                                method="post">
                                                                @csrf
                                                                <input type="text" name="noi_dung" class="form-control"
                                                                    placeholder="Nhập bình luận của bạn...">
                                                                <button type="submit" class="btn btn-primary p-2 mt-1">Bình
                                                                    luận</button>
                                                            </form>
                                                        @else
                                                            <div class="alert alert-danger">
                                                                <strong>Bạn chưa đăng nhập</strong> phải <a
                                                                    href="{{ route('login') }}">đăng nhập</a> để bình luận
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <div class="col-8">

                                                        <div class="row">
                                                            @foreach ($binhLuans as $binhluan)
                                                                <div class="col-10">
                                                                    <h4>{{ $binhluan->user->ho_ten }}
                                                                        <small
                                                                            style="font-size: 10px; opacity: 0.8">{{ $binhluan->ngay_dang }}</small>
                                                                    </h4>
                                                                    <p>{{ $binhluan->noi_dung }}</p>
                                                                </div>
                                                                @if (auth()->user()->id === $binhluan->tai_khoan_id)
                                                                    <div class="col-2">
                                                                        <form
                                                                            action="{{ route('home.deleteBL', $binhluan->id) }}"
                                                                            method="post" class="d-inline" onsubmit="return confirm('Bạn muốn xóa?')">
                                                                            @csrf
                                                                            @method('delete')
                                                                            <button class="btn btn-danger p-1">Xóa</button>
                                                                        </form>
                                                                        <a href=""
                                                                            class="btn btn-warning p-1">Sửa</a>
                                                                    </div>
                                                                @endif
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- product details reviews end -->
                    </div>
                    <!-- product details wrapper end -->
                </div>
            </div>
        </div>
        <!-- page main wrapper end -->
        <!-- related products area start -->
        <section class="related-products section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- section title start -->
                        <div class="section-title text-center">
                            <h2 class="title">Sản phẩm cùng loại</h2>
                        </div>
                        <!-- section title start -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="product-carousel-4 slick-row-10 slick-arrow-style">
                            @foreach ($sanPhamCungLoai as $item)
                                <!-- product item start -->
                                <div class="product-item">
                                    <figure class="product-thumb">
                                        <a href="{{ route('home.detail', $item->id) }}">
                                            <img src="{{ Storage::url($item->hinh_anh) }}"
                                                alt="product">
                                        </a>
                                        <div class="product-badge">
                                            <div class="product-label new">
                                                <span>new</span>
                                            </div>
                                        </div>
                                        <div class="button-group">
                                            <a href="wishlist.html" data-bs-toggle="tooltip" data-bs-placement="left"
                                                title="Add to wishlist"><i class="pe-7s-like"></i></a>
                                            <a href="compare.html" data-bs-toggle="tooltip" data-bs-placement="left"
                                                title="Add to Compare"><i class="pe-7s-refresh-2"></i></a>
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#quick_view"><span
                                                    data-bs-toggle="tooltip" data-bs-placement="left"
                                                    title="Quick View"><i class="pe-7s-search"></i></span></a>
                                        </div>
                                        <div class="cart-hover">
                                            <button class="btn btn-cart">Thêm vào giỏ hàng</button>
                                        </div>
                                    </figure>
                                    <div class="product-caption text-center">
                                        <h6 class="product-name">
                                            <a href="{{ route('home.detail', $item->id) }}">{{ $item->ten_san_pham }}</a>
                                        </h6>
                                        <div class="price-box">
                                            <span
                                                class="price-regular">{{ $item->gia_khuyen_mai ? number_format($item->gia_khuyen_mai, 0, '', '.') : '' }}<sup>đ</sup></span>
                                            <span
                                                class="price-old"><del>{{ number_format($item->gia_san_pham, 0, '', '.') }}<sup>đ</sup></del></span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <!-- product item end -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- related products area end -->
    </main>
@endsection
