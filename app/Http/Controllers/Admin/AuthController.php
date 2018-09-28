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

            return View::make('admin.login');

        } else {

            $this->validate($request,
                [
                    'email'    => 'required|email',
                    'password' => 'required|min:3'
                ],
                [
                    'required' => ':attribute là bắt buộc',
                    'email'    => ':attribute phải đúng định dạng',
                    'min'      => ':attribute không được nhỏ hơn :min'
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

                return 'Login thành công';

            }
        }
    	
    }
}
