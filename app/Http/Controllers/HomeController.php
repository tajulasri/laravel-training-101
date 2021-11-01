<?php

namespace App\Http\Controllers;

use App\Asset;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $assets = Asset::query()
        ->orderBy('id','desc')
        ->paginate(20);

        //get all users
        $users = User::get();

        return view('home',['assets' => $assets,'users' =>$users]);
    }

    public function update($id,Request $request)
    {
       $asset = Asset::find($id);
       $asset->current_owned_by = $request->current_owned_by;
       $asset->save();

       return redirect()->back();
    }

    public function delete($id)
    {

    }
}
