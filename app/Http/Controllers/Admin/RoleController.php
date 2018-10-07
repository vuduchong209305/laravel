<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use App\Models\Admin\Role;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->data['active'] = 'role';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$this->data['list_record'] = Role::select('*')->get();
        return view('admin.role.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['module'] = [
            'User'   => ['index', 'add', 'edit', 'delete'],
            'News'   => ['index', 'add', 'edit', 'delete'],
            'Member' => ['index', 'add', 'edit', 'delete']
        ];

        return view('admin.role.add', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $role = new Role;
        if(empty($request->list_role)) {
            return back()->with('error', 'Vui lòng chọn Module quyền');
        }
        $role->role_name = $request->name;
        $role->module = json_encode($request->list_role);
        $role->status = $request->status == 'on' ? 1 : 0;
        $role->save();

        return redirect()->route('role_index')->with('success', 'Thêm thành công');
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
        $this->data['detail'] = Role::find($id);

        $this->data['module'] = [
            'User'   => ['index', 'add', 'edit', 'delete'],
            'News'   => ['index', 'add', 'edit', 'delete'],
            'Member' => ['index', 'add', 'edit', 'delete']
        ];

        return view('admin.role.edit', $this->data);
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
        $role = Role::find($id);
        $role->status = !isset($request->status) ? 0 : 1;
        $role->save();

        return redirect()->route('role_index')->with('success', 'Cập nhật thành công');
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
