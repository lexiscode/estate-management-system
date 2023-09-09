<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\About;
use App\Models\PostEnquiry;

use Illuminate\Http\Request;

class AboutController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // users can't access admin route, there we used the users index() in ViewController
        // which is accessible to users
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $about = About::findOrFail($id);

        $post_enquiries_copy = PostEnquiry::orderBy('created_at', 'desc')->simplePaginate(5);

        return view('admin.about-navigation.update', compact('about', 'post_enquiries_copy'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Find the Blog model by ID
        $about = About::findOrFail($id);

        // Validation rules for the form fields
        $validatedData = $request->validate([
            'background' => ['required', 'string'],
            'profile' => ['required', 'string'],
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ]);

        // Update the Blog attributes
        $about->update($validatedData);

        // Handle image upload
        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $imagePath = 'uploads/about/' . $imageName;

            // Move the uploaded image to the public directory
            $image->move(public_path('uploads/about'), $imageName);

            // Save the new image name to the database
            $about->image = $imageName;
            $about->save();
        }

        return redirect()->back()->with('update-success', 'Your contents has been updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
