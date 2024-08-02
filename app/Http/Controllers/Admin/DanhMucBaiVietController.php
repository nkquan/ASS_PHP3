<?php

namespace App\Http\Controllers\Admin;

use App\Models\BaiViet;
use Illuminate\Http\Request;
use App\Models\DanhMucBaiViet;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class DanhMucBaiVietController extends Controller
{
    public function index()
    {
        $listDanhMucBaiViets = DanhMucBaiViet::paginate(5);
        
        return view('admins.danhmucbaiviets.index', compact('listDanhMucBaiViets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admins.danhmucbaiviets.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->isMethod('POST')) {

            $param = $request->except('_token');

            DanhMucBaiViet::create($param);
            return redirect()->route('danhmucbaiviets.index')->with('success', 'Thêm danh mục thành công');
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
        $danhMucBaiViet = DanhMucBaiViet::findOrFail($id);

        return view('admins.danhmucbaiviets.edit', compact('danhMucBaiViet'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if ($request->isMethod('PUT')) {
            $param = $request->except('_token', '_method');

            $danhMuc = DanhMucBaiViet::findOrFail($id);

            $danhMuc->update($param);
            return redirect()->route('danhmucbaiviets.index')->with('success', 'Cập nhật danh mục thành công');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $danhMuc = DanhMucBaiViet::findOrFail($id);

        foreach ($danhMuc->baiViet as $value) {
            if ($value->hinh_anh && Storage::disk('public')->exists($value->hinh_anh)) {
                Storage::disk('public')->delete($value->hinh_anh);
            }
        }

        $danhMuc->baiViet()->delete();
        $danhMuc->delete();

        return redirect()->route('danhmucbaiviets.index')->with('success', 'Xóa danh mục thành công');
    }
}
