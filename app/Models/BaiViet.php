<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaiViet extends Model
{
    use HasFactory;

    protected $fillable = [
        'noi_dung',
        'bai_viet_id',
        'tieu_de',
    ];

    public function danhMucBaiViet () {
        return $this->belongsTo(DanhMucBaiViet::class, 'bai_viet_id', 'id');
    }
}
