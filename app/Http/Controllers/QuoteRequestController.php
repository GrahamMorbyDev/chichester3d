<?php

namespace App\Http\Controllers;

use App\Models\QuoteRequest;
use App\Models\QuoteRequestFile;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class QuoteRequestController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:120'],
            'email' => ['required', 'email', 'max:180'],
            'phone' => ['nullable', 'string', 'max:60'],
            'postcode' => ['nullable', 'string', 'max:20'],
            'service_type' => ['required', Rule::in(array_keys(QuoteRequest::SERVICE_TYPES))],
            'project_type' => ['nullable', Rule::in(array_keys(QuoteRequest::PROJECT_TYPES))],
            'description' => ['required', 'string', 'min:20', 'max:5000'],
            'quantity' => ['required', 'integer', 'min:1', 'max:100'],
            'material_preference' => ['nullable', 'string', 'max:80'],
            'colour_preference' => ['nullable', 'string', 'max:120'],
            'measurements' => ['nullable', 'string', 'max:2000'],
            'deadline' => ['nullable', 'string', 'max:120'],
            'budget' => ['nullable', 'string', 'max:120'],
            'uploads' => ['nullable', 'array', 'max:8'],
            'uploads.*' => ['file', 'max:20480', 'mimes:stl,3mf,step,stp,obj,jpg,jpeg,png,pdf'],
        ]);

        $files = $validated['uploads'] ?? [];
        unset($validated['uploads']);

        $quoteRequest = QuoteRequest::create($validated + ['status' => 'new']);

        foreach ($files as $file) {
            $path = $file->store("quote-request-files/{$quoteRequest->id}");

            QuoteRequestFile::create([
                'quote_request_id' => $quoteRequest->id,
                'original_filename' => $file->getClientOriginalName(),
                'path' => $path,
                'mime_type' => $file->getClientMimeType(),
                'size' => $file->getSize(),
            ]);
        }

        return redirect()->route('quote.success', $quoteRequest);
    }

    public function success(QuoteRequest $quoteRequest): View
    {
        return view('pages.quote-success', [
            'quoteRequest' => $quoteRequest,
            'metaTitle' => 'Quote Request Received | Chichester 3D Printing.com',
            'metaDescription' => 'Your local 3D printing quote request has been received by C3D.',
            'metaKeywords' => 'quote request received, Chichester 3D Printing.com, C3D',
            'metaRobots' => 'noindex, nofollow',
            'canonicalUrl' => route('quote.success', $quoteRequest),
            'ogTitle' => 'Quote Request Received | Chichester 3D Printing.com',
            'ogDescription' => 'Your local 3D printing quote request has been received by C3D.',
            'ogImage' => asset('images/bambu-p1s-ams-hero.png'),
        ]);
    }

    public function downloadFile(QuoteRequestFile $file)
    {
        return Storage::download($file->path, $file->original_filename);
    }
}
