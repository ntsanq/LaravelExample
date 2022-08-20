<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController
{
    public function index(Request $request)
    {
        return view('form');
    }

    public function input(Request $request)
    {
        return view('show',[
            'name'=>$request->get('name')
        ]);
    }
}
