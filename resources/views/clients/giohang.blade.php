@extends('layouts.client')

@section('title')
    Chi tiết sản phẩm
@endsection
@section('content')
    <main>
        <!-- breadcrumb area start -->
        <div class="breadcrumb-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-wrap">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html"><i class="fa fa-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href="shop.html">shop</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">cart</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb area end -->

        <!-- cart main wrapper start -->
        <div class="cart-main-wrapper section-padding">
            <div class="container">
                <div class="section-bg-color">
                    <div class="row">
                        <div class="col-lg-12">
                            <form action="{{ route('cart.update') }}" method="POST">
                                @csrf
                                <!-- Cart Table Area -->
                                <div class="cart-table table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th class="pro-thumbnail">HÌnh Ảnh</th>
                                                <th class="pro-title">Sản Phẩm</th>
                                                <th class="pro-price">GIá</th>
                                                <th class="pro-quantity">Số lượng</th>
                                                <th class="pro-subtotal">Tổng tiền</th>
                                                <th class="pro-remove">Hành Động</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($cart as $key => $item)
                                                <tr>
                                                    <td class="pro-thumbnail">
                                                        <a href="#"><img
                                                                class="img-fluid"src="{{ Storage::url($item['hinh_anh']) }}"
                                                                alt="Product" />
                                                            <input type="hidden" name="cart[{{ $key }}][hinh_anh]"
                                                                value="{{ $item['hinh_anh'] }}">
                                                        </a>
                                                    </td>
                                                    <td class="pro-title"><a href="{{ route('home.detail', $key) }}">
                                                            {{ $item['ten_san_pham'] }}
                                                        </a>
                                                        <input type="hidden" name="cart[{{ $key }}][ten_san_pham]"
                                                            value="{{ $item['ten_san_pham'] }}">
                                                    </td>
                                                    <td class="pro-price">
                                                        <span>{{ $item['gia'] ? number_format($item['gia'], 0, '', '.') : '' }}đ</span>
                                                        <input type="hidden" name="cart[{{ $key }}][gia]"
                                                            value="{{ $item['gia'] }}">
                                                    </td>
                                                    <td class="pro-quantity">
                                                        <div class="pro-qty">
                                                            <input type="text" class="quantityInput"
                                                                data-price="{{ $item['gia'] }}"
                                                                value="{{ $item['so_luong'] }}"
                                                                name="cart[{{ $key }}][so_luong]">
                                                        </div>
                                                    </td>
                                                    <td class="pro-subtotal">
                                                        <span
                                                            class="subtotal">{{ $item['gia'] ? number_format($item['gia'] * $item['so_luong'], 0, '', '.') : '' }}
                                                            đ</span>
                                                    </td>
                                                    <td class="pro-remove"><a href="#"><i
                                                                class="fa fa-trash-o"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- Cart Update Option -->
                                <div class="cart-update-option d-block d-md-flex justify-content-end">
                                    <div class="cart-update">
                                        <button type="submit" class="btn btn-sqr">Update Cart</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-5 ml-auto">
                            <!-- Cart Calculation Area -->
                            @if(!empty($item['gia']))
                                <div class="cart-calculator-wrapper">
                                    <div class="cart-calculate-items">
                                        <h6>Đơn hàng</h6>
                                        <div class="table-responsive">
                                            <table class="table">
                                                <tr>
                                                    <td>Tổng đơn hàng</td>
                                                    <td class="sub-total">
                                                        {{ $item['gia'] ? number_format($subTotal, 0, '', '.') : '' }} đ
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Phí ship</td>
                                                    <td class="shipping">
                                                        {{ $item['gia'] ? number_format($shipping, 0, '', '.') : '' }} đ
                                                    </td>
                                                </tr>
                                                <tr class="total">
                                                    <td>Tổng tiền</td>
                                                    <td class="total-amount">
                                                        {{ $item['gia'] ? number_format($total, 0, '', '.') : '' }} đ</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <a href="checkout.html" class="btn btn-sqr d-block">Thanh Toán</a>
                                </div>
                                @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- cart main wrapper end -->
    </main>
@endsection

@section('js')
    <script>
        $('.pro-qty').prepend('<span class="dec qtybtn">-</span>');
        $('.pro-qty').append('<span class="inc qtybtn">+</span>');

        function updateTotal() {
            var subTotal = 0;
            $('.quantityInput').each(function() {
                var $input = $(this);
                var price = parseFloat($input.data('price'));
                var quantity = parseFloat($input.val());
                subTotal += price * quantity;
            })

            var shipping = parseFloat($('.shipping').text().replace(/\./g, '').replace(' đ', ''))
            var total = subTotal + shipping;

            $('.sub-total').text(subTotal.toLocaleString('vi-VN') + ' đ')
            $('.total-amount').text(total.toLocaleString('vi-VN') + ' đ')
        }

        $('.qtybtn').on('click', function() {
            var $button = $(this);
            var $input = $button.parent().find('input')
            var oldValue = parseFloat($input.val());

            if ($button.hasClass('inc')) {
                var newVal = oldValue + 1;
            } else {
                if (oldValue > 1) {
                    var newVal = oldValue - 1;
                } else {
                    var newVal = 1;
                }
            }
            $input.val(newVal);

            var price = parseFloat($input.data('price'));
            var subtotalElement = $input.closest('tr').find('.subtotal');
            var newSubtatol = newVal * price;

            subtotalElement.text(newSubtatol.toLocaleString('vi-VN') + ' đ')

            updateTotal();
        });

        $('.quantityInput').on('change', function() {
            var value = parseInt($(this).val(), 10);

            if (isNaN(value) || value < 1) {
                alert('Số lượng phải lớn hơn bằng 1')
                $(this).val(1)
            }
            updateTotal();
        })

        $('.pro-remove').on('click', function() {
            event.preventDefault();
            var $row = $(this).closest('tr');
            $row.remove();

            updateTotal();
        })
        updateTotal();
    </script>
@endsection
