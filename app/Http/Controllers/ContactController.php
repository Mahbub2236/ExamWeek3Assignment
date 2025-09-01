<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class ContactController extends Controller
{
    // Show the contact form
    public function index()
    {
        return view('home');
    }

    public function projects()
    {
        return view('projects');
    }

    public function resume()
    {
        return view('resume');
    }



    public function showForm()
    {
        return view('contact');
    }

    // Handle form submission
    public function submitForm(Request $request)
    {
        $validated = $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string',
            'file' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048'
        ]);

        // File Upload (Bonus Task)
        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('uploads', 'public');
            $validated['file_path'] = $filePath;

            // Set Cookie if file uploaded
            Cookie::queue('file_uploaded', 'true', 60); // valid for 60 minutes
        }

        // Store data temporarily in session
        session()->flash('success', 'Form submitted successfully!');
        session()->put('form_data', $validated);

        return redirect()->route('contact.confirmation');
    }

    // Show confirmation page
    public function confirmation()
    {
        $data = session('form_data');
        return view('confirmation', compact('data'));
    }
}
