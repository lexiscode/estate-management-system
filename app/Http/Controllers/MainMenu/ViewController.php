<?php

namespace App\Http\Controllers\MainMenu;
use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Agent;
use App\Models\Blog;

use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ViewController extends Controller
{

    // Display the about page.
    public function about()
    {
        $abouts = About::all();

        return view('users.about', compact('abouts'));
    }

    // Display the agents page.
    public function agents()
    {
        $agents = Agent::orderBy('created_at', 'asc')->simplePaginate(4);

        return view('users.agents', compact('agents'));
    }

    // Display the blog list page.
    public function blog()
    {
        $blogs = Blog::orderBy('created_at', 'asc')->simplePaginate(5);

        // Filter records based on if the in_hot column holds a value
        $featuredBlogs = Blog::where('featured', true)->take(5)->get();

        return view('users.blog', compact('blogs', 'featuredBlogs'));
    }

    // Display the contact page.
    public function contact()
    {
        return view('users.contact');
    }
}
