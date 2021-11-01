<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $appname = 'testing';

        return view('home',['appname' => $appname]);
    }
}
