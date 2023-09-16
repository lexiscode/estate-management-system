<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\RoleUserStoreRequest;
use App\Http\Requests\RoleUserUpdateRequest;
use App\Models\Admin;
use App\Models\PostEnquiry;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use Illuminate\Http\Request;

class RoleUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admins = Admin::simplePaginate(5);
        $post_enquiries = PostEnquiry::orderBy('created_at', 'desc')->simplePaginate(5);

        return view('admin.role-users.index', compact('post_enquiries', 'admins'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();

        $post_enquiries = PostEnquiry::orderBy('created_at', 'desc')->simplePaginate(5);

        return view('admin.role-users.create', compact('post_enquiries', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoleUserStoreRequest $request)
    {
        // just chose to try using instance method style here lolz
        $user = new Admin();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        // assigns the role to user
        $user->assignRole($request->role);

        return redirect()->route('admin.role-user.index')
        ->with('success', 'New user and their role has been added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = Admin::findOrFail($id);
        $roles = Role::all();

        $post_enquiries = PostEnquiry::orderBy('created_at', 'desc')->simplePaginate(5);

        return view('admin.role-users.update', compact('post_enquiries', 'user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoleUserUpdateRequest $request, string $id)
    {
        // only when admin wants to also edit user password, then this will validate
        if($request->has('password') && !empty($request->password)){
            $request->validate(['password' => ['confirmed', 'min:6']]);
        }

        $user = Admin::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;

        if($request->has('password') && !empty($request->password)){
            $user->password = bcrypt($request->password);
        }

        // blocks other users from accessing Super Admin's update functionality via url
        if($user->name === 'Super Admin'){
            return redirect()->route('admin.role-user.index')->with('update-error', 'You cannot edit user role of the Super Admin!');
        }

        $user->save();

        // assigns the role to user
        $user->syncRoles($request->role);

        return redirect()->route('admin.role-user.index')
        ->with('success', 'Updated the user and their role successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = Admin::findOrFail($id);

        if ($user->getRoleNames()->first() === 'Super Admin'){
            return redirect()->back()
                    ->with('delete-error', 'Super Admin cannot be deleted!');
        }

        $user->delete();

        return redirect()->back()
            ->with('delete-success', 'User has been deleted successfully!');
    }
}
