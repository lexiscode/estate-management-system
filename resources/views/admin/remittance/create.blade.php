@extends('admin.layouts.master')

@section('create-remittances')
    <section class="section">

        <div class="section-header">
            <h1>Manage All Remits</h1>
        </div>

        <div class="card card-warning">
            <div class="card-header">
                <h4>Manage All Tenants Dealings With You!</h4>
                <form class="card-header-form">
                    <div class="input-group">

                        <div class="card-header-action">
                            <a href="{{ route('admin.remit.index') }}" class="btn btn-primary">Back</a>
                        </div>

                    </div>
                </form>
            </div>

            <div class="card-body">
                <form method="POST" action="{{ route('admin.remit.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputTenant">Name Of Tenant:</label>
                            <input type="text" name="tenant_name" class="form-control" id="inputTenant" required>
                        </div>
                        <div class="form-group col-md-5">
                            <label for="apartment">Apartment:</label>
                            <input type="text" class="form-control" name="apartment" id="apartment" placeholder="Enter name or location of the apartment" required>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="selectStatus">Payment Status</label>
                            <select class="form-control form-control-sm" name="status" id='selectStatus' required>
                                <option>Paid</option>
                                <option>Partially Paid</option>
                                <option>Overdue</option>
                                <option>Cancelled</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputPaidAmount">Actual Rent Fee:</label>
                            <input type="number" name="rent_fee" class="form-control" id="inputPaidAmount" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputPaidAmount">Amount Paid:</label>
                            <input type="number" name="amount_paid" class="form-control" id="inputPaidAmount" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="payment_date">Date Of Payment:</label>
                            <input type="date" class="form-control" name="payment_date" id="payment_date" required>
                        </div>

                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputDebtAmount">Debt Amount (Optional):</label>
                            <input type="number" class="form-control" name="debt_amount" id="inputDebtAmount">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="debt_due_date">Debt Due-Date (Optional):</label>
                            <input type="date" name="debt_due_date" class="form-control" id="debt_due_date" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="rent_due_date">Rent Due-Date:</label>
                            <input type="date" name="rent_due_date" class="form-control" id="rent_due_date" required>
                        </div>

                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="payment_method">Payment Method</label>
                            <select class="form-control form-control-sm" name="payment_method" id='payment_method' required>
                                <option>Cash</option>
                                <option>Bank Transfer</option>
                                <option>Check</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="payment_proof">Payment Proof (Optional):</label>
                            <input type="file" class="form-control" name="payment_proof" id="payment_proof">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="notes">Extra Notes (Optional):</label>
                            <textarea class="form-control" name="notes" id="notes" spellcheck="false" data-ms-editor="true"></textarea>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit Record</button>
                    </div>

                </form>
            </div>

        </div>

    </section>
@endsection
