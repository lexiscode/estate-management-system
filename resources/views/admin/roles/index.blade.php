@extends('admin.layouts.master')

@section('index-roles')
    <section class="section">

        <div class="section-header">
            <h1>{{ __('Manage Roles & Permissions') }}</h1>
        </div>

        <div class="card card-warning">
            <div class="card-header">
                <h4>Manage Your Roles Here!</h4>
                <form class="card-header-form" action="{{ route('admin.property.search') }}" method="GET">
                    <div class="input-group">
                        <input type="text" name="query" class="form-control" placeholder="Search">
                        <div class="input-group-btn">
                            <button class="btn btn-primary btn-icon"><i class="fas fa-search"></i></button>
                        </div>

                        <!-- This is the create new property button -->
                        <div class="card-header-action">
                            <a href="{{ route('admin.role.create') }}" class="btn btn-primary">Create New Role</a>
                        </div>

                    </div>
                </form>
            </div>
            <div class="card-body">

                <!-- Display new role creation success message if it exists -->
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible show fade">
                        <div class="alert-body">
                            <button class="close" data-dismiss="alert">
                                <span>×</span>
                            </button>
                            {{ session('success') }}
                        </div>
                    </div>
                @endif
                <!-- Display deleted role success message if it exists -->
                @if (session('delete-success'))
                    <div class="alert alert-danger alert-dismissible show fade">
                        <div class="alert-body">
                            <button class="close" data-dismiss="alert">
                                <span>×</span>
                            </button>
                            {{ session('delete-success') }}
                        </div>
                    </div>
                @endif
                <!-- Display deleted role error message if it exists -->
                @if (session('delete-error'))
                    <div class="alert alert-warning alert-dismissible show fade">
                        <div class="alert-body">
                            <button class="close" data-dismiss="alert">
                                <span>×</span>
                            </button>
                            {{ session('delete-error') }}
                        </div>
                    </div>
                @endif

                <!-- This is a simple table -->
                <table class="table">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Role Name</th>
                            <th class="text-center">Permissions</th>
                            <th>
                                <div style="text-align: center;">Actions</div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($roles->isEmpty())
                            <p>No roles found.</p>
                        @else
                            @foreach ($roles as $role)
                                <tr class="text-center">
                                    <td>{{ $role->id }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td>
                                        @foreach ($role->permissions as $permission)
                                            <span class="badge bg-primary text-light">{{ $permission->name }}</span>
                                        @endforeach
                                    </td>
                                    <td>
                                        <div style="text-align: center;">

                                            <a href="{{ route('admin.role.edit', $role->id) }}"
                                                class="btn btn-primary btn-action mr-1" data-original-title="Edit">
                                                <i class="far fa-edit"></i></i>
                                            </a>

                                            <form method="POST"
                                                action="{{ route('admin.role.destroy', $role->id) }}"
                                                style="display: inline;">
                                                @csrf
                                                @method('DELETE')

                                                <button type='submit' class="btn btn-danger btn-action"><i
                                                        class="fas fa-trash"></i></button>

                                            </form>

                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
                <!-- Simple pagination links -->
                <div class="pagination" style="margin: 0 auto; justify-content: center; margin-top: 10px;">
                    {{ $roles->links('pagination::simple-bootstrap-4') }}
                </div>

            </div>
        </div>

    </section>

@endsection

