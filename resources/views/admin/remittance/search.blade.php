@extends('admin.layouts.master')

@section('search-remittances')
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

                <table class="table">
                    <thead>
                        <tr>
                            <th>Tenant Names</th>
                            <th>Apartment</th>
                            <th>
                                <div style="text-align: center;">Payment Status</div>
                            </th>
                            <th>Due Date</th>
                            <th scope="col">
                                <div style="text-align: center;">Actions</div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($remits_search->isEmpty())
                            <div class="card-body">
                                <div class="empty-state" data-height="400" style="height: 400px;">
                                    <div class="empty-state-icon">
                                        <i class="fas fa-question"></i>
                                    </div>
                                    <h2>Oops! We couldn't find any data</h2>
                                    <p class="lead">
                                        Note: Ensure that there are no unnecessary space in-between the data name you are searching
                                        for, if still yes, then sorry your search request isn't in available in your database.
                                    </p>
                                    <a href="{{ route('admin.remit.index') }}" class="btn btn-primary mt-4">Go Back</a>
                                </div>
                            </div>
                        @else
                            @foreach ($remits_search as $remit)
                                <tr>

                                    <td><a>{{ $remit->tenant_name }}</a></td>
                                    <td class="font-weight-600">{{ $remit->apartment }}</td>
                                    <td>
                                        <div class="badge badge-warning">{{ $remit->status }}</div>
                                    </td>
                                    <td>{{ $remit->rent_due_date }}</td>
                                    <td>
                                        <div style="text-align: center;">

                                            <a href="{{ route('admin.remit.show', $remit->id) }}" class="btn btn-primary"
                                                id="exampleModal"><i class="fas fa-eye"></i></a>

                                            <a href="{{ route('admin.remit.edit', $remit->id) }}"
                                                class="btn btn-primary btn-action mr-1" data-original-title="Edit">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>

                                            <form method="POST" action="{{ route('admin.remit.destroy', $remit->id) }}"
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
