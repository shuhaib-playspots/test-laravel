<?php

namespace App\Http\Controllers;

use App\Models\JobApplication;
use Illuminate\Http\Request;

class JobApplicationController extends Controller
{
    public function store(Request $request)
    {
        $type = $request->input('application_type');

        $rules = [
            'application_type'      => 'required|in:tutor,general',
            'career_id'             => 'nullable|exists:careers,id',
            'name'                  => 'required|string|max:255',
            'age'                   => 'nullable|integer|min:16|max:80',
            'education_qualification' => 'nullable|string|max:255',
            'college_university'    => 'nullable|string|max:255',
            'email'                 => 'required|email|max:255',
            'phone'                 => 'nullable|string|max:30',
            'whatsapp'              => 'nullable|string|max:30',
            'city'                  => 'nullable|string|max:255',
            'photograph'            => 'nullable|file|mimes:jpg,jpeg,png,webp|max:2048',
            'resume'                => 'nullable|file|mimes:pdf,doc,docx|max:5120',
        ];

        if ($type === 'tutor') {
            $rules['position_type']   = 'required|in:full-time,part-time';
            $rules['subjects']        = 'required|array|min:1';
            $rules['subjects.*']      = 'string';
            $rules['language_medium'] = 'required|array|min:1';
            $rules['language_medium.*'] = 'string';
            $rules['available_days']  = 'required|array|min:1';
            $rules['available_days.*'] = 'string';
            $rules['teaching_hours']  = 'required|integer|min:1|max:5';
            $rules['preferred_time']  = 'nullable|string|max:10';
        }

        $validated = $request->validate($rules);

        $photographPath = null;
        $resumePath     = null;

        if ($request->hasFile('photograph')) {
            $photographPath = $request->file('photograph')->store('job-applications/photos', 'public');
        }

        if ($request->hasFile('resume')) {
            $resumePath = $request->file('resume')->store('job-applications/resumes', 'public');
        }

        $validated['photograph_path'] = $photographPath;
        $validated['resume_path']     = $resumePath;
        unset($validated['photograph'], $validated['resume']);

        JobApplication::create($validated);

        $tab = $type === 'tutor' ? 'tutor' : 'openings';

        return redirect()->route('jobs.index', ['tab' => $tab, 'applied' => 1])
            ->with('application_success', "Thank you, {$validated['name']}! Your application has been submitted successfully. We will get in touch with you soon.");
    }
}
