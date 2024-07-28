@extends('layouts.admin')
@section('title')
    Quản lí Chức Vụ
@endsection
@section('content')
    <div class="dashboard-page-content">
        <div class="row mb-9 align-items-center justify-content-between">
            <div class="col-md-6 mb-8 mb-md-0">
                <h2 class="fs-4 mb-0">Danh Sách Tài Khoản</h2>
            </div>
            <div class="col-md-6 d-flex flex-wrap justify-content-md-end">
                <a href="" class="btn btn-primary">Thêm Chức vụ</a>
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
                                <th>#</th>
                                <th>Họ tên</th>
                                <th>Hình ảnh</th>
                                <th>Chức vụ</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($taiKhoans as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $item->ho_ten }}</td>
                                    <td>
                                        <img src="{{ Storage::Url($item->anh_dai_dien) }}" alt="" width="100px">
                                    </td>
                                    <td>{{ $item->chucVu->ten_chuc_vu }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>
                                        <a href=""
                                            class="btn btn-primary py-4 px-5 btn-xs fs-13px me-4"><i
                                                class="far fa-pen me-2"></i> Sửa</a>
                                        <form action="{{ route('taikhoans.destroy', $item->id) }}" method="POST"
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
    {{ $taiKhoans->links() }}
@endsection
