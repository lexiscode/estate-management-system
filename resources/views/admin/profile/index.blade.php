@extends('admin.layouts.master')

@section('index-profile')
    <!-- Main Content -->
    <section class="section">
        <div class="section-header">
            <h1>Profile</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard.index') }}">Dashboard</a></div>
                <div class="breadcrumb-item">Profile</div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">Hi, {{$user->name}}!</h2>
            <p class="section-lead">
                Change information about yourself on this page.
            </p>

            <div class="row mt-sm-4">
                <div class="col-12 col-md-6">
                    <div class="card">
                        <form method="post" action="{{ route('admin.profile.update', $user->id) }}" class="needs-validation" novalidate="">
                            @csrf
                            @method('PUT')
                            <div class="card-header">
                                <h4>Edit Profile</h4>
                            </div>
                            <div class="card-body">

                                <div class="form-group col-12">
                                    <label>First Name:</label>
                                    <input type="text" class="form-control" name="name" value="{{ $user->name }}" required>
                                    <div class="invalid-feedback">
                                        Please fill in your name
                                    </div>
                                    @error('name')
                                        <p class="invalid-feedback">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group col-12">
                                    <label>Email Address:</label>
                                    <input type="email" class="form-control" name="email" value="{{ $user->email }}" required>
                                    <div class="invalid-feedback">
                                        Please fill in your email
                                    </div>
                                    @error('email')
                                        <p class="invalid-feedback">{{ $message }}</p>
                                    @enderror
                                </div>

                            </div>
                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>


                <!--Password Change-->
                <div class="col-12 col-md-6">
                    <div class="card">
                        <form method="post" action="{{ route('admin.profile-password.update', $user->id) }}" class="needs-validation" novalidate="">
                            @csrf
                            @method('PUT')
                            <div class="card-header">
                                <h4>Update Password</h4>
                            </div>
                            <div class="card-body">

                                <div class="form-group col-12">
                                    <label>Old Password</label>
                                    <input type="password" class="form-control" name="current_password" required>
                                    <div class="invalid-feedback">
                                        Please fill in your old password
                                    </div>
                                    @error('current_password')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group col-12">
                                    <label>New Password</label>
                                    <input type="password" class="form-control" name="password" required>
                                    <div class="invalid-feedback">
                                        Please fill in your new password
                                    </div>
                                    @error('password')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group col-12">
                                    <label>Confirm New Password</label>
                                    <input type="password" class="form-control" name="password_confirmation" required>
                                    <div class="invalid-feedback">
                                        Please re-fill the same new password here
                                    </div>
                                    @error('password_confirmation')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                            </div>
                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>

    </section>
@endsection
