<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Agent;
use App\Models\PostEnquiry;

use Illuminate\Http\Request;

class SearchPropertyController extends Controller
{
    // permissions management
    public function __construct()
    {
        $this->middleware('role_or_permission:agent search,admin')->only('search');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $agent_search = Agent::where('name', 'like', "%$query%")
            ->orWhere('email', 'like', "%$query%")
            ->get();

        $post_enquiries = PostEnquiry::orderBy('created_at', 'desc')->simplePaginate(5);

        return view('admin.agents-navigation.search', compact('agent_search', 'post_enquiries'));
    }
}

