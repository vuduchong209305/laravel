<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\User;
use App\Models\Admin\Role;
use Validator;
use Intervention\Image\ImageManagerStatic as Image;
use Storage;
use File;

class UserController extends Controller
{
    public function __construct()
    {
        $this->data['active'] = 'user';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if($this->check_role('User_index')) {

            $this->data['list_record'] = User::select('users.id', 'users.username', 'users.avatar', 'users.phone', 'users.email', 'users.status', 'r.role_name')->join('roles as r', 'users.role', '=', 'r.id')->get();

            return view('admin.user.index', $this->data);

        } else {

            return view('admin.page404');

        }

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['list_role'] = Role::select('id', 'role_name')->where('status', 1)->get();
        return view('admin.user.add', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'email'    => 'required|email',
            'username' => 'required',
            'password' => 'required',
            'phone'    => 'required|numeric',
            'role'     => 'required',
            'avatar'   => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ];

        $message = [
            'required' => ':attribute bắt buộc.',
            'email'    => ':attribute phải đúng định dạng email',
            'numeric'  => ':attribute phải là dạng số',
            'image'    => ':attribute phải là file ảnh',
            'mimes'    => ':attribute phải là các định dạng jpeg,png,jpg,gif,svg',
            'max'      => ':attribute phải nhỏ hơn 2MB'
        ];

        $validator = Validator::make($request->all(), $rules, $message);

        if($validator->fails()) {

            return back()->with('error', 'Đã có lỗi xảy ra ! Vui lòng kiểm tra lại');

        } else {

            if ($request->hasFile('avatar')) {

                $file = $request->file('avatar');

                $name  = time() . '-' . $file->getClientOriginalName();

                $img = Image::make($file->getRealPath());
                $img->resize(300, 300, function ($constraint) {
                    $constraint->aspectRatio();                 
                });

                $img->stream(); // <-- Key point

                $path = 'avatar/admin/'. $name;

                Storage::disk('local')->put($path, $img, 'public');

            }

            $user = new User;

            $user->username = $request->username;
            $user->email    = $request->email;
            $user->password = bcrypt($request->password);
            $user->phone    = $request->phone;
            $user->role     = $request->role;
            $user->status   = $request->status == 'on' ? 1 : 0;
            $user->avatar   = isset($path) ? $path : '';

            $user->save();

            return redirect()->route('user_index')->with('success', 'Thêm mới thành công');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
