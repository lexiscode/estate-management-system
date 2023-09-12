@extends('admin.layouts.master')

@section('index-tenant-records')
    <section class="section">

        <div class="section-header">
            <h1>Manage A Tenant Records</h1>
        </div>

        <div class="card card-warning">
            <div class="card-header">
                <h4>Get Your Tenants Account Statements!</h4>

                <form class="card-header-form" action="" method="GET">
                    <div class="input-group">

                        <!-- This is the create new blog button -->
                        <div class="card-header-action">
                            <a href="{{ route('admin.remit.create') }}" class="btn btn-primary">Add New Record</a>
                        </div>

                    </div>
                </form>

            </div>
            <div class="card-body">

                <!-- This is a form to check a specifc tenant account history -->
                <form method="GET" action="{{ route('admin.statement.create') }}">

                    <div class="card-body">

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label>Names Of Tenants:</label>
                                <select class="form-control select2" name="name_of_tenant" multiple="">
                                    @foreach ($all_tenant as $tenant)
                                        <option>{{ $tenant }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-4">
                                <label>List Of Apartments:</label>
                                <select class="form-control select2" name="name_of_apartment" multiple="">
                                    @foreach ($all_apartment as $apartment)
                                        <option>{{ $apartment }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="inputStartDate">Start Date:</label>
                                <input type="date" name="start_date" class="form-control" id="inputStartDate" required>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="inputEndDate">End Date:</label>
                                <input type="date" name="end_date" class="form-control" id="inputEndDate" required>
                            </div>

                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Generate Statement</button>
                        </div>

                    </div>
                </form>

            </div>
        </div>

    </section>

@endsection



