@extends('layouts.admin')
@section('title')
    Quản lí tài khoản
@endsection
@section('content')
    <div class="dashboard-page-content">
        <div class="row mb-9 align-items-center justify-content-between">
            <div class="col-md-6 mb-8 mb-md-0">
                <h2 class="fs-4 mb-0">Danh Sách tài khoản</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-header">
                        <h5 class="card-title mb-0">Thêm tài khoản </h5>
                    </div><!-- end card header -->

                    <div class="card-body">
                        <form action="{{ route('taikhoans.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="ho_ten">Họ và tên</label>
                                        <input type="text" class="form-control @error('ho_ten') is-invalid @enderror"
                                            name="ho_ten" value="{{ old('ho_ten') }}" placeholder="Họ và tên" />
                                        @error('ho_ten')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="password">Mật khẩu</label>
                                        <input type="password" class="form-control @error('passowrd') is-invalid @enderror"
                                            name="password" placeholder="Enter your Password" />
                                        @error('passowrd')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="email">Email</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                            name="email" value="{{ old('email') }}" placeholder="Email" />
                                        @error('email')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        
                                        <label class="form-label" for="chuc_vu_id">Chức vụ</label>
                                        <select class="form-select" name="chuc_vu_id" id="">
                                            @foreach ($chucVus as $item)
                                                <option value="{{ $item->id }}">{{ $item->ten_chuc_vu }}</option>
                                            @endforeach
                                        </select>
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
@endsection
