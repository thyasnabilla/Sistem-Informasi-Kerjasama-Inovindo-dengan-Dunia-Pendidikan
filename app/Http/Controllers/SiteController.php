<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function register()
    {
        return view('Institusi.auth.register');
    }
    public function verify()
    {
        return view('auth.verify');
    }
}
