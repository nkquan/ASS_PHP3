<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    use HasFactory;

    protected $fillable = [
        'ma_san_pham',
        'ten_san_pham',
        'gia_san_pham',
        'gia_khuyen_mai',
        'hinh_anh',
        'so_luong',
        'luot_xem',
        'ngay_nhap',
        'mo_ta',
        'danh_muc_id',
        'trang_thai',
    ];

    public function danhMuc () {
        return $this->belongsTo(DanhMuc::class);
    }
    public function hinhAnhSanPham () {
        return $this->hasMany(HinhAnhSanPham::class);
    }
}
