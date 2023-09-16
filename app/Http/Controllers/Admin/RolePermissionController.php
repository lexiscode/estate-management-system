<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\PostEnquiry;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use Illuminate\Http\Request;


class RolePermissionController extends Controller
{

    public function index()
    {
        $roles = Role::simplePaginate(5);

        $post_enquiries = PostEnquiry::orderBy('created_at', 'desc')->simplePaginate(5);

        return view('admin.roles.index', compact('post_enquiries', 'roles'));
    }


    public function create()
    {
        $permissions = Permission::all()->groupBy('group_name');

        $post_enquiries = PostEnquiry::orderBy('created_at', 'desc')->simplePaginate(5);

        return view('admin.roles.create', compact('post_enquiries', 'permissions'));
    }


    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'role' => ['required', 'max:50', 'unique:permissions,name']
        ]);

        // Create a role dynamically for users authenticating with the admin guard:
        $role = Role::create(['guard_name' => 'admin', 'name' => $request->role]);

        // Assign multiple permissions to the role
        $role->syncPermissions($request->permissions); // from the permissions[] name

        return redirect()->route('admin.role.index')
        ->with('success', 'Role permissions has been created successfully!');
    }

    public function edit(string $id)
    {
        $permissions = Permission::all()->groupBy('group_name');

        $role = Role::findOrFail($id);

        $rolePermissions = $role->permissions;
        $rolePermissions = $rolePermissions->pluck('name')->toArray();

        $post_enquiries = PostEnquiry::orderBy('created_at', 'desc')->simplePaginate(5);

        return view('admin.roles.update', compact('permissions', 'role', 'post_enquiries', 'rolePermissions'));

    }


    public function update(Request $request, string $id)
    {
        $request->validate([
            'role' => ['required', 'max:50', 'unique:permissions,name']
        ]);

        // Create a role dynamically for users authenticating with the admin guard:
        $role = Role::findOrFail($id);
        $role->update(['guard_name' => 'admin', 'name' => $request->role]);

        // Assign multiple permissions to the role
        $role->syncPermissions($request->permissions); // from the permissions[] name

        return redirect()->route('admin.role.index')
        ->with('success', 'Role permissions has been updated successfully!');
    }

    public function destroy(string $id)
    {
        $role = Role::findOrFail($id);

        if($role->name === 'Moderator'){
            return redirect()->back()->with('delete-error', 'You cannot delete the moderator!');
        }

        $role->delete();

        return redirect()->back()->with('delete-success', 'Role has been deleted successfully!');
    }
}




