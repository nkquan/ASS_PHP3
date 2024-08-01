@extends('layouts.admin')
@section('title')
    Quản lí sản phẩm
@endsection
@section('content')
    <div class="dashboard-page-content">
        <div class="row mb-9 align-items-center justify-content-between">
            <div class="col-md-6 mb-8 mb-md-0">
                <h2 class="fs-4 mb-0">Danh Sách Bình luận</h2>
            </div>
        </div>
        <div class="card mb-4 rounded-4 p-7">
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
                                <th>ID tài khoản</th>
                                <th>Nội dung</th>
                                <th>Ngày đăng</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($binhLuans as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $item->tai_khoan_id }}</td>
                                    <td>{{ $item->noi_dung }}</td>
                                    <td>{{ $item->ngay_dang }}</td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
