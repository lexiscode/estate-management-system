<?php

namespace App\Http\Controllers\HeaderMenu;
use App\Http\Controllers\Controller;
use App\Models\Property;

use Illuminate\Http\Request;

class BuySaleRentController extends Controller
{
    // Display all buy, sale and rent properties.
    public function index()
    {
        $properties = Property::simplePaginate(9);

        // Fetch the total number of rows in the properties table
        $countProperties = Property::count();

        // Filter records based on if the in_hot column holds a value
        $filteredHotProperties = Property::where('in_hot', true)->take(5)->get();

        return view('users.buysalerent', compact('properties', 'filteredHotProperties', 'countProperties'));
    }
}

