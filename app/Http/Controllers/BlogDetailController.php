<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogDetailController extends Controller
{
    // Display a single blog detail page.
    public function index()
    {
        return view('users.blog-detail');
    }
}
