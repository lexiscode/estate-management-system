<?php
namespace App\Exports;

use App\Models\Remittance;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;


class TenantRecordsExport implements FromView, withStyles
{
    protected $filteredRecords;

    public function __construct($filteredRecords)
    {
        $this->filteredRecords = $filteredRecords;
    }

    public function view(): View
    {
        return view('admin.tenant-records.exports.excel', [
            'filteredRecords' => $this->filteredRecords,
            'tenantName' => $this->filteredRecords->first()->tenant_name,
            'apartment' => $this->filteredRecords->first()->apartment,
        ]);
    }

    public function styles(Worksheet $sheet)
    {
        // Apply bold styling to "Tenant Name" and "Apartment" headers
        $sheet->getStyle('A1:D2')->applyFromArray([
            'font' => [
                'bold' => true,
            ],
        ]);
        // Apply bold styling to the second subheading headers
        $sheet->getStyle('A3:M3')->applyFromArray([
            'font' => [
                'bold' => true,
            ],
        ]);
    }

}
