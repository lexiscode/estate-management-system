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

 <!--
                <div class="card-body">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                aria-controls="home" aria-selected="true">Tenant Name</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                                aria-controls="profile" aria-selected="false">Apartment</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                                aria-controls="contact" aria-selected="false">Total Rent Paid</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                                aria-controls="contact" aria-selected="false">Total Debt Amount</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            Lorem ipsum dolor
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            Sed sed metus vel lacus hendrerit tempus. a a.
                        </div>
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                            Vestibulum imperdietsque vulputate.
                        </div>
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                            Vestibulum imperdietsque vulputate.
                        </div>
                    </div>
                </div>

            -->
