<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateAdmissionStatusRequest;
use App\Services\AdmissionService;
use Illuminate\Http\Request;

class AdmissionController extends Controller
{
    public function __construct(
        private AdmissionService $service
    ) {}

    public function index(Request $request)
    {
        $status     = $request->input('status');
        $admissions = $this->service->list(15, $status);
        $stats      = $this->service->stats();

        return view('admin.admissions.index', compact('admissions', 'stats'));
    }

    public function updateStatus(UpdateAdmissionStatusRequest $request, int $id)
    {
        $this->service->updateStatus($id, $request->validated('status'));

        return back()->with('success', 'Admission status updated successfully.');
    }
}
