<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AccountController extends Controller
{
    public function showAccount () {
        $account = User::findOrFail(auth()->user()->id);
        return view('clients.account', compact('account'));
    }

    public function editAccount (Request $request, string $id) {
        if ($request->isMethod('PUT')) {
            $param = $request->except('_token', '_method');

            $account = User::findOrFail($id);

            if ($request->hasFile('anh_dai_dien')) {
                if ($account->anh_dai_dien && Storage::disk('public')->exists($account->anh_dai_dien)) {
                    Storage::disk('public')->delete($account->anh_dai_dien);
                }
                $file = $request->file('anh_dai_dien')->store('uploads/account', 'public');
            } else {
                $file = $account->anh_dai_dien;
            }

            $param['anh_dai_dien'] = $file;

            $account->update($param);

            return redirect()->back()->with('success', 'Cập nhật thông tin tài khoản thành công');
        }
    }

    public function editAccountPwd (Request $request, string $id) {
        $request->validate([
            'currentPwd' => 'required|min:6',
            'password' => 'required|min:6',
            'confirmPwd' => 'required|same:password',
        ]);
        if ($request->isMethod('PUT')) {
            $param = $request->except('_token', '_method');

            $account = User::findOrFail($id);

            if (Hash::check($request->currentPwd, $account->password)) {
                $param['password'] = $request->password;
                $account->update($param);
                return redirect()->back()->with('success', 'Thay đổi mật khẩu thành công');
            } else {
                return redirect()->back()->with('error', 'Mật khẩu hiện tại không đúng');
            }
        }
    }
}
