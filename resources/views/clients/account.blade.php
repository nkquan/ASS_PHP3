@extends('layouts.client')

@section('title')
    Tài khoản
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
                                    <li class="breadcrumb-item"><a href="index.html"><i class="fa fa-home"></i></a></li>
                                    <li class="breadcrumb-item active" aria-current="page">my-account</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb area end -->


        <!-- my account wrapper start -->
        <div class="my-account-wrapper section-padding">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show container" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show container" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
                </div>
            @endif
            <div class="container">
                <div class="section-bg-color">
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- My Account Page Start -->
                            <div class="myaccount-page-wrapper">
                                <!-- My Account Tab Menu Start -->
                                <div class="row">
                                    <div class="col-lg-3 col-md-4">
                                        <div class="myaccount-tab-menu nav" role="tablist">
                                            <a href="#dashboad" class="active" data-bs-toggle="tab"><i
                                                    class="fa fa-dashboard"></i>
                                                Dashboard</a>
                                            <a href="#orders" data-bs-toggle="tab"><i class="fa fa-cart-arrow-down"></i>
                                                Đơn hàng</a>
                                            <a href="#account-info" data-bs-toggle="tab"><i class="fa fa-user"></i> Tài
                                                khoản</a>
                                            <a href="#address-edit" data-bs-toggle="tab"><i class="fa-solid fa-lock"
                                                    style="font-size: 12px;padding-left: 7px;padding-right: 8px"></i>
                                                Đổi mật khẩu</a>
                                            <form action="{{ route('logout') }}" method="post">
                                                @csrf
                                                <a><button href=""><i class="fa fa-sign-out"></i> Đăng
                                                        xuất</button></a>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- My Account Tab Menu End -->

                                    <!-- My Account Tab Content Start -->
                                    <div class="col-lg-9 col-md-8">
                                        <div class="tab-content" id="myaccountContent">
                                            <!-- Single Tab Content Start -->
                                            <div class="tab-pane fade show active" id="dashboad" role="tabpanel">
                                                <div class="myaccount-content">
                                                    <h5>Dashboard</h5>
                                                    <div class="welcome">
                                                        <p>Hello,
                                                            @if (auth()->check())
                                                                <strong
                                                                    class="text-uppercase">{{ auth()->user()->ho_ten }}</strong>
                                                            @endif
                                                        </p>
                                                    </div>
                                                    <p class="mb-0">Bạn có thể xem thông tin và chỉnh sửa tài khoản dễ
                                                        dàng.</p>
                                                </div>
                                            </div>
                                            <!-- Single Tab Content End -->

                                            <!-- Single Tab Content Start -->
                                            <div class="tab-pane fade" id="orders" role="tabpanel">
                                                <div class="myaccount-content">
                                                    <h5>Đơn hàng</h5>
                                                    <div class="myaccount-table table-responsive text-center">
                                                        <table class="table table-bordered">
                                                            <thead class="thead-light">
                                                                <tr>
                                                                    <th>Order</th>
                                                                    <th>Date</th>
                                                                    <th>Status</th>
                                                                    <th>Total</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>1</td>
                                                                    <td>Aug 22, 2018</td>
                                                                    <td>Pending</td>
                                                                    <td>$3000</td>
                                                                    <td><a href="cart.html" class="btn btn-sqr">View</a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>2</td>
                                                                    <td>July 22, 2018</td>
                                                                    <td>Approved</td>
                                                                    <td>$200</td>
                                                                    <td><a href="cart.html" class="btn btn-sqr">View</a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>3</td>
                                                                    <td>June 12, 2017</td>
                                                                    <td>On Hold</td>
                                                                    <td>$990</td>
                                                                    <td><a href="cart.html" class="btn btn-sqr">View</a>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Single Tab Content End -->

                                            <!-- Single Tab Content Start -->
                                            <div class="tab-pane fade" id="account-info" role="tabpanel">
                                                <div class="myaccount-content">
                                                    <h5>Thông tin tài khoản</h5>
                                                    <div class="account-details-form">
                                                        <form action="{{ route('home.editAccount', $account->id) }}"
                                                            method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                    <div class="single-input-item">
                                                                        <label class="form-label" for="ho_ten">Họ
                                                                            tên</label>
                                                                        <input type="text" id="ho_ten" name="ho_ten"
                                                                            value="{{ $account->ho_ten }}"
                                                                            placeholder="Họ tên" />
                                                                    </div>
                                                                    <div class="single-input-item">
                                                                        <label class="form-label"
                                                                            for="email">Email</label>
                                                                        <input type="email" id="email" name="email"
                                                                            value="{{ $account->email }}"
                                                                            placeholder="Email" />
                                                                    </div>
                                                                    <div class="single-input-item">
                                                                        <label class="form-label" for="dia_chi">Địa
                                                                            chỉ</label>
                                                                        <input type="text" id="dia_chi" name="dia_chi"
                                                                            value="{{ $account->dia_chi }}"
                                                                            placeholder="Địa chỉ" />
                                                                    </div>
                                                                    <div class="mt-20">
                                                                        <label class="form-label" for="gioi_tinh">Giới
                                                                            tính</label>
                                                                        <div class="d-flex">
                                                                            <label class="me-3" for="gioi_tinh1">
                                                                                <input type="radio" id="gioi_tinh1"
                                                                                    name="gioi_tinh" value="1"
                                                                                    {{ $account->gioi_tinh === 1 ? 'checked' : '' }} />
                                                                                Nam
                                                                            </label>
                                                                            <label class="me-3" for="gioi_tinh2">
                                                                                <input type="radio" id="gioi_tinh2"
                                                                                    name="gioi_tinh" value="2"
                                                                                    {{ $account->gioi_tinh === 2 ? 'checked' : '' }} />
                                                                                Nữ
                                                                            </label>
                                                                            <label for="gioi_tinh3">
                                                                                <input type="radio" id="gioi_tinh3"
                                                                                    name="gioi_tinh" value="0"
                                                                                    {{ $account->gioi_tinh === 0 ? 'checked' : '' }} />
                                                                                Bí mật
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-6">
                                                                    <div class="single-input-item">
                                                                        <label class="form-label" for="ngay_sinh">Ngày
                                                                            sinh</label>
                                                                        <input type="date" id="ngay_sinh"
                                                                            name="ngay_sinh"
                                                                            value="{{ $account->ngay_sinh }}" />
                                                                    </div>
                                                                    <div class="single-input-item">
                                                                        <label class="form-label" for="so_dien_thoai">Số
                                                                            điện thoại</label>
                                                                        <input type="number" id="so_dien_thoai"
                                                                            name="so_dien_thoai"
                                                                            value="{{ $account->so_dien_thoai }}"
                                                                            placeholder="Số điện thoại" />
                                                                    </div>
                                                                    <div class="single-input-item">
                                                                        <label class="form-label" for="anh_dai_dien">Ảnh
                                                                            đại diện</label>
                                                                        <input type="file" id="anh_dai_dien"
                                                                            name="anh_dai_dien" />
                                                                        <img src="{{ Storage::Url($account->anh_dai_dien) }}"
                                                                            alt="" width="50px">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="single-input-item d-flex justify-content-end">
                                                                <button type="submit" class="btn btn-sqr">Lưu thông
                                                                    tin</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Single Tab Content End -->

                                            <!-- Single Tab Content Start -->
                                            <div class="tab-pane fade" id="address-edit" role="tabpanel">
                                                <div class="myaccount-content">
                                                    <form action="{{ route('home.editAccountPwd', $account->id) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('PUT')
                                                        <fieldset>
                                                            <h5>Thay đổi mật khẩu</h5>
                                                            <div class="single-input-item">
                                                                <label for="current-pwd" class="required">Mật khẩu hiện
                                                                    tại</label>
                                                                <input type="password" id="current-pwd" name="currentPwd"
                                                                    placeholder="Mật khẩu hiện tại" />
                                                                @error('currentPwd')
                                                                    <p class="text-danger">{{ $message }}</p>
                                                                @enderror
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                    <div class="single-input-item">
                                                                        <label for="new-pwd" class="required">Mật khẩu
                                                                            mới</label>
                                                                        <input type="password" id="new-pwd"
                                                                            name="password" placeholder="Mật khẩu mới" />
                                                                        @error('password')
                                                                            <p class="text-danger">{{ $message }}</p>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="single-input-item">
                                                                        <label for="confirm-pwd" class="required">Xác nhận
                                                                            mật khẩu</label>
                                                                        <input type="password" id="confirm-pwd"
                                                                            name="confirmPwd"
                                                                            placeholder="Xác nhận mật khẩu" />
                                                                        @error('confirmPwd')
                                                                            <p class="text-danger">{{ $message }}</p>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </fieldset>

                                                        <div class="single-input-item d-flex justify-content-end">
                                                            <button type="submit" class="btn btn-sqr">Đổi mật
                                                                khẩu</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <!-- Single Tab Content End -->
                                        </div>
                                    </div> <!-- My Account Tab Content End -->
                                </div>
                            </div> <!-- My Account Page End -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- my account wrapper end -->
    </main>
@endsection
