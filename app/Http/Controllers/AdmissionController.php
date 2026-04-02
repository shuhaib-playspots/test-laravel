<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAdmissionRequest;
use App\Services\AdmissionService;

class AdmissionController extends Controller
{
    public function __construct(
        private AdmissionService $service
    ) {}

    public function show()
    {
        return view('get-started');
    }

    public function store(StoreAdmissionRequest $request)
    {
        $this->service->store($request->validated());

        return redirect()->route('get-started')
            ->with('success', 'JazakAllahu Khayran! Your admission enquiry has been submitted. We will contact you within 24–48 hours, In sha Allah.');
    }
}
