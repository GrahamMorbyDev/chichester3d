<?php

namespace App\Http\Controllers;

use App\Models\QuoteRequest;
use App\Models\QuoteRequestFile;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Validator as ValidationValidator;
use Illuminate\View\View;

class QuoteRequestController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:120'],
            'email' => ['required', 'email', 'max:180'],
            'phone' => ['nullable', 'string', 'max:60'],
            'postcode' => ['nullable', 'string', 'max:20'],
            'website' => ['nullable', 'string', 'max:0'],
            'quote_started_at' => ['required', 'integer'],
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

        $validator->after(function (ValidationValidator $validator) use ($request): void {
            $startedAt = (int) $request->input('quote_started_at', 0);
            $elapsedSeconds = now()->timestamp - $startedAt;

            if ($elapsedSeconds < 3 || $elapsedSeconds > 43200) {
                $validator->errors()->add('description', 'Please refresh the page and try sending your request again.');
            }

            if ($this->looksLikeMarketingSpam((string) $request->input('description'))) {
                $validator->errors()->add('description', 'Please keep quote requests focused on the 3D print work you need.');
            }
        });

        $validated = $validator->validate();
        $files = $validated['uploads'] ?? [];
        unset($validated['uploads'], $validated['website'], $validated['quote_started_at']);

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

    private function looksLikeMarketingSpam(string $description): bool
    {
        $description = mb_strtolower($description);

        $blockedPhrases = [
            'search engine optimization',
            'backend analysis',
            'online visibility',
            'website analysis',
            'google, bing',
            'google and bing',
            'quick phone call',
            'preferred time availability',
            'updated contact number',
            'backlink',
            'domain authority',
            'increase traffic',
        ];

        foreach ($blockedPhrases as $phrase) {
            if (str_contains($description, $phrase)) {
                return true;
            }
        }

        preg_match_all('/https?:\/\/|www\.|\.com\b|\.net\b|\.org\b/i', $description, $matches);

        return count($matches[0]) > 1;
    }
}
