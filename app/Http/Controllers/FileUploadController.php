<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FileUploadController extends Controller
{
    public function index()
    {
        return view('file_uploads.file_upload');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'file' => 'required|mimes:jpg,bmp,png'
        ]);

        $imageName = $request->file->getclientOriginalName();
        $fileName = $request->file('file')->storeAs('images',$imageName);

        $path = asset('storage/'.$fileName);

        return redirect()->back()
            ->with('success','File uploaded . '.$path);
    }
}
