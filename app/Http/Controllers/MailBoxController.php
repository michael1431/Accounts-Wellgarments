<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MailBoxController extends Controller
{
    public function inbox()
    {
        return view('mailbox.inbox');
    }

    public function compose()
    {
        return view('mailbox.compose');
    }

    public function read()
    {
        return view('mailbox.read');
    }
}
