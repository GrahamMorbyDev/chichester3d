<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;
use XMLWriter;

class SeoController extends Controller
{
    public function sitemap(): Response
    {
        return response($this->sitemapXml($this->sitemapUrls()), 200)
            ->header('Content-Type', 'application/xml; charset=UTF-8');
    }

    public function robots(): Response
    {
        $lines = [
            'User-agent: *',
            'Allow: /',
            'Disallow: /admin',
            'Disallow: /admin/',
            'Disallow: /livewire-da4dd75a/',
            'Disallow: /request-a-quote/success/',
            'Disallow: /storage/',
            '',
            'Sitemap: '.url('/sitemap.xml'),
            'Host: '.parse_url(config('app.url'), PHP_URL_HOST),
        ];

        return response(implode("\n", array_filter($lines, fn (?string $line): bool => $line !== null))."\n", 200)
            ->header('Content-Type', 'text/plain; charset=UTF-8');
    }

    public function manifest(): JsonResponse
    {
        return response()->json([
            'name' => 'Chichester 3D Printing.com',
            'short_name' => 'C3D',
            'description' => 'Local short-run PLA 3D printing in Chichester for prototypes, replacement parts and small batch work.',
            'start_url' => route('home', absolute: false),
            'scope' => '/',
            'display' => 'standalone',
            'background_color' => '#f7f7f4',
            'theme_color' => '#17212b',
            'icons' => [
                [
                    'src' => asset('favicon.png'),
                    'sizes' => '512x512',
                    'type' => 'image/png',
                    'purpose' => 'any',
                ],
                [
                    'src' => asset('apple-touch-icon.png'),
                    'sizes' => '180x180',
                    'type' => 'image/png',
                    'purpose' => 'any',
                ],
            ],
        ])->header('Content-Type', 'application/manifest+json; charset=UTF-8');
    }

    public function humans(): Response
    {
        return response(implode("\n", [
            '/* TEAM */',
            'Company: Chichester 3D Printing.com',
            'Design: Grey Patrick',
            'Site: https://greypatrick.com',
            '',
            '/* SITE */',
            'Location: Chichester, West Sussex, United Kingdom',
            'Focus: Local short-run PLA 3D printing, prototypes, replacement parts and small batch production',
            'Built with: Laravel, Livewire, Alpine, Tailwind CSS, Filament',
            '',
        ]), 200)->header('Content-Type', 'text/plain; charset=UTF-8');
    }

    /**
     * @return array<int, array<string, mixed>>
     */
    private function sitemapUrls(): array
    {
        $lastModified = Carbon::createFromTimestamp(
            max([
                filemtime(app_path('Http/Controllers/PageController.php')),
                filemtime(resource_path('views/layouts/site.blade.php')),
                filemtime(resource_path('views/pages/home.blade.php')),
            ]),
        )->toAtomString();

        return [
            [
                'loc' => route('home'),
                'lastmod' => $lastModified,
                'changefreq' => 'weekly',
                'priority' => '1.0',
                'image' => [
                    'loc' => asset('images/bambu-p1s-ams-hero.png'),
                    'title' => 'Bambu P1S and AMS style local 3D printing setup',
                ],
            ],
            [
                'loc' => route('services'),
                'lastmod' => $lastModified,
                'changefreq' => 'monthly',
                'priority' => '0.9',
                'image' => [
                    'loc' => asset('images/services-pipework-job.png'),
                    'title' => 'Completed printed pipework job with order sheet',
                ],
            ],
            [
                'loc' => route('print-file'),
                'lastmod' => $lastModified,
                'changefreq' => 'monthly',
                'priority' => '0.9',
                'image' => [
                    'loc' => asset('images/print-my-file-workflow.png'),
                    'title' => 'Upload a 3D file for local PLA printing',
                ],
            ],
            [
                'loc' => route('small-batch'),
                'lastmod' => $lastModified,
                'changefreq' => 'monthly',
                'priority' => '0.9',
                'image' => [
                    'loc' => asset('images/small-batch-run.png'),
                    'title' => 'Small batch 3D printed PLA parts',
                ],
            ],
            [
                'loc' => route('sussex-prototyping'),
                'lastmod' => $lastModified,
                'changefreq' => 'monthly',
                'priority' => '0.85',
                'image' => [
                    'loc' => asset('images/services-pipework-job.png'),
                    'title' => 'Local Sussex 3D printing and prototyping job',
                ],
            ],
            [
                'loc' => route('beginners'),
                'lastmod' => $lastModified,
                'changefreq' => 'monthly',
                'priority' => '0.75',
                'image' => [
                    'loc' => asset('images/print-my-file-workflow.png'),
                    'title' => 'Beginner friendly local 3D printing help',
                ],
            ],
            [
                'loc' => route('tabletop-miniatures'),
                'lastmod' => $lastModified,
                'changefreq' => 'monthly',
                'priority' => '0.8',
                'image' => [
                    'loc' => asset('images/tabletop-miniatures-pla.png'),
                    'title' => 'PLA printed tabletop gaming terrain and miniatures',
                ],
            ],
            [
                'loc' => route('about'),
                'lastmod' => $lastModified,
                'changefreq' => 'monthly',
                'priority' => '0.7',
                'image' => [
                    'loc' => asset('images/about-workshop.png'),
                    'title' => 'C3D local 3D printing workshop',
                ],
            ],
            [
                'loc' => route('quote'),
                'lastmod' => $lastModified,
                'changefreq' => 'monthly',
                'priority' => '0.8',
            ],
        ];
    }

    /**
     * @param  array<int, array<string, mixed>>  $urls
     */
    private function sitemapXml(array $urls): string
    {
        $xml = new XMLWriter;
        $xml->openMemory();
        $xml->startDocument('1.0', 'UTF-8');
        $xml->startElement('urlset');
        $xml->writeAttribute('xmlns', 'http://www.sitemaps.org/schemas/sitemap/0.9');
        $xml->writeAttribute('xmlns:image', 'http://www.google.com/schemas/sitemap-image/1.1');

        foreach ($urls as $url) {
            $xml->startElement('url');
            $xml->writeElement('loc', $url['loc']);
            $xml->writeElement('lastmod', $url['lastmod']);
            $xml->writeElement('changefreq', $url['changefreq']);
            $xml->writeElement('priority', $url['priority']);

            if (isset($url['image'])) {
                $xml->startElement('image:image');
                $xml->writeElement('image:loc', $url['image']['loc']);
                $xml->writeElement('image:title', $url['image']['title']);
                $xml->endElement();
            }

            $xml->endElement();
        }

        $xml->endElement();
        $xml->endDocument();

        return $xml->outputMemory();
    }
}
