<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DanhMuc extends Model
{
    use HasFactory;
    protected $fillable = [
        'ten_danh_muc',
        'hinh_anh'
    ];

    public function sanPham () {
        return $this->hasMany(SanPham::class);
    }
}
