<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Arr;
use Illuminate\View\View;

class PageController extends Controller
{
    public function home(): View
    {
        return view('pages.home', [
            ...$this->seo(
                title: '3D Printing Chichester | Local PLA Prototypes & Short Runs',
                description: 'Chichester 3D Printing.com provides local Bambu P1S PLA printing, prototypes, replacement parts, custom design and small batch runs across West Sussex and Hampshire.',
                routeName: 'home',
                keywords: [
                    '3D printing Chichester',
                    '3D printing West Sussex',
                    '3D printing Hampshire',
                    'local 3D printing service',
                    'PLA 3D printing',
                    'Bambu P1S printing',
                    'AMS multicolour 3D printing',
                    'prototype printing Chichester',
                    'replacement plastic parts',
                    'small batch 3D printing',
                ],
            ),
        ]);
    }

    public function services(): View
    {
        return view('pages.services', [
            ...$this->seo(
                title: '3D Printing Services Chichester | Print Files, Design & Small Batch',
                description: 'Explore C3D services: print my file, design and print, custom replacement parts, prototypes and small batch PLA 3D printing around Chichester.',
                routeName: 'services',
                keywords: [
                    '3D printing services Chichester',
                    'print STL file Chichester',
                    'design and print 3D parts',
                    'custom 3D printing West Sussex',
                    'small batch printing Hampshire',
                    'prototype printing service',
                ],
            ),
        ]);
    }

    public function printFile(): View
    {
        return view('pages.print-file', [
            ...$this->seo(
                title: 'Print My File Chichester | Upload STL, 3MF, STEP or OBJ',
                description: 'Upload your STL, 3MF, STEP or OBJ file for local PLA 3D printing on Bambu P1S printers with AMS multicolour capability in Chichester.',
                routeName: 'print-file',
                keywords: [
                    'print my file Chichester',
                    'upload STL Chichester',
                    '3MF 3D printing',
                    'STEP file 3D printing',
                    'OBJ 3D printing service',
                    'Bambu P1S PLA printing',
                    'AMS multicolour PLA printing',
                ],
            ),
        ]);
    }

    public function smallBatch(): View
    {
        return view('pages.small-batch', [
            ...$this->seo(
                title: 'Small Batch 3D Printing Chichester | 5-100 PLA Parts',
                description: 'Small batch PLA 3D printing in Chichester for short runs of brackets, mounts, clips, product samples, jigs and practical parts.',
                routeName: 'small-batch',
                keywords: [
                    'small batch 3D printing Chichester',
                    'short run 3D printing',
                    'low volume 3D printing',
                    'PLA batch printing',
                    'prototype batch printing',
                    '3D printed brackets',
                    '3D printed mounts',
                    'product sample printing',
                ],
            ),
        ]);
    }

    public function sussexPrototyping(): View
    {
        return view('pages.sussex-prototyping', [
            ...$this->seo(
                title: '3D Printing & Prototyping Sussex | Local PLA Parts & Short Runs',
                description: 'Local 3D printing and prototyping for Sussex, Chichester, West Sussex and nearby Hampshire. PLA prototypes, brackets, mounts, samples and short production runs.',
                routeName: 'sussex-prototyping',
                keywords: [
                    '3D printing and prototyping Sussex',
                    '3D printing prototyping West Sussex',
                    'prototype printing Sussex',
                    'local 3D printing Sussex',
                    '3D printed prototypes Chichester',
                    'PLA prototype printing',
                    'short run 3D printing Sussex',
                    'small batch 3D printing Sussex',
                ],
            ),
        ]);
    }

    public function beginners(): View
    {
        return view('pages.beginners', [
            ...$this->seo(
                title: '3D Printing Help for Beginners in Chichester | Files, Photos & Advice',
                description: 'Beginner-friendly local 3D printing help in Chichester. Send a file, photo, sketch or description and C3D will advise what can be printed or quoted.',
                routeName: 'beginners',
                keywords: [
                    '3D printing help for beginners Chichester',
                    '3D printing beginners West Sussex',
                    '3D printing courses near me',
                    '3D printing clubs near me',
                    'beginner 3D printing help',
                    'local 3D printing advice',
                    'print a 3D file for beginners',
                    'turn photo into 3D print',
                ],
            ),
        ]);
    }

    public function tabletopMiniatures(): View
    {
        return view('pages.tabletop-miniatures', [
            ...$this->seo(
                title: 'Custom Tabletop Miniatures & Terrain Chichester | PLA 3D Printing',
                description: 'Custom PLA 3D printing for tabletop games in Chichester: terrain, dungeon tiles, bases, tokens, markers, accessories and chunky gaming pieces.',
                routeName: 'tabletop-miniatures',
                keywords: [
                    'custom tabletop miniatures Chichester',
                    '3D printed tabletop terrain',
                    '3D printed gaming miniatures',
                    'tabletop terrain printing Sussex',
                    'DND terrain 3D printing',
                    'wargaming terrain 3D printing',
                    '3D printed miniature bases',
                    'PLA gaming accessories',
                    'board game token printing',
                ],
            ),
        ]);
    }

    public function terrainEssentials(): View
    {
        return view('pages.terrain-essentials', [
            ...$this->seo(
                title: 'Terrain Essentials | 3D Printed Tabletop Terrain & Buildings',
                description: 'Terrain Essentials by C3D: matte grey PLA tabletop terrain, sci-fi barricades, buildings, ruins and gaming accessories for D&D-style RPGs, wargaming and tabletop games.',
                routeName: 'terrain-essentials',
                keywords: [
                    'Terrain Essentials',
                    '3D printed tabletop terrain',
                    'matte grey PLA terrain',
                    'D&D terrain',
                    'wargaming terrain',
                    'Games Workshop terrain accessories',
                    'sci-fi barricade terrain',
                    'tabletop buildings and ruins',
                    'paintable PLA terrain',
                    'Etsy tabletop terrain',
                    'Chichester tabletop terrain',
                ],
                ogImage: asset('images/terrain-essentials-promo.png'),
                ogImageAlt: 'Terrain Essentials sci-fi tabletop terrain board with matte grey PLA buildings, barricades and gaming pieces',
            ),
        ]);
    }

    public function shop(): View
    {
        $products = Product::query()
            ->where('active', true)
            ->orderBy('category')
            ->latest()
            ->get();

        return view('pages.shop', [
            'products' => $products,
            'productsByCategory' => $products->groupBy('category'),
            ...$this->seo(
                title: 'Terrain Essentials Store | 3D Printed Tabletop Terrain & Accessories',
                description: 'Shop Terrain Essentials by C3D: matte grey PLA tabletop terrain, sci-fi barricades, buildings, ruins, gaming accessories and useful 3D printed products.',
                routeName: 'shop',
                keywords: [
                    'Terrain Essentials store',
                    '3D printed products Chichester',
                    '3D printed tabletop terrain',
                    '3D printed gaming accessories',
                    '3D printed buildings and ruins',
                    'matte grey PLA terrain',
                    'gaming case bookends',
                    '3D printed desk accessories',
                    '3D printed garden fittings',
                    'custom printed parts',
                    'PLA printed products',
                ],
                ogImage: asset('images/terrain-essentials-promo.png'),
                ogImageAlt: 'Terrain Essentials matte grey PLA tabletop terrain and buildings on a sci-fi gaming board',
            ),
        ]);
    }

    public function about(): View
    {
        return view('pages.about', [
            ...$this->seo(
                title: 'About C3D | Local 3D Printing Workshop in Chichester',
                description: 'Learn about Chichester 3D Printing.com, a practical local digital workshop for low-volume PLA prints, prototypes and replacement parts.',
                routeName: 'about',
                keywords: [
                    'about Chichester 3D Printing',
                    'local 3D printing workshop',
                    '3D printing Chichester',
                    'West Sussex 3D printing',
                    'Hampshire 3D printing',
                ],
            ),
        ]);
    }

    public function quote(): View
    {
        return view('pages.quote', [
            ...$this->seo(
                title: 'Request a 3D Printing Quote | Upload STL, STEP, OBJ or Photos',
                description: 'Request a local 3D printing quote from C3D. Upload STL, 3MF, STEP, OBJ, photos or PDFs for PLA prototypes, replacement parts and small batch runs.',
                routeName: 'quote',
                keywords: [
                    '3D printing quote Chichester',
                    'upload STL for quote',
                    'STEP file 3D printing',
                    'OBJ file printing',
                    'replacement part quote',
                    'small batch 3D printing quote',
                    'custom 3D printing quote',
                ],
            ),
        ]);
    }

    /**
     * @param  array<int, string>  $keywords
     * @return array<string, mixed>
     */
    private function seo(string $title, string $description, string $routeName, array $keywords, ?string $ogImage = null, ?string $ogImageAlt = null): array
    {
        $baseKeywords = [
            'Chichester 3D Printing.com',
            'C3D',
            '3D printing Chichester',
            '3D printing West Sussex',
            '3D printing Hampshire',
        ];

        return [
            'metaTitle' => $title,
            'metaDescription' => $description,
            'metaKeywords' => implode(', ', array_values(array_unique([...$keywords, ...$baseKeywords]))),
            'canonicalUrl' => route($routeName),
            'ogTitle' => $title,
            'ogDescription' => $description,
            'ogImage' => $ogImage ?? asset('images/bambu-p1s-ams-hero.png'),
            'ogImageAlt' => $ogImageAlt ?? 'Bambu P1S style 3D printer with AMS multicolour PLA filament setup for local Chichester 3D printing',
            'ogType' => 'website',
            'twitterCard' => 'summary_large_image',
            'structuredData' => $this->structuredData($title, $description),
        ];
    }

    /**
     * @return array<string, mixed>
     */
    private function structuredData(string $title, string $description): array
    {
        return [
            '@context' => 'https://schema.org',
            '@type' => 'LocalBusiness',
            '@id' => route('home').'#business',
            'name' => 'Chichester 3D Printing.com',
            'alternateName' => 'C3D',
            'url' => route('home'),
            'image' => asset('images/bambu-p1s-ams-hero.png'),
            'description' => $description,
            'areaServed' => Arr::map(['Chichester', 'West Sussex', 'Hampshire'], fn (string $place): array => [
                '@type' => 'Place',
                'name' => $place,
            ]),
            'makesOffer' => [
                [
                    '@type' => 'Offer',
                    'name' => 'Print My File',
                    'description' => 'Upload STL, 3MF, STEP or OBJ files for local PLA 3D printing.',
                ],
                [
                    '@type' => 'Offer',
                    'name' => 'Design & Print',
                    'description' => 'Custom design support for replacement parts, prototypes and practical printed objects.',
                ],
                [
                    '@type' => 'Offer',
                    'name' => 'Small Batch 3D Printing',
                    'description' => 'Low-volume PLA print runs for prototypes, brackets, mounts, samples and display items.',
                ],
                [
                    '@type' => 'Offer',
                    'name' => 'Custom Tabletop Miniatures and Terrain',
                    'description' => 'PLA printing for tabletop terrain, bases, tokens, markers and gaming accessories.',
                ],
            ],
            'sameAs' => [],
            'slogan' => 'Local 3D printing in Chichester',
            'subjectOf' => [
                '@type' => 'WebPage',
                'name' => $title,
            ],
        ];
    }
}
