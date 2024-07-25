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
                        <h5 class="card-title mb-0">Thêm Danh Mục Sản Phẩm </h5>
                    </div><!-- end card header -->

                    <div class="card-body">
                        <form action="{{ route('danhmucs.store') }}" method="POST" enctype="multipart/form-data">
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

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="hinh_anh" class="form-label">Hình Ảnh</label>
                                        <input  type="file" id="hinh_anh" name="hinh_anh"
                                            class="form-control" onchange="showImage(event)">
                                            <img id="img_danh_muc" src="" alt="hình ảnh sản phẩm" style="width: 100px; display: none">
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
    function showImage(event){
        const img_danh_muc = document.getElementById('img_danh_muc');
        

        const file = event.target.files[0];

        const reader = new FileReader();

        reader.onload=function(){
            img_danh_muc.src = reader.result;
            img_danh_muc.style.display = 'block';
        }
        if(file){
            reader.readAsDataURL(file)
        }
    }
</script>
    
@endsection