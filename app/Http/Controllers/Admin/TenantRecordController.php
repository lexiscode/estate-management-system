<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Remittance;
use App\Models\PostEnquiry;

use PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\TenantRecordsExport;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Carbon;

use Illuminate\Http\Request;

class TenantRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $all_tenant = Remittance::distinct('tenant_name')->pluck('tenant_name');
        $all_apartment = Remittance::distinct('apartment')->pluck('apartment');

        $post_enquiries = PostEnquiry::orderBy('created_at', 'desc')->simplePaginate(5);

        return view('admin.tenant-records.index', compact('post_enquiries', 'all_tenant', 'all_apartment'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //dd($request->all());
        // Get the selected tenant name and apartment from the form submission
        $selectedTenantNames = $request->input('name_of_tenant');
        $selectedApartments = $request->input('name_of_apartment');
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        $query = Remittance::query();

        // Filter records based on selected tenant names and apartments
        if (!empty($selectedTenantNames)) {
            if (is_array($selectedTenantNames)) {
                $query->whereIn('tenant_name', $selectedTenantNames);
            } else {
                $query->where('tenant_name', $selectedTenantNames);
            }
        }

        if (!empty($selectedApartments)) {
            if (is_array($selectedApartments)) {
                $query->whereIn('apartment', $selectedApartments);
            } else {
                $query->where('apartment', $selectedApartments);
            }
        }

        // Filter records based on the date range
        if (!empty($startDate) && !empty($endDate)) {
            $query->whereBetween('rent_due_date', [$startDate, $endDate]);
        }

        // Get the filtered records
        $filteredRecords = $query->orderBy('created_at', 'asc')->simplePaginate(5);

        $post_enquiries = PostEnquiry::orderBy('created_at', 'desc')->simplePaginate(5);

        return view('admin.tenant-records.create', compact('filteredRecords', 'post_enquiries', 'selectedTenantNames', 'selectedApartments'));
    }

    /**
     * Generates PDF
     */
    public function generatePDF(Request $request)
    {
        // Retrieve the selected tenant names and apartments
        $selectedTenantNames = $request->input('name_of_tenant');
        $selectedApartments = $request->input('name_of_apartment');

        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        $query = Remittance::query();

        // Filter records based on selected tenant names and apartments
        if (!empty($selectedTenantNames)) {
            if (is_array($selectedTenantNames)) {
                $query->whereIn('tenant_name', $selectedTenantNames);
            } else {
                $query->where('tenant_name', $selectedTenantNames);
            }
        }

        if (!empty($selectedApartments)) {
            if (is_array($selectedApartments)) {
                $query->whereIn('apartment', $selectedApartments);
            } else {
                $query->where('apartment', $selectedApartments);
            }
        }

        // Filter records based on the date range
        if (!empty($startDate) && !empty($endDate)) {
            $query->whereBetween('rent_due_date', [$startDate, $endDate]);
        }

        $filteredRecords = $query->orderBy('created_at', 'asc')->get();

        // Calculate the totals for Amount Paid and Debt Amount
        $totalAmountPaid = $filteredRecords->sum('amount_paid');
        $totalDebtAmount = $filteredRecords->sum('debt_amount');
        $rentFee = $filteredRecords->first()->rent_fee;

        // Generate the PDF using the PDF facade
        $pdf = PDF::loadView('admin.tenant-records.pdf_view', compact('filteredRecords', 'selectedTenantNames',
        'selectedApartments', 'totalAmountPaid', 'totalDebtAmount', 'rentFee'));

        // Download the PDF file with a specific filename
        return $pdf->download("$selectedTenantNames-RentStatements.pdf");
    }

    /**
     * Generate Excel file
     */
    public function generateExcel(Request $request)
    {
        // Retrieve the selected tenant names and apartments
        $selectedTenantNames = $request->input('name_of_tenant');
        $selectedApartments = $request->input('name_of_apartment');

        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        $query = Remittance::query();

        // Filter records based on selected tenant names and apartments
        if (!empty($selectedTenantNames)) {
            if (is_array($selectedTenantNames)) {
                $query->whereIn('tenant_name', $selectedTenantNames);
            } else {
                $query->where('tenant_name', $selectedTenantNames);
            }
        }

        if (!empty($selectedApartments)) {
            if (is_array($selectedApartments)) {
                $query->whereIn('apartment', $selectedApartments);
            } else {
                $query->where('apartment', $selectedApartments);
            }
        }

        // Filter records based on the date range
        if (!empty($startDate) && !empty($endDate)) {
            $query->whereBetween('rent_due_date', [$startDate, $endDate]);
        }

        $filteredRecords = $query->orderBy('created_at', 'asc')->get();

        // Generate and download the Excel file
        return Excel::download(new TenantRecordsExport($filteredRecords), 'tenant_records.xlsx');
    }

}

/*
    public function create(Request $request)
    {
        //dd($request->all());
        // Get the selected tenant name and apartment from the form submission
        $selectedTenantName = $request->input('name_of_tenant');
        $selectedApartment = $request->input('name_of_apartment');

        // Query the Remittance model to filter records based on the selected tenant name and apartment
        $filteredRecords = Remittance::where('tenant_name', $selectedTenantName)
                ->where('apartment', $selectedApartment)
                ->get();

        $post_enquiries = PostEnquiry::orderBy('created_at', 'desc')->simplePaginate(5);

        return view('admin.tenant-records.create', compact('filteredRecords', 'post_enquiries'));
    }

*/

