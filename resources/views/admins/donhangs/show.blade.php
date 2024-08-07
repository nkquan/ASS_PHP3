@extends('layouts.admin')
@section('title')
    Quản lí Đơn Hàng
@endsection
@section('content')
    <div class="dashboard-page-content">
        <div class="row mb-9 align-items-center justify-content-between">
            <div class="col-md-6 mb-8 mb-md-0">
                <h2 class="fs-4 mb-0"> Quản lí Đơn Hàng</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-header">
                        <h5 class="card-title mb-0">Thông tin chi tiết đơn hàng</h5>
                    </div><!-- end card header -->

                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <th>Thông tin tài khoản đặt hàng</th>
                                <th>Thông tin người nhận hàng</th>
                            </thead>
                            <tbody>
                                <td>
                                    {{-- <ul>
                                        <li>Tên tài khoản: <b>{{ $donHang->user->ho_ten}}</b>
                                        <li>Email: <b>{{ $donHang->user->email}}</b>
                                        <li>SĐT: <b>{{ $donHang->user->so_dien_thoai}}</b>
                                        <li>Địa chỉ: <b>{{ $donHang->user->dia_chi}}</b>
                                        <li>Tài Khoản: <b>{{ $donHang->user->chuc_vu_id}}</b>
                                    </ul> --}}
                                </td>
                                <td>
                                    <ul>
                                    <li><p>Tên người nhận: <strong>{{ $donHang->ten_nguoi_nhan}}</strong></p>
                                    <li><p>Email người nhận: <strong>{{ $donHang->email_nguoi_nhan}}</strong></p>
                                    <li><p>SĐT người nhận: <strong>{{ $donHang->sdt_nguoi_nhan}}</strong></p>
                                    <li><p>Địa chỉ người nhận: <strong>{{ $donHang->dia_chi_nguoi_nhan}}</strong></p>
                                    <li><p>Ngày đặt hàng: <strong>{{ $donHang->created_at->format('d-m-Y')}}</strong></p>
                                    <li><p>Ghi chú nhận hàng: <strong>{{ $donHang->ghi_chu}}</strong></p>
                                    <li><p>Trạng thái đơn hàng: <strong>{{ $trangThaiDonHang[$donHang->trang_thai_don_hang]}}</strong></p>
                                    <li><p>Trạng thái thanh toán: <strong>{{ $trangThaiThanhToan[$donHang->trang_thai_thanh_toan]}}</strong></p>
                                    <li><p>Tổng tiền hàng: <strong>{{ number_format( $donHang->tien_hang, 0, '', '.')}} đ</strong></p>
                                    <li><p>Tổng tiền ship: <strong>{{ number_format( $donHang->tien_ship, 0, '', '.')}} đ</strong></p>
                                    <li><p>Tổng tiền đơn hàng: <strong class="text-danger">{{ number_format( $donHang->tong_tien, 0, '', '.')}} đ</strong></p>
                                </ul>
                                </td>
                            </tbody>
                            </table>
                    </div>

                </div>
            </div>
        </div>


        <div class="row mt-10">
            <div class="col-12">
                <div class="card">

                    <div class="card-header">
                        <h5 class="card-title mb-0">Sản phẩm đơn hàng</h5>
                    </div><!-- end card header -->

                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead class="thead-light">
                                <tr>
                                    <th>Hình Ảnh</th>
                                    <th>Mã sản phẩm</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Đơn giá</th>
                                    <th>Số lượng</th>
                                    <th>Thành tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($donHang->chiTietDonHang as $item)
                                @php
                                    $sanPham = $item->sanPham;
                                @endphp
                                <tr>
                                    <td>
                                        <img class="img-fluid" src="{{ Storage::url($sanPham->hinh_anh)}}" alt="Sản Phẩm" width="100px">
                                    </td>
                                    <td>{{ $sanPham->ma_san_pham}}</td>
                                    <td>{{ $sanPham->ten_san_pham}}</td>
                                    <td>{{ number_format( $item->don_gia, 0, '', '.')}} đ</td>
                                    <td>{{ $item->so_luong}}</td>
                                    <td>{{number_format( $item->thanh_tien, 0, '', '.')}} đ</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
@endsection
