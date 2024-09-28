<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Exception;

class RoleController extends Controller
{
    function __construct()
    {
        $this->middleware(['permission:role-index'], ['only' => ['indexrole']]);
        $this->middleware(['permission:role-create'], ['only' => ['createrole', 'storerole']]);
        $this->middleware(['permission:role-edit'], ['only' => ['editrole', 'updaterole']]);
    }

    public function indexrole() {
        $roles = Role::all();
        return view('backend/role.index',compact('roles'));
    }
    public function createrole() {
        $permissions = Permission::all();
        return view('backend.role.create', compact('permissions'));
    }
    
    public function storerole(Request $request)
    {
        try{
            $this->validate($request, [
                'name' => 'required|unique:roles,name',
                'permission' => 'required',
            ]);

            $role = Role::create(['name' => $request->input('name')]);
            $role->syncPermissions($request->input('permission'));

            return redirect()->route('role.index')->with('success', 'Role created successfully');
        } catch (Exception $e) {
                return redirect()->route('role.index')->with('error', 'An error occurred. Please try again.');
        }

    }


    public function editrole($id)
    {
        $role = Role::find($id);
        $permissions = Permission::get();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id", $id)
            ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
            ->all();

        return view('backend/role.edit', compact('role', 'permissions', 'rolePermissions'));
    }

    public function updaterole(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'permission' => 'required',
        ]);
        try{
            $role = Role::find($id);
            $role->name = $request->input('name');
            $role->save();

            $role->syncPermissions($request->input('permission'));

            return redirect()->route('role.index')->with('success', 'Role updated successfully');
        } catch (Exception $e) {
            return redirect()->route('role.index')->with('error', 'An error occurred. Please try again.');
        }
    }
}
