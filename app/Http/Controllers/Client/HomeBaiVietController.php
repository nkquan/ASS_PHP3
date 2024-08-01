<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\BaiViet;
use App\Models\DanhMucBaiViet;
use Illuminate\Http\Request;

class HomeBaiVietController extends Controller
{
    public function index () {
        $baiViets = BaiViet::orderBy('id', 'desc')->paginate(10);
        $danhMuc = DanhMucBaiViet::get();
        return view('clients.baiviets.index', compact('baiViets', 'danhMuc'));
    }
    public function baiVietChiTiet (string $id) {
        $baiViet = BaiViet::findOrFail($id);
        $danhMuc = DanhMucBaiViet::get();
        return view('clients.baiviets.baivietchitiet', compact('baiViet', 'danhMuc'));
    }
    public function baivietdanhmuc (string $id) {
        $baiViets = BaiViet::where('bai_viet_id', $id)->paginate(10);
        $danhMuc = DanhMucBaiViet::get();
        return view('clients.baiviets.index', compact('baiViets', 'danhMuc'));
    }
}
