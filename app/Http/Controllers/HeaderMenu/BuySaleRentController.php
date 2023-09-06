<?php

namespace App\Http\Controllers\HeaderMenu;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;

class BuySaleRentController extends Controller
{
    // Display all buy, sale and rent properties.
    public function index()
    {
        return view('users.buysalerent');
    }
}
