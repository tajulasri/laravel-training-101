<?php

namespace App\Http\Controllers;

use App\Mail\HelloEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;

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
        $attachmentPath = storage_path('app/images/'.$imageName);

        //send email that user had upload file
        Mail::to('mtajulasri@gmail.com')
            ->queue(new HelloEmail($attachmentPath));

        return redirect()->back()
            ->with('success','File uploaded . '.$path);
    }
}
