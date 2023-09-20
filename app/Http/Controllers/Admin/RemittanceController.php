<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\PostEnquiry;
use App\Models\Remittance;
use RealRashid\SweetAlert\Facades\Alert;

use Illuminate\Http\Request;


class RemittanceController extends Controller
{
    // permissions management
    public function __construct()
    {
        $this->middleware('role_or_permission:remittance index,admin')->only('index');
        $this->middleware('role_or_permission:remittance create,admin')->only('create', 'store');
        $this->middleware('role_or_permission:remittance show,admin')->only('show');
        $this->middleware('role_or_permission:remittance update,admin')->only('edit', 'update');
        $this->middleware('role_or_permission:remittance delete,admin')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $remittances = Remittance::orderBy('created_at', 'desc')->simplePaginate(5);
        $post_enquiries = PostEnquiry::orderBy('created_at', 'desc')->simplePaginate(5);

        return view('admin.remittance.index', compact('remittances', 'post_enquiries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $post_enquiries = PostEnquiry::orderBy('created_at', 'desc')->simplePaginate(5);

        return view("admin.remittance.create", compact('post_enquiries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // Validation rules for the form fields
        $validatedData = $request->validate([
            'tenant_name' => ['required', 'string', 'max:50'],
            'apartment' => ['required', 'string'],
            'status' => ['required', 'string'],
            'rent_fee' => ['required', 'numeric'],
            'amount_paid' => ['required', 'numeric'],
            'payment_date' => ['required', 'date'],
            'debt_amount' => ['nullable', 'numeric'],
            'debt_due_date' => ['nullable', 'date'],
            'rent_due_date' => ['required', 'date'],
            'payment_method' => ['required', 'string'],
            'payment_proof' => ['file', 'mimes:jpeg,png,jpg,pdf', 'max:5120', 'nullable'],
            'notes' => ['string', 'max:100', 'nullable'],

        ]);

        // Handle image upload
        if ($request->hasFile('payment_proof')) {
            $image = $request->file('payment_proof');
            $imageName = time() . '_' . $image->getClientOriginalName();

            // Move the uploaded image to the public directory
            $image->move(public_path('uploads/remits'), $imageName);

            // Save the image name to the database
            $validatedData['payment_proof'] = $imageName;
        }

        // Create a new property using the validated data
        Remittance::create($validatedData);

        return redirect()->route('admin.remit.index')->with('creation-success', 'New record has been added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $remittance = Remittance::findOrFail($id);

        $post_enquiries = PostEnquiry::orderBy('created_at', 'desc')->simplePaginate(5);

        return view('admin.remittance.show', compact('remittance', 'post_enquiries'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $remittance = Remittance::findOrFail($id);

        $post_enquiries = PostEnquiry::orderBy('created_at', 'desc')->simplePaginate(5);

        return view('admin.remittance.update', compact('remittance', 'post_enquiries'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Find the Property model by ID
        $remittance = Remittance::findOrFail($id);

        // Validation rules for the form fields
        $validatedData = $request->validate([
            'tenant_name' => ['required', 'string', 'max:50'],
            'apartment' => ['required', 'string'],
            'status' => ['required', 'string'],
            'rent_fee' => ['required', 'numeric'],
            'amount_paid' => ['required', 'numeric'],
            'payment_date' => ['required', 'date'],
            'debt_amount' => ['nullable', 'numeric'],
            'debt_due_date' => ['nullable', 'date'],
            'rent_due_date' => ['required', 'date'],
            'payment_method' => ['required', 'string'],
            'payment_proof' => ['file', 'mimes:jpeg,png,jpg,pdf', 'max:5120', 'nullable'],
            'notes' => ['string', 'max:100', 'nullable'],

        ]);

        // Handle image upload if a new image is provided
        if ($request->hasFile('payment_proof')) {

            $image = $request->file('payment_proof');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $imagePath = 'uploads/remits/' . $imageName;
            $image->move(public_path('uploads/remits'), $imageName);

            // Save the new image name to the database
            $validatedData['payment_proof'] = $imageName;
        }

        // Update the Remittance attributes
        $remittance->update($validatedData);

        return redirect()->route('admin.remit.index')
                        ->with('update-success', 'The tenant data has been updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $remittance = Remittance::findOrFail($id);

        $remittance->delete();

        return redirect()->back()->with('delete-success', 'Tenant data row has been deleted successfully');
    }
}
