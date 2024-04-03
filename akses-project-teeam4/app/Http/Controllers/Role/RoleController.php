<?php

namespace App\Http\Controllers\Role;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Models\Role;

class RoleController extends Controller
{
    public function showRole()
    {
        $roles = Role::all()->sortByDesc('created_at',);
        return view('Admin.Role.roles', ['roles' => $roles]);
    }

    public function showCreateRoleForm()
    {
        return view('Admin.Role.create-role');
    }

    public function storeRole(Request $request)
    {
        try {

            $roleData = $request->validate([
                'role_name' => 'required|unique:roles',
                'role_desc' => 'nullable'
            ]);

            $roles = new Role;
            $roles->role_name = $roleData["role_name"];
            $roles->role_desc = $roleData["role_desc"];
            $roles->save();

            Session::flash('success-to-create-role', 'Role ' . $roleData['role_name'] . ' Berhasil Dibuat');

            return back();
        } catch (\Illuminate\Validation\ValidationException $error) {
            dd($error);
        }
    }

    public function showEditRoleForm()
    {
        // Todo
    }

    public function updateForm()
    {
        // Todo
    }

    public function destoryRoleData()
    {
        // Todo
    }
}
