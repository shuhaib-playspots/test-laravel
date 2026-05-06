<?php

namespace App\Http\Controllers;

use App\Services\CareerService;

class CareerController extends Controller
{
    public function __construct(
        private CareerService $service
    ) {}

    public function index()
    {
        $careers = $this->service->all();

        return view('jobs.index', compact('careers'));
    }
}
