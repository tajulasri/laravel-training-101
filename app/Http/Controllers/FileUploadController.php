<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    public function index()
    {
        return view('file_uploads.file_upload');
    }

    public function store(Request $request)
    {

    }
}
