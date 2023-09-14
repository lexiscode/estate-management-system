<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
</head>
<body>
    <table>
        <!-- Your custom formatting and subheadings here -->
        <tr>
            <th colspan="2">Tenant Name:</th>
            <th colspan="2">{{ $tenantName }}</th>
        </tr>
        <tr>
            <th colspan="2">Apartment:</th>
            <th colspan="2">{{ $apartment }}</th>
        </tr>
        <tr>
            <th>#ID</th>
            <th>Status</th>
            <th>Rent Fee (NGN)</th>
            <th>Paid Amount (NGN)</th>
            <th>Payment Date</th>
            <th>Debt Amount (NGN)</th>
            <th>Debt Due-Date</th>
            <th>Rent Due-Date</th>
            <th>Payment Method</th>
            <th>Notes</th>
            <th>Payment Proof</th>
            <th>Created At</th>
            <th>Updated At</th>
        </tr>
        @foreach ($filteredRecords as $record)
        <tr>
            <td>{{ $record->id }}</td>
            <td>{{ $record->status }}</td>
            <td>{{ $record->rent_fee }}</td>
            <td>{{ $record->amount_paid }}</td>
            <td>{{ $record->payment_date }}</td>
            <td>{{ $record->debt_amount }}</td>
            <td>{{ $record->debt_due_date }}</td>
            <td>{{ $record->rent_due_date }}</td>
            <td>{{ $record->payment_method }}</td>
            <td>{{ $record->notes }}</td>
            <td>{{ $record->payment_proof }}</td>
            <td>{{ $record->created_at }}</td>
            <td>{{ $record->updated_at }}</td>
        </tr>
        @endforeach
    </table>
</body>
</html>
