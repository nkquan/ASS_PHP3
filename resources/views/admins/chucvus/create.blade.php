@extends('layouts.admin')
@section('title')
    Quản lí Chức vụ
@endsection
@section('content')
    <div class="dashboard-page-content">
        <div class="row mb-9 align-items-center justify-content-between">
            <div class="col-md-6 mb-8 mb-md-0">
                <h2 class="fs-4 mb-0">Danh Sách chức vụ</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-header">
                        <h5 class="card-title mb-0">Thêm Chức Vụ </h5>
                    </div><!-- end card header -->

                    <div class="card-body">
                        <form action="{{ route('chucvus.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="ten_chuc_vu" class="form-label">Tên danh mục</label>
                                        <input type="text" id="ten_chuc_vu" name="ten_chuc_vu"
                                            class="form-control
                                        @error('ten_chuc_vu') is-invalid @enderror"
                                            value="{{ old('ten_chuc_vu') }}" placeholder="Tên Chức vụ">
                                        @error('ten_chuc_vu')
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