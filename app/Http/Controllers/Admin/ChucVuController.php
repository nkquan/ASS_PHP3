<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ChucVu;
use Illuminate\Http\Request;

class ChucVuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    { {
            $chucvus = ChucVu::paginate(5);
            return view('admins.chucvus.index', compact('chucvus'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admins.chucvus.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->isMethod('POST')) {
            $param = $request->except('_token');
            ChucVu::create($param);
            return redirect()->route('chucvus.index')->with('success', 'Thêm chức vụ thành công');
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
        $chucvus = ChucVu::findOrFail($id);

        return view('admins.chucvus.edit', compact('chucvus'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if ($request->isMethod('PUT')) {
            $param = $request->except('_token','_method');
            $chucvus = ChucVu::findOrFail($id);

            $chucvus->update($param);
            return redirect()->route('chucvus.index')->with('success', 'Cập nhật chức vụ thành công');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $chucvus = ChucVu::findOrFail($id);

        $chucvus->delete();

        return redirect()->route('chucvus.index')->with('success', 'Xoá thành công');
    }
}
