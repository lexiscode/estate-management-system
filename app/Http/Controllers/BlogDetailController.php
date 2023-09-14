<?php

namespace App\Http\Controllers;
use App\Models\Blog;

use Illuminate\Http\Request;

class BlogDetailController extends Controller
{

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $blog = Blog::findOrFail($id);

        $blogs = Blog::all();

        // Filter records based on if the in_hot column holds a value
        $featuredBlogs = Blog::where('featured', true)->take(5)->get();

        return view('users.blog-detail', compact('blog', 'blogs', 'featuredBlogs'));
    }

}

