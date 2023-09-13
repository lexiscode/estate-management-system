<?php

namespace App\Exports;

use App\Models\Remittance;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TenantRecordsExport implements FromCollection, WithHeadings
{
    protected $filteredRecords;

    public function __construct($filteredRecords)
    {
        $this->filteredRecords = $filteredRecords;
    }

    public function collection()
    {
        return $this->filteredRecords;
    }

    public function headings(): array
    {
        // Define the column headings here
        return [
            '#ID',
            'Tenant Name',
            'Apartment',
            'Status',
            'Rent Fee',
            'Paid Amount',
            'Payment Date',
            'Debt Amount',
            'Debt Due-Date',
            'Rent Due-Date',
            'Payment Method',
            'Notes',
            'Payment Proof',
            'Created At',
            'Updated At',
        ];
    }
}

