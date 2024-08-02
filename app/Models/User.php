<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'tai_khoans';

    protected $fillable = [
        'ho_ten',
        'anh_dai_dien',
        'ngay_sinh',
        'email',
        'so_dien_thoai',
        'gioi_tinh',
        'dia_chi',
        'password',
        'chuc_vu_id',
        'trang_thai',
    ];

    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'password' => 'hashed'
    ];

    public function chucVu () {
        return $this->belongsTo(ChucVu::class);
    }

    public function donHang() {
        return $this->hasMany(DonHang::class);
    }
}
