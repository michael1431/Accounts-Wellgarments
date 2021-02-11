<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UIElementsController extends Controller
{
    public function general()
    {
        return view('ui.general');
    }

    public function icons()
    {
        return view('ui.icons');
    }

    public function buttons()
    {
        return view('ui.buttons');
    }

    public function sliders()
    {
        return view('ui.sliders');
    }

    public function timeline()
    {
        return view('ui.timeline');
    }

    public function modals()
    {
        return view('ui.modals');
    }

}
