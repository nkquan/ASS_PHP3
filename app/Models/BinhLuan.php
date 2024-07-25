<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BinhLuan extends Model
{
    use HasFactory;

    protected $fillable = [
        'san_pham_id',
        'tai_khoan_id',
        'noi_dung',
        'ngay_dang',
        'trang_thai',
    ];

    public function sanPham () {
        return $this->hasOne(SanPham::class);
    }
    public function user () {
        return $this->hasOne(User::class);
    }
}
