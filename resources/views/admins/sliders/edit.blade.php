@extends('layouts.admin')
@section('title')
Quản lí slider
@endsection
@section('content')
<div class="dashboard-page-content">
    <div class="row mb-9 align-items-center justify-content-between">
        <div class="col-md-6 mb-8 mb-md-0">
            <h2 class="fs-4 mb-0">Quản lí slider</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card-header">
                    <h5 class="card-title mb-0">Cập nhật Slider </h5>
                </div><!-- end card header -->

                <div class="card-body">
                    <form action="{{ route('sliders.update', $slider->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="tieu_de" class="form-label">Tiêu đề</label>
                                    <input type="text" id="tieu_de" name="tieu_de"
                                        class="form-control
                                    @error('tieu_de') is-invalid @enderror"
                                        value="{{ $slider->tieu_de }}" placeholder="Tiêu đề">
                                    @error('tieu_de')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="mo_ta" class="form-label">Mô tả</label>
                                    <input type="text" id="mo_ta" name="mo_ta"
                                        class="form-control
                                    @error('mo_ta') is-invalid @enderror"
                                        value="{{ $slider->mo_ta }}" placeholder="Mô tả">
                                    @error('mo_ta')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="hinh_anh" class="form-label">Hình Ảnh</label>
                                    <input type="file" id="hinh_anh" name="hinh_anh" class="form-control"
                                        onchange="showImage(event)">
                                    <img id="img_danh_slider" src="{{ Storage::Url($slider->hinh_anh) }}" alt="hình ảnh sản phẩm" width="100">
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
            const img_danh_slider = document.getElementById('img_danh_slider');


            const file = event.target.files[0];

            const reader = new FileReader();

            reader.onload = function() {
                img_danh_slider.src = reader.result;
                img_danh_slider.style.display = 'block';
            }
            if (file) {
                reader.readAsDataURL(file)
            }
        }
    </script>
@endsection