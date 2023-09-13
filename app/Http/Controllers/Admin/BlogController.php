<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Blog;
use App\Models\PostEnquiry;

use Illuminate\Http\Request;


class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::orderBy('created_at', 'desc')->simplePaginate(5);

        $post_enquiries = PostEnquiry::orderBy('created_at', 'desc')->simplePaginate(5);

        return view('admin.blogs.index', compact('blogs', 'post_enquiries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $post_enquiries = PostEnquiry::orderBy('created_at', 'desc')->simplePaginate(5);

        return view('admin.blogs.create', compact('post_enquiries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all());
        // Validation rules for the form fields
        $validatedData = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'content' => ['required', 'string'],
            'featured' => ['nullable', 'string'],
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();

            // Move the uploaded image to the public directory
            $image->move(public_path('uploads/blogs'), $imageName);

            // Save the image name to the database
            $validatedData['image'] = $imageName;
        }

        // Add checkbox values to $validatedData (1 or 0)
        $validatedData['featured'] = $request->has('featured');

        // Create a new blog using the validated data
        Blog::create($validatedData);

        return redirect()->route('admin.blog.index')->with('creation-success', 'Blog created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $blog = Blog::findOrFail($id);

        $post_enquiries = PostEnquiry::orderBy('created_at', 'desc')->simplePaginate(5);

        return view('admin.blogs.show', compact('blog', 'post_enquiries'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $blog = Blog::findOrFail($id);

        $post_enquiries = PostEnquiry::orderBy('created_at', 'desc')->simplePaginate(5);

        return view('admin.blogs.update', compact('blog', 'post_enquiries'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Find the Blog model by ID
        $blog = Blog::findOrFail($id);

        // Validation rules for the form fields
        $validatedData = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'content' => ['required', 'string'],
        ]);

        // Add checkbox values to $validatedData (1 or 0)
        $validatedData['featured'] = $request->has('featured');

        // Update the Blog attributes
        $blog->update($validatedData);

        // Handle image upload
        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $imagePath = 'uploads/blogs/' . $imageName;

            // Move the uploaded image to the public directory
            $image->move(public_path('uploads/blogs'), $imageName);

            // Save the new image name to the database
            $blog->image = $imageName;
            $blog->save();
        }

        return redirect()->route('admin.blog.index')->with('update-success', 'Blog updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();

        return redirect()->route('admin.blog.index')->with('success', 'Post deleted successfully');
    }
}
