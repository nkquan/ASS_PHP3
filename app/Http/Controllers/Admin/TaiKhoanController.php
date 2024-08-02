<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ChucVu;
use App\Models\User;
use Illuminate\Http\Request;

class TaiKhoanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $taiKhoans = User::where('chuc_vu_id', '<>', 1)->paginate(10);
        return view('admins.taikhoans.index', compact('taiKhoans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $chucVus = ChucVu::where('id', '<>', 1)->get();
        return view('admins.taikhoans.create', compact('chucVus'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'ho_ten' => 'required',
                'email' => 'required|email|unique:tai_khoans',
                'password' => 'required|min:6',
            ],
            [
                'ho_ten.required' => 'Bắt buộc nhập.',
                'email.required' => 'Bắt buộc nhập.',
                'email.email' => 'Email sai định dạng.',
                'email.unique' => 'Email đã tồn tại.',
                'password.required' => 'Bắt buộc nhập.',
                'password.min' => 'Mật khẩu ít nhất 6 kí tự.'
            ]
        );
        if ($request->isMethod('POST')) {
            User::create([
                'ho_ten' => $request->ho_ten,
                'email' => $request->email,
                'password' => $request->password,
                'chuc_vu_id' => $request->chuc_vu_id,
            ]);
            return redirect()->route('taikhoans.index')->with('success', 'Thêm tài khoản thành công');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Xóa tài khoản thành công');
    }
}
