@extends('admin.layouts.master')

@section('create-role-users')
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
                <form method="POST" action="{{ route('admin.role-user.store') }}">
                    @csrf

                    <div class="card" id="sample-login" style="padding:20px">

                        <div class="form-group">
                            <label for="name">Username</label>
                            <input type="text" name="name" class="form-control" id="name">
                            @error('name')
                                <p class='text-danger'>{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" id="email">
                            @error('email')
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
                            <label for="password_confirmation">Confirm Password</label>
                            <input type="password" name="password_confirmation" class="form-control" id="password_confirmation">
                            @error('password_confirmation')
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
