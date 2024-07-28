<?php

namespace App\Http\Controllers\Admin;

use App\Models\DanhMuc;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\DanhMucRequest;
use Illuminate\Support\Facades\Storage;

class DanhMucController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listDanhMuc = DanhMuc::paginate(5);
        return view('admins.danhmucs.index', compact('listDanhMuc'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admins.danhmucs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DanhMucRequest $request)
    {
        if ($request->isMethod('POST')) {
            $param = $request->except('_token');

            if ($request->hasFile('hinh_anh')) {
                $filepath = $request->file('hinh_anh')->store('uploads/danhmucs', 'public');
            } else {
                $filepath = null;
            }
            $param['hinh_anh'] = $filepath;

            DanhMuc::create($param);
            return redirect()->route('danhmucs.index')->with('success', 'Thêm danh mục thành công');
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
        $danhMuc = DanhMuc::findOrFail($id);

        return view('admins.danhmucs.edit', compact('danhMuc'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DanhMucRequest $request, string $id)
    {
        if ($request->isMethod('PUT')) {
            $param = $request->except('_token', '_method');

            $danhMuc = DanhMuc::findOrFail($id);

            if ($request->hasFile('hinh_anh')) {
                if ($danhMuc->hinh_anh && Storage::disk('public')->exists($danhMuc->hinh_anh)) {
                    Storage::disk('public')->delete($danhMuc->hinh_anh);
                }
                $filepath = $request->file('hinh_anh')->store('uploads/danhmucs', 'public');
            } else {
                $filepath = $danhMuc->hinh_anh;
            }
            $param['hinh_anh'] = $filepath;
            $danhMuc->update($param);
            return redirect()->route('danhmucs.index')->with('success', 'Cập nhật danh mục thành công');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $danhMuc = DanhMuc::findOrFail($id);
        $danhMuc->delete();

        if ($danhMuc->hinh_anh && Storage::disk('public')->exists($danhMuc->hinh_anh)) {
            Storage::disk('public')->delete($danhMuc->hinh_anh);
        }
        return redirect()->route('danhmucs.index')->with('success', 'Xóa danh mục thành công');
    }
}
