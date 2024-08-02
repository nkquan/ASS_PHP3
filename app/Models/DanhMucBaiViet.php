<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DanhMucBaiViet extends Model
{
    use HasFactory;

    protected $fillable = [
        'ten_danh_muc',
    ];

    public function baiViet () {
        return $this->hasMany(BaiViet::class, 'bai_viet_id', 'id');
    }
}
