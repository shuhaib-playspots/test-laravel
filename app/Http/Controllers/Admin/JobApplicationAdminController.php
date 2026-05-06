<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobApplication;

class JobApplicationAdminController extends Controller
{
    public function index()
    {
        $filter = request('type');

        $query = JobApplication::orderBy('created_at', 'desc');

        if ($filter && in_array($filter, ['tutor', 'general'])) {
            $query->where('application_type', $filter);
        }

        $applications = $query->get();
        $tutorCount   = JobApplication::where('application_type', 'tutor')->count();
        $generalCount = JobApplication::where('application_type', 'general')->count();

        return view('admin.jobs.applications', compact('applications', 'tutorCount', 'generalCount'));
    }
}
