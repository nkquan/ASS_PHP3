@extends('layouts.admin')

@section('css')
    <!-- Quill css -->
    <link href="{{ asset('assets/admin') }}/libs/quill/quill.core.js" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/admin') }}/libs/quill/quill.snow.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/admin') }}/libs/quill/quill.bubble.css" rel="stylesheet" type="text/css" />
@endsection

@section('title')
    Quản lí bài viết
@endsection
@section('content')
    <div class="dashboard-page-content">
        <div class="row mb-9 align-items-center justify-content-between">
            <div class="col-md-6 mb-8 mb-md-0">
                <h2 class="fs-4 mb-0">Danh Mục Bài Viết</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-header">
                        <h5 class="card-title mb-0">Thêm Danh Mục Bài Viết </h5>
                    </div><!-- end card header -->

                    <div class="card-body">
                        <form action="{{ route('danhmucbaiviets.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="ten_danh_muc" class="form-label">Tên danh mục</label>
                                        <input type="text" id="ten_danh_muc" name="ten_danh_muc"
                                            class="form-control
                                        @error('ten_danh_muc') is-invalid @enderror"
                                            value="{{ old('ten_danh_muc') }}" placeholder="Tên danh mục">
                                        @error('ten_danh_muc')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn btn-primary">Thêm</button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
