<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\AdmissionService;

class DashboardController extends Controller
{
    public function __construct(
        private AdmissionService $service
    ) {}

    public function index()
    {
        $stats = $this->service->stats();

        return view('dashboard', compact('stats'));
    }
}
