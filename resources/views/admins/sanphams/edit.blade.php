@extends('layouts.admin')
@section('title')
    Quản lí Sản Phẩm
@endsection
@section('content')
    <div class="dashboard-page-content">
        <div class="row mb-9 align-items-center justify-content-between">
            <div class="col-md-6 mb-8 mb-md-0">
                <h2 class="fs-4 mb-0">Quản lý Sản Phẩm</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-header">
                        <h5 class="card-title mb-0">Cập Nhật Sản Phẩm </h5>
                    </div><!-- end card header -->

                    <div class="card-body">
                        <form action="{{ route('sanphams.update', $sanPham->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="ma_san_pham" class="form-label">Mã Sản Phẩm</label>
                                        <input type="text" id="ma_san_pham" name="ma_san_pham"
                                            class="form-control
                                        @error('ma_san_pham') is-invalid @enderror"
                                            value="{{ $sanPham->ma_san_pham }}" placeholder="Mã Sản phẩm">
                                        @error('ma_san_pham')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="gia_san_pham" class="form-label">Giá Sản Phẩm</label>
                                        <input type="number" id="gia_san_pham" name="gia_san_pham"
                                            class="form-control
                                        @error('gia_san_pham') is-invalid @enderror"
                                            value="{{ $sanPham->gia_san_pham }}" placeholder="Giá Sản phẩm">
                                        @error('gia_san_pham')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="danh_muc_id" class="form-label">Danh Mục</label>
                                        <select name="danh_muc_id"
                                            class="form-control @error('danh_muc_id') is-invalid @enderror">
                                            <option selected>--Chọn Danh Mục--</option>
                                            @foreach ($listDanhMuc as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ $sanPham->danh_muc_id == $item->id ? 'selected' : '' }}>
                                                    {{ $item->ten_danh_muc }}</option>
                                            @endforeach
                                        </select>
                                        @error('danh_muc_id')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="ngay_nhap" class="form-label">Ngày Nhập</label>
                                        <input type="date" id="ngay_nhap" name="ngay_nhap"
                                            class="form-control
                                        @error('ngay_nhap') is-invalid @enderror"
                                            value="{{ $sanPham->ngay_nhap }}" placeholder="Ngày Nhập">
                                        @error('ngay_nhap')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="mo_ta" class="form-label">Mô tả</label>
                                        <textarea name="mo_ta" id="mo_ta" class="form-control" rows="3" placeholder="Mô tả">{{ $sanPham->mo_ta }}</textarea>
                                        @error('mo_ta')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="trang_thai">Trạng thái</label>
                                        <label for="form-label">
                                            <input type="radio" name="trang_thai" value="0"> Ẩn
                                        </label>
                                        <label for="form-label">
                                            <input type="radio" name="trang_thai" value="1"> Hiện
                                        </label>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="ten_san_pham" class="form-label">Tên Sản Phẩm</label>
                                        <input type="text" id="ten_san_pham" name="ten_san_pham"
                                            class="form-control
                                        @error('ten_san_pham') is-invalid @enderror"
                                            value="{{ $sanPham->ten_san_pham }}" placeholder="Tên Sản phẩm">
                                        @error('ten_san_pham')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="gia_khuyen_mai" class="form-label">Giá Khuyến Mãi</label>
                                        <input type="number" id="gia_khuyen_mai" name="gia_khuyen_mai"
                                            class="form-control
                                        @error('gia_khuyen_mai') is-invalid @enderror"
                                            value="{{ $sanPham->gia_khuyen_mai }}" placeholder="Giá Khuyến Mãi">
                                        @error('gia_khuyen_mai')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="so_luong" class="form-label">Số Lượng Sản Phẩm</label>
                                        <input type="number" id="so_luong" name="so_luong"
                                            class="form-control
                                        @error('so_luong') is-invalid @enderror"
                                            value="{{ $sanPham->so_luong }}" placeholder="Số Lượng Sản Phấm">
                                        @error('so_luong')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="hinh_anh" class="form-label">Hình Ảnh</label>
                                        <input type="file" id="hinh_anh" name="hinh_anh" class="form-control"
                                            onchange="showImage(event)">
                                        <img id="img_danh_muc" src="{{ Storage::Url($sanPham->hinh_anh) }}"
                                            alt="hình ảnh sản phẩm" style="width: 100px;">
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

@section('js')
    <script>
        function showImage(event) {
            const img_danh_muc = document.getElementById('img_danh_muc');


            const file = event.target.files[0];

            const reader = new FileReader();

            reader.onload = function() {
                img_danh_muc.src = reader.result;
                img_danh_muc.style.display = 'block';
            }
            if (file) {
                reader.readAsDataURL(file)
            }
        }
    </script>
@endsection
