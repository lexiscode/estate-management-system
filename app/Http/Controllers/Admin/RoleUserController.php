<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\RoleUserStoreRequest;
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

        $post_enquiries = PostEnquiry::orderBy('created_at', 'desc')->simplePaginate(5);

        return view('admin.role-users.index', compact('post_enquiries'));
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
        ->with('success', 'New user and their role has been added successfully!');;
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
