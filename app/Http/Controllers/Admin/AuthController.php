<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Admin\User;
use Auth;

class AuthController extends Controller
{
    public function auth(Request $request)
    {
        if($request->isMethod('get')) {
            if(Auth::check()) {
                return redirect()->route('home');
            } else {
                return view('admin.login');
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

                $user_id = Auth::user()->id;

                $role = User::select('role')->where('id', $user_id)->first();

                $request->session()->put('role', $role->role);

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
