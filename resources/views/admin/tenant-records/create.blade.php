@extends('admin.layouts.master')

@section('create-tenant-records')
    <section class="section">

        <div class="section-header">
            <h1>Manage A Tenant Records</h1>
        </div>

        <div class="card card-warning">
            <div class="card-header">
                <h4>Get Your Tenants Account Statements!</h4>
                <form class="card-header-form">
                    <div class="input-group">

                        <!-- This is the create new property button -->
                        <div class="card-header-action">
                            <a href="{{ route('admin.statement.index') }}" class="btn btn-primary">Back</a>
                        </div>

                    </div>
                </form>
            </div>

            <div class="card-body">

                <p style="text-transform: uppercase"><b>Name Of Tenant:</b> {{ $selectedTenantNames }}</p>
                <p style="text-transform: uppercase"><b>Apartment:</b> {{ $selectedApartments }}</p>

                <!-- This is a simple table -->
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#ID</th>
                            <th scope="col">Status</th>
                            <th scope="col">Amount Paid</th>
                            <th scope="col">Payment Date</th>
                            <th scope="col">Debt Amount</th>
                            <th scope="col">Debt Due-Date</th>
                            <th scope="col">Rent Due-Date</th>
                            <th scope="col">Payment Method</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($filteredRecords->isEmpty())
                            <p>No record found.</p>
                        @else
                            @foreach ($filteredRecords as $record)
                                <tr>
                                    <td>{{ $record->id }}</td>
                                    <td>{{ $record->status }}</td>
                                    <td>{{ $record->amount_paid }}</td>
                                    <td>{{ $record->payment_date }}</td>
                                    <td>{{ $record->debt_amount }}</td>
                                    <td>{{ $record->debt_due_date }}</td>
                                    <td>{{ $record->rent_due_date }}</td>
                                    <td>{{ $record->payment_method }}</td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>

                <!-- Simple pagination links -->
                <div class="pagination" style="margin: 0 auto; justify-content: center; margin-top: 10px;">
                    {{ $filteredRecords->links('pagination::simple-bootstrap-4') }}
                </div>

            </div>

        </div>

    </section>

@endsection


