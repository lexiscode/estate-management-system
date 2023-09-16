<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\PostEnquiry;

use Illuminate\Http\Request;

class PostEnquiryController extends Controller
{
    // permissions management
    public function __construct()
    {
        $this->middleware('role_or_permission:message index,admin')->only('index');
        $this->middleware('role_or_permission:message delete,admin')->only('destroy');
    }

    public function index()
    {
        $post_enquiries = PostEnquiry::orderBy('created_at', 'desc')->simplePaginate(5);

        return view('admin.post-enquiries.index', compact('post_enquiries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation rules for the form fields
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'max:255'],
            'phone_no' => ['required', 'string', 'max:17'],
            'property_title' => ['string', 'nullable'], // not required
            'contact_page' => ['string', 'nullable'], // not required
            'message' => ['required', 'string'],
        ]);

        // Create a new blog using the validated data
        PostEnquiry::create($validatedData);

        return redirect()->back()->with('enquiry-success', 'Your enquiry has been sent successfully!');
    }

    public function destroy(PostEnquiry $post_enquiry)
    {
        $post_enquiry->delete();

        return redirect()->back()->with('delete-success', 'Enquiry has been deleted successfully!');
    }
}
