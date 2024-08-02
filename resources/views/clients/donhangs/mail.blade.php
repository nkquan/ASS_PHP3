@component('mail::message')
    # Xác nhận đơn hàng

    Xin chào {{ $donHang->ten_nguoi_nhan }},

    Cảm ơn bạn đã đặt hàng của chúng tôi.Đây là những thông tin đơn hàng của bạn:

    *** Max đơn hàng: **{{ $donHang->ma_don_hang }},

    *** Sản phẩm đã đặt: **
    @foreach ($donHang->chiTietDonHang as $chiTiet)
        -{{ $chiTiet->sanPham->ten_san_pham }} x {{$chiTiet->so_luong}}: {{number_format($chiTiet->thanh_tien)}} VNĐ
    @endforeach

    *** Tổng tiền: **{{number_format($donHang->tong_tien)}}


@endcomponent
