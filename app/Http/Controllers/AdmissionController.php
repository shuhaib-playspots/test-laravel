<?php

namespace App\Http\Controllers;

use App\Models\Admission;
use Illuminate\Http\Request;

class AdmissionController extends Controller
{
    public function show()
    {
        return view('get-started');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'parent_name'    => ['required', 'string', 'max:150'],
            'parent_email'   => ['required', 'email', 'max:150'],
            'parent_phone'   => ['required', 'string', 'max:20'],
            'student_name'   => ['required', 'string', 'max:150'],
            'student_dob'    => ['required', 'date', 'before:today'],
            'student_gender' => ['required', 'in:male,female'],
            'program'        => ['required', 'string', 'max:100'],
            'class_type'     => ['required', 'in:one_on_one,group,online'],
            'message'        => ['nullable', 'string', 'max:1000'],
        ]);

        Admission::create($validated);

        return redirect()->route('get-started')
            ->with('success', 'JazakAllahu Khayran! Your admission enquiry has been submitted. We will contact you within 24–48 hours, In sha Allah.');
    }
}
