@extends('admin.layouts.master')

@section('update-roles')
    <section class="section">

        <div class="section-header">
            <h1>Manage Roles & Permissions</h1>
        </div>

        <div class="card card-warning">
            <div class="card-header">
                <h4>Update Role Permissions Here!</h4>
                <form class="card-header-form">
                    <div class="input-group">

                        <!-- This is the save property button -->
                        <div class="card-header-action">
                            <a href="{{ route('admin.role.index') }}" class="btn btn-primary">Back</a>
                        </div>

                    </div>
                </form>
            </div>
            <div class="card-body">

                <!-- This is a form to create new property-->
                <form method="POST" action="{{ route('admin.role.update', $role->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="card-body">

                        <div class="form-group">
                            <label for="role">Role Name</label>
                            <input type="text" name="role" class="form-control" id="role" value="{{ $role->name }}">
                            @error('role')
                                <p class='text-danger'>{{ $message }}</p>
                            @enderror
                        </div>

                        <hr>

                        @foreach ($permissions as $groupName => $permission)
                            <div class="form-group">
                                <p>{{ $groupName }}:</p>

                                <div class="row">
                                    @foreach ($permission as $item)
                                    <div class="form-group col-md-2">
                                        <label class="custom-switch mt-2">
                                            <input type="checkbox" value="{{ $item->name }}" name="permissions[]"
                                            {{ in_array($item->name, $rolePermissions) ? 'checked':'' }}
                                                class="custom-switch-input">
                                            <span class="custom-switch-indicator"></span>
                                            <span class="custom-switch-description">{{ $item->name }}</span>
                                        </label>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>

                    </div>


                </form>
            </div>
        </div>

    </section>
@endsection
