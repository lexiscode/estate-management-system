@extends('admin.layouts.master')

@section('create-roles')
    <section class="section">

        <div class="section-header">
            <h1>Manage Roles & Permissions</h1>
        </div>

        <div class="card card-warning">
            <div class="card-header">
                <h4>Create New Role Here!</h4>
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
                <form method="POST" action="{{ route('admin.role.store') }}">
                    @csrf
                    <div class="card-body">

                        <div class="form-group">
                            <label for="role">Role Name</label>
                            <input type="text" name="role" class="form-control" id="role">
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
                                            <input type="checkbox" value="{{ $item->name }}" name="permissions[]" class="custom-switch-input">
                                            <span class="custom-switch-indicator"></span>
                                            <span class="custom-switch-description">{{ $item->name }}</span>
                                        </label>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Create</button>
                        </div>

                    </div>


                </form>
            </div>
        </div>

    </section>
@endsection
