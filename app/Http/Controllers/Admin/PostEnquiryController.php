<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\PostEnquiry;

use Illuminate\Http\Request;

class PostEnquiryController extends Controller
{
    public function index()
    {
        $post_enquiries = PostEnquiry::orderBy('created_at', 'desc')->simplePaginate(5);

        return view('admin.post-enquiries.index', compact('post_enquiries'))
                            ->with('post_enquiries_copy', $post_enquiries);;
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
            'phone_no' => ['required', 'string', 'max:14'],
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
