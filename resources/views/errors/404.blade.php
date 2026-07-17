@php
    $metaTitle = '404 | Page Not Found | Chichester 3D Printing.com';
    $metaDescription = 'This C3D page could not be found. Head back to the store, services or quote page.';
    $metaRobots = 'noindex, follow';
@endphp

@extends('layouts.site')

@section('content')
    <section class="relative isolate overflow-hidden bg-[#061522] px-5 py-16 text-white sm:px-8">
        <div class="absolute inset-0 -z-20 bg-[radial-gradient(circle_at_18%_20%,rgba(23,184,174,0.26),transparent_24rem),radial-gradient(circle_at_82%_18%,rgba(232,111,45,0.2),transparent_22rem),linear-gradient(135deg,#061522,#101b28_62%,#061522)]"></div>
        <div class="absolute inset-0 -z-10 opacity-[0.14] [background-image:linear-gradient(rgba(255,255,255,0.14)_1px,transparent_1px),linear-gradient(90deg,rgba(255,255,255,0.14)_1px,transparent_1px)] [background-size:44px_44px]"></div>

        <div class="mx-auto grid min-h-[calc(100vh-180px)] max-w-7xl items-center gap-10 lg:grid-cols-[0.92fr_1.08fr]">
            <div>
                <p class="mb-4 text-xs font-black uppercase tracking-[0.12em] text-c3d-teal">Lost layer detected</p>
                <h1 class="text-6xl font-black leading-none sm:text-8xl">404</h1>
                <p class="mt-6 max-w-2xl text-3xl font-black leading-tight sm:text-5xl">This part did not stick to the build plate.</p>
                <blockquote class="mt-8 max-w-2xl border-l-2 border-c3d-orange pl-5 text-lg leading-8 text-white/72">
                    <p>"As terrifying and painful as reality can be, it's also... the only place that you can find true happiness."</p>
                    <footer class="mt-3 text-sm font-black uppercase tracking-[0.08em] text-c3d-orange">Parzival, Ready Player One</footer>
                </blockquote>

                <div class="mt-9 flex flex-wrap gap-3">
                    <a href="{{ route('home') }}" class="rounded-lg bg-c3d-orange px-5 py-4 text-sm font-black text-c3d-ink">Back Home</a>
                    <a href="{{ route('shop') }}" class="rounded-lg border border-white/20 bg-white/5 px-5 py-4 text-sm font-black text-white">Open Store</a>
                    <a href="{{ route('quote') }}" class="rounded-lg border border-white/20 bg-white/5 px-5 py-4 text-sm font-black text-white">Request a Quote</a>
                </div>
            </div>

            <div class="relative mx-auto aspect-square w-full max-w-xl">
                <div class="absolute inset-8 rounded-full border border-white/10"></div>
                <div class="absolute inset-20 rounded-full border border-c3d-teal/30"></div>
                <div class="absolute left-1/2 top-1/2 h-52 w-52 -translate-x-1/2 -translate-y-1/2 rounded-lg border border-white/15 bg-white/[0.06] p-5 shadow-2xl shadow-black/35 backdrop-blur">
                    <div class="h-full rounded-md border-2 border-c3d-teal/80 p-4">
                        <div class="h-14 rounded bg-c3d-ink/80"></div>
                        <div class="mt-5 h-3 w-28 rounded bg-white/35"></div>
                        <div class="mt-3 h-3 w-20 rounded bg-white/25"></div>
                        <div class="absolute -right-3 top-9 h-10 w-10 rounded-full bg-c3d-orange"></div>
                    </div>
                </div>
                <div class="absolute left-7 top-20 h-16 w-16 rounded-lg border border-c3d-orange/60 bg-c3d-orange/10"></div>
                <div class="absolute bottom-16 right-9 h-20 w-20 rounded-full border border-c3d-teal/70 bg-c3d-teal/10"></div>
                <div class="absolute bottom-8 left-20 h-3 w-52 rounded-full bg-white/20 blur-sm"></div>
                <div class="absolute right-16 top-10 rounded-lg border border-white/10 bg-white/5 px-4 py-3 text-sm font-black text-white/70">x: ? y: ? z: ?</div>
            </div>
        </div>
    </section>
@endsection
