<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController
{
    public function index(Request $request)
    {
        return view('master');
    }
}
