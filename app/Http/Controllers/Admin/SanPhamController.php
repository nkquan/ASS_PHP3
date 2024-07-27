<?php

namespace App\Http\Controllers\Admin;

use App\Models\DanhMuc;
use App\Models\SanPham;
use Illuminate\Http\Request;
use App\Models\HinhAnhSanPham;
use App\Http\Controllers\Controller;
use App\Http\Requests\SanPhamRequest;
use Illuminate\Support\Facades\Storage;

class SanPhamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listSanPham = SanPham::orderByDesc('trang_thai')->get();

        return view('admins.sanphams.index', compact('listSanPham'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $listDanhMuc = DanhMuc::query()->get();

        return view('admins.sanphams.create', compact('listDanhMuc'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SanPhamRequest $request)
    {
        if ($request->isMethod('POST')) {
            $param = $request->except('_token');

            if ($request->hasFile('hinh_anh')) {
                $param['hinh_anh'] = $request->file('hinh_anh')->store('uploads/sanpham', 'public');
            } else {
                $param['hinh_anh'] = null;
            }

            $sanPham = SanPham::query()->create($param);

            $sanPhamID = $sanPham->id;

            if ($request->hasFile('list_hinh_anh')) {
                foreach ($request->file('list_hinh_anh') as $image) {
                    if ($image) {
                        $path = $image->store('uploads/hinhanhsanpham/id_' . $sanPhamID, 'public');
                        $sanPham->hinhAnhSanPham()->create([
                            'san_pham_id' => $sanPhamID,
                            'link_hinh_anh' => $path,
                        ]);
                    }
                }
            }
            return redirect()->route('sanphams.index')->with('success', 'Thêm sản phẩm thành công');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $listDanhMuc = DanhMuc::query()->get();

        $sanPham = SanPham::query()->findOrFail($id);

        return view('admins.sanphams.edit', compact('listDanhMuc', 'sanPham'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SanPhamRequest $request, string $id)
    {
        if ($request->isMethod('PUT')) {
            $param = $request->except('_token', '_method');

            $sanPham = SanPham::query()->findOrFail($id);

            if ($request->hasFile('hinh_anh')) {
                if ($sanPham->hinh_anh && Storage::disk('public')->exists($sanPham->hinh_anh)) {
                    Storage::disk('public')->delete($sanPham->hinh_anh);
                }
                $param['hinh_anh'] = $request->file('hinh_anh')->store('uploads/sanpham', 'public');
            } else {
                $param['hinh_anh'] = $sanPham->hinh_anh;
            }

            
                $currentImages = $sanPham->hinhAnhSanPham->pluck('id')->toArray();
                $arrayCombine = array_combine($currentImages, $currentImages);

                foreach ($arrayCombine as $key => $value) {
                    if (!array_key_exists($key, $request->list_hinh_anh)) {
                        $hinhAnhSanPham = HinhAnhSanPham::query()->find($key);

                        if ($hinhAnhSanPham && Storage::disk('public')->exists($hinhAnhSanPham->link_hinh_anh)) {
                            Storage::disk('public')->delete($hinhAnhSanPham->link_hinh_anh);
                            $hinhAnhSanPham->delete();
                        }
                    }
                }
                foreach ($request->list_hinh_anh as $key => $image) {
                    if (!array_key_exists($key, $arrayCombine)) {
                        if ($request->hasFile("list_hinh_anh.$key")) {
                            $path = $image->store('uploads/hinhanhsanpham/id_' . $id, 'public');
                            $sanPham->hinhAnhSanPham()->create([
                                'san_pham_id' => $id,
                                'link_hinh_anh' => $path,
                            ]);
                        }
                    } else if (is_file($image) && $request->hasFile("list_hinh_anh.$key")) {

                        $hinhAnhSanPham = HinhAnhSanPham::query()->find($key);
                        if ($hinhAnhSanPham && Storage::disk('public')->exists($hinhAnhSanPham->link_hinh_anh)) {
                            Storage::disk('public')->delete($hinhAnhSanPham->link_hinh_anh);
                        }
                        $path = $image->store('uploads/hinhanhsanpham/id_' . $id, 'public');
                        $hinhAnhSanPham->update([
                            'link_hinh_anh' => $path,
                        ]);
                    }
                }
            

            $sanPham->update($param);
        }
        return redirect()->route('sanphams.index')->with('success', 'Cập nhật sản phẩm thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $sanPham = SanPham::query()->findOrFail($id);

        if ($sanPham->hinh_anh && Storage::disk('public')->exists($sanPham->hinh_anh)) {
            Storage::disk('public')->delete($sanPham->hinh_anh);
        }

        $path = 'uploads/hinhanhsanpham/id_' . $id;
        if (Storage::disk('public')->exists($path)) {
            Storage::disk('public')->deleteDirectory($path);
        }

        $sanPham->hinhAnhSanPham()->delete();
        $sanPham->delete();
        return redirect()->route('sanphams.index')->with('success', 'Xóa sản phẩm thành công');
    }
}
