<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function invoice()
    {
        return view('page.invoice');
    }

    public function profile()
    {
        return view('page.profile');
    }

    public function login()
    {
        return view('page.login');
    }

    public function register()
    {
        return view('page.register');
    }

    public function reset()
    {
        return view('page.reset');
    }

    public function lockscreen()
    {
        return view('page.lockscreen');
    }

    public function invoicePrint()
    {
        return view('page.invoice-print');
    }
}
