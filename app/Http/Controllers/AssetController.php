<?php

namespace App\Http\Controllers;

use App\Asset;
use App\AssetStatus;
use App\AssetType;
use App\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AssetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = AssetType::get();
        $assetStatus = AssetStatus::get();
        $assetlocations = Location::get();

        return view('assets.create',[
            'types' =>$types,
            'assetStatus'=>$assetStatus,
            'assetlocations'=>$assetlocations
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //validation here
        $validation = Validator::make($request->all(),[
            //form attribute => 'rules'
            'current_owned_by' => 'required'
        ]);


       if($validation->fails()){
            return redirect()->back()
            ->withErrors($validation->messages());
       }


        $asset = Asset::find($id);
        $asset->current_owned_by = $request->current_owned_by;
        $asset->save();

        return redirect()->back()
       ->with('success',sprintf('assigned %s asset to user.',$asset->asset_serial));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
