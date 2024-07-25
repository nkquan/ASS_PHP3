@extends('layouts.admin')
@section('title')
    Quản lí danh mục
@endsection
@section('content')
    <div class="dashboard-page-content">
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-header">
                        <h5 class="card-title mb-0">Cập nhật Danh Mục Sản Phẩm </h5>
                    </div><!-- end card header -->

                    <div class="card-body">
                        <form action="{{ route('danhmucs.update',$danhMuc->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="ten_danh_muc" class="form-label">Tên danh mục</label>
                                        <input type="text" id="ten_danh_muc" name="ten_danh_muc"
                                            class="form-control
                                        @error('ten_danh_muc') is-invalid @enderror"
                                            value="{{ $danhMuc->ten_danh_muc }}" placeholder="Tên danh mục">
                                        @error('ten_danh_muc')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="hinh_anh" class="form-label">Hình Ảnh</label>
                                        <input type="file" id="hinh_anh" name="hinh_anh" class="form-control">
                                        <img src="{{ Storage::Url($danhMuc->hinh_anh) }}" alt="" width="100px">
                                    </div>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
