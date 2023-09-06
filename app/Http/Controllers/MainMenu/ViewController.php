<?php

namespace App\Http\Controllers\MainMenu;
use App\Http\Controllers\Controller;

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
        return view('users.about');
    }

    // Display the agents page.
    public function agents()
    {
        return view('users.agents');
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
