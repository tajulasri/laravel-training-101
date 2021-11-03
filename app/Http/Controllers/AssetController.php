<?php

namespace App\Http\Controllers;

use App\Asset;
use App\AssetStatus;
use App\AssetType;
use App\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Ramsey\Uuid\Uuid;
use Illuminate\Database\Eloquent\ModelNotFoundException;

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
    
        $validator = Validator::make($request->all(),[
            'label' =>'required',
            'expired_date'=>'required',
            'register_date'=>'required'
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator->messages());
        }

        $uuid = Uuid::uuid4();
        $request->merge(['asset_serial'=> strtoupper($uuid->toString())]);
        $asset = Asset::create($request->all());
        
        //composer require ramsey/uuid
        //composer require milon/barcode

        return redirect()->back()->with('success','Saving record succesfully');
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
         $types = AssetType::get();
        $assetStatus = AssetStatus::get();
        $assetlocations = Location::get();

        $asset = Asset::find($id);

        return view('assets.edit',[
            'types' =>$types,
            'asset'=>$asset,
            'assetStatus'=>$assetStatus,
            'assetlocations'=>$assetlocations
        ]);
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
            //'current_owned_by' => 'required'
        ]);


       if($validation->fails()){
            return redirect()->back()
            ->withErrors($validation->messages());
       }


        $asset = Asset::find($id);
        $asset->asset_type_id = $request->asset_type_id;
        $asset->asset_status_id = $request->asset_status_id;
        $asset->location_id = $request->location_id;
        $asset->label = $request->label;
        $asset->expired_date = $request->expired_date;
        $asset->register_date = $request->register_date;
        //$asset->current_owned_by = $request->current_owned_by;
        $asset->save();

        return redirect()->back()
       ->with('success',sprintf('Save asset is success %s.',$asset->asset_serial));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       try {
         $asset = Asset::findOrFail($id);
        $asset->delete();
         Log::error($id.' <= id asset deleted.');
          return redirect()
        ->back()
        ->with('success','Record deleted.');
       }
       catch(ModelNotFoundException $e){
        Log::error($id.' <= id asset not found.');
         return redirect()
        ->back()
        ->with('error','Record not found.');
       }

      
    }
}
