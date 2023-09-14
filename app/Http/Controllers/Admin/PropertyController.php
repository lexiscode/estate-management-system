<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\Availability;
use Illuminate\Support\Facades\Validator;
use App\Models\PostEnquiry;

use Illuminate\Http\Request;


class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve all properties with their related availabilities
        //$properties = Property::with('availability')->get();
        $properties = Property::with('availability')->orderBy('created_at', 'desc')->simplePaginate(5);

        $post_enquiries = PostEnquiry::orderBy('created_at', 'desc')->simplePaginate(4);

        return view('admin.properties.index', compact('properties', 'post_enquiries'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $post_enquiries = PostEnquiry::orderBy('created_at', 'desc')->simplePaginate(5);

        return view('admin.properties.create', compact('post_enquiries'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // Validation rules for the form fields
        $validatedData = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'property_details' => ['required', 'string'],
            'property_type' => ['required', 'string'],
            'price' => ['required', 'numeric'],
            'location' => ['required', 'string'],
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:1024'],
            'agent_name' => ['required', 'string', 'max:255'],
            'agent_no' => ['required', 'string', 'max:18'],
            'status' => ['required', 'string'],
            'in_featured' => ['nullable', 'string'],
            'in_recommended' => ['nullable', 'string'],
            'in_hot' => ['nullable', 'string'],
        ]);


        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();

            // Move the uploaded image to the public directory
            $image->move(public_path('uploads/properties'), $imageName);

            // Save the image name to the database
            $validatedData['image'] = $imageName;
        }

        // Add checkbox values to $validatedData (1 or 0)
        $validatedData['in_featured'] = $request->has('in_featured');
        $validatedData['in_recommended'] = $request->has('in_recommended');
        $validatedData['in_hot'] = $request->has('in_hot');

        // Create a new property using the validated data
        $property = Property::create($validatedData);

        // Validation rules for the availability fields
        $availabilityData = $request->validate([
            'bedroom' => ['nullable', 'numeric'],
            'livingroom' => ['nullable', 'numeric'],
            'parking' => ['nullable', 'numeric'],
            'kitchen' => ['nullable', 'numeric'],
            'waitingroom' => ['nullable', 'numeric'],
            'studyroom' => ['nullable', 'numeric'],
            'storeroom' => ['nullable', 'numeric'],
            'laundryroom' => ['nullable', 'numeric'],
            'bathroom' => ['nullable', 'numeric'],
            'diningroom' => ['nullable', 'numeric'],
            'balcony' => ['nullable', 'numeric'],
            'guestroom' => ['nullable', 'numeric'],
            'closets' => ['nullable', 'numeric'],
            'pantry' => ['nullable', 'numeric'],
        ]);

        // Remove any null or empty fields from the availability data
        $availabilityData = array_filter($availabilityData);

        // Save availability data only if there are values
        if (!empty($availabilityData)) {
            $availability = new Availability($availabilityData);
            $property->availability()->save($availability);
        }

        return redirect()->route('admin.property.index')->with('creation-success', 'New property has been added successfully!');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $property = Property::with('availability')->findOrFail($id);

        $post_enquiries = PostEnquiry::orderBy('created_at', 'desc')->simplePaginate(5);

        return view('admin.properties.show', compact('property', 'post_enquiries'));

    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $property = Property::with('availability')->findOrFail($id);

        $post_enquiries = PostEnquiry::orderBy('created_at', 'desc')->simplePaginate(5);

        return view('admin.properties.update', compact('property', 'post_enquiries'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Find the Property model by ID
        $property = Property::findOrFail($id);

        // Validation rules for the form fields
        $validatedData = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'property_details' => ['required', 'string'],
            'property_type' => ['required', 'string'],
            'price' => ['required', 'numeric'],
            'location' => ['required', 'string'],
            'image' => ['image', 'mimes:jpeg,png,jpg,gif', 'max:1024'],
            'agent_name' => ['required', 'string', 'max:255'],
            'agent_no' => ['required', 'string', 'max:18'],
            'status' => ['required', 'string'],
            'in_featured' => ['nullable', 'string'],
            'in_recommended' => ['nullable', 'string'],
            'in_hot' => ['nullable', 'string'],
        ]);

        // Handle image upload if a new image is provided
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads/properties'), $imageName);

            // Save the new image name to the database
            $validatedData['image'] = $imageName;
        }

        // Add checkbox values to $validatedData
        $validatedData['in_featured'] = $request->has('in_featured');
        $validatedData['in_recommended'] = $request->has('in_recommended');
        $validatedData['in_hot'] = $request->has('in_hot');

        // Update the Property attributes
        $property->update($validatedData);

        // Handle availability data update
        $availabilityData = $request->only([
            'bedroom', 'livingroom', 'parking', 'kitchen',
            'waitingroom', 'studyroom', 'storeroom', 'laundryroom',
            'bathroom', 'diningroom', 'balcony', 'guestroom',
            'closets', 'pantry'
        ]);

        // Remove any null or empty fields from the availability data
        $availabilityData = array_filter($availabilityData);

        // Remove any null or empty fields from the availability data
        $availabilityData = array_filter($availabilityData);

        if (!empty($availabilityData)) {
            if (!$property->availability) {
                // If availability doesn't exist, create a new one
                $availability = new Availability($availabilityData);
                $property->availability()->save($availability);
            } else {
                // If availability exists, update its attributes
                $property->availability->update($availabilityData);
            }
        } elseif ($property->availability) {
            // If no availability data provided but availability exists, delete it
            $property->availability->delete();
        }

        return redirect()->route('admin.property.index')->with('update-success', 'The property has been updated successfully!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $property = Property::findOrFail($id);

        // Delete the property and its related availability (if any)
        $property->delete();

        return redirect()->back()->with('delete-success', 'Property deleted successfully');
    }

}
