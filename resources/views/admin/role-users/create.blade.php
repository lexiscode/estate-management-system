@extends('admin.layouts.master')

@section('create-properties')
    <section class="section">

        <div class="section-header">
            <h1>Manage Users</h1>
        </div>

        <div class="card card-warning">
            <div class="card-header">
                <h4>Create New User Here!</h4>
                <form class="card-header-form">
                    <div class="input-group">

                        <!-- This is the save property button -->
                        <div class="card-header-action">
                            <a href="{{ route('admin.role-user.index') }}" class="btn btn-primary">Back</a>
                        </div>

                    </div>
                </form>
            </div>

            <div class="card-body">
                <!-- This is a form to create new property-->
                <form method="POST" action="{{ route('admin.property.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="card" id="sample-login">

                        <div class="form-group">
                            <label for="role">Username</label>
                            <input type="text" name="username" class="form-control" id="username">
                            @error('username')
                                <p class='text-danger'>{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" id="password">
                            @error('password')
                                <p class='text-danger'>{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="confirm_password">Confirm Password</label>
                            <input type="password" name="confirm_password" class="form-control" id="confirm_password">
                            @error('confirm_password')
                                <p class='text-danger'>{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="role">Role</label>
                            <select name="role" id="role" class="form-control">
                                <option>{{__('--Select--')}}</option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->name }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                            @error('role')
                                <p class='text-danger'>{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Create User</button>
                        </div>

                    </div>

                </form>
            </div>
        </div>

    </section>
@endsection
