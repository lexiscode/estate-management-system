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

        return view('users.blog-detail', compact('blog', 'blogs'));
    }
    
}

