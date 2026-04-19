<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function show()
    {
        return view('contact');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'    => ['required', 'string', 'max:100'],
            'email'   => ['required', 'email', 'max:150'],
            'phone'   => ['nullable', 'string', 'max:30'],
            'subject' => ['required', 'string'],
            'message' => ['required', 'string', 'min:10', 'max:2000'],
        ]);

        return redirect()->route('contact')->with('success', 'JazakAllah khair! Your message has been received. We will get back to you within 24 hours, in sha Allah.');
    }
}
