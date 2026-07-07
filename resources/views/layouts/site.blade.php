<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ $metaTitle ?? 'Chichester 3D Printing.com' }}</title>
        <link rel="icon" href="{{ asset('favicon.svg') }}" type="image/svg+xml">
        <link rel="icon" href="{{ asset('favicon.png') }}" type="image/png" sizes="512x512">
        <link rel="alternate icon" href="{{ asset('favicon.ico') }}">
        <link rel="apple-touch-icon" href="{{ asset('apple-touch-icon.png') }}">
        <meta name="description" content="{{ $metaDescription ?? 'Local 3D printing in Chichester for prototypes, small batch printing, custom parts and replacement plastic parts.' }}">
        <meta name="keywords" content="{{ $metaKeywords ?? '3D printing Chichester, 3D printing West Sussex, 3D printing Hampshire, prototype printing Chichester, custom 3D printing, replacement plastic parts, small batch 3D printing' }}">
        <meta name="robots" content="{{ $metaRobots ?? 'index, follow' }}">
        <link rel="canonical" href="{{ $canonicalUrl ?? url()->current() }}">

        <meta property="og:site_name" content="Chichester 3D Printing.com">
        <meta property="og:title" content="{{ $ogTitle ?? $metaTitle ?? 'Chichester 3D Printing.com' }}">
        <meta property="og:description" content="{{ $ogDescription ?? $metaDescription ?? 'Local 3D printing in Chichester for prototypes, small batch printing, custom parts and replacement plastic parts.' }}">
        <meta property="og:type" content="{{ $ogType ?? 'website' }}">
        <meta property="og:url" content="{{ $canonicalUrl ?? url()->current() }}">
        <meta property="og:image" content="{{ $ogImage ?? asset('images/bambu-p1s-ams-hero.png') }}">
        <meta property="og:locale" content="en_GB">

        <meta name="twitter:card" content="{{ $twitterCard ?? 'summary_large_image' }}">
        <meta name="twitter:title" content="{{ $ogTitle ?? $metaTitle ?? 'Chichester 3D Printing.com' }}">
        <meta name="twitter:description" content="{{ $ogDescription ?? $metaDescription ?? 'Local 3D printing in Chichester for prototypes, small batch printing, custom parts and replacement plastic parts.' }}">
        <meta name="twitter:image" content="{{ $ogImage ?? asset('images/bambu-p1s-ams-hero.png') }}">

        @isset($structuredData)
            <script type="application/ld+json">
                {!! json_encode($structuredData, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
            </script>
        @endisset

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
    </head>
    <body class="bg-c3d-paper text-c3d-ink antialiased">
        <header class="sticky top-0 z-40 border-b border-c3d-ink/10 bg-c3d-paper/90 backdrop-blur" x-data="{ menuOpen: false }" x-on:keydown.escape.window="menuOpen = false">
            <div class="mx-auto max-w-7xl px-5 py-4 sm:px-8">
                <div class="flex items-center justify-between gap-4">
                    <a href="{{ route('home') }}" class="flex min-w-0 items-center gap-3 font-semibold">
                        <x-brand-mark />
                        <span class="min-w-0 text-[0.96rem] leading-tight sm:text-base">Chichester 3D Printing.com</span>
                    </a>

                    <nav class="hidden items-center gap-x-6 text-sm font-medium text-c3d-ink/70 lg:flex" aria-label="Main navigation">
                        <a class="hover:text-c3d-ink" href="{{ route('services') }}">Services</a>
                        <a class="hover:text-c3d-ink" href="{{ route('print-file') }}">Print My File</a>
                        <a class="hover:text-c3d-ink" href="{{ route('small-batch') }}">Small Batch</a>
                        <a class="hover:text-c3d-ink" href="{{ route('about') }}">About</a>
                        <a class="rounded-lg bg-c3d-ink px-4 py-2 font-bold text-white" href="{{ route('quote') }}">Request a Quote</a>
                    </nav>

                    <div class="flex shrink-0 items-center gap-2 lg:hidden">
                        <a class="rounded-lg bg-c3d-ink px-3 py-2 text-sm font-bold text-white" href="{{ route('quote') }}">Quote</a>
                        <button class="inline-grid h-10 w-10 place-items-center rounded-lg border border-c3d-ink/15 bg-white text-c3d-ink" type="button" x-on:click="menuOpen = ! menuOpen" x-bind:aria-expanded="menuOpen.toString()" aria-controls="mobile-menu">
                            <span class="sr-only">Open menu</span>
                            <svg x-show="! menuOpen" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" aria-hidden="true">
                                <path d="M4 7h16M4 12h16M4 17h16" />
                            </svg>
                            <svg x-cloak x-show="menuOpen" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" aria-hidden="true">
                                <path d="M6 6l12 12M18 6 6 18" />
                            </svg>
                        </button>
                    </div>
                </div>

                <nav id="mobile-menu" class="mt-4 grid gap-2 border-t border-c3d-ink/10 pt-4 text-sm font-bold text-c3d-ink lg:hidden" x-cloak x-show="menuOpen" x-on:click.outside="menuOpen = false" aria-label="Mobile navigation">
                    <a class="rounded-lg px-3 py-3 hover:bg-white" href="{{ route('services') }}" x-on:click="menuOpen = false">Services</a>
                    <a class="rounded-lg px-3 py-3 hover:bg-white" href="{{ route('print-file') }}" x-on:click="menuOpen = false">Print My File</a>
                    <a class="rounded-lg px-3 py-3 hover:bg-white" href="{{ route('small-batch') }}" x-on:click="menuOpen = false">Small Batch</a>
                    <a class="rounded-lg px-3 py-3 hover:bg-white" href="{{ route('about') }}" x-on:click="menuOpen = false">About</a>
                    <a class="rounded-lg px-3 py-3 hover:bg-white" href="{{ route('contact') }}" x-on:click="menuOpen = false">Contact</a>
                </nav>
            </div>
        </header>

        <main>
            @yield('content')
        </main>

        <footer class="border-t border-c3d-ink/10 bg-white">
            <div class="mx-auto grid max-w-7xl gap-8 px-5 py-10 text-sm text-c3d-muted sm:px-8 md:grid-cols-[1fr_1.4fr]">
                <div>
                    <div class="mb-3 flex items-center gap-3 font-semibold text-c3d-ink">
                        <x-brand-mark size="sm" />
                        <span>Chichester 3D Printing.com</span>
                    </div>
                    <p>Local short-run 3D printing for Chichester, West Sussex, Hampshire and nearby areas.</p>
                </div>
                <div class="grid gap-4 sm:grid-cols-3">
                    <div>
                        <h2 class="mb-2 font-bold text-c3d-ink">Services</h2>
                        <p>Print files, design parts, prototype ideas and run small PLA batches.</p>
                    </div>
                    <div>
                        <h2 class="mb-2 font-bold text-c3d-ink">Materials</h2>
                        <p>Full PLA focus with multiple colours on Bambu P1S printers with AMS.</p>
                    </div>
                    <div>
                        <h2 class="mb-2 font-bold text-c3d-ink">Local</h2>
                        <p>Collection around Chichester. Delivery and shipping available on request.</p>
                    </div>
                </div>
            </div>
            <div class="border-t border-c3d-ink/10">
                <div class="mx-auto flex max-w-7xl flex-col gap-2 px-5 py-4 text-xs text-c3d-muted sm:flex-row sm:items-center sm:justify-between sm:px-8">
                    <p>&copy; {{ date('Y') }} Chichester 3D Printing.com. All rights reserved.</p>
                    <p>
                        Design by
                        <a class="font-bold text-c3d-ink hover:text-c3d-teal" href="https://greypatrick.com" target="_blank" rel="noopener noreferrer">Grey Patrick</a>
                    </p>
                </div>
            </div>
        </footer>

        @livewireScripts
    </body>
</html>
