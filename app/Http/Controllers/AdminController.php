<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\PageSetting;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function updatePageSettings(Request $request, $pageSlug)
    {
        $settings = $request->input('settings');

        foreach ($settings as $key => $value) {
            PageSetting::updateOrCreate(
                ['page_slug' => $pageSlug, 'key' => $key],
                ['value' => $value]
            );
        }

        return redirect()->back()->with('success', 'Page settings updated successfully');
    }
}
