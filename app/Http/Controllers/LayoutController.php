<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LayoutController extends Controller
{
    public function topNav()
    {
        return view('layout.top-nav');
    }

    public function boxed()
    {
        return view('layout.boxed');
    }

    public function fixed()
    {
        return view('layout.fixed');
    }

    public function sidebarCollapse()
    {
        return view('layout.sidebar-collapse');
    }
}
