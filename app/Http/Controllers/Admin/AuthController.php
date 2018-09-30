<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Validator;
use Auth;
use Hash;

class AuthController extends Controller
{
    public function auth(Request $request)
    {
        if($request->isMethod('get')) {
            if(Auth::check()) {
                return redirect()->route('home');
            } else {
                return View::make('admin.login');
            }

        } else {

            $this->validate($request,
                [
                    'email'    => 'required|email',
                    'password' => 'required|min:3'
                ],
                [
                    'required' => ':attribute là bắt buộc',
                    'email'    => ':attribute phải đúng định dạng',
                    'min'      => ':attribute phải hơn :min ký tự'
                ],
                [
                    'email'    => 'Email',
                    'password' => 'Password'
                ]
            );

            $login = $request->only('email', 'password');

            if(!Auth::attempt($login)) {

                return back()->with('error', 'Đăng nhập thất bại');

            } else {

                return redirect()->route('home');

            }
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
