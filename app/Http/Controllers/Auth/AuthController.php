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
            $user = $request->only('email', 'password');
            if (auth()->attempt($user)) {
                if (auth()->user()->chuc_vu_id === 1) {
                    return redirect()->route('admin.dashboard');
                }
                return redirect('home');
            }else {
                return redirect()->route('login');
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
            []
        );
        if ($request->isMethod('POST')) {
            $user = User::create([
                'ho_ten' => $request->ho_ten,
                'email' => $request->email,
                'password' => $request->password,
            ]);
            // Auth::login($user);
            return redirect()->route('login');
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
