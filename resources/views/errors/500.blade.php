@php
    $statusCode = isset($exception) && method_exists($exception, 'getStatusCode') ? $exception->getStatusCode() : 500;
    $metaTitle = $statusCode.' | Something went wrong | Chichester 3D Printing.com';
    $metaDescription = 'Something went wrong on Chichester 3D Printing.com. Please try again or request a quote directly.';
    $metaRobots = 'noindex, follow';
@endphp

@extends('layouts.site')

@section('content')
    <section class="relative isolate overflow-hidden bg-[#061522] px-5 py-16 text-white sm:px-8">
        <div class="absolute inset-0 -z-20 bg-[radial-gradient(circle_at_20%_15%,rgba(232,111,45,0.2),transparent_24rem),radial-gradient(circle_at_80%_28%,rgba(23,184,174,0.22),transparent_22rem),linear-gradient(135deg,#061522,#101b28)]"></div>
        <div class="mx-auto grid min-h-[calc(100vh-180px)] max-w-5xl place-items-center text-center">
            <div>
                <p class="mb-4 text-xs font-black uppercase tracking-[0.12em] text-c3d-orange">Print interrupted</p>
                <h1 class="text-6xl font-black leading-none sm:text-8xl">{{ $statusCode }}</h1>
                <p class="mx-auto mt-6 max-w-2xl text-3xl font-black leading-tight sm:text-5xl">The machine paused itself before making a mess.</p>
                <p class="mx-auto mt-6 max-w-2xl text-lg leading-8 text-white/70">Something went sideways on our end. Try again in a moment, or head back to a known-good page.</p>

                <div class="mt-9 flex flex-wrap justify-center gap-3">
                    <a href="{{ route('home') }}" class="rounded-lg bg-c3d-orange px-5 py-4 text-sm font-black text-c3d-ink">Back Home</a>
                    <a href="{{ route('quote') }}" class="rounded-lg border border-white/20 bg-white/5 px-5 py-4 text-sm font-black text-white">Request a Quote</a>
                </div>
            </div>
        </div>
    </section>
@endsection
