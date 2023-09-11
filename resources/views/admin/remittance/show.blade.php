@extends('admin.layouts.master')

@section('show-remittances')
    <section class="section">

        <div class="section-header">
            <h1>Manage All Remits</h1>
        </div>

        <div class="card card-warning">
            <div class="card-header">
                <h4>Tenant Remit Detail Here!</h4>
                <form class="card-header-form">
                    <div class="input-group">

                        <!-- This is the save blog button -->
                        <div class="card-header-action">
                            <a href="{{ route('admin.remit.index') }}" class="btn btn-primary">Back</a>
                        </div>

                    </div>
                </form>
            </div>
            <div class="card-body">

                <h2 style="color: black;">{{ $remittance->tenant_name }}</h2>
                <p style="color: black;">Apartment: {{ $remittance->apartment }}</p>
                <p style="color: black;">Payment Status: {{ $remittance->status }}</p>
                <p style="color: black;">Payment Amount: {{ $remittance->amount_paid }}</p>
                <p style="color: black;">Payment Date: {{ $remittance->payment_date }}</p>

                @if ($remittance->debt_amount !== null)
                    <p style="color: black;">Debt Amount: {{ $remittance->debt_amount }}</p>
                @endif

                @if ($remittance->debt_due_date !== null)
                    <p style="color: black;">Debt Amount: {{ $remittance->debt_due_date }}</p>
                @endif

                <p style="color: black;">Rent Due-Date: {{ $remittance->rent_due_date }}</p>
                <p style="color: black;">Payment Method: {{ $remittance->payment_method }}</p>

                @if ($remittance->notes !== null)
                    <p style="color: black;">Notes: {{ $remittance->notes }}</p>
                @endif

                @if ($remittance->payment_proof !== null)
                    <embed src="{{ asset('uploads/remits/' . $remittance->payment_proof) }}" type="application/pdf" width="100%" height="500">
                @endif

            </div>
        </div>

    </section>

@endsection

