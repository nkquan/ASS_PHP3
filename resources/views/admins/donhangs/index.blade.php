@extends('layouts.admin')
@section('title')
    Quản lí đơn hàng
@endsection
@section('content')
    <div class="dashboard-page-content">
        <div class="row mb-9 align-items-center justify-content-between">
            <div class="col-md-6 mb-8 mb-md-0">
                <h2 class="fs-4 mb-0">Danh sách đơn hàng</h2>
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
                    @if (session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
                        </div>
                    @endif
                    <table class="table table-hover align-middle table-nowrap mb-0">
                        <thead>
                            <tr>
                                <th>Mã đơn hàng</th>
                                <th>Ngày đặt</th>
                                <th>Tổng tiền</th>
                                <th>Trạng thái</th>
                                <th>Hành Động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($listDonHang as $item)
                                <tr>
                                    <th>
                                        <a href="quanlydonhangs.show">

                                            {{ $item->ma_don_hang }}
                                        </a>
                                    </th>
                                    <td>
                                        {{ $item->created_at->format('d-m-Y') }}
                                    </td>
                                    <td>
                                        {{ number_format($item->tong_tien, 0, '', '.') }} đ
                                    </td>
                                    <td>
                                        <form action="{{ route('quanlydonhangs.update', $item->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <select name="trang_thai_don_hang" class="form-select w-75"
                                            onchange="confirmSubmit(this)"
                                            data-default-value="{{$item->trang_thai_don_hang}}"
                                            >
                                                @foreach ($trangThaiDonHang as $key => $value)
                                                    <option value="{{ $key }}"
                                                        {{$key == $item->trang_thai_don_hang ? 'selected' : '' }}
                                                        {{$key == 'huy_don_hang' ? 'disabled' : ''}}>
                                                        {{ $value }}</option>
                                                @endforeach
                                            </select>
                                        </form>
                                    </td>
                                    <td>
                                        <a href="quanlydonhangs.show"
                                            class="btn btn-outline-primary btn-hover-bg-danger btn-hover-border-danger btn-hover-text-light py-4 px-5 fs-13px btn-xs me-4">
                                            <i class="far fa-eye me-2"></i>
                                        </a>
                                        @if ($item->trang_thai_don_hang === 'huy_don_hang')
                                        <form action="{{ route('quanlydonhangs.destroy', $item->id) }}" method="POST"
                                            class="d-inline" onsubmit="return confirm('Bạn có muốn xóa không')">
                                            @csrf
                                            @method('DELETE')
                                            <button
                                                class="btn btn-outline-primary btn-hover-bg-danger btn-hover-border-danger btn-hover-text-light py-4 px-5 fs-13px btn-xs me-4"><i
                                                    class="far fa-trash me-2"></i> Xóa</button>
                                        </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
    {{-- {{ $listDanhMuc->links('pagination::bootstrap-5') }} --}}
@endsection

@section('js')
    <script>
        function confirmSubmit(selectElement) {
            var form = selectElement.form;
            var selectedOption = selectElement.options[selectElement.selectedIndex].text;
            var defaultValue = selectElement.getAttribute('data-default-value');

            if(confirm('Bạn có chắc chắn thay đổi trạng thái đơn hàng thành "' + selectedOption + '" không?')){
                form.submit()
            }else{
                selectElement.value = defaultValue;
            }

        }
    </script>
@endsection