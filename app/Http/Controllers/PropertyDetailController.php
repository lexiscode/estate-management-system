<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PropertyDetailController extends Controller
{
    // Display a property details page.
    public function index()
    {
        return view('users.property-detail');
    }
}