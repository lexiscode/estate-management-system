<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tenant Records PDF</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Tenant Account Statement</h1>
    </div>

    <div class="content">
        <p><strong>Name Of Tenant:</strong> {{ $selectedTenantNames }}</p>
        <p><strong>Apartment:</strong> {{ $selectedApartments }}</p>

        <table>
            <thead>
                <tr>
                    <th>#ID</th>
                    <th>Status</th>
                    <th>Amount Paid (&#8358;)</th>
                    <th>Payment Date</th>
                    <th>Debt Amount(&#8358;)</th>
                    <th>Debt Due-Date</th>
                    <th>Rent Due-Date</th>
                    <th>Payment Method</th>
                </tr>
            </thead>
            <tbody>
                @if ($filteredRecords->isEmpty())
                    <tr>
                        <td colspan="8">No record found.</td>
                    </tr>
                @else
                    @foreach ($filteredRecords as $record)
                        <tr>
                            <td>{{ $record->id }}</td>
                            <td>{{ $record->status }}</td>
                            <td>{{ number_format($record->amount_paid, 2) }}</td>
                            <td>{{ $record->payment_date }}</td>
                            <td>{{ number_format($record->debt_amount, 2) }}</td>
                            <td>{{ $record->debt_due_date }}</td>
                            <td>{{ $record->rent_due_date }}</td>
                            <td>{{ $record->payment_method }}</td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>

    <div class="footer">
        <table>
            <tr>
                <td colspan="2"><strong>Totals:</strong></td>
                <td>Rent Fee: {{ number_format($rentFee, 2) }}</td>
                <td>Amount Paid: {{ number_format($totalAmountPaid, 2) }}</td>
                <td>Debt Amount: {{ number_format($totalDebtAmount, 2) }}</td>
            </tr>
        </table>
        <p>Generated on: {{ now()->format('Y-m-d H:i:s') }}</p>
    </div>
</body>
</html>
