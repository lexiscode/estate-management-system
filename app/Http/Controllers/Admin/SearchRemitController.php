<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Remittance;
use App\Models\PostEnquiry;

use Illuminate\Http\Request;

class SearchRemitController extends Controller
{

    public function search(Request $request)
    {
        $query = $request->input('query');

        $remits_search = Remittance::where('tenant_name', 'like', "%$query%")
            ->orWhere('apartment', 'like', "%$query%")
            ->get();

        $post_enquiries = PostEnquiry::orderBy('created_at', 'desc')->simplePaginate(5);

        return view('admin.remittance.search', compact('remits_search', 'post_enquiries'));
    }

}

