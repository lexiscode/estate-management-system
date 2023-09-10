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

        return view('users.property-detail', compact('property', 'properties'));
    }

}
