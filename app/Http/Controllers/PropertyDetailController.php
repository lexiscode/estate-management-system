<?php

namespace App\Http\Controllers;
use App\Models\Property;

use Illuminate\Http\Request;

class PropertyDetailController extends Controller
{

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $property = Property::findOrFail($id);

        $properties = Property::all();

        // Filter records based on if the in_hot column holds a value
        $filteredHotProperties = Property::where('in_hot', true)->take(5)->get();

        return view('users.property-detail', compact('property', 'properties', 'filteredHotProperties'));
    }

}
