<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::all();
        return view('backend.role_permission.allpermission', compact('permissions'));
    }

    // public function create()
    // {
    //     return view('admin.permissions.create');
    // }

    public function store(Request $request)
    {
        $validated = $request->validate(['name' => 'required']);

        if($validated){
            Permission::insert([
                'name' =>  $request->name,
                'guard_name' => 'admin',
            ]);
        }

        return to_route('permission.index')->with('message', 'Permission created.');
    }

    public function edit(Permission $permission)
    {
        $permission_id_to_ignore = $permission->id;
        $roles = Role::whereNotIn('id', function ($query) use ($permission_id_to_ignore) {
            $query->select('role_id')
                ->from('role_has_permissions')
                ->where('permission_id', $permission_id_to_ignore);
        })->get();
        return view('backend.role_permission.permissionupdate', compact('permission', 'roles'));
    }

    public function update(Request $request, Permission $permission)
    {
        $validated = $request->validate(['name' => 'required']);

        if($validated){
            $permission->name = $request->name;
            $permission->guard_name = 'admin';
            $permission->update();
           }
        $permission->update($validated);

        return to_route('permission.index')->with('message', 'Permission updated.');
    }

    public function destroy(Permission $permission)
    {
        $permission->delete();

        return back()->with('message', 'Permission deleted.');
    }

    public function assignRole(Request $request, Permission $permission)
    {

        // if ($permission->hasRole($request->role, $request->guard)) {
        if ($permission->hasRole($request->role, 'admin')) {
            return back()->with('message', 'Role exists.');
        }

        $permission->assignRole($request->role);
        return back()->with('message', 'Role assigned.');
    }

    public function removeRole(Permission $permission, Role $role)
    {
        if ($permission->hasRole($role)) {
            $permission->removeRole($role);
            return back()->with('message', 'Role removed.');
        }

        return back()->with('message', 'Role not exists.');
    }
}
