<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use App\Models\PostEnquiry;
use Illuminate\Http\Request;
use App\Traits\FileUploadTrait;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\AdminSeoSettingUpdateRequest;
use App\Http\Requests\AdminGeneralSettingUpdateRequest;



class AdminSettingController extends Controller
{
    use FileUploadTrait;

    // permissions management
    public function __construct()
    {
        $this->middleware('role_or_permission:setting index,admin')->only('index');
        $this->middleware('role_or_permission:general-seo-setting update,admin')
                ->only('updateGeneralSetting', 'updateSeoSetting');
    }

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
    public function updateGeneralSetting(AdminGeneralSettingUpdateRequest $request) : RedirectResponse
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


    function updateSeoSetting(AdminSeoSettingUpdateRequest $request) : RedirectResponse {

        Setting::updateOrCreate(
            ['key' => 'site_seo_title'],
            ['value' => $request->site_seo_title]
        );


        Setting::updateOrCreate(
            ['key' => 'site_seo_description'],
            ['value' => $request->site_seo_description]
        );


        Setting::updateOrCreate(
            ['key' => 'site_seo_keywords'],
            ['value' => $request->site_seo_keywords]
        );

        toast(__('Updated Successfully!'), 'success')->width('400');

        return redirect()->back();
    }

}
