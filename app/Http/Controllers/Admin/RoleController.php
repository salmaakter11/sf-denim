<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
class RoleController extends Controller
{
    public function index()
    {
     // $roles = Role::whereNotIn('name', ['admin'])->get();
       
        return view('backend.role_permission.allroles');
    }
 
    public function create()
    {
        return view('admin.roles.create');
    }
 
    public function store(Request $request)
    {
        $validated = $request->validate([
         'name' => ['required', 'min:3'],
         'guard_name' => '',
     ]);
     if($validated){
         Role::insert([
             'name' =>  $request->name,
             'guard_name' => 'admin',
         ]);
     }
        return to_route('roles.index')->with('message', 'Role Created successfully.');
    }
 
    public function edit(Role $role)
    {
        $role_id_to_ignore = $role->id;
        $permissions = Permission::whereNotIn('id', function ($query) use ($role_id_to_ignore) {
         $query->select('permission_id')
             ->from('role_has_permissions')
             ->where('role_id', $role_id_to_ignore);
     })->get();
        return view('backend.role_permission.roleupdate', compact('role', 'permissions'));
    }
 
    public function update(Request $request, Role $role)
    {
        $validated = $request->validate(['name' => ['required', 'min:3']]);
        if($validated){
         $role->name = $request->name;
         $role->guard_name = 'admin';
         $role->update();
        }
        return to_route('roles.index')->with('message', 'Role Updated successfully.');
    }
 
    public function destroy(Role $role)
    {
        $role->delete();
 
        return back()->with('message', 'Role deleted.');
    }
 
    public function givePermission(Request $request, Role $role)
    {
 
        if($role->hasPermissionTo($request->permission)){
            return back()->with('message', 'Permission exists.');
        }
        $role->givePermissionTo($request->permission);
        return back()->with('message', 'Permission added.');
    }
 
    public function revokePermission(Role $role, Permission $permission)
    {
        if($role->hasPermissionTo($permission)){
            $role->revokePermissionTo($permission);
            return back()->with('message', 'Permission revoked.');
        }
        return back()->with('message', 'Permission not exists.');
    }
}
