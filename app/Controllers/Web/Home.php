<?php

namespace App\Controllers\Web;
use App\Controllers\BaseController;

class Home extends BaseController
{
    public function index()
    {
        return view('auth/email-activate-show');
    }
}
