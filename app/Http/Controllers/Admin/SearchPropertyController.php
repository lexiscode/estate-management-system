<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\PostEnquiry;

use Illuminate\Http\Request;

class SearchPropertyController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');

        $property_search = Property::where('title', 'like', "%$query%")
            ->orWhere('property_type', 'like', "%$query%")
            ->get();

        $post_enquiries = PostEnquiry::orderBy('created_at', 'desc')->simplePaginate(5);

        return view('admin.properties.search', compact('property_search', 'post_enquiries'));
    }
}

