@extends('layouts.admin')
@section('title')
    Quản lí Sản Shẩm
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
                        <h5 class="card-title mb-0">Thêm Sản Phẩm </h5>
                    </div><!-- end card header -->

                    <div class="card-body">
                        <form action="{{ route('sanphams.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="ma_san_pham" class="form-label">Mã Sản Phẩm</label>
                                        <input type="text" id="ma_san_pham" name="ma_san_pham"
                                            class="form-control
                                        @error('ma_san_pham') is-invalid @enderror"
                                            value="{{ old('ma_san_pham') }}" placeholder="Mã Sản phẩm">
                                        @error('ma_san_pham')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="gia_san_pham" class="form-label">Giá Sản Phẩm</label>
                                        <input type="number" id="gia_san_pham" name="gia_san_pham"
                                            class="form-control
                                        @error('gia_san_pham') is-invalid @enderror"
                                            value="{{ old('gia_san_pham') }}" placeholder="Giá Sản phẩm">
                                        @error('gia_san_pham')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="danh_muc_id" class="form-label">Danh Mục</label>
                                        <select name="danh_muc_id"
                                            class="form-select @error('danh_muc_id') is-invalid @enderror">
                                            <option value="0">--Chọn Danh Mục--</option>
                                            @foreach ($listDanhMuc as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ old('danh_muc_id') == $item->id ? 'selected' : '' }}>
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
                                            value="{{ old('ngay_nhap') }}" placeholder="Ngày Nhập">
                                        @error('ngay_nhap')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="mo_ta" class="form-label">Mô tả</label>
                                        <textarea name="mo_ta" id="mo_ta" class="form-control" rows="3" placeholder="Mô tả" {{ old('mo_ta') }}></textarea>
                                        @error('mo_ta')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="trang_thai" class="form-label">Trạng thái</label>
                                        <div class="col-sm-10 mb-3 d-flex gap-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="trang_thai"
                                                    id="gridRadios1" value="1" checked>
                                                <label class="form-check-label text success" for="gridRadios1">
                                                    Hiển Thị
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="trang_thai"
                                                    id="gridRadios2" value="0" checked>
                                                <label class="form-check-label text danger" for="gridRadios2">
                                                    Ẩn
                                                </label>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="ten_san_pham" class="form-label">Tên Sản Phẩm</label>
                                        <input type="text" id="ten_san_pham" name="ten_san_pham"
                                            class="form-control
                                        @error('ten_san_pham') is-invalid @enderror"
                                            value="{{ old('ten_san_pham') }}" placeholder="Tên Sản phẩm">
                                        @error('ten_san_pham')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="gia_khuyen_mai" class="form-label">Giá Khuyến Mãi</label>
                                        <input type="number" id="gia_khuyen_mai" name="gia_khuyen_mai"
                                            class="form-control
                                        @error('gia_khuyen_mai') is-invalid @enderror"
                                            value="{{ old('gia_khuyen_mai') }}" placeholder="Giá Khuyến Mãi">
                                        @error('gia_khuyen_mai')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="so_luong" class="form-label">Số Lượng Sản Phấm</label>
                                        <input type="number" id="so_luong" name="so_luong"
                                            class="form-control
                                        @error('so_luong') is-invalid @enderror"
                                            value="{{ old('so_luong') }}" placeholder="Số Lượng Sản Phấm">
                                        @error('so_luong')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="hinh_anh" class="form-label">Hình Ảnh</label>
                                        <input type="file" id="hinh_anh" name="hinh_anh" class="form-control mb-2"
                                            onchange="showImage(event)">
                                        <img id="img_danh_muc" src="" alt="hình ảnh sản phẩm"
                                            style="width: 100px; display: none">
                                    </div>
                                    <div class="mb-3">
                                        <label for="hinh_anh" class="form-label">Album hình ảnh</label>
                                        <i id="add-row"
                                         class="fas fa-plus ms-2" style="cursor: pointer;"></i>
                                        </i>
                                        <table class="table-align-middle table-nowrap mb-0">
                                            <tbody id="image-table-body">
                                                <tr>
                                                    <td class="d-flex align-items-center">
                                                        <img id="preview_0"
                                                            src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRkx9WATkc9Q2kr7A_KyTAMY0HQl4sDUX66Z58tsZT22DXyFO6i2US-Gyk725EmpaMZCT4&usqp=CAU"
                                                            alt="hình ảnh sản phẩm" style="width: 50px;" class="me-5">
                                                        <input type="file" id="hinh_anh" name="list_hinh_anh[id_0]"
                                                            class="form-control mb-2" onchange="previewImage(this,0)">
                                                    </td>
                                                    <td>
                                                        <i class="far fa-trash ms-2" style="cursor: pointer;"
                                                            ></i>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var rowCount = 1;

            document.getElementById('add-row').addEventListener('click', function() {
                var tableBody = document.getElementById('image-table-body')

                var newRow = document.createElement('tr');

                newRow.innerHTML = `
                        <td class="d-flex align-items-center">
                            <img id="preview_${rowCount}"
                                src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRkx9WATkc9Q2kr7A_KyTAMY0HQl4sDUX66Z58tsZT22DXyFO6i2US-Gyk725EmpaMZCT4&usqp=CAU"
                                alt="hình ảnh sản phẩm" style="width: 50px;" class="me-5">
                            <input type="file" id="hinh_anh" name="list_hinh_anh[id_${rowCount}]"
                                class="form-control mb-2" onchange="previewImage(this,${rowCount})">
                        </td>
                        <td>
                            <i 
                                class="far fa-trash ms-2" style="cursor: pointer;"onclick="removeRow(this)">
                            </i>
                        </td>
                    `;

                tableBody.appendChild(newRow);
                rowCount++;
            })
        });

        function previewImage(input, rowIndex) {
            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    document.getElementById(`preview_${rowIndex}`).setAttribute('src', e.target.result)
                }

                reader.readAsDataURL(input.files[0])
            }
        }

        function removeRow (item) {
            var row = item.closest('tr');

            row.remove();
        }
    </script>
@endsection
