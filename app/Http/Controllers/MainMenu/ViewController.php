<?php

namespace App\Http\Controllers\MainMenu;
use App\Http\Controllers\Controller;
use App\Models\About;

use Illuminate\Http\Request;

class ViewController extends Controller
{

    // Display the home page.
    public function __invoke()
    {
        return view('users.home');
    }

    // Display the about page.
    public function about()
    {
        $abouts = About::all();

        return view('users.about', compact('abouts'));
    }

    // Display the agents page.
    public function agents()
    {
        //$agents = About::orderBy('created_at', 'asc')->simplePaginate(4);
        return view('users.agents');
        //return view('users.agents', compact('agents'));
    }

    // Display the blog page.
    public function blog()
    {
        return view('users.blog');
    }

    // Display the contact page.
    public function contact()
    {
        return view('users.contact');
    }
}
