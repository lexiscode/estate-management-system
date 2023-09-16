<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\PostEnquiry;
use App\Models\Admin;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use Illuminate\Http\Request;


class RolePermissionController extends Controller
{
    // permissions management
    public function __construct()
    {
        $this->middleware('role_or_permission:access management index,admin')->only('index');
        $this->middleware('role_or_permission:access management create,admin')->only('create', 'store');
        $this->middleware('role_or_permission:access management update,admin')->only('edit', 'update');
        $this->middleware('role_or_permission:access management delete,admin')->only('destroy');
    }

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

        // blocks other users from accessing Super Admin's update functionality via url
        if($role->name === 'Super Admin'){
            return redirect()->route('admin.role.index')->with('update-error', 'You cannot edit access rights of the Super Admin!');
        }

        $role->update(['guard_name' => 'admin', 'name' => $request->role]);

        // Assign multiple permissions to the role
        $role->syncPermissions($request->permissions); // from the permissions[] name

        return redirect()->route('admin.role.index')
        ->with('success', 'Role permissions has been updated successfully!');
    }

    public function destroy(string $id)
    {
        $role = Role::findOrFail($id);

        // blocks other users from accessing Super Admin's delete functionality via url
        if($role->name === 'Super Admin'){
            return redirect()->back()->with('delete-error', 'You cannot delete the Super Admin!');
        }

        $role->delete();

        return redirect()->back()->with('delete-success', 'Role has been deleted successfully!');
    }
}




