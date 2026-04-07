<?php

namespace App\Http\Controllers;

use App\Services\PrintableService;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;

class PrintableController extends Controller
{
    public function __construct(
        private PrintableService $service
    ) {}

    public function index()
    {
        $printables = $this->service->all();

        return view('printables.index', compact('printables'));
    }

    public function download(int $id): StreamedResponse
    {
        $printable = $this->service->download($id);

        abort_unless(Storage::disk('public')->exists($printable->pdf_file), 404);

        return Storage::disk('public')->download(
            $printable->pdf_file,
            $printable->title . '.pdf'
        );
    }
}
