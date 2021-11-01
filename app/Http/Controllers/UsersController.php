<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        $users = 'users';
        return view('users',['users'=>$users]);
    }
}
