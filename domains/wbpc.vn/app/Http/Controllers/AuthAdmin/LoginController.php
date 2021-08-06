<?php

namespace App\Http\Controllers\AuthAdmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function getLogin()
    {
        return view('admin.auth.login');
    }

    public function postLogin(Request $request)
    {
        $data = $request->only('email', 'password');

        if (\Auth::guard('admins')->attempt($data)) {
            return redirect()->route('admin.get.product.list');
        }

        return redirect()->back();
    }

    public function logoutAdmin()
    {
        \Auth::guard('admins')->logout();
        return redirect()->route('get.admin.login');
    }
}
