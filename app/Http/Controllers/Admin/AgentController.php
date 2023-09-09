<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Agent;
use App\Models\PostEnquiry;

use Illuminate\Http\Request;

class AgentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $agents = Agent::orderBy('created_at', 'desc')->simplePaginate(5);

        $post_enquiries = PostEnquiry::orderBy('created_at', 'desc')->simplePaginate(5);

        return view('admin.agents-navigation.index', compact('agents', 'post_enquiries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $post_enquiries = PostEnquiry::orderBy('created_at', 'desc')->simplePaginate(5);

        return view('admin.agents-navigation.create', compact('post_enquiries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation rules for the form fields
        $validatedData = $request->validate([
            'name' => ['required', 'string'],
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'about' => ['required', 'string'],
            'email' => ['required', 'string', 'email'],
            'phone_no' => ['required', 'string'],
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();

            // Move the uploaded image to the public directory
            $image->move(public_path('uploads/agents'), $imageName);

            // Save the image name to the database
            $validatedData['image'] = $imageName;
        }

        // Create a new blog using the validated data
        Agent::create($validatedData);

        return redirect()->route('admin.agent.index')->with('creation-success', 'New Agent created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $agent = Agent::findOrFail($id);

        $post_enquiries = PostEnquiry::orderBy('created_at', 'desc')->simplePaginate(5);

        return view('admin.agents-navigation.show', compact('agent', 'post_enquiries'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $agent = Agent::findOrFail($id);

        $post_enquiries = PostEnquiry::orderBy('created_at', 'desc')->simplePaginate(5);

        return view('admin.agents-navigation.update', compact('agent', 'post_enquiries'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Find the Agent model by ID
        $agent = Agent::findOrFail($id);

       // Validation rules for the form fields
       $validatedData = $request->validate([
            'name' => ['required', 'string'],
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'about' => ['required', 'string'],
            'email' => ['required', 'string', 'email'],
            'phone_no' => ['required', 'string'],
        ]);

        // Update the Blog attributes
        $agent->update($validatedData);

        // Handle image upload
        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $imagePath = 'uploads/blogs/' . $imageName;

            // Move the uploaded image to the public directory
            $image->move(public_path('uploads/agents'), $imageName);

            // Save the new image name to the database
            $agent->image = $imageName;
            $agent->save();
        }

        return redirect()->route('admin.agent.index')->with('update-success', 'Agent updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Agent $agent)
    {
        $agent->delete();

        return redirect()->route('admin.agent.index')->with('success', 'Agent deleted successfully');
    }
}



