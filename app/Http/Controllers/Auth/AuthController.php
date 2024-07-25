<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\ChucVu;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }
    public function login(Request $request)
    {
        $request->validate(
            [
                'email' => 'required|email',
                'password' => 'required|min:6',
            ],
            [
                'email.required' => 'Bắt buộc nhập.',
                'email.email' => 'Email sai định dạng.',
                'password.required' => 'Bắt buộc nhập.',
                'password.min' => 'Mật khẩu ít nhất 6 kí tự.',
            ]
        );
        if ($request->isMethod('POST')) {
            $user = $request->only('email', 'password');
            if (auth()->attempt($user)) {
                if (auth()->user()->chuc_vu_id === 1) {
                    return redirect()->route('admin.dashboard');
                }
                return redirect()->route('home.index');
            } else {
                return redirect()->route('login');
            }
        }
    }
    public function showRegister()
    {
        return view('auth.register');
    }
    public function register(Request $request)
    {
        $request->validate(
            [
                'ho_ten' => 'required',
                'email' => 'required|email|unique:tai_khoans',
                'password' => 'required|min:6',
                'confirmpassword' => 'required|same:password'
            ],
            [
                'ho_ten.required' => 'Bắt buộc nhập.',
                'email.required' => 'Bắt buộc nhập.',
                'email.email' => 'Email sai định dạng.',
                'email.unique' => 'Email đã tồn tại.',
                'password.required' => 'Bắt buộc nhập.',
                'password.min' => 'Mật khẩu ít nhất 6 kí tự.',
                'confirmpassword.required' => 'Bắt buộc nhập.',
                'confirmpassword.same' => 'Mật khẩu phải giống nhau'
            ]
        );
        if ($request->isMethod('POST')) {
            $user = User::create([
                'ho_ten' => $request->ho_ten,
                'email' => $request->email,
                'password' => $request->password,
            ]);
            Auth::login($user);
            return redirect()->route('home.index');
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
