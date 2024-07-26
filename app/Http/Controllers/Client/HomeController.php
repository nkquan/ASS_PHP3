<?php

namespace App\Http\Controllers\Client;

use Carbon\Carbon;
use App\Models\Slider;
use App\Models\DanhMuc;
use App\Models\SanPham;
use App\Models\BinhLuan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index () {
        $slider = Slider::get();
        $sanPhams = SanPham::get();
        $sanPhamYeuThich = SanPham::where('luot_xem', '>', 2)->get();
        $danhMuc = DanhMuc::get();
        return view('clients.home', compact('slider', 'sanPhams', 'sanPhamYeuThich', 'danhMuc'));
    }

    public function sanPhamDetail (string $id) {
        $sanPham = SanPham::findOrFail($id);
        $sanPhamCungLoai = SanPham::where('danh_muc_id', $sanPham->danh_muc_id)->get();
        $binhLuans = BinhLuan::get();
        $sanPham->update([
            'luot_xem' => $sanPham->luot_xem + 1,
        ]);
        return view('clients.detail', compact('sanPham', 'sanPhamCungLoai', 'binhLuans'));
    }

    public function sanPhamAll () {
        $sanPhams = SanPham::paginate(15);
        return view('clients.sanpham', compact('sanPhams'));
    }
    public function sanPhamDanhMuc (string $id) {
        $danhMuc = DanhMuc::find($id);
        $sanPhams = SanPham::where('danh_muc_id', $danhMuc->id)->paginate(15);
        return view('clients.sanpham', compact('sanPhams'));
    }

    public function postComment (Request $request, string $id) {
        BinhLuan::create([
            'san_pham_id' => $id,
            'tai_khoan_id' => auth()->user()->id,
            'noi_dung' => $request->noi_dung,
            'ngay_dang' => Carbon::now('Asia/Ho_Chi_Minh'),
        ]);
        return redirect()->back();
    }

    public function deleteBinhLuan(string $id) {
        BinhLuan::where('id', $id)->delete();
        
        return redirect()->back();
    }
}
