<?php

namespace App\Http\Controllers;
use App\Models\Property;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    // Display the home page.
    public function __invoke()
    {
        $properties = Property::all();

        return view('users.home', compact('properties'));
    }

}
