<?php 

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

trait CheckRole {

	public $user_id;

	public function check_role($action)
	{
		$module = DB::table('roles')->select('module')->where('id', \Session::get('role'))->first();
		$module = explode(";", $module->module);

		if(!in_array($action, $module)) {

			return false;

		} else {

			return true;

		}

	}

	public function page404()
	{
		return view('admin.page404');
	}

}