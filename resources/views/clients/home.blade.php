@extends('layouts.client')

@section('title')
    Trang chủ
@endsection
@section('content')
    <main>
        <!-- hero slider area start -->
        <section class="container slider-area mt-4">
            <div class="hero-slider-active slick-arrow-style slick-arrow-style_hero slick-dot-style">
                <!-- single slider item start -->
                @foreach ($slider as $item)
                    <div class="hero-single-slide hero-overlay">
                        <div class="hero-slider-item bg-img" data-bg="{{ Storage::Url($item->hinh_anh) }}">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="hero-slider-content slide-1">
                                            <h2 class="slide-title text-white">{{ $item->tieu_de }}<span></span></h2>
                                            <h4 class="slide-desc text-white">{{ $item->mo_ta }}</h4>
                                            <a href="shop.html" class="btn btn-hero">Read More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <!-- single slider item end -->
            </div>
        </section>
        <!-- hero slider area end -->

        <!-- product area start -->
        <section class="product-area section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- section title start -->
                        <div class="section-title text-center">
                            <h2 class="title">Tất cả sản phẩm</h2>
                        </div>
                        <!-- section title start -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="product-container">
                            <!-- product tab menu start -->
                            {{-- <div class="product-tab-menu">
                                <ul class="nav justify-content-center">
                                    <li><a href="#tab1" class="active" data-bs-toggle="tab">Entertainment</a></li>
                                    <li><a href="#tab2" data-bs-toggle="tab">Storage</a></li>
                                    <li><a href="#tab3" data-bs-toggle="tab">Lying</a></li>
                                    <li><a href="#tab4" data-bs-toggle="tab">Tables</a></li>
                                </ul>
                            </div> --}}
                            <!-- product tab menu end -->

                            <!-- product tab content start -->
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="tab1">
                                    <div class="product-carousel-4 slick-row-10 slick-arrow-style">
                                        <!-- product item start -->
                                        @foreach ($sanPhams as $item)
                                            <div class="product-item">
                                                <figure class="product-thumb">
                                                    <a href="{{ route('home.detail', $item->id) }}">
                                                        <img src="{{ Storage::url($item->hinh_anh) }}"
                                                            alt="product">
                                                        {{-- <img class="sec-img"
                                                            src="{{ asset('assets/client') }}/img/product/product-18.jpg"
                                                            alt="product"> --}}
                                                    </a>
                                                    <div class="product-badge">
                                                        <div class="product-label new">
                                                            <span>new</span>
                                                        </div>
                                                        {{-- <div class="product-label discount">
                                                            <span>10%</span>
                                                        </div> --}}
                                                    </div>
                                                    <div class="button-group">
                                                        <a href="wishlist.html" data-bs-toggle="tooltip"
                                                            data-bs-placement="left" title="Add to wishlist"><i
                                                                class="pe-7s-like"></i></a>
                                                        <a href="compare.html" data-bs-toggle="tooltip"
                                                            data-bs-placement="left" title="Add to Compare"><i
                                                                class="pe-7s-refresh-2"></i></a>
                                                        <a href="#" data-bs-toggle="modal"
                                                            data-bs-target="#quick_view"><span data-bs-toggle="tooltip"
                                                                data-bs-placement="left" title="Quick View"><i
                                                                    class="pe-7s-search"></i></span></a>
                                                    </div>
                                                    <form action="{{ route('cart.add')}}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="quantity" value="1">
                                                        <input type="hidden" name="product_id" value="{{ $item->id }}">
                                                        <div class="cart-hover">
                                                            <button class="btn btn-cart">Thêm vào giỏ hàng</button>
                                                        </div>
                                                    </form>
                                                </figure>
                                                <div class="product-caption text-center">
                                                    <h6 class="product-name">
                                                        <a
                                                            href="{{ route('home.detail', $item->id) }}">{{ $item->ten_san_pham }}</a>
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
                            <!-- product tab content end -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- product area end -->

        <!-- service policy area start -->
        <div class="service-policy">
            <div class="container">
                <div class="policy-block section-padding border-top">
                    <div class="row mtn-30">
                        <div class="col-sm-6 col-lg-3">
                            <div class="policy-item">
                                <div class="policy-icon">
                                    <i class="pe-7s-plane"></i>
                                </div>
                                <div class="policy-content">
                                    <h6>Free Shipping</h6>
                                    <p>Free shipping all order</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="policy-item">
                                <div class="policy-icon">
                                    <i class="pe-7s-help2"></i>
                                </div>
                                <div class="policy-content">
                                    <h6>Support 24/7</h6>
                                    <p>Support 24 hours a day</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="policy-item">
                                <div class="policy-icon">
                                    <i class="pe-7s-back"></i>
                                </div>
                                <div class="policy-content">
                                    <h6>Money Return</h6>
                                    <p>30 days for free return</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="policy-item">
                                <div class="policy-icon">
                                    <i class="pe-7s-credit"></i>
                                </div>
                                <div class="policy-content">
                                    <h6>100% Payment Secure</h6>
                                    <p>We ensure secure payment</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- service policy area end -->

        <!-- featured product area start -->
        <section class="feature-product section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- section title start -->
                        <div class="section-title text-center">
                            <h2 class="title">Sản phẩm yêu thích</h2>
                        </div>
                        <!-- section title start -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="product-carousel-4_2 slick-row-10 slick-arrow-style">
                            <!-- product item start -->
                            @foreach ($sanPhamYeuThich as $item)
                                <div class="product-item">
                                    <figure class="product-thumb">
                                        <a href="{{ route('home.detail', $item->id) }}">
                                            <img src="{{ Storage::url($item->hinh_anh) }}"
                                                alt="product">
                                            {{-- <img class="sec-img"
                                                src="{{ asset('assets/client') }}/img/product/product-13.jpg"
                                                alt="product"> --}}
                                        </a>
                                        <div class="product-badge">
                                            <div class="product-label new">
                                                <span>new</span>
                                            </div>
                                            {{-- <div class="product-label discount">
                                                <span>10%</span>
                                            </div> --}}
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
                                        <form action="{{ route('cart.add')}}" method="POST">
                                            @csrf
                                            <input type="hidden" name="quantity" value="1">
                                            <input type="hidden" name="product_id" value="{{ $item->id }}">
                                            <div class="cart-hover">
                                                <button class="btn btn-cart">Thêm vào giỏ hàng</button>
                                            </div>
                                        </form>
                                    </figure>
                                    <div class="product-caption text-center">
                                        <h6 class="product-name">
                                            <a href="{{ route('home.detail', $item->id) }}">{{ $item->ten_san_pham }}</a>
                                        </h6>
                                        <div class="price-box">
                                            <span class="price-regular">{{ $item->gia_khuyen_mai ? number_format($item->gia_khuyen_mai, 0, '', '.') : '' }}<sup>đ</sup></span>
                                            <span class="price-old"><del>{{ number_format($item->gia_san_pham, 0, '', '.') }}<sup>đ</sup></del></span>
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
        <!-- featured product area end -->

        <!-- group product start -->
        <section class="group-product-area section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="group-product-banner">
                            <figure class="banner-statistics">
                                <a href="#">
                                    <img src="{{ asset('assets/client') }}/img/banner/img-bottom-banner.jpg"
                                        alt="product banner">
                                </a>
                                <div class="banner-content banner-content_style3 text-center">
                                    <h6 class="banner-text1">BEAUTIFUL</h6>
                                    <h2 class="banner-text2">Wedding Rings</h2>
                                    <a href="shop.html" class="btn btn-text">Shop Now</a>
                                </div>
                            </figure>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories-group-wrapper">
                            <!-- section title start -->
                            <div class="section-title-append">
                                <h4>best seller product</h4>
                                <div class="slick-append"></div>
                            </div>
                            <!-- section title start -->

                            <!-- group list carousel start -->
                            <div class="group-list-item-wrapper">
                                <div class="group-list-carousel">
                                    <!-- group list item start -->
                                    <div class="group-slide-item">
                                        <div class="group-item">
                                            <div class="group-item-thumb">
                                                <a href="product-details.html">
                                                    <img src="{{ asset('assets/client') }}/img/product/product-1.jpg"
                                                        alt="">
                                                </a>
                                            </div>
                                            <div class="group-item-desc">
                                                <h5 class="group-product-name"><a href="product-details.html">
                                                        Diamond Exclusive ring</a></h5>
                                                <div class="price-box">
                                                    <span class="price-regular">$50.00</span>
                                                    <span class="price-old"><del>$29.99</del></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- group list item end -->

                                    <!-- group list item start -->
                                    <div class="group-slide-item">
                                        <div class="group-item">
                                            <div class="group-item-thumb">
                                                <a href="product-details.html">
                                                    <img src="{{ asset('assets/client') }}/img/product/product-3.jpg"
                                                        alt="">
                                                </a>
                                            </div>
                                            <div class="group-item-desc">
                                                <h5 class="group-product-name"><a href="product-details.html">
                                                        Handmade Golden ring</a></h5>
                                                <div class="price-box">
                                                    <span class="price-regular">$55.00</span>
                                                    <span class="price-old"><del>$30.00</del></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- group list item end -->

                                    <!-- group list item start -->
                                    <div class="group-slide-item">
                                        <div class="group-item">
                                            <div class="group-item-thumb">
                                                <a href="product-details.html">
                                                    <img src="{{ asset('assets/client') }}/img/product/product-5.jpg"
                                                        alt="">
                                                </a>
                                            </div>
                                            <div class="group-item-desc">
                                                <h5 class="group-product-name"><a href="product-details.html">
                                                        exclusive gold Jewelry</a></h5>
                                                <div class="price-box">
                                                    <span class="price-regular">$45.00</span>
                                                    <span class="price-old"><del>$25.00</del></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- group list item end -->

                                    <!-- group list item start -->
                                    <div class="group-slide-item">
                                        <div class="group-item">
                                            <div class="group-item-thumb">
                                                <a href="product-details.html">
                                                    <img src="{{ asset('assets/client') }}/img/product/product-7.jpg"
                                                        alt="">
                                                </a>
                                            </div>
                                            <div class="group-item-desc">
                                                <h5 class="group-product-name"><a href="product-details.html">
                                                        Perfect Diamond earring</a></h5>
                                                <div class="price-box">
                                                    <span class="price-regular">$50.00</span>
                                                    <span class="price-old"><del>$29.99</del></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- group list item end -->

                                    <!-- group list item start -->
                                    <div class="group-slide-item">
                                        <div class="group-item">
                                            <div class="group-item-thumb">
                                                <a href="product-details.html">
                                                    <img src="{{ asset('assets/client') }}/img/product/product-9.jpg"
                                                        alt="">
                                                </a>
                                            </div>
                                            <div class="group-item-desc">
                                                <h5 class="group-product-name"><a href="product-details.html">
                                                        Handmade Golden Necklace</a></h5>
                                                <div class="price-box">
                                                    <span class="price-regular">$90.00</span>
                                                    <span class="price-old"><del>$100.</del></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- group list item end -->

                                    <!-- group list item start -->
                                    <div class="group-slide-item">
                                        <div class="group-item">
                                            <div class="group-item-thumb">
                                                <a href="product-details.html">
                                                    <img src="{{ asset('assets/client') }}/img/product/product-11.jpg"
                                                        alt="">
                                                </a>
                                            </div>
                                            <div class="group-item-desc">
                                                <h5 class="group-product-name"><a href="product-details.html">
                                                        Handmade Golden Necklace</a></h5>
                                                <div class="price-box">
                                                    <span class="price-regular">$20.00</span>
                                                    <span class="price-old"><del>$30.00</del></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- group list item end -->

                                    <!-- group list item start -->
                                    <div class="group-slide-item">
                                        <div class="group-item">
                                            <div class="group-item-thumb">
                                                <a href="product-details.html">
                                                    <img src="{{ asset('assets/client') }}/img/product/product-13.jpg"
                                                        alt="">
                                                </a>
                                            </div>
                                            <div class="group-item-desc">
                                                <h5 class="group-product-name"><a href="product-details.html">
                                                        Handmade Golden ring</a></h5>
                                                <div class="price-box">
                                                    <span class="price-regular">$55.00</span>
                                                    <span class="price-old"><del>$30.00</del></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- group list item end -->

                                    <!-- group list item start -->
                                    <div class="group-slide-item">
                                        <div class="group-item">
                                            <div class="group-item-thumb">
                                                <a href="product-details.html">
                                                    <img src="{{ asset('assets/client') }}/img/product/product-15.jpg"
                                                        alt="">
                                                </a>
                                            </div>
                                            <div class="group-item-desc">
                                                <h5 class="group-product-name"><a href="product-details.html">
                                                        exclusive gold Jewelry</a></h5>
                                                <div class="price-box">
                                                    <span class="price-regular">$45.00</span>
                                                    <span class="price-old"><del>$25.00</del></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- group list item end -->
                                </div>
                            </div>
                            <!-- group list carousel start -->
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories-group-wrapper">
                            <!-- section title start -->
                            <div class="section-title-append">
                                <h4>on-sale product</h4>
                                <div class="slick-append"></div>
                            </div>
                            <!-- section title start -->

                            <!-- group list carousel start -->
                            <div class="group-list-item-wrapper">
                                <div class="group-list-carousel">
                                    <!-- group list item start -->
                                    <div class="group-slide-item">
                                        <div class="group-item">
                                            <div class="group-item-thumb">
                                                <a href="product-details.html">
                                                    <img src="{{ asset('assets/client') }}/img/product/product-17.jpg"
                                                        alt="">
                                                </a>
                                            </div>
                                            <div class="group-item-desc">
                                                <h5 class="group-product-name"><a href="product-details.html">
                                                        Handmade Golden Necklace</a></h5>
                                                <div class="price-box">
                                                    <span class="price-regular">$50.00</span>
                                                    <span class="price-old"><del>$29.99</del></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- group list item end -->

                                    <!-- group list item start -->
                                    <div class="group-slide-item">
                                        <div class="group-item">
                                            <div class="group-item-thumb">
                                                <a href="product-details.html">
                                                    <img src="{{ asset('assets/client') }}/img/product/product-16.jpg"
                                                        alt="">
                                                </a>
                                            </div>
                                            <div class="group-item-desc">
                                                <h5 class="group-product-name"><a href="product-details.html">
                                                        Handmade Golden Necklaces</a></h5>
                                                <div class="price-box">
                                                    <span class="price-regular">$55.00</span>
                                                    <span class="price-old"><del>$30.00</del></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- group list item end -->

                                    <!-- group list item start -->
                                    <div class="group-slide-item">
                                        <div class="group-item">
                                            <div class="group-item-thumb">
                                                <a href="product-details.html">
                                                    <img src="{{ asset('assets/client') }}/img/product/product-12.jpg"
                                                        alt="">
                                                </a>
                                            </div>
                                            <div class="group-item-desc">
                                                <h5 class="group-product-name"><a href="product-details.html">
                                                        exclusive silver top bracellet</a></h5>
                                                <div class="price-box">
                                                    <span class="price-regular">$45.00</span>
                                                    <span class="price-old"><del>$25.00</del></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- group list item end -->

                                    <!-- group list item start -->
                                    <div class="group-slide-item">
                                        <div class="group-item">
                                            <div class="group-item-thumb">
                                                <a href="product-details.html">
                                                    <img src="{{ asset('assets/client') }}/img/product/product-11.jpg"
                                                        alt="">
                                                </a>
                                            </div>
                                            <div class="group-item-desc">
                                                <h5 class="group-product-name"><a href="product-details.html">
                                                        top Perfect Diamond necklace</a></h5>
                                                <div class="price-box">
                                                    <span class="price-regular">$50.00</span>
                                                    <span class="price-old"><del>$29.99</del></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- group list item end -->

                                    <!-- group list item start -->
                                    <div class="group-slide-item">
                                        <div class="group-item">
                                            <div class="group-item-thumb">
                                                <a href="product-details.html">
                                                    <img src="{{ asset('assets/client') }}/img/product/product-7.jpg"
                                                        alt="">
                                                </a>
                                            </div>
                                            <div class="group-item-desc">
                                                <h5 class="group-product-name"><a href="product-details.html">
                                                        Diamond Exclusive earrings</a></h5>
                                                <div class="price-box">
                                                    <span class="price-regular">$90.00</span>
                                                    <span class="price-old"><del>$100.</del></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- group list item end -->

                                    <!-- group list item start -->
                                    <div class="group-slide-item">
                                        <div class="group-item">
                                            <div class="group-item-thumb">
                                                <a href="product-details.html">
                                                    <img src="{{ asset('assets/client') }}/img/product/product-2.jpg"
                                                        alt="">
                                                </a>
                                            </div>
                                            <div class="group-item-desc">
                                                <h5 class="group-product-name"><a href="product-details.html">
                                                        corano top exclusive jewellry</a></h5>
                                                <div class="price-box">
                                                    <span class="price-regular">$20.00</span>
                                                    <span class="price-old"><del>$30.00</del></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- group list item end -->

                                    <!-- group list item start -->
                                    <div class="group-slide-item">
                                        <div class="group-item">
                                            <div class="group-item-thumb">
                                                <a href="product-details.html">
                                                    <img src="{{ asset('assets/client') }}/img/product/product-18.jpg"
                                                        alt="">
                                                </a>
                                            </div>
                                            <div class="group-item-desc">
                                                <h5 class="group-product-name"><a href="product-details.html">
                                                        Handmade Golden ring</a></h5>
                                                <div class="price-box">
                                                    <span class="price-regular">$55.00</span>
                                                    <span class="price-old"><del>$30.00</del></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- group list item end -->

                                    <!-- group list item start -->
                                    <div class="group-slide-item">
                                        <div class="group-item">
                                            <div class="group-item-thumb">
                                                <a href="product-details.html">
                                                    <img src="{{ asset('assets/client') }}/img/product/product-14.jpg"
                                                        alt="">
                                                </a>
                                            </div>
                                            <div class="group-item-desc">
                                                <h5 class="group-product-name"><a href="product-details.html">
                                                        exclusive gold Jewelry</a></h5>
                                                <div class="price-box">
                                                    <span class="price-regular">$45.00</span>
                                                    <span class="price-old"><del>$25.00</del></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- group list item end -->
                                </div>
                            </div>
                            <!-- group list carousel start -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- group product end -->

        <!-- latest blog area start -->
        <section class="latest-blog-area section-padding pt-0">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- section title start -->
                        <div class="section-title text-center">
                            <h2 class="title">latest blogs</h2>
                            <p class="sub-title">There are latest blog posts</p>
                        </div>
                        <!-- section title start -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="blog-carousel-active slick-row-10 slick-arrow-style">
                            <!-- blog post item start -->
                            <div class="blog-post-item">
                                <figure class="blog-thumb">
                                    <a href="blog-details.html">
                                        <img src="{{ asset('assets/client') }}/img/blog/blog-img1.jpg" alt="blog image">
                                    </a>
                                </figure>
                                <div class="blog-content">
                                    <div class="blog-meta">
                                        <p>25/03/2019 | <a href="#">Corano</a></p>
                                    </div>
                                    <h5 class="blog-title">
                                        <a href="blog-details.html">Celebrity Daughter Opens Up About Having Her Eye
                                            Color Changed</a>
                                    </h5>
                                </div>
                            </div>
                            <!-- blog post item end -->

                            <!-- blog post item start -->
                            <div class="blog-post-item">
                                <figure class="blog-thumb">
                                    <a href="blog-details.html">
                                        <img src="{{ asset('assets/client') }}/img/blog/blog-img2.jpg" alt="blog image">
                                    </a>
                                </figure>
                                <div class="blog-content">
                                    <div class="blog-meta">
                                        <p>25/03/2019 | <a href="#">Corano</a></p>
                                    </div>
                                    <h5 class="blog-title">
                                        <a href="blog-details.html">Children Left Home Alone For 4 Days In TV series
                                            Experiment</a>
                                    </h5>
                                </div>
                            </div>
                            <!-- blog post item end -->

                            <!-- blog post item start -->
                            <div class="blog-post-item">
                                <figure class="blog-thumb">
                                    <a href="blog-details.html">
                                        <img src="{{ asset('assets/client') }}/img/blog/blog-img3.jpg" alt="blog image">
                                    </a>
                                </figure>
                                <div class="blog-content">
                                    <div class="blog-meta">
                                        <p>25/03/2019 | <a href="#">Corano</a></p>
                                    </div>
                                    <h5 class="blog-title">
                                        <a href="blog-details.html">Lotto Winner Offering Up Money To Any Man That
                                            Will Date Her</a>
                                    </h5>
                                </div>
                            </div>
                            <!-- blog post item end -->

                            <!-- blog post item start -->
                            <div class="blog-post-item">
                                <figure class="blog-thumb">
                                    <a href="blog-details.html">
                                        <img src="{{ asset('assets/client') }}/img/blog/blog-img4.jpg" alt="blog image">
                                    </a>
                                </figure>
                                <div class="blog-content">
                                    <div class="blog-meta">
                                        <p>25/03/2019 | <a href="#">Corano</a></p>
                                    </div>
                                    <h5 class="blog-title">
                                        <a href="blog-details.html">People are Willing Lie When Comes Money, According
                                            to Research</a>
                                    </h5>
                                </div>
                            </div>
                            <!-- blog post item end -->

                            <!-- blog post item start -->
                            <div class="blog-post-item">
                                <figure class="blog-thumb">
                                    <a href="blog-details.html">
                                        <img src="{{ asset('assets/client') }}/img/blog/blog-img5.jpg" alt="blog image">
                                    </a>
                                </figure>
                                <div class="blog-content">
                                    <div class="blog-meta">
                                        <p>25/03/2019 | <a href="#">Corano</a></p>
                                    </div>
                                    <h5 class="blog-title">
                                        <a href="blog-details.html">romantic Love Stories Of Hollywood’s Biggest
                                            Celebrities</a>
                                    </h5>
                                </div>
                            </div>
                            <!-- blog post item end -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- latest blog area end -->

        <!-- brand logo area start -->
        {{-- <div class="brand-logo section-padding pt-0">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="brand-logo-carousel slick-row-10 slick-arrow-style">
                            <!-- single brand start -->
                            <div class="brand-item">
                                <a href="#">
                                    <img src="{{ asset('assets/client') }}/img/brand/1.png" alt="">
                                </a>
                            </div>
                            <!-- single brand end -->

                            <!-- single brand start -->
                            <div class="brand-item">
                                <a href="#">
                                    <img src="{{ asset('assets/client') }}/img/brand/2.png" alt="">
                                </a>
                            </div>
                            <!-- single brand end -->

                            <!-- single brand start -->
                            <div class="brand-item">
                                <a href="#">
                                    <img src="{{ asset('assets/client') }}/img/brand/3.png" alt="">
                                </a>
                            </div>
                            <!-- single brand end -->

                            <!-- single brand start -->
                            <div class="brand-item">
                                <a href="#">
                                    <img src="{{ asset('assets/client') }}/img/brand/4.png" alt="">
                                </a>
                            </div>
                            <!-- single brand end -->

                            <!-- single brand start -->
                            <div class="brand-item">
                                <a href="#">
                                    <img src="{{ asset('assets/client') }}/img/brand/5.png" alt="">
                                </a>
                            </div>
                            <!-- single brand end -->

                            <!-- single brand start -->
                            <div class="brand-item">
                                <a href="#">
                                    <img src="{{ asset('assets/client') }}/img/brand/6.png" alt="">
                                </a>
                            </div>
                            <!-- single brand end -->
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <!-- brand logo area end -->
    </main>
@endsection
