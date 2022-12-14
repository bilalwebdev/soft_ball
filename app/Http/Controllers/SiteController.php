<?php

namespace App\Http\Controllers;

class SiteController extends Controller
{
    public function slider()
    {
        return view('admin.site.slider');
    }
    public function siteSettings()
    {
        return view('admin.site.site-settings');
    }
}
