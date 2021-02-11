<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExtraController extends Controller
{
    public function error404()
    {
        return view('extra.404');
    }

    public function error500()
    {
        return view('extra.500');
    }

    public function blank()
    {
        return view('extra.blank');
    }

    public function pace()
    {
        return view('extra.pace');
    }
}
