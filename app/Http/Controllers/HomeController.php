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

        // Filter records based on if the in_recommended column holds a value
        $filteredRecommendedProperties = Property::where('in_recommended', true)->take(2)->get();

        return view('users.home', compact('properties', 'filteredRecommendedProperties'));
    }

}
