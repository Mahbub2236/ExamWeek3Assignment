<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class UploadController extends Controller
{
    // Show upload form
    public function showForm()
    {
        return view('upload');
    }

    // Handle upload
    public function handleUpload(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048'
        ]);

        // Save file inside storage/app/public/uploads
        $path = $request->file('file')->store('uploads', 'public');

        // Success message in session
        session()->flash('success', 'File uploaded successfully! Path: '.$path);

        // Set cookie
        Cookie::queue('file_uploaded', 'true', 60); // valid for 60 minutes

        return back();
    }
}
