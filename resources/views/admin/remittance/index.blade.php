@extends('admin.layouts.master')

@section('index-remittances')
    <section class="section">

        <div class="section-header">
            <h1>Manage All Remits</h1>
        </div>

        <div class="card card-warning">
            <div class="card-header">
                <h4>Manage All Tenants Dealings With You!</h4>
                <form class="card-header-form">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Search">
                        <div class="input-group-btn">
                            <button class="btn btn-primary btn-icon"><i class="fas fa-search"></i></button>
                        </div>

                        <!-- This is the create new blog button -->
                        <div class="card-header-action">
                            <a href="{{ route('admin.remit.create') }}" class="btn btn-primary">Add New Record</a>
                        </div>

                    </div>

                </form>
            </div>
            <div class="card-body">

                <!-- Display new tenant data row success message if it exists -->
                @if (session('creation-success'))
                    <div class="alert alert-success alert-dismissible show fade">
                        <div class="alert-body">
                            <button class="close" data-dismiss="alert">
                                <span>×</span>
                            </button>
                            {{ session('creation-success') }}
                        </div>
                    </div>
                @endif

                <!-- Display updated tenant data row success message if it exists -->
                @if (session('update-success'))
                    <div class="alert alert-success alert-dismissible show fade">
                        <div class="alert-body">
                            <button class="close" data-dismiss="alert">
                                <span>×</span>
                            </button>
                            {{ session('update-success') }}
                        </div>
                    </div>
                @endif

                <!-- Display new talent data row deletion success message if it exists -->
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

                <table class="table">
                    <thead>
                        <tr>
                            <th>Tenant Names</th>
                            <th>Apartment</th>
                            <th><div style="text-align: center;">Payment Status</div></th>
                            <th>Due Date</th>
                            <th scope="col">
                                <div style="text-align: center;">Actions</div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($remittances->isEmpty())
                            <p>No remittance tenant data found.</p>
                        @else
                            @foreach ($remittances as $remittance)
                            <tr>

                                <td><a>{{ $remittance->tenant_name }}</a></td>
                                <td class="font-weight-600">{{ $remittance->apartment }}</td>
                                <td>
                                    <div class="badge badge-warning">{{ $remittance->status }}</div>
                                    {{-- <divclass="badgebadge-success">$remittance->status</div> --}}
                                </td>
                                <td>{{ $remittance->rent_due_date }}</td>
                                <td>
                                    <div style="text-align: center;">

                                        <a href="{{ route('admin.remit.show', $remittance->id) }}"
                                            class="btn btn-primary" id="exampleModal"><i class="fas fa-eye"></i></a>

                                        <a href="{{ route('admin.remit.edit', $remittance->id) }}"
                                            class="btn btn-primary btn-action mr-1" data-original-title="Edit">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>

                                        <form method="POST"
                                            action="{{ route('admin.remit.destroy', $remittance->id) }}"
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

            </div>
        </div>

    </section>
@endsection
