@extends('layouts.admin')
@section('title')
    Quản lí sản phẩm
@endsection
@section('content')
    <div class="dashboard-page-content">
        <div class="row mb-9 align-items-center justify-content-between">
            <div class="col-md-6 mb-8 mb-md-0">
                <h2 class="fs-4 mb-0">Danh Sách Sản Phẩm</h2>
            </div>
            <div class="col-md-6 d-flex flex-wrap justify-content-md-end">
                <a href="{{ route('sanphams.create') }}" class="btn btn-primary">Thêm Sản Phẩm</a>
            </div>
        </div>
        <div class="card mb-4 rounded-4 p-7">
            <div class="card-header bg-transparent px-0 pt-0 pb-7">
                <div class="row align-items-center justify-content-between">
                    <div class="col-md-4 col-12 mr-auto mb-md-0 mb-6">
                        <select class="form-select">
                            <option selected data-select2-id="3">All Categories</option>
                            <option>Women's Clothing</option>
                        </select>
                    </div>
                    <div class="col-md-8">
                        <div class="row justify-content-end flex-nowrap d-flex">
                            <div class="col-lg-4 col-md-6 col-6">
                                <input type="date" class="form-control bg-input border-0">
                            </div>
                            <div class="col-lg-4 col-md-6 col-6">
                                <select class="form-select">
                                    <option>Status</option>
                                    <option>All</option>
                                    <option>Paid</option>
                                    <option>Chargeback</option>
                                    <option>Refund</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body px-0 pt-7 pb-0">
                <div class="table-responsive">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
                        </div>
                    @endif
                    <table class="table table-hover align-middle table-nowrap mb-0">
                        <thead>
                            <tr>
                                <th>Mã sản phẩm</th>
                                <th>Tên sản phẩm</th>
                                <th>Danh mục</th>
                                <th>Hình Ảnh</th>
                                <th>Giá</th>
                                <th>Giá khuyến mãi</th>
                                <th>Số lượng</th>
                                <th>Trạng thái</th>
                                <th>Hành Động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($listSanPham as $index => $item)
                                <tr>
                                    <td>{{ $item->ma_san_pham }}</td>
                                    <td>{{ $item->ten_san_pham }}</td>
                                    <td>{{ $item->danhMuc->ten_danh_muc }}</td>
                                    <td>
                                        <img src="{{ Storage::Url($item->hinh_anh) }}" alt="" width="100px">
                                    </td>
                                    <td>{{number_format( $item->gia_san_pham) }}</td>
                                    <td>{{empty($item->gia_khuyen_mai)? 0 : number_format($item->gia_khuyen_mai) }}</td>
                                    <td>{{ $item->so_luong }}</td>
                                    <td class="{{ $item->trang_thai == 1 ? 'text-success' : 'text-danger' }}">
                                        {{ $item->trang_thai == 1 ? 'Hiển thị' : 'Ẩn' }}
                                    </td>
                                    <td>
                                        <a href="{{ route('sanphams.edit', $item->id) }}"
                                            class="btn btn-primary py-4 px-5 btn-xs fs-13px me-4"><i
                                                class="far fa-pen me-2"></i> Sửa</a>
                                        <form action="{{ route('sanphams.destroy', $item->id) }}" method="POST"
                                            class="d-inline" onsubmit="return confirm('Bạn có muốn xóa không')">
                                            @csrf
                                            @method('DELETE')
                                            <button 
                                                class="btn btn-outline-primary btn-hover-bg-danger btn-hover-border-danger btn-hover-text-light py-4 px-5 fs-13px btn-xs me-4"><i
                                                    class="far fa-trash me-2"></i> Xóa</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
