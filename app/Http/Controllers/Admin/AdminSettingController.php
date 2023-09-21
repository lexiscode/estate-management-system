<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use App\Models\PostEnquiry;
use Illuminate\Http\Request;
use App\Traits\FileUploadTrait;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminGeneralSettingUpdateRequest;
use Illuminate\Http\RedirectResponse;



class AdminSettingController extends Controller
{
    use FileUploadTrait;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $post_enquiries = PostEnquiry::orderBy('created_at', 'desc')->simplePaginate(5);

        return view('admin.admin-settings.index', compact('post_enquiries'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(AdminGeneralSettingUpdateRequest $request) : RedirectResponse
    {
        $logoPath = $this->handleFileUpload($request, 'site_logo');
        $faviconPath = $this->handleFileUpload($request, 'site_favicon');

        Setting::updateOrCreate(
            ['key' => 'site_name'],
            ['value' => $request->site_name]
        );

        if(!empty($logoPath)){
            Setting::updateOrCreate(
                ['key' => 'site_logo'],
                ['value' => $logoPath]
            );
        }

        if(!empty($faviconPath)){
            Setting::updateOrCreate(
                ['key' => 'site_favicon'],
                ['value' => $faviconPath]
            );
        }

        toast('Updated Successfully!', 'success')->width('400');

        return redirect()->back();
    }

}
