@extends('admin.layouts.master')

@section('index-remittances')
    <section class="section">

        <div class="section-header">
            <h1>Manage All Remits</h1>
        </div>

        <div class="card card-warning">
            <div class="card-header">
                <h4>Manage All Tenants Dealings With You!</h4>

                <form class="card-header-form" action="{{ route('admin.remit.search') }}" method="GET">
                    <div class="input-group">

                        <input type="text" name="query" class="form-control" placeholder="Search ">
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

                <!-- The filter field -->
                <div class="mb-3">
                    <label for="statusFilter" class="form-label">Filter by Status:</label>
                    <select class="form-control" id="statusFilter">
                        <option value="All">All</option>
                        <option value="Paid">Paid</option>
                        <option value="Partially Paid">Partially Paid</option>
                        <option value="Overdue">Overdue</option>
                        <option value="Cancelled">Cancelled</option>
                    </select>
                </div>

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
                                <td class="payment-status">
                                    @if ($remittance->status === 'Paid')
                                        <div class="badge badge-success">{{ $remittance->status }}</div>
                                    @elseif ($remittance->status === 'Partially Paid')
                                        <div class="badge badge-info">{{ $remittance->status }}</div>
                                    @elseif ($remittance->status === 'Overdue')
                                        <div class="badge badge-warning">{{ $remittance->status }}</div>
                                    @elseif ($remittance->status === 'Cancelled')
                                        <div class="badge badge-danger">{{ $remittance->status }}</div>
                                    @endif
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

                <!-- Simple pagination links -->
                <div class="pagination" style="margin: 0 auto; justify-content: center; margin-top: 10px;">
                    {{ $remittances->links('pagination::simple-bootstrap-4') }}
                </div>

            </div>
        </div>

    </section>

@endsection
