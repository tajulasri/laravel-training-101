<?php

namespace App\Http\Controllers;

use App\Asset;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AssetApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $assets = Asset::query()
            ->orderBy('id', 'desc')
            ->get();

        return response()->json($assets);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request    $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int                         $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $asset = Asset::where('id', $id)
                ->firstOrFail();

            return response()->json(['status' => Response::HTTP_OK, 'data' => $asset]);

        } catch (Exception $e) {

            return response()->json(['status' => Response::BAD_REQUEST, 'data' => 'Resource not found']);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request    $request
     * @param  int                         $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int                         $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
