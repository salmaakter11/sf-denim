<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Imagick\Driver;

class AdminUserController extends Controller
{
    public function index()
    {
        return view('backend.role_permission.admin_user_show');
    }

    public function show(Admin $user)
    {
        $roles = Role::all();
        $permissions = Permission::all();
        return view('backend.role_permission.admin_user_role', compact('user', 'roles', 'permissions'));
    }
    public function store(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:admins',
            'phone' => 'required|string|max:15',
            'password' => 'required|string|min:6',
            'current_team_id' =>'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $user = new Admin();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->current_team_id = $request->input('current_team_id');
        $user->password =  Hash::make($request->input('password')); // Hash the password

        if (isset($request->profile_photo_path)) {
            $image = $request->file('profile_photo_path');
            // time().'.'.
            $filename = $request->file('profile_photo_path')->getClientOriginalName();
            // .'.'.$request->file('profile_photo_path')->getClientOriginalExtension();
            Storage::putFileAs('public/admin_images', $request->file('profile_photo_path'), $filename);
            // echo 
            $destinationPath =  storage_path('app/public/admin_images');
            // exit;
            // $img = ImageManager::make($image->path());
            $img = ImageManager::imagick()->read($image->path());
            $img->resize(500, 500);
            // $img->resize(500, 500, function ($constraint) {
            //     $constraint->aspectRatio();
            // })->save($destinationPath . '/' . $filename);
            //remove old image
            if ($user->profile_photo_path) {
                $old_filename = public_path("storage\admin_images\\" . $user->profile_photo_path);
                if (file_exists($old_filename) != false) {
                    unlink($old_filename);
                }
            }
            $user->profile_photo_path = $filename;
        }
        // Save the new Admin user
        if($user->save()){
            $notification = array(
                'message' => 'Admin user created successfully',
                'alert-type' => 'success'
            );
        }else{
            $notification = array(
                'message' => 'Admin user failed to create ',
                'alert-type' => 'fail'
            );
        }

        

        return redirect()->back()->with($notification);
    }

    public function edit($user){
        $user_data = Admin::where('id', $user)->first();
        return view('backend.role_permission.admin_user_edit', compact('user_data'));
    }
    public function Update(Request $request, $user )
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:15',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $user = Admin::where('id',$user)->first();

        $user->name = $request->input('name');

        if( $user->email != $request->input('email')){
            $user->email = $request->input('email');
        }

        if( $user->phone!=$request->input('phone')){
            
            $user->phone = $request->input('phone');
        }
        if( $user->current_team_id!=$request->input('current_team_id')){
            
            $user->current_team_id = $request->input('current_team_id');
        }

        if($request->input('password')){
            $user->password =  Hash::make($request->input('password')); // Hash the password
        }

        if($user->update())
        {
            $notification = array(
                'message' => 'Admin Updated successfully',
                'alert-type' => 'success'
            );
        }
        else
        {
            $notification = array(
                'message' => 'Admin Update failed',
                'alert-type' => 'fail'
            );
        }

        return redirect()->back()->with($notification);
    }

    public function assignRole(Request $request, Admin $user)
    {
        if ($user->hasRole($request->role)) {
            return back()->with('message', 'Role exists.');
        }

        $user->assignRole($request->role);
        return back()->with('message', 'Role assigned.');
    }

    public function removeRole(Admin $user, Role $role)
    {
        if ($user->hasRole($role)) {
            $user->removeRole($role);
            return back()->with('message', 'Role removed.');            
        }
        return back()->with('message', 'Role not exists.');
    }

    public function givePermission(Request $request, Admin $user)
    {
        if ($user->hasPermissionTo($request->permission)) {
            return back()->with('message', 'Permission exists.');
        }
        $user->givePermissionTo($request->permission);
        return back()->with('message', 'Permission added.');
    }
    public function revokePermission(Admin $user, Permission $permission)
    {
        if ($user->hasPermissionTo($permission)) {
            $user->revokePermissionTo($permission);
            return back()->with('message', 'Permission revoked.');
        }
        return back()->with('message', 'Permission does not exists.');
    }
    public function destroy(Admin $user)
    {
        if ($user->hasRole('admin')) {
            return back()->with('message', 'you are admin.');
        }
        $user->delete();

        return back()->with('message', 'User deleted.');
    }
}
