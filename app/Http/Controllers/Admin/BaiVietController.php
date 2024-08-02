<?php

namespace App\Http\Controllers\Admin;

use App\Models\BaiViet;
use Illuminate\Http\Request;
use App\Models\DanhMucBaiViet;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class BaiVietController extends Controller
{
    public function index()
    {
        $listBaiViets = BaiViet::paginate(10);

        return view('admins.baiviets.index', compact('listBaiViets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $listDanhMuc = DanhMucBaiViet::query()->get();

        return view('admins.baiviets.create', compact('listDanhMuc'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->isMethod('POST')) {
            $param = $request->except('_token');
            
            if ($request->hasFile('hinh_anh')) {
                $filepath = $request->file('hinh_anh')->store('uploads/baiviets', 'public');
            } else {
                $filepath = null;
            }
            $param['hinh_anh'] = $filepath;

            BaiViet::create($param);
            return redirect()->route('baiviets.index')->with('success', 'Thêm sản phẩm thành công');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $listDanhMuc = DanhMucBaiViet::query()->get();

        $baiViet = BaiViet::query()->findOrFail($id);

        return view('admins.baiviets.edit', compact('listDanhMuc', 'baiViet'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if ($request->isMethod('PUT')) {
            $param = $request->except('_token', '_method');

            $baiViet = BaiViet::query()->findOrFail($id);

            if ($request->hasFile('hinh_anh')) {
                if ($baiViet->hinh_anh && Storage::disk('public')->exists($baiViet->hinh_anh)) {
                    Storage::disk('public')->delete($baiViet->hinh_anh);
                }
                $filepath = $request->file('hinh_anh')->store('uploads/slider', 'public');
            } else {
                $filepath = $baiViet->hinh_anh;
            }
            $param['hinh_anh'] = $filepath;

            $baiViet->update($param);
        }
        return redirect()->route('baiviets.index')->with('success', 'Cập nhật sản phẩm thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $baiViet = BaiViet::query()->findOrFail($id);

        if ($baiViet->hinh_anh && Storage::disk('public')->exists($baiViet->hinh_anh)) {
            Storage::disk('public')->delete($baiViet->hinh_anh);
        }

        $baiViet->delete();

        return redirect()->route('baiviets.index')->with('success', 'Xóa sản phẩm thành công');
    }
}
