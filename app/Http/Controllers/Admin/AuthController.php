<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Validator;
use Auth;

class AuthController extends Controller
{
    public function login()
    {
    	return View::make('admin.login');
    }

    public function auth(Request $request)
    {
    	$this->validate($request, [
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
    	]);

    	$user_data = [
			'email'    => $request->get('email'),
			'password' => $request->get('password')
    	];

    	if(Auth::attempt($user_data)) {

    		return 'Login thành công';

    	} else {

    		return 'Login thất bại';

    	}
    }
}
